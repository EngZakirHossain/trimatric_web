<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait ConsumesBackendApi
{
    public function apiGet(string $endpoint, array $params = [])
    {
        return $this->makeRequest('GET', $endpoint, $params);
    }

    public function apiPost(string $endpoint, array $data = [])
    {
        return $this->makeRequest('POST', $endpoint, $data);
    }

    private function makeRequest(string $method, string $endpoint, array $data = [])
    {
        $url = rtrim(config('services.backend.url'), '/').'/'.ltrim($endpoint, '/');
        $token = config('services.backend.token');

        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
        ]);

        if (strtoupper($method) === 'GET') {
            // Simple GET request with query parameters
            $response = $request->get($url, $data);
        } else {
            // Check if $data contains any uploaded files
            $hasFile = false;
            foreach ($data as $key => $value) {
                if ($value instanceof \Illuminate\Http\UploadedFile) {
                    $hasFile = true;
                    break;
                }
            }

            if ($hasFile) {
                // Multipart POST request
                $request = $request->asMultipart();

                // Attach files
                foreach ($data as $key => $value) {
                    if ($value instanceof \Illuminate\Http\UploadedFile) {
                        $request = $request->attach(
                            $key,
                            file_get_contents($value->getRealPath()),
                            $value->getClientOriginalName()
                        );
                    }
                }

                // Send non-file fields
                $nonFileData = array_filter($data, fn ($v) => ! ($v instanceof \Illuminate\Http\UploadedFile));
                $response = $request->post($url, $nonFileData);

            } else {
                // Normal POST request without files
                $response = $request->post($url, $data);
            }
        }

        if ($response->successful()) {
            return $response->json();
        }

        // Log errors if request fails
        Log::error('Backend API request failed', [
            'url' => $url,
            'method' => $method,
            'response' => $response->body(),
        ]);

        return null;
    }
}
