<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'WelcomeController@getIndex');

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/recipe/show', 'RecipeController@getIndex');
    Route::get('/recipe/show/{id?}', 'RecipeController@getShow');
    Route::get('/recipe/create', 'RecipeController@getCreate');
    Route::post('/recipe/create', 'RecipeController@postCreate');
    Route::get('/recipe/edit/{id?}', 'RecipeController@getEdit');
    Route::post('/recipe/edit', 'RecipeController@postEdit');
    Route::get('/recipe/delete/{id}', 'RecipeController@getDelete');
});


Route::get('/practice', function() {
  echo 'Hello World';
});

Route::get('/confirm-login-worked', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});
