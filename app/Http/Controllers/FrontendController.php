<?php

namespace App\Http\Controllers;

use App\Traits\ConsumesBackendApi;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    use ConsumesBackendApi;

    public function index()
    {
        $sliders   = $this->fetchData('sliders');
        $projects  = $this->fetchData('projects');
        $clients   = $this->fetchData('clients');
        $services  = $this->fetchData('services');

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
        $next_project     = $response['next_project'] ?? null;

        return view('pages.projectDetails', compact(
            'project',
            'previous_project',
            'next_project'
        ));
    }

    public function portfolio()
    {
        $portfolios = $this->fetchData("projects/images/all");

        $categories = collect($portfolios)
            ->pluck('category_name')
            ->filter()
            ->unique()
            ->values();

        return view('pages.portfolio', compact('portfolios', 'categories'));
    }

    public function clients()
    {
        $clients = $this->fetchData("clients");

        return view('pages.clients', compact('clients'));
    }

    public function team()
    {
        $teams = $this->fetchData("teams");

        $ceo = collect($teams)->first(function ($member) {
            return str_contains(strtolower($member['designation'] ?? ''), 'ceo')
                || str_contains(strtolower($member['name'] ?? ''), 'mosharraf');
        });

        $others = collect($teams)->reject(function ($member) use ($ceo) {
            return $ceo && $member['id'] == $ceo['id'];
        });

        return view('pages.teams', compact('teams', 'ceo', 'others'));
    }

    private function fetchData(string $endpoint, int $ttl = 86400): array
    {
        return Cache::remember("api_{$endpoint}", $ttl, function () use ($endpoint) {
            $response = $this->apiGet($endpoint);
            return $response['data'] ?? [];
        });
    }
}
