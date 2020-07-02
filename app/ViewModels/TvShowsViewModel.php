<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowsViewModel extends ViewModel
{
    // Make public popolarTvShows, topRatedTvShows, and genres
    public $popularTvShows;
    public $topRatedTvShows;
    public $genres;

    // Passing popularTvShows, topRatedTvShows, and genres
    public function __construct($popularTvShows, $topRatedTvShows, $genres)
    {
        $this->popularTvShows = $popularTvShows;
        $this->topRatedTvShows = $topRatedTvShows;
        $this->genres = $genres;
    }

    // Public function to show popular tv shows
    public function popularTvShows(){
       return $this->reformating_tvshows_data($this->popularTvShows);
    }

    // Public function to show top rated tv shows
    public function topRatedTvShows(){
       return $this->reformating_tvshows_data($this->topRatedTvShows);
    }

    // Public function to genres of tv shows
    public function genres(){
        return collect($this->genres)->mapWithKeys(function($genre){
            return [$genre['id'] => $genre['name']]; // Result store in array
        });
    }

    private function reformating_tvshows_data($tvshows){

        // return collect($tvshows)->map(function($tvshow){
        //     return $tvshow;
        // })->dump();
        return collect($tvshows)->map(function($tvshow){

            $formatedGenres = collect($tvshow['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            
            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] * 10 .'%',
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
                'genres' => $formatedGenres,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'vote_average', 'first_air_date', 'name', 'overview', 'genres'
            ]);
        });
    }
}
