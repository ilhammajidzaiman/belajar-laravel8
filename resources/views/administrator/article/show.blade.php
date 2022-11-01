@extends('administrator.templates.main')
@section('container')
<div class="row mb-4">
    <div class="col">
        <a class="rounded-pill btn btn-outline-secondary" href="{{ url('/'.$controller)}}">
            <i class="fa-fw fas fa-arrow-left"></i>
            kembali
        </a>
    </div>
</div>

<h3>{{ $article->title }}</h3>
<p>{{ $article->created_at }}</p>
<img src="{{ asset('storage/'.$article->file) }}" alt="{{ asset('storage/'.$article->file) }}" class="img-fluid">
<p>{{ $article->truncated }}</p>
<div>{!! $article->content !!}</div>

@endsection