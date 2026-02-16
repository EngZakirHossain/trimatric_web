<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait ConsumesBackendApi
{
    public  function apiGet(string $endpoint, array $params = [])
    {
        return $this->makeRequest('GET', $endpoint, $params);
    }

    public  function apiPost(string $endpoint, array $data = [])
    {
        return $this->makeRequest('POST', $endpoint, $data);
    }

    private function makeRequest(string $method, string $endpoint, array $data = [])
    {
        $url = rtrim(config('services.backend.url'), '/') . '/' . ltrim($endpoint, '/');
        $token = config('services.backend.token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ]);

        if ($method === 'GET') {
            $response = $response->get($url, $data);
        } else {
            $response = $response->post($url, $data);
        }

        if ($response->successful()) {
            return $response->json();
        }

        // Optional: log error or throw exception
        Log::error('Backend API request failed', [
            'url' => $url,
            'method' => $method,
            'response' => $response->body(),
        ]);

        return null;
    }
}
