@extends('admin._header')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>
        <form method="post" action="{{ isset($post) ? route('post-edit') :  route('post-new') }}">
            @csrf
            <input type="hidden" name="author_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
            @if(isset($post))

                <input type="hidden" name="id" value="{{ $post->id }}">
            @endif

            <div class="form-group mb-2">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title"  name="title" value=" {{ $post->title ?? '' }} " placeholder="Ex: Homem aranha é o novo filme!">
            </div>

            <div class="form-group mb-2">
                <label for="content">Conteúdo da notícia</label>
                <textarea class="form-control" name="content" id="content" rows="10"> {{ $post->content ?? '' }}</textarea>
            </div>

            <div class="form-group mb-2">
                <label for="published">Publicar</label>
                <select class="form-control" id="published" name="published">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>


            <button type="submit" class="btn btn-dark">{{ isset($post) ? 'Editar' :  'Publicar' }}</button>
        </form>

    </main>
@endsection
