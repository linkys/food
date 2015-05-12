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

Route::get('/{item}/{id}', 'IndexController@index')->where(['item' => 'kitchen|type']);

Route::get('/add', function (){
    return View::make('add', ['types' => Type::all(), 'kitchens' => Kitchen::all()]);
});

Route::post('/recipe_add', 'RecipeController@add');

Route::get('/enter', function (){
    return View::make('login');
});

Route::post('/login', 'UserController@login');
Route::any('/logout', 'UserController@logout');
Route::post('/register', 'UserController@register');