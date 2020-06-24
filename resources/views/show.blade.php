@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="/img/parasite.jpg" alt="parasite" class="w-64 md:w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl uppercase text-white tracking-wider font-semibold">Parasite (2019)</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <path
                                d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                data-name="star" />
                        </g>
                    </svg>
                    <span class="ml-1">85%</span>
                    <span class="mx-2">|</span>
                    <span>Feb 20, 2020</span>
                    <span class="mx-2">|</span>
                    <span>Action, Thriller, Comedy</span>
                </div>

                <p class="text-gray-500 mt-8">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                    Inventore, suscipit cumque consequatur recusandae eos necessitatibus. 
                    Modi illum explicabo similique perspiciatis natus ex expedita! Impedit 
                    itaque sapiente consequatur modi alias laboriosam? Lorem ipsum dolor sit 
                    amet consectetur adipisicing elit. Expedita excepturi,autem tempora libero 
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Bong Joon-ho</div>
                            <div class="text-sm text-gray-400">Screenplay, Director, Story</div>
                        </div>
                        <div class="ml-8">
                            <div>Han Jin-won</div>
                            <div class="text-sm text-gray-400">Scrennplay</div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <button class="flex bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div> <!-- End of container -->
    </div> <!-- End of movie info -->

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl text-white uppercase tracking-wider font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="/img/actor1.jpg" alt="actor1"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
                        <div class="text-gray-400 text-sm">
                            Song Kang-ho
                        </div>
                    </div>
                </div> <!-- End of cast 1 -->

                <div class="mt-8">
                    <a href="#">
                        <img src="/img/actor2.jpg" alt="actor2"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
                        <div class="text-gray-400 text-sm">
                            Lee Sun-kyun
                        </div>
                    </div>
                </div> <!-- End of cast 2 -->

                <div class="mt-8">
                    <a href="#">
                        <img src="/img/actor3.jpg" alt="actor3"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
                        <div class="text-gray-400 text-sm">
                            Cho Yeo-jeong
                        </div>
                    </div>
                </div> <!-- End of cast 3 -->

                <div class="mt-8">
                    <a href="#">
                        <img src="/img/actor4.jpg" alt="actor1"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
                        <div class="text-gray-400 text-sm">
                            Choi Woo-shik
                        </div>
                    </div>
                </div> <!-- End of cast 4 -->

                <div class="mt-8">
                    <a href="#">
                        <img src="/img/actor5.jpg" alt="actor5"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Real Name</a>
                        <div class="text-gray-400 text-sm">
                            Park So-dam
                        </div>
                    </div>
                </div> <!-- End of cast 5 -->
            </div> <!-- End of grid -->
        </div> <!-- End of cantainer -->
    </div> <!-- End of movie cast -->

    <div class="movie-images">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-white font-semibold uppercase tracking-wider text-4xl">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="/img/image1.jpg" alt="image1"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div> <!-- End of image 1 -->

                <div class="mt-8">
                    <a href="#">
                        <img src="/img/image2.jpg" alt="image2"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div> <!-- End of image 2 -->

                <div class="mt-8">
                    <a href="#">
                        <img src="/img/image3.jpg" alt="image3"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div> <!-- End of image 3 -->

                <div class="mt-8">
                    <a href="#">
                        <img src="/img/image4.jpg" alt="image1"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div> <!-- End of image 4 -->

                <div class="mt-8">
                    <a href="#">
                        <img src="/img/image5.jpg" alt="image5"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div> <!-- End of image 5 -->

                 <div class="mt-8">
                    <a href="#">
                        <img src="/img/image6.jpg" alt="image6"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div> <!-- End of image 6 -->
            </div> <!-- End of grid -->
        </div> <!-- End of container -->
    </div> <!-- End of movie images -->
@endsection