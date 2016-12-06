<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Company;
use App\Category;
use App\Profile;
use App\Message;
use App\Application;
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
                $view->with(['allNotifications'=> \Illuminate\Notifications\DatabaseNotification::where('data','LIKE','%admin%')->get(),
                                        'adminCountUnRead' => count(\Illuminate\Notifications\DatabaseNotification::where('data','LIKE','%admin%')->where('read_at',Null)->get())]);
                $view->with(['user_subscription'=>Application::orderBy('created_at','DESC')->get(),
                                'countUserSubscription'=>count(Application::all())]);
                return $view->with(['notifications'=> Auth::user()->notifications,
                                    'countUserUnRead'=>count(Auth::user()->notifications->where('read_at',null)->where('data','LIKE','%user%'))]);
            }
             return $view->with(['notifications'=> Auth::user()->notifications,'countUserUnRead'=>count(\Illuminate\Notifications\DatabaseNotification::where('data','LIKE','%user%')->where('read_at',Null)->get())]);

        });

        view()->composer('layouts.dashboard',function(View $view){
            if(Shinobi::isRole('admin')){
                return $view->with(['messages'=>Message::all(),'messageCount'=>count(Message::all())]);
            }
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
