<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');
Route::get('/recipe/add', 'RecipeController@viewAddPage');
Route::get('/recipe/{name}', 'IndexController@index')->where('name', '[A-Za-z]+');
Route::get('/recipe/{id}', 'RecipeController@index')->where('id', '[0-9]+');
Route::post('/add', 'RecipeController@add');
Route::post('/add/validator', 'RecipeController@validator');

Route::get('/enter', function (){
    return View::make('login');
});

Route::post('/register/validator', 'UserController@validator');
Route::post('/login', 'UserController@login');
Route::any('/logout', 'UserController@logout');
Route::post('/register', 'UserController@register');