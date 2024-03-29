<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

//Route::resource('users', 'UserController');
Route::resource('profiles', 'ProfileController');
Route::resource('items', 'ItemController');
Route::resource('locations', 'LocationController');
Route::resource('orders', 'OrderController');
