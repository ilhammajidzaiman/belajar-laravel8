@extends('administrator.templates.main')
@section('container')
<a class="rounded-pill btn btn-sm btn-secondary text-capitalize mb-3" href="{{ url('/'.$controller)}}">
    <i class="fa-fw fas fa-arrow-left"></i>
    kembali
</a>
<p>{{ $article->created_at }}</p>
<h3>{{ $article->title }}</h3>
<img src="{{ asset('storage/'.$article->file) }}" alt="{{ asset('storage/'.$article->file) }}" class="img-fluid">
<p>{{ $article->truncated }}</p>
<div>{!! $article->content !!}</div>

@endsection