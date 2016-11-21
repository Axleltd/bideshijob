<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Company;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         view()->composer('job._form',function(View $view){
            $view->with('activeCompanies', Company::get());
        });
        view()->composer('job._form',function(View $view){
            $view->with('activeFeatured', Company::get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
