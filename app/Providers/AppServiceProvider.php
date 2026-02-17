<?php

namespace App\Providers;

use App\Services\SiteSettingService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $siteSettingService = new SiteSettingService;
            $siteSetting = $siteSettingService->getSiteSetting();
            $view->with('siteSetting', $siteSetting);
        });
    }
}
