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

Route::get('/', function () {
    return view('index');
});

Route::get('/recipe/show', 'RecipeController@getIndex');
Route::get('/recipe/show/{recipe_id?}', 'RecipeController@getShow');
Route::get('/recipe/create', 'RecipeController@getCreate');
Route::post('/recipe/create', 'RecipeController@postCreate');
Route::get('/recipe/edit/{recipe_id?}', 'RecipeController@getEdit');
Route::post('/recipe/edit/{recipe_id?}', 'RecipeController@postEdit');
//::get('/recipe/delete/{recipe_id?}', 'RecipeController@getDelete');

Route::get('/practice', function() {
  echo 'Hello World';
});
