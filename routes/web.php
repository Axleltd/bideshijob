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
	Route::get('blog/category/{category}','CategoriesController@show');
	//----create and store
	Route::get('blog/category/create','CategoriesController@create');
	Route::post('blog/category','CategoriesController@store');
	//edit--and--update
	Route::get('blog/category/{category}/edit','CategoriesController@edit');
	Route::put('blog/category/{category}','CategoriesController@update');
	
	Route::get('blog/categories','CategoriesController@index');

	Route::delete('blog/category/{category}','CategoriesController@destroy');
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
            if (\Caffeinated\Shinobi\Facades\Shinobi::is('admin')) {
                return redirect()->to('dashboard');
            } elseif (\Caffeinated\Shinobi\Facades\Shinobi::is('user')) {
                return redirect()->to('user');
            }
        }

        return redirect('/');
	});			

	Route::get('/logout','Auth\LoginController@logout');
	

	Route::resource('faq',FAQController::class);

	Route::resource('message',MessageController::class);
	Route::get('message/read/{id}','MessageController@markSeen');
	Route::get('message/unread/{id}','MessageController@markUnSeen');
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
	//job
	Route::get('profile/job','JobsController@showMyJob');
	

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
});

Route::group(['middleware' => ['web', \App\Http\Middleware\AuthenticateAdmin::class], 'prefix' => 'dashboard', 'before' => 'auth'], function () {
	//admin dashboard and user
	Route::get('/','admin\DashBoardController@index');
	Route::get('/company','admin\CompanyController@index');
	Route::get('/training','admin\TrainingController@index');


	//company active deactive
	Route::get('/company/active/{id}','admin\CompanyController@active');
	Route::get('/company/suspend/{id}','admin\CompanyController@suspend');
	Route::get('company/delete/{id}','admin\CompanyController@destroy');


	//training featured unfeatured
	Route::get('/training/featured/{id}','admin\TrainingController@featured');
	Route::get('/training/unfeatured/{id}','admin\TrainingController@unFeatured');
	Route::get('training/delete/{id}','admin\TrainingController@destroy');	
});