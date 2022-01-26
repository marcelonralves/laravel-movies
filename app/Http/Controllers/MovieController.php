<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        $movies = file_get_contents('https://api.themoviedb.org/3/trending/movie/day?api_key='.env('API_KEY_MOVIE'));
        $response = json_decode($movies);

        return view('trend', [
            'movies' => $response->results,
            'posts' => $posts
        ]);
    }

    public function post(Request $request, string $slug)
    {
        $request->merge(["slug" => $slug]);

        $this->validate($request, [
            'slug' => 'required|exists:posts,slug',
        ]);

        $post = Post::where('slug', $slug)->first();

        return view('post', compact('post'));
    }
}
