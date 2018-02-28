<?php

use Illuminate\Http\Request;

// Auth Specific Routes
Route::post('/register', 'Auth\AuthController@register');
Route::group(['namespace' => 'Auth'], function() {
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
});
