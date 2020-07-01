<?php

use Illuminate\Support\Facades\Route;

// Movies controller
Route::get('/', 'moviesController@index')->name('movies.index');
Route::get('/movies/{movie}', 'moviesController@show')->name('movies.show');

// Actors controller
Route::get('/actors', 'actorsController@index')->name('actors.index');
Route::get('/actors/page/{page?}', 'actorsController@index');

Route::get('/actors/{actor}', 'actorsController@show')->name('actors.show');