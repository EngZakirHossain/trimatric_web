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
        $sliders = $this->fetchData('sliders');
        $projects = $this->fetchData('projects');
        $clients = $this->fetchData('clients');
        $services = $this->fetchData('services');

        return view('pages.home', compact(
            'sliders',
            'projects',
            'clients',
            'services'
        ));
    }

    public function projects()
    {
        $projects = $this->fetchData('projects');

        $projects = collect($projects)->map(function ($project) {
            $project['slug_category'] = Str::slug($project['category_name']); // converts "Government Project" => "government-project"

            return $project;
        });

        $categories = collect($projects)
            ->pluck('slug_category')
            ->filter()
            ->unique()
            ->values();

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
        $portfolios = $this->fetchData('projects/images/all');

        $portfolios = collect($portfolios)->map(function ($portfolio) {
            $portfolio['slug_category'] = Str::slug($portfolio['category_name']);

            return $portfolio;
        });

        $categories = collect($portfolios)
            ->pluck('slug_category')
            ->filter()
            ->unique()
            ->values();

        return view('pages.portfolio', compact('portfolios', 'categories'));
    }

    public function clients()
    {
        $clients = $this->fetchData('clients');

        return view('pages.clients', compact('clients'));
    }

    public function team()
    {
        $teams = $this->fetchData('teams');

        $ceo = collect($teams)->first(function ($member) {
            return str_contains(strtolower($member['designation'] ?? ''), 'ceo')
                || str_contains(strtolower($member['name'] ?? ''), 'mosharraf');
        });

        $others = collect($teams)->reject(function ($member) use ($ceo) {
            return $ceo && $member['id'] == $ceo['id'];
        });

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
        $jobs = $this->fetchData('jobs');

        return view('pages.circulars', compact('jobs'));
    }

    public function circularDetails($slug)
    {
        $jobDetails = $this->fetchData("jobs/{$slug}");

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

    private function fetchData(string $endpoint, int $ttl = 86400): array
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
