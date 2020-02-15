<?php

use Illuminate\Http\Request;

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

Route::post('/users', 'UserController@store');

Route::group([
    'middleware' => ['auth:api']
], function() {
    
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('me', 'AuthController@me');
});
