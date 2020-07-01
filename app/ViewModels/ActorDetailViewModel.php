<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorDetailViewModel extends ViewModel
{   
    // Make public actor
    public $actor;
    public $actorSocialMedia;
    public $credits;

    // Passing actor
    public function __construct($actor, $actorSocialMedia, $credits)
    {
        $this->actor = $actor;
        $this->actorSocialMedia = $actorSocialMedia;
        $this->credits = $credits;
    }

    // Public function to show actor detail
    public function actor()
    {
        return collect($this->actor)->merge([
            'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age,
            'profile_path' => $this->actor['profile_path']
                ? 'https://image.tmdb.org/t/p/w300/'.$this->actor['profile_path']
                : 'https://via.placeholder.com/300x450',
        ]);
    }

    // Public function for showing actor social 
    public function actorSocialMedia()
    {
        return collect($this->actorSocialMedia)->merge([
            'twitter' => $this->actorSocialMedia['twitter_id']
                ? 'https://twitter.com/'.$this->actorSocialMedia['twitter_id']
                : null,
            'facebook' => $this->actorSocialMedia['facebook_id']
                ? 'https://facebook.com/'.$this->actorSocialMedia['facebook_id']
                : null,
            'instagram' => $this->actorSocialMedia['instagram_id']
                ? 'https://instagram.com/'.$this->actorSocialMedia['instagram_id']
                : null,
        ])->only([
            'twitter', 'facebook', 'instagram',
        ]);
    }

    // Public function for showing actors movie
    public function knownFor()
    {
        $movieCast = collect($this->credits)->get('cast');

        return collect($movieCast)->where('media_type', 'movie')->union(
            collect($movieCast)->where('media_type', 'tv')
        )->sortByDesc('popularity')->take(5)
            ->map(function($movie) {
                return collect($movie)->merge([
                    'poster_path' => $movie['poster_path']
                        ? 'https://image.tmdb.org/t/p/w185'.$movie['poster_path']
                        : 'https://via.placeholder.com/185x278',
                    'title' => isset($movie['title']) 
                        ? $movie['title'] 
                        : 'TV Show',
                ])->only([
                    'poster_path', 'title', 'id', 'media_type'
                ]);
            });
    }

    // Public function to show actor credits
    public function credits()
    {
        $movieCast = collect($this->credits)->get('cast');

        return collect($movieCast)->map(function($movie){

            // Check if movie has release date or tv show has first air date
            if(isset($movie['release_date'])){
                $releaseDate = $movie['release_date'];
            }else if(isset($movie['first_air_date'])){
                $releaseDate = $movie['first_air_date'];
            }else{
                $releaseDate = '';
            }

            // Check if movie has title and tv show has name 
            if(isset($movie['title'])){
                $title = $movie['title'];
            }else if($movie['name']){
                $title = $movie['name'];
            }else{
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'release_date' => $releaseDate,
                'release_year' => isset($releaseDate)
                    ? Carbon::parse($releaseDate)->format('Y')
                    : 'Future',
                'title' => $title,
                'character' => isset($movie['character'])
                    ? $movie['character']
                    : 'Unknown',
            ])->only([
                'release_date', 'release_year', 'title', 'character',
            ]);
        })->sortBy('release_date');
    }
}
