<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/auth/register', 'App\Http\Controllers\UserController@register');
Route::post('/auth/login', 'App\Http\Controllers\UserController@login');
Route::get('/auth/user', 'App\Http\Controllers\UserController@user');
Route::post('/auth/logout', 'App\Http\Controllers\UserController@logout');

Route::get('/auth/user/bets', 'App\Http\Controllers\UserController@bets');
Route::get('/users/rating', 'App\Http\Controllers\UserController@rating');
