<?php

use Illuminate\Support\Facades\Route;

// Movies controller
Route::get('/', 'moviesController@index')->name('movies.index');
Route::get('/movies/{id}', 'moviesController@show')->name('movies.show');

// Actors controller
Route::get('/actors', 'actorsController@index')->name('actors.index');
Route::get('/actors/page/{page?}', 'actorsController@index');

Route::get('/actors/{id}', 'actorsController@show')->name('actors.show');

// Tv show controller 
Route::get('/tvshow', 'tvshowController@index')->name('tvshow.index');
Route::get('/tvshow/{id}', 'tvshowController@show')->name('tvshow.show');