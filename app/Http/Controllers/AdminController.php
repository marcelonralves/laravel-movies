<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function getPosts()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.posts', compact('posts'));
    }

    public function newPost()
    {
        return view('admin.post-form');
    }

    public function postNewPost(Request $request)
    {
        $this->validate($request, [
            'author_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $request->merge(["slug" => Str::slug($request->title)]);

        Post::create($request->only('title', 'content', 'slug' ,'author_id', 'published'));

        return redirect('admin/posts')->with('message', 'Post criado com sucesso!');
    }

    public function editPost(Request $request, int $id)
    {
        $request->merge(["id" => $id]);

        $this->validate($request, [
            'id' => 'required|exists:posts,id'
        ]);

        $post = Post::find($id);

        return view('admin.post-form', compact('post'));
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:posts,id',
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($request->input('id'));

        $post->update($request->only('id', 'title', 'content', 'published'));

        return redirect('admin/posts')->with('message', 'Post atualizado com sucesso!');
    }

    public function delPost(Request $request, int $id)
    {
        $request->merge(["id" => $id]);

        $this->validate($request, [
            'id' => 'required|exists:posts,id'
        ]);

        Post::destroy($request->input('id'));
        return redirect('admin/posts')->with('message', 'Post deletado com sucesso!');
    }

    public function showLogin()
    {
        User::factory()->create();
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('admin/');
        }

        return redirect('admin/login')->with('message', 'Erro ao efetuar login. Verifique os campos e tente novamente!');
    }
}
