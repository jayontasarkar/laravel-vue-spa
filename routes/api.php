<?php

use Illuminate\Http\Request;

// Auth Specific Routes
Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');
Route::group(['namespace' => 'Auth'], function() {
    Route::post('/logout', 'AuthController@logout');
});
