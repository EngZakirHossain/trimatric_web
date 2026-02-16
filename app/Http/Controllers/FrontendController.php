<?php

namespace App\Http\Controllers;

use App\Traits\ConsumesBackendApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

        $categories = collect($projects)
            ->pluck('category_name')
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

        $categories = collect($portfolios)
            ->pluck('category_name')
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
        return Cache::remember("api_{$endpoint}", $ttl, function () use ($endpoint) {
            $response = $this->apiGet($endpoint);

            return $response['data'] ?? [];
        });
    }
}
