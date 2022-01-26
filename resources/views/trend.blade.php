@extends('_header')

@section('content')
<main class="container">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue lendo...</a></p>
        </div>
    </div>

    <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Filmes mais vistos do dia!
    </h3>
    <div class="row mb-2">
        @for($i=0;$i<4;$i++)
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">World</strong>
                    <h3 class="mb-0">{{$movies[$i]->title}}</h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">{{ Illuminate\Support\Str::limit($movies[$i]->overview, 200) }}</p>
                    <a href="#" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $movies[$i]->poster_path }}" alt="{{ $movies[$i]->title }}">
                </div>
            </div>
        </div>
        @endfor
    </div>
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
               Últimas Notícias
            </h3>

            @foreach($posts as $post)
            <article class="blog-post">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
                <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">{{ $post->author->name }}</a></p>

                {{ Illuminate\Support\Str::limit($post->content, 500) }}

                <a href="{{ url("/post/{$post->slug}") }}" class="stretched-link">Continue lendo</a>
</article>
@endforeach

<nav class="blog-pagination" aria-label="Pagination">
<a class="btn btn-outline-primary" href="#">Older</a>
<a class="btn btn-outline-secondary disabled">Newer</a>
</nav>

</div>

<div class="col-md-4">
<div class="position-sticky" style="top: 2rem;">
<div class="p-4 mb-3 bg-light rounded">
    <h4 class="fst-italic">About</h4>
    <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
</div>

<div class="p-4">
    <h4 class="fst-italic">Archives</h4>
    <ol class="list-unstyled mb-0">
        <li><a href="#">March 2021</a></li>
        <li><a href="#">February 2021</a></li>
        <li><a href="#">January 2021</a></li>
        <li><a href="#">December 2020</a></li>
        <li><a href="#">November 2020</a></li>
        <li><a href="#">October 2020</a></li>
        <li><a href="#">September 2020</a></li>
        <li><a href="#">August 2020</a></li>
        <li><a href="#">July 2020</a></li>
        <li><a href="#">June 2020</a></li>
        <li><a href="#">May 2020</a></li>
        <li><a href="#">April 2020</a></li>
    </ol>
</div>

<div class="p-4">
    <h4 class="fst-italic">Elsewhere</h4>
    <ol class="list-unstyled">
        <li><a href="#">GitHub</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Facebook</a></li>
    </ol>
</div>
</div>
</div>
</div>

</main>
@endsection
