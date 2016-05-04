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

Route::get('/', 'HomeController@homePage');

Route::resource('posts', 'PostsController');

Route::resource('products', 'ProductsController');

Route::get('/login', 'UsersController@loginpage');
Route::post('/login', 'UsersController@doLogin');
Route::get('/logout', 'UsersController@getLogout');

Route::get('/user/{id}', 'UsersController@userShow');
Route::get('/user/{id}/edit', 'UsersController@edit');
Route::get('/user/{id}/posts', 'PostsController@userPosts');

Route::resource('orders', 'OrdersController');

Route::get('/ourstory', 'HomeController@ourStory');

Route::get('/events', 'HomeController@events');



Route::get('orders.index', function()
{
    return View::make('orders.index');
});

Route::get('/test/{id}', 'OrdersController@confirm');
