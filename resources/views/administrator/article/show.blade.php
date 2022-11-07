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

@php
$file=$article->file
@endphp
@if($file=='default-img.svg')
@php
$url=url('assets/images/'.$file)
@endphp
@else
@php
$url=asset('storage/'.$file)
@endphp
@endif

<img src="{{ $url }}" alt="{{ $url }}" class="img-fluid mb-4">
<p>{{ $article->truncated }}</p>
<div>{!! $article->content !!}</div>

@endsection