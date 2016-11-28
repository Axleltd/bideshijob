<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Company;
use App\Category;
use App\Profile;
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
            $view->with('activeFeatured', Company::get());
        });
        view()->composer('post._form',function(View $view){
            $view->with('categories', Category::all());
            if(Shinobi::isRole('admin')){     
                return $view->with('categories', Category::all());
            }
            return $view->with('categories', Category::where('slug','=','blog')->first());
        });
        view()->composer('layouts.dashboard',function(View $view){
            $view->with('profile',Profile::where('user_id',Auth::user()->id)->first());
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
