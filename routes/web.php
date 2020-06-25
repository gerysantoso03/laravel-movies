<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'moviesController@index')->name('movies.index');
Route::get('/movies/{movie}', 'moviesController@show')->name('movies.show');
