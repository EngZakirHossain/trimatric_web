<?php

namespace App\Http\Controllers;

use App\Traits\ConsumesBackendApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    use ConsumesBackendApi;

    public function index()
    {
        $sliders = $this->getCachedData('sliders');
        $projects = $this->getCachedData('projects');
        $clients = $this->getCachedData('clients');
        $services = $this->getCachedData('services');

        $projects = collect($projects)->map(fn ($p) => [
            ...$p,
            'slug_category' => Str::slug($p['category_name'] ?? ''),
        ]);

        return view('pages.home', compact('sliders', 'projects', 'clients', 'services'));
    }

    public function projects()
    {
        $projects = collect($this->getCachedData('projects'))
            ->map(fn ($p) => [
                ...$p,
                'slug_category' => Str::slug($p['category_name'] ?? ''),
            ]);

        $categories = $projects->pluck('slug_category')->unique()->values();

        return view('pages.projects', compact('projects', 'categories'));
    }

    public function projectDetails($slug)
    {
        $response = $this->apiGet("projects/{$slug}");

        $project = $response['data'] ?? [];
        $previous_project = $response['previous_project'] ?? null;
        $next_project = $response['next_project'] ?? null;

        return view('pages.projectDetails', compact(
            'project',
            'previous_project',
            'next_project'
        ));
    }

    public function portfolio()
    {

        $portfolios = collect($this->getCachedData('projects/images/all'))
            ->map(fn ($p) => [
                ...$p,
                'slug_category' => Str::slug($p['category_name'] ?? ''),
            ]);

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

        $ceo = collect($teams)->first(fn($m) =>
            str_contains(strtolower($m['designation'] ?? ''), 'ceo') ||
            str_contains(strtolower($m['name'] ?? ''), 'mosharraf')
        );

        $others = collect($teams)->reject(fn($m) => $ceo && $m['id'] == $ceo['id']);

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
            return redirect()->route('contact')->with('error', 'Validation failed. Please check your input and try again.')->withErrors($validator)->withInput();
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
            return redirect()->route('contact')->with('error', 'reCAPTCHA verification failed. Please try again.')->withInput();
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
            return redirect()->route('circular.details', ['slug' => $slug])->with('message', 'Your application has been submitted successfully!');
        }

        return redirect()->route('circular.details', ['slug' => $slug])->with('error', 'Failed to submit your application. Please try again later.');
    }

    private function getCachedData(string $endpoint, int $ttl = 86400): array
    {
        return Cache::remember("api_{$endpoint}", $ttl, fn () => $this->fetchDataFromApi($endpoint));
    }

    private function fetchDataFromApi(string $endpoint, int $ttl = 86400): array
    {
        $cacheKey = "api_{$endpoint}";
        $hashKey = "api_{$endpoint}_hash";

        $response = $this->apiGet($endpoint);
        $data = $response['data'] ?? [];

        $newHash = md5(json_encode($data));

        $oldHash = Cache::get($hashKey);

        if ($newHash !== $oldHash) {
            Cache::put($cacheKey, $data, $ttl);
            Cache::put($hashKey, $newHash, $ttl);
        }

        return Cache::get($cacheKey, []);
    }
}
