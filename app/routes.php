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
Route::get('/', 'HomeController@index');

Route::get('/shop', 'CategoryController@index');

Route::get('/item', 'ItemController@getItem');

// Route::group(array('domain' => 'stores.myapp.com'), function()
// {
//     Route::get('/users', 'UserController@index');
// });
// Route::group(array('domain' => '{account}.myapp.com'), function()
// {
//      Route::get('store/{id}', function($account, $id)
//     {
//         //
//     });
// });

Route::get('/users', 'UserController@index');
// Route::group(array('domain' => '{account}.myapp.com'), function()
// {
//     Route::get('/users', 'UserController@index');
// });
Route::get('/users/{name}', 'UserController@getUser');

Route::get('/admin', 'AdminController@index');

