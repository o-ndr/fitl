<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

// Route::get('welcome', function () {
//    return view('welcome');
// });

Route::get('home', function() {
	return redirect('/');
});

Route::get('/', 'PresentationController@index');

Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');

Route::delete('presentations/{presentation}', 'PresentationController@destroy');
Route::get('presentations/{presentation}/edit', 'PresentationController@edit');
Route::put('presentations/{presentation}', 'PresentationController@update');
Route::post('presentations/store', 'PresentationController@store');
Route::get('presentations/create', 'PresentationController@create');
Route::get('presentations/search', 'PresentationController@search');
Route::get('presentations/{presentation}', 'PresentationController@show');
Route::get('presentations', 'PresentationController@index');

Route::resource('presentation.ratings', 'PresentationRatingsController',
                ['only' => ['store', 'update', 'destroy']]);


// User routes
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');
Route::get('auth/register', 'Auth\AuthController@getregister');
Route::post('auth/register', 'Auth\AuthController@postregister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// User profile
Route::get('profile', 'ProfileController@profile');

// Presentation types
Route::resource('types', 'TypeController',
	['only' => ['show']]);	

// Conference track
Route::resource('tracks', 'TrackController');


// ADMIN ONLY
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], 
function() {

	// accessible via admin/users...
	Route::resource('users', 'UserController');

	Route::resource('types', 'TypeController',
	['except' => ['show']]);



});

    //
});
