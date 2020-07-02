@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16">
    <div class="popular-tvshow">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Tv Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach($popularTvShows as $tvshow)
                <x-tvshow :tvshow="$tvshow"/>
            @endforeach
        </div> <!-- End of grid -->
    </div> <!-- End of popular tv show -->

    <div class="top-rated-tvshow py-24">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Tv Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach($topRatedTvShows as $tvshow)
                <x-tvshow :tvshow="$tvshow"/>
            @endforeach
        </div> <!-- End of grid -->
    </div> <!-- End of top rated tv show -->
</div>
@endsection