<?php
use Smarch\Watchtower\Controllers\RoleController;
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
	Route::resource('/',HomeController::class);

	Route::get('/aboutus','HomeController@aboutUs');
	Route::get('/contactus','HomeController@contactUs');
	Route::get('/faq','FAQController@index');	
	Route::post('/search/company','SearchController@companySearch');	
	Route::get('training','HomeController@training');
	Route::post('/search/training','SearchController@trainingSearch');


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

	Route::resource('company',Company\CompanyController::class);
	Route::resource('company/{id}/job',JobsController::class);
	Route::resource('company/{id}/job/{slug}/contact',Jobs\ContactController::class);
	Route::resource('company/{id}/training',TrainingController::class);

});

Route::group(['middleware' => ['web', \App\Http\Middleware\AuthenticateAdmin::class], 'prefix' => 'dashboard', 'before' => 'auth'], function () {

	Route::get('/','admin\DashBoardController@index');
	Route::get('/company','admin\CompanyController@index');
	Route::get('/training','admin\TrainingController@index');

	Route::get('/company/active/{id}','admin\CompanyController@active');
	Route::get('/company/suspend/{id}','admin\CompanyController@suspend');
	Route::get('company/delete/{id}','admin\CompanyController@destroy');

	Route::resource('/role',RoleController::class);
});
