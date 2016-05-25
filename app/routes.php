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
Route::get('/ourstory', 'HomeController@ourStory');
Route::get('/events', 'HomeController@events');

Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'UsersController@getContact');

Route::resource('posts', 'PostsController');

Route::resource('products', 'ProductsController');
Route::get('/inventory', 'ProductsController@inventory');
Route::post('/inventory', 'ProductsController@updateAll');

Route::get('/ajax/product-list', 'ProductsController@getProducts');

Route::resource('orders', 'OrdersController');
Route::get('/confirm/{id}', 'OrdersController@confirm');
Route::post('/confirm/{id}', 'OrdersController@confirm');
Route::post('/confirm/address/{id}', 'UsersController@updateAddress');

Route::get('/login', 'UsersController@loginpage');
Route::post('/login', 'UsersController@doLogin');
Route::get('/logout', 'UsersController@getLogout');
Route::get('/user/create', 'UsersController@createUser');
Route::post('/user/create', 'UsersController@userStore');
Route::post('/user/{id}', 'UsersController@userUpdate');
// Route::post('/user/{id}', 'UsersController@changePassword');
Route::get('user/{id}/account', 'UsersController@account');
Route::post('user/{id}/account', 'UsersController@changePassword');

Route::get('/user/{id}', 'UsersController@userProfile');
// Route::get('/user/{id}/edit', 'UsersController@edit');
Route::get('/user/{id}/posts', 'PostsController@userPosts');

Route::get('/password/remind', 'RemindersController@getRemind');
Route::post('/password/remind', 'RemindersController@postRemind');

Route::get('/password/reset/{token}', 'RemindersController@getReset');
Route::post('/password/reset', 'RemindersController@postReset');
