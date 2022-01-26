@extends('admin._header')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Posts</h1>
                <p><a href="{{ route('post-create') }}">Criar novo post</a></p>
            </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Contéudo</th>
            <th scope="col">Autor</th>
            <th scope="col">Publicado</th>
            <th scope="col">Ação</th>

        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ \Illuminate\Support\Str::limit($post->title, 20) }}</td>
            <td>{{ \Illuminate\Support\Str::limit($post->content, 20) }}</td>
            <td>{{ $post->author->name }}</td>
            <td>{{ $post->published }}</td>
            <td><a href="{{ url("admin/post/{$post->id}/edit") }}" class="btn btn-warning">Editar</a>
                <a href="{{ url("admin/post/{$post->id}/del") }}" class="btn btn-danger">Apagar</a>
            </td>
        </tr>
         @endforeach

        </tbody>
    </table>

        </main>
@endsection
