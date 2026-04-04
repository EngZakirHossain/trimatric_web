<?php

namespace App\Http\Controllers;

use App\Traits\ConsumesBackendApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    use ConsumesBackendApi;

    public function index()
    {
        $bundle = $this->getHomepageBundle();
        $seo = $this->prepareHomepageSeo($bundle['services']);

        return view('pages.home', [
            'sliders' => $bundle['sliders'],
            'projects' => $bundle['projects'],
            'clients' => $bundle['clients'],
            'services' => $bundle['services'],
            'seo' => $seo,
        ]);
    }

    public function projects()
    {
        $projects = $this->formatProjects($this->getCachedData('projects'));
        $categories = $projects->pluck('slug_category')->unique()->values();

        return view('pages.projects', compact('projects', 'categories'));
    }

    private function formatProjects(array $projects): \Illuminate\Support\Collection
    {
        return collect($projects)->map(fn ($p) => [
            ...$p,
            'slug_category' => Str::slug($p['category_name'] ?? ''),
        ]);
    }

    public function projectDetails($slug)
    {
        $response = $this->apiGet("projects/{$slug}");
        $project = $response['data'] ?? [];
        $seo = $this->prepareSeo($project);
        $previous_project = $response['previous_project'] ?? null;
        $next_project = $response['next_project'] ?? null;

        return view('pages.projectDetails', compact('project', 'previous_project', 'next_project', 'seo'));
    }

    public function portfolio()
    {
        $bundle = $this->getHomepageBundle();
        $portfolios = collect($bundle['portfolio_images']);
        $categories = $portfolios->pluck('slug_category')->unique()->values();

        return view('pages.portfolio', compact('portfolios', 'categories'));
    }

    public function clients()
    {
        $clients = $this->getCachedData('clients');

        return view('pages.clients', compact('clients'));
    }

    public function team()
    {
        $teams = $this->getCachedData('teams');

        $ceo = collect($teams)->first(fn ($m) => str_contains(strtolower($m['designation'] ?? ''), 'ceo') ||
            str_contains(strtolower($m['name'] ?? ''), 'mosharraf')
        );

        $others = collect($teams)->reject(fn ($m) => $ceo && $m['id'] == $ceo['id']);

        return view('pages.teams', compact('teams', 'ceo', 'others'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendContactMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => ['nullable', 'regex:/^(?:\\+?88|0088)?01[3-9]\\d{8}$/'],
            'message' => 'required|string',
            'subject' => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact')
                ->with('error', 'Validation failed. Please check your input.')
                ->withErrors($validator)
                ->withInput();
        }

        $recaptcha = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );

        if (! $recaptcha->json('success')) {
            return redirect()->route('contact')->with('error', 'reCAPTCHA verification failed.');
        }

        if ($request->filled('website')) {
            return redirect()->route('contact')->with('error', 'Spam detected. Message not sent.');
        }

        $response = $this->apiPost('contact', $request->all());

        if (isset($response['status']) && $response['status'] == true) {
            return redirect()->route('contact')->with('message', 'Your message has been sent successfully!');
        }

        return redirect()->route('contact')->with('error', 'Failed to send your message. Please try again later.');
    }

    public function circulars()
    {
        $jobs = $this->getCachedData('jobs');

        return view('pages.circulars', compact('jobs'));
    }

    public function circularDetails($slug)
    {
        $jobDetails = $this->getCachedData("jobs/{$slug}");

        return view('pages.circularDetails', compact('jobDetails'));
    }

    public function applyForJob(Request $request, $slug)
    {
        if ($request->filled('website')) {
            return redirect()->route('circular.details', ['slug' => $slug]);
        }

        $response = $this->apiPost("jobs/{$slug}/apply", $request->all());

        if (isset($response['status']) && $response['status'] == true) {
            return redirect()->route('circular.details', ['slug' => $slug])
                ->with('message', 'Your application has been submitted successfully!');
        }

        return redirect()->route('circular.details', ['slug' => $slug])
            ->with('error', 'Failed to submit your application. Please try again later.');
    }

    private function getCachedData(string $endpoint, int $ttl = 86400): array
    {
        $cacheKey = "api_{$endpoint}";

        if (Cache::has($cacheKey)) {
            $cachedData = Cache::get($cacheKey);

            $lockKey = "lock_api_refresh_{$endpoint}";
            $needsRefresh = ! Cache::has("fresh_{$cacheKey}");

            if ($needsRefresh) {
                Cache::lock($lockKey, 10)->block(0, function () use ($cacheKey, $endpoint, $ttl) {
                    $response = $this->apiGet($endpoint);
                    $data = $response['data'] ?? [];
                    Cache::put($cacheKey, $data, $ttl);
                    Cache::put("fresh_{$cacheKey}", true, $ttl);
                });
            }

            return $cachedData;
        }

        $response = $this->apiGet($endpoint);
        $data = $response['data'] ?? [];

        Cache::put($cacheKey, $data, $ttl);
        Cache::put("fresh_{$cacheKey}", true, $ttl);

        return $data;
    }

    private function getHomepageBundle(int $ttl = 86400): array
    {
        $cacheKey = 'homepage_bundle';

        if (Cache::has($cacheKey)) {
            $cachedBundle = Cache::get($cacheKey);

            $lockKey = "lock_{$cacheKey}";
            $needsRefresh = ! Cache::has("fresh_{$cacheKey}");

            if ($needsRefresh) {
                Cache::lock($lockKey, 15)->block(0, function () use ($cacheKey, $ttl) {
                    $sliders = $this->apiGet('sliders')['data'] ?? [];
                    $projects = $this->apiGet('projects')['data'] ?? [];
                    $clients = $this->apiGet('clients')['data'] ?? [];
                    $services = $this->apiGet('services')['data'] ?? [];
                    $portfolioImages = $this->apiGet('projects/images/all')['data'] ?? [];

                    $projectsFormatted = collect($projects)
                        ->map(fn ($p) => [...$p, 'slug_category' => Str::slug($p['category_name'] ?? '')]);

                    $portfolioFormatted = collect($portfolioImages)
                        ->map(fn ($p) => [...$p, 'slug_category' => Str::slug($p['category_name'] ?? '')]);

                    $bundle = [
                        'sliders' => $sliders,
                        'projects' => $projectsFormatted->toArray(),
                        'clients' => $clients,
                        'services' => $services,
                        'portfolio_images' => $portfolioFormatted->toArray(),
                    ];

                    Cache::put($cacheKey, $bundle, $ttl);
                    Cache::put("fresh_{$cacheKey}", true, $ttl);
                });
            }

            return $cachedBundle;
        }

        $sliders = $this->apiGet('sliders')['data'] ?? [];
        $projects = $this->apiGet('projects')['data'] ?? [];
        $clients = $this->apiGet('clients')['data'] ?? [];
        $services = $this->apiGet('services')['data'] ?? [];
        $portfolioImages = $this->apiGet('projects/images/all')['data'] ?? [];

        $projectsFormatted = collect($projects)
            ->map(fn ($p) => [...$p, 'slug_category' => Str::slug($p['category_name'] ?? '')]);

        $portfolioFormatted = collect($portfolioImages)
            ->map(fn ($p) => [...$p, 'slug_category' => Str::slug($p['category_name'] ?? '')]);

        $bundle = [
            'sliders' => $sliders,
            'projects' => $projectsFormatted->toArray(),
            'clients' => $clients,
            'services' => $services,
            'portfolio_images' => $portfolioFormatted->toArray(),
        ];

        Cache::put($cacheKey, $bundle, $ttl);
        Cache::put("fresh_{$cacheKey}", true, $ttl);

        return $bundle;
    }

    private function prepareSeo(array $data): array
    {
        return [
            'title' => $data['page_title'] ?? $data['title'] ?? 'Trimatric Architects & Engineers',
            'description' => $data['description'] ?? '',
            'keywords' => isset($data['keywords']) ? implode(',', $data['keywords']) : '',
        ];
    }

    private function prepareHomepageSeo(array $services): array
    {

        if (empty($services)) {
            return [
                'title' => 'Trimatric Architects & Engineers',
                'description' => 'One of the pioneer concerns in the field of Interior Design & Turnkey based execution service provider for Residential, Commercial, Hospitality, Retail & Corporate Clients. With the proven capability of excellent imaginative ability and committed professionalism, we bring out the hidden persona of our clients’ and reflect it through Designs tailored accordingly. Apart from business opportunities, we are always keenly devoted to providing innovative, unique and outstanding perspectives for the fulfilment of the requirements which satisfies our clients.',
                'keywords' => 'Trimatric, Architecture, Interior Design, Residential, Commercial, Hospitality, Retail, Corporate',
            ];
        }

        $titles = array_column($services, 'title');
        $descriptions = array_column($services, 'page_title');
        $keywords = [];

        foreach ($services as $s) {
            if (! empty($s['keywords'])) {
                $keywords = array_merge($keywords, $s['keywords']);
            }
        }

        $keywords = array_unique($keywords);

        return [
            'title' => 'Our Services: '.implode(', ', $titles),
            'description' => 'Explore our services: '.implode(', ', $descriptions),
            'keywords' => implode(',', $keywords) ?: 'Design, Architecture',
        ];
    }

    public function clearCache(Request $request)
    {
        $providedToken = $request->header('X-Cache-Token');
        $validToken = config('services.backend.token');

        if (! $providedToken || $providedToken !== $validToken) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized: Invalid token',
            ], 401);
        }

        Artisan::call('optimize:clear');

        return response()->json([
            'status' => true,
            'message' => 'Cache cleared successfully',
        ]);
    }
}
