<?php

use Illuminate\Http\Request;

// Auth Specific Routes
Route::group(['namespace' => 'Auth'], function() {
	Route::post('/login', 'AuthController@login');
	Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');
});

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('/me', 'Auth\AuthController@user');
});


