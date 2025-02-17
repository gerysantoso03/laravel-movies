<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieDetailViewModel extends ViewModel
{
    // Make public movie
    public $movie;

    // Passing the movie data from movieController 
    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    // Public function to show movie detail
    public function movie(){
        return collect($this->movie)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->movie['poster_path'],
            'vote_average' => $this->movie['vote_average'] * 10 .'%',
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->take(2),
            'images' => collect($this->movie['images']['backdrops'])->take(9),
        ])->only([
            'poster_path', 'id', 'genres', 'title', 'vote_average', 'overview','videos', 'images', 
            'crew', 'cast', 'images', 'release_date', 'credits',
        ]);
    }
}
