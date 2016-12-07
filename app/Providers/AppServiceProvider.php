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
use Illuminate\Database\Eloquent\Relations\Relation;
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
                                'countUserUnReadSubscription'=>count(Application::where('read_at',null)->get())]);
                return $view->with(['notifications'=> Auth::user()->notifications,
                                    'countUserUnRead'=>count(\Illuminate\Notifications\DatabaseNotification::where('data','LIKE','%user%')->where(['read_at'=>null,'notifiable_id'=>Auth::user()->id])->get())]);
            }
             return $view->with(['notifications'=> Auth::user()->notifications,'countUserUnRead'=>count(\Illuminate\Notifications\DatabaseNotification::where('data','LIKE','%user%')->where(['read_at'=>null,'notifiable_id'=>Auth::user()->id])->get())]);

        });

        view()->composer('layouts.dashboard',function(View $view){
            if(Shinobi::isRole('admin')){
                return $view->with(['messages'=>Message::orderBy('created_at','DESC')->get(),'messageCount'=>count(Message::where('seen',0)->get())]);
            }
        });




        Relation::morphMap([
            'User' => App\User::class,
            'Job' => App\Job::class,
            'Training' => App\Training::class,
            'Company' => App\Company::class,
            'Application' => App\Application::class,
        ]);
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
