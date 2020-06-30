<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    // Make public popolarMovies, nowPlayingMovies, and genres
    public $popularMovies;
    public $nowPlayingMovies;
    public $genres;

    // Passing popularMpvies, nowPlayingMovies, and genres
    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }

    // Public function to show popular movies
    public function popularMovies(){
       return $this->reformating_movies_data($this->popularMovies);
    }

    // Public function to show now playing movies
    public function nowPlayingMovies(){
       return $this->reformating_movies_data($this->nowPlayingMovies);
    }

    // Public function to genres of movie
    public function genres(){
        return collect($this->genres)->mapWithKeys(function($genre){
            return [$genre['id'] => $genre['name']]; // Result store in array
        });
    }

    // function for re-formating data of poster_path, vote_average, and release_date with merge
    // To reduce the complexity of writting views 
    private function reformating_movies_data($movies){

        // Make new data merge into popular movies for poster_path, vote_average, release date, and parse genre from id into genre name
        return collect($movies)->map(function($movie){

            $formatedGenres = collect($movie['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            
            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 .'%',
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres' => $formatedGenres,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'vote_average', 'release_date', 'title', 'overview', 'genres'
            ]);
        });
    }
}
