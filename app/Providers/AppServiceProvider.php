<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Company;
use Auth;
use Shinobi;
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
        view()->composer('layouts.dashboard',function(View $view){
            if(Shinobi::isRole('admin')){     
                $view->with('allNotifications', \Illuminate\Notifications\DatabaseNotification::all());
                return $view->with('notifications', Auth::user()->notifications);
            }
            return $view->with('notifications', Auth::user()->notifications);
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
