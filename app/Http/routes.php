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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/', 'TutorialsController@welcome');

    /**
     * Auth routes
     *
     * redirect to social auth login using socialite
     * Handle social auth provider feedback data
     */
    Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

    // Profile
    Route::get('profile/settings', [
        'middleware' => 'auth',
        'uses'       => 'ProfileController@edit',
    ]);
    Route::post('profile/settings', [
        'middleware' => 'auth',
        'uses'       => 'ProfileController@update',
    ]);
    Route::post('profile/updatePic', [
        'middleware' => 'auth',
        'uses'       => 'ProfileController@updatePic',
    ]);
    Route::get('profile/tutorials', [
        'middleware' => 'auth',
        'uses'       => 'ProfileController@myTutorials',
    ]);

    //Tutorials
    Route::resource('tutorials', 'TutorialsController');
    Route::post('tutorials/comment', 'TutorialsController@comment');
    Route::get('category/{category_id}', 'TutorialsController@getByCategory');

    //likes
    Route::post("/tutorials/{id}/like", "TutorialsController@like");
});
