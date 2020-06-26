<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     /** @test */
     public function index_page_shows_the_correct_info()
     {
         Http::fake([
             'https://api.themoviedb.org/3/movie/popular' => $this->fakePopularMovies(),
             'https://api.themoviedb.org/3/movie/now_playing' => $this->fakeNowPlayingMovies(),
             'https://api.themoviedb.org/3/genre/movie/list' => $this->fakeGenres(),
         ]);
 
         $response = $this->get(route('movies.index'));
 
         $response->assertSuccessful();
         $response->assertSee('Popular Movies');
         $response->assertSee('Ucup Kusnandar');
         $response->assertSee('Adventure, Drama, Mystery, Science Fiction, Thriller');
         $response->assertSee('Now Playing');
         $response->assertSee('Now Playing Ucup Kusnandar');
     }
 
     /** @test */
     public function movie_page_shows_the_correct_info()
     {
         Http::fake([
             'https://api.themoviedb.org/3/movie/*' => $this->fakeSingleMovie(),
         ]);
 
         $response = $this->get(route('movies.show', 55555));
         $response->assertSee('Fake Dadang');
         $response->assertSee('Dadang Solihin');
         $response->assertSee('Casting Director');
         $response->assertSee('Adi Petualang');
     }

    // Fake popular movies data to testing the api
    private function fakePopularMovies()
    {
        return Http::response([
                'results' => [
                    [
                        "popularity" => 999.999,
                        "vote_count" => 2607,
                        "video" => false,
                        "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
                        "id" => 419777,
                        "adult" => false,
                        "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
                        "original_language" => "id",
                        "original_title" => "Ucup Kusnandar",
                        "genre_ids" => [
                            12,
                            18,
                            9648,
                            878,
                            53,
                        ],
                        "title" => "Ucup Kusnandar",
                        "vote_average" => 9,
                        "overview" => "Seorang bapak yang senang bermain facebook dan menggoda gadis-gadis muda yang kesepian karena ditinggal mantan tercintanya",
                        "release_date" => "2021-01-01",
                    ]
                ]
            ], 200);
    }

    // Fake now playing movies data to testing the api
    private function fakeNowPlayingMovies()
    {
        return Http::response([
            'results' => [
                [
                    "popularity" => 999.999,
                    "vote_count" => 2607,
                    "video" => false,
                    "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
                    "id" => 419777,
                    "adult" => false,
                    "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
                    "original_language" => "id",
                    "original_title" => "Now Playing Ucup Kusnandar",
                    "genre_ids" => [
                        12,
                        18,
                        9648,
                        878,
                        53,
                    ],
                    "title" => "Now Playing Ucup Kusnandar",
                    "vote_average" => 9,
                    "overview" => "Seorang bapak yang senang bermain facebook dan menggoda gadis-gadis muda yang kesepian karena ditinggal mantan tercintanya",
                    "release_date" => "2021-01-01",
                ]
            ]
        ], 200);
    }

    // Fake genres data ti testing the api
    public function fakeGenres()
    {
        return Http::response([
                'genres' => [
                    [
                      "id" => 28,
                      "name" => "Action"
                    ],
                    [
                      "id" => 12,
                      "name" => "Adventure"
                    ],
                    [
                      "id" => 16,
                      "name" => "Animation"
                    ],
                    [
                      "id" => 35,
                      "name" => "Comedy"
                    ],
                    [
                      "id" => 80,
                      "name" => "Crime"
                    ],
                    [
                      "id" => 99,
                      "name" => "Documentary"
                    ],
                    [
                      "id" => 18,
                      "name" => "Drama"
                    ],
                    [
                      "id" => 10751,
                      "name" => "Family"
                    ],
                    [
                      "id" => 14,
                      "name" => "Fantasy"
                    ],
                    [
                      "id" => 36,
                      "name" => "History"
                    ],
                    [
                      "id" => 27,
                      "name" => "Horror"
                    ],
                    [
                      "id" => 10402,
                      "name" => "Music"
                    ],
                    [
                      "id" => 9648,
                      "name" => "Mystery"
                    ],
                    [
                      "id" => 10749,
                      "name" => "Romance"
                    ],
                    [
                      "id" => 878,
                      "name" => "Science Fiction"
                    ],
                    [
                      "id" => 10770,
                      "name" => "TV Movie"
                    ],
                    [
                      "id" => 53,
                      "name" => "Thriller"
                    ],
                    [
                      "id" => 10752,
                      "name" => "War"
                    ],
                    [
                      "id" => 37,
                      "name" => "Western"
                    ],
                ]
            ], 200);
    }

    // Fake single movie data to testing the api
    public function fakeSingleMovie(){
        return Http::response([
            "adult" => false,
                "backdrop_path" => "/hreiLoPysWG79TsyQgMzFKaOTF5.jpg",
                "genres" => [
                    ["id" => 28, "name" => "Action"],
                    ["id" => 12, "name" => "Adventure"],
                    ["id" => 35, "name" => "Comedy"],
                    ["id" => 14, "name" => "Fantasy"],
                ],
                "homepage" => "http://jumanjimovie.com",
                "id" => 55555,
                "overview" => "As the gang return to Jumanji to rescue one of their own, they discover that nothing is as they expect. The players will have to brave parts unknown and unexplored.",
                "poster_path" => "/bB42KDdfWkOvmzmYkmK58ZlCa9P.jpg",
                "release_date" => "2019-12-04",
                "runtime" => 123,
                "title" => "Fake Dadang",
                "vote_average" => 6.8,
                "credits" => [
                    "cast" => [
                        [
                            "cast_id" => 2,
                            "character" => "Dr. Smolder Bravestone",
                            "credit_id" => "5aac3960c3a36846ea005147",
                            "gender" => 2,
                            "id" => 18918,
                            "name" => "Adi Petualang",
                            "order" => 0,
                            "profile_path" => "/kuqFzlYMc2IrsOyPznMd1FroeGq.jpg",
                        ]
                    ],
                    "crew" => [
                        [
                            "credit_id" => "5d51d4ff18b75100174608d8",
                            "department" => "Production",
                            "gender" => 1,
                            "id" => 546,
                            "job" => "Casting Director",
                            "name" => "Dadang Solihin",
                            "profile_path" => null,
                        ]
                    ]
                ],
                "videos" => [
                    "results" => [
                        [
                            "id" => "5d1a1a9b30aa3163c6c5fe57",
                            "iso_639_1" => "en",
                            "iso_3166_1" => "US",
                            "key" => "rBxcF-r9Ibs",
                            "name" => "JUMANJI: THE NEXT LEVEL - Official Trailer (HD)",
                            "site" => "YouTube",
                            "size" => 1080,
                            "type" => "Trailer",
                        ]
                    ]
                ],
                "images" => [
                    "backdrops" => [
                        [
                            "aspect_ratio" => 1.7777777777778,
                            "file_path" => "/hreiLoPysWG79TsyQgMzFKaOTF5.jpg",
                            "height" => 2160,
                            "iso_639_1" => null,
                            "vote_average" => 5.388,
                            "vote_count" => 4,
                            "width" => 3840,
                        ]
                    ],
                    "posters" => [
                        [

                        ]
                    ]
                ]
        ], 200);
    }
}
