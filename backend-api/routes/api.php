<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::get('/pins', 'PinsController@getPins');
    Route::get('/pins/{id}', 'PinsController@getPin');
    Route::put('/pins/{id}', 'PinsController@update');
    Route::post('/pin', 'PinsController@create');

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', 'AuthController@register');
        Route::post('/login', 'AuthController@login');
        Route::get('/me', 'AuthController@me');
        Route::post('/logout', 'AuthController@logout');
    });
});
