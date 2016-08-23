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
*/Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', 'PresentationController@index');

        
    });


/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

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

# For core object type, we define routes one by one
Route::delete('presentations/{presentation}', 'PresentationController@destroy');
Route::get('presentations/{presentation}/edit', 'PresentationController@edit');
Route::put('presentations/{presentation}', 'PresentationController@update');
Route::post('presentations/store', 'PresentationController@store');
Route::get('presentations/create', 'PresentationController@create');
Route::get('presentations/search', 'PresentationController@search');
Route::get('presentations/{presentation}', 'PresentationController@show');
Route::get('presentations', 'PresentationController@index');


# Resource route - a single route definition in Laravel that defines
# all of the CRUD routes for a resource at once

# Btw each of the objetc types is referred to as a "resource",
# so adding a resource route is just adding a single route entry
# that establishes all of the routes for the resource
Route::resource('presentation.ratings', 'PresentationRatingsController',
                ['only' => ['store', 'update', 'destroy']]);

Route::resource('presentation.comments', 'PresentationCommentController',
                ['only' => ['store', 'update', 'destroy']]);


// chnagelocale route
// Source of this router code: 
//  http://www.glutendesign.com/posts/detect-and-change-language-on-the-fly-with-laravel
Route::post('changelocale', ['as' => 'changelocale', 'uses' => 'TranslationController@changeLocale']);


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

// Presentation tracks
Route::resource('tracks', 'TrackController',
	['only' => ['show']]);

// ADMIN ONLY
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], 
function() {

	// accessible via admin/users...
	Route::resource('users', 'UserController');

	Route::resource('types', 'TypeController',
	['except' => ['show']]);

	Route::resource('tracks', 'TrackController',
	['except' => ['show']]);


});

    //
});
