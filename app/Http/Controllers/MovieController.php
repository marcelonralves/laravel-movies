<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function home()
    {

        Post::factory()->count(10)->create();

        $movies = file_get_contents('https://api.themoviedb.org/3/trending/movie/day?api_key='.env('API_KEY_MOVIE'));
        $response = json_decode($movies);

        return view('trend', [
            'movies' => $response->results
        ]);
    }
}
