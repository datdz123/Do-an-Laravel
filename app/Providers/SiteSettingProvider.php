<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;

class SiteSettingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $siteSettings = Cache::rememberForever('site_settings', function () {
            return SiteSetting::all()->pluck('value', 'key');
        });

        view()->share('siteSettings', $siteSettings);
    }
}
