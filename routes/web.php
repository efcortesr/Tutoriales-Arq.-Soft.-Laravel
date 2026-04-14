<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')
    ->name('home.index');

Route::get('/demons/create', 'App\Http\Controllers\DemonController@create')
    ->name('demon.create');

Route::post('/demons', 'App\Http\Controllers\DemonController@save')
    ->name('demon.save');

Route::get('/demons', 'App\Http\Controllers\DemonController@index')
    ->name('demon.index');

Route::get('/demons/statistics', 'App\Http\Controllers\DemonController@statistics')
    ->name('demon.statistics');
