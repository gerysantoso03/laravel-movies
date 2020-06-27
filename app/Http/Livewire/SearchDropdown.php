<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    // Public property that similiar with state that when we search movies, 
    // livewire will re-rendered the livewire view method
    // The index view will update the movie
    public $search = '';

    public function render()
    {
        $searchResults = [];

        // Search movie must have more than 2 character input
        if(strlen($this->search) >= 2){
            $searchResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
                ->json()['results'];
        }

        // dump($searchResults);

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(10),
        ]);
    }
}
