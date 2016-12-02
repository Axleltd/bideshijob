<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middlewareGroups' => ['web']], function () {
	Auth::routes();
	Route::get('/','HomeController@index');
	
		//------------------------Category----------------------------
	//----create and store
	Route::get('category/create','CategoriesController@create');
	Route::post('category','CategoriesController@store');
	//edit--and--update
	Route::get('category/{category}/edit','CategoriesController@edit');
	Route::put('category/{category}','CategoriesController@update');
	
	Route::get('help-center','CategoriesController@index');

	Route::delete('help-center/{category}','CategoriesController@destroy');
	Route::get('help-center/{category}','CategoriesController@show');
	//----------------End Category

	//----------------Blog-----------------------
	Route::get('blog/create','PostsController@create');
	Route::get('blog/{post}','PostsController@show');
	//----create and store
	Route::post('blog','PostsController@store');
	//edit--and--update
	Route::get('blog/{post}/edit','PostsController@edit');
	Route::put('blog/{post}','PostsController@update');
	
	Route::get('blog','PostsController@index');

	Route::delete('blog/{post}','PostsController@destroy');

	//----------------End Blog-------------------
	Route::get('/aboutus','HomeController@aboutUs');
	Route::get('/contactus','HomeController@contactUs');
	Route::get('/faq','FAQController@index');	
	Route::get('/search/company','SearchController@companySearch');	
	Route::get('training','HomeController@training');
	Route::get('/search/training','SearchController@trainingSearch');
	Route::get('/search/job','SearchController@jobSearch');
	Route::get('/search/post','SearchController@postSearch');
	Route::get('/search/all','SearchController@allSearch');


	Route::get('/check_user',function(){
		if (\Illuminate\Support\Facades\Auth::check()) {
            if (\Caffeinated\Shinobi\Facades\Shinobi::isRole('admin')) {
                return redirect()->to('dashboard');
            } else
                return redirect()->to('profile');            
        }

        return redirect('/');
	});			

	Route::get('/logout','Auth\LoginController@logout');	


	Route::post('message','MessageController@store');

	Route::get('jobs','SiteController@getJobs');
	Route::get('about','SiteController@getAbout');

	Route::resource('company',Company\CompanyController::class);
	Route::get('profile/company','Company\CompanyController@showMyCompany');
	Route::resource('company/{id}/job',JobsController::class);
	Route::resource('company/{id}/job/{slug}/contact',Jobs\ContactController::class);
	Route::resource('company/{id}/training',TrainingController::class);
	Route::get('/contact','MessageController@create');
	Route::post('/contact','MessageController@store');

	//profile
	Route::get('/profile','admin\UserController@index');
	//user dashboard	
	Route::resource('profile/user',ProfileController::class);

	//training
	Route::get('profile/training','TrainingController@showMyTraining');
	Route::get('profile/training/{id}','TrainingController@showMyTraining');
	//job
	Route::get('profile/job','JobsController@showMyJob');

	//apply form
	Route::post('/application','ApplicationController@store');	

	

	Route::get('locale/{name}',function($name){
		$lang = ['en','np'];
		if(in_array($name,$lang)){
			session([
				'locale' => $name
				]);
			return redirect()->back();
		}
		return redirect()->back();
	});

	Route::get('subscribe/verify/{uuid}','SubscriberController@verify');
	Route::post('/subscriber','SubscriberController@store');
});

Route::group(['middleware' => ['web', \App\Http\Middleware\AuthenticateAdmin::class], 'prefix' => 'dashboard', 'before' => 'auth'], function () {
	//admin dashboard and user
	Route::get('/','admin\DashBoardController@index');
	Route::get('/company','admin\CompanyController@index');
	Route::get('/training','admin\TrainingController@index');
	Route::get('/job','admin\JobsController@index');
	Route::get('/subscriptions','admin\SubscriptionsController@index');

	//admin notifications
	Route::get('/all-notification','admin\NotificationViewController@allNotification');
	Route::get('/messages','admin\NotificationViewController@messages');
	Route::get('/user-subscription','admin\NotificationViewController@userSubscription');
	
	//faq 
	Route::resource('/faq',admin\FAQController::class);
	//active suspend faq
	Route::get('/faq/active/{id}','admin\FAQController@active');
	Route::get('/faq/suspend/{id}','admin\FAQController@suspend');	
	//company active deactive
	Route::get('/company/active/{id}','admin\CompanyController@active');
	Route::get('/company/suspend/{id}','admin\CompanyController@suspend');
	Route::delete('company/delete/{id}','admin\CompanyController@destroy');


	//training featured unfeatured
	Route::get('/training/featured/{id}','admin\TrainingController@featured');
	Route::get('/training/unfeatured/{id}','admin\TrainingController@unFeatured');
	Route::delete('/training/delete/{id}','admin\TrainingController@destroy');	

	//jobs featured unfeatured
	Route::get('/job/featured/{id}','admin\JobsController@featured');
	Route::get('/job/unfeatured/{id}','admin\JobsController@unFeatured');
	Route::delete('job/delete/{id}','admin\JobsController@destroy');		


	//Post
	Route::get('/posts','admin\PostsController@index');
	Route::get('/posts/active/{id}','admin\PostsController@active');
	Route::get('/posts/suspend/{id}','admin\PostsController@suspend');
	Route::delete('/posts/delete/{id}','admin\PostsController@destroy');
	Route::get('/posts/suspend/{id}','admin\PostsController@suspend');

	//Category
	Route::get('/category','admin\CategoriesController@index');
	Route::get('/category/active/{id}','admin\CategoriesController@active');
	Route::get('/category/suspend/{id}','admin\CategoriesController@suspend');
	Route::delete('/category/delete/{id}','admin\CategoriesController@destroy');
	Route::get('/category/suspend/{id}','admin\PostsController@suspend');
	
	//Subscribers
	Route::get('/subscriber','SubscriberController@index');
	
	
	//Newsletter
	Route::get('/newsletter','NewsletterController@index');
	Route::post('/newsletter','NewsletterController@store');

	Route::get('/newsletter/{id}','NewsletterController@show');

	Route::get('/newsletter/publish/{id}','NewsletterController@publish');

	Route::delete('/newsletter/delete/{id}','admin\CategoriesController@destroy');
	Route::get('/newsletter/suspend/{id}','admin\PostsController@suspend');

	//about us page
	Route::resource('about',admin\AboutUsController::class);	
	
	//
	Route::resource('message',MessageController::class);
	Route::post('message/read/{id}','MessageController@markSeen');
	Route::post('message/unread/{id}','MessageController@markUnSeen');	


	
});