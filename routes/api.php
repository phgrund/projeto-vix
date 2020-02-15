<?php

use Illuminate\Http\Request;

Route::post('/users', 'UserController@store');
Route::group([
    'middleware' => ['auth:api']
], function() {
    Route::get('/users', 'UserController@index');
    Route::get('/users/{id}', 'UserController@show');
    Route::patch('/users/{id}', 'UserController@update');
    Route::delete('/users/{id}', 'UserController@destroy');
});

/*
 * Apenas um outro jeito de representar, achei interessante colocar

Route::group([
    'prefix' => 'users'
], function() {
    Route::post('/', 'UserController@store');
    
    Route::group([
        'middleware' => ['auth:api']
    ], function () {
        Route::get('/', 'UserController@index');
        Route::get('/{id}', 'UserController@show');
        Route::patch('/{id}', 'UserController@update');
        Route::delete('/{id}', 'UserController@destroy');
    });
});

*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('me', 'AuthController@me');
});
