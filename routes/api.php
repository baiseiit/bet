<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/auth/register', 'App\Http\Controllers\UserController@register');
Route::post('/auth/login', 'App\Http\Controllers\UserController@login');
Route::post('/auth/logout', 'App\Http\Controllers\UserController@logout')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);

Route::get('/user', 'App\Http\Controllers\UserController@user')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);
Route::get('/user/bets', 'App\Http\Controllers\BetController@fetchByUser')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);
Route::post('/user/box', 'App\Http\Controllers\UserController@openBox')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);

Route::get('/bets/rating', 'App\Http\Controllers\BetController@userRating');
