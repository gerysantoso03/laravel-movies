<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowDetailViewModel extends ViewModel
{
    // Make public tvshow
    public $tvshow;

    // Passing the movie data from tvshowController 
    public function __construct($tvshow)
    {
        $this->tvshow = $tvshow;
    }

    // Public function to show movie detail
    public function tvshow(){
        return collect($this->tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$this->tvshow['poster_path'],
            'vote_average' => $this->tvshow['vote_average'] * 10 .'%',
            'first_air_date' => Carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
            'genres' => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->tvshow['credits']['crew'])->take(2),
            'images' => collect($this->tvshow['images']['backdrops'])->take(9),
        ])->only([
            'poster_path', 'id', 'genres', 'name', 'vote_average', 'overview','videos', 'images', 
            'crew', 'cast', 'images', 'first_air_date', 'credits', 'created_by',
        ])->dump();
    }
}
