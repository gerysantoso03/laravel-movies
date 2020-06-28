@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="poster" class="w-64 md:w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl uppercase text-white tracking-wider font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <path
                                d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                data-name="star" />
                        </g>
                    </svg>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 .'%'}}</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if(!$loop->last), @endif
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-500 mt-8">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach($movie['credits']['crew'] as $crew)
                            @if($loop-> index < 2)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div x-data="{isOpen: false}">
                    @if(count($movie['videos']['results']) > 0)
                        <div class="mt-12">
                            <button 
                                @click="isOpen = true" 
                                class="flex inline-flex bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                    @endif

                    <div 
                        style="background-color:rgba(0,0,0,.5);" 
                        class="fixed top-0 right-0 w-full h-full flex items-center overflow-y-auto shadow-lg"
                        x-show.transition.in.duration.200ms.transition.out.duration.100ms="isOpen"
                    >
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end px-4 py-2 mr-4">
                                    <button 
                                        class="text-3xl leading-none hover:text-gray-300" 
                                        @keydown.escape.window="isOpen = false"
                                        @click="isOpen = false">&times
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%;">
                                        <iframe 
                                            width="560" height="350" class="responsive-iframe top-0 left-0 w-full h-full absolute"
                                            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" 
                                            allowfullscreen
                                        >
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End of modal --> 
                </div>

            </div>
        </div> <!-- End of container -->
    </div> <!-- End of movie info -->

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl text-white uppercase tracking-wider font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($movie['credits']['cast'] as $cast)
                    @if($loop-> index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}" alt="actor"
                                    class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                                <div class="text-gray-400 text-sm">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div> <!-- End of cast 1 -->
                    @endif
                @endforeach
            </div> <!-- End of grid -->
        </div> <!-- End of cantainer -->
    </div> <!-- End of movie cast -->

    <div class="movie-images"  x-data="{isOpen:false, image:''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-white font-semibold uppercase tracking-wider text-4xl">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($movie['images']['backdrops'] as $image)
                    @if($loop->index < 9)
                        <div class="mt-8">
                            <a href="#" @click.prevent="isOpen = true, image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image"
                                    class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div> <!-- End of image 1 -->
                    @endif
                @endforeach
            </div> <!-- End of grid -->
            <div 
                style="background-color:rgba(0,0,0,.5);" 
                class="fixed top-0 right-0 w-full h-full flex items-center overflow-y-auto shadow-lg"
                x-show.transition.in.duration.200ms.transition.out.duration.100ms="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end px-4 py-2 mr-4">
                            <button 
                                class="text-3xl leading-none hover:text-gray-300" 
                                @keydown.escape.window="isOpen = false"
                                @click="isOpen = false" >&times
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div> <!-- End of modal --> 
        </div> <!-- End of container -->
    </div> <!-- End of movie images -->
@endsection