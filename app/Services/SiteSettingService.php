<?php

namespace App\Services;

use App\Traits\ConsumesBackendApi;
use Illuminate\Support\Facades\Cache;

class SiteSettingService
{
    use ConsumesBackendApi;

    /**
     * Public method to get site settings from API
     */
    public function getSiteSetting(): array
    {
        return Cache::remember('site_settings', 60000, function () {
            $response = $this->apiGet('site-setting');

            return $response['data'] ?? [];
        });
    }
}
