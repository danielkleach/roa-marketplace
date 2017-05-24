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

Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
});

Route::prefix('profiles')->group(function () {
    Route::post('/', 'ProfileController@store');
    Route::patch('/{id}', 'ProfileController@update');
});
