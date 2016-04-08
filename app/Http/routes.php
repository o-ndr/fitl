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

Route::resource('types', 'TypeController');	

// User routes
Route::get('auth/register', 'Auth\AuthController@getregister');
Route::post('auth/register', 'Auth\AuthController@postregister');


    //
});
