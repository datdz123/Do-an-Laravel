<?php

namespace App\Providers;

use App\Helpers\alertHelper;
use App\Helpers\cartHelper;
use App\Helpers\menuAdminHelper;
use App\Helpers\showCategoriesHelper;
use App\Helpers\websiteInformationHelper;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            $view->with([
                'cart' => new cartHelper(),
                'alert' => new alertHelper(),
                'menuAdmin' => new menuAdminHelper(),
                'showCategories' => new showCategoriesHelper(),
            ]);
        });
    }
}
