@extends('website.templates.main')
@section('container')

<div class="row justify-content-center">



    @foreach($articles as $article)
    <div class="col-md-3 mb-3">

        <div class="card border-0 shadow-sm">
            <img src="" alt="" class="card-img">
            <a class="" href="{{ url('/'.$controller.'/'.$article->slug) }}">
                <img src="{{ url('assets/articles/default.svg' )}}" alt="" class="card-img-top">
            </a>
            <div class="card-body">
                <h5>
                    <a class="" href="{{ url('/'.$controller.'/'.$article->slug) }}">
                        {{ $article->title }}
                    </a>
                </h5>
                <p>{{ $article->truncated }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<section class="mt-5 p t-5">
    @foreach($articles as $article)
    <div class="row justify-content-center mb-4">
        <div class="col-md-3">
            <a class="" href="{{ url('/'.$controller.'/'.$article->slug) }}">
                <img src="{{ url('assets/articles/default.svg' )}}" alt="" class="img-fluid rounded">
            </a>
        </div>
        <div class="col-md-6">
            <h5>
                <a class="" href="{{ url('/'.$controller.'/'.$article->slug) }}">
                    {{ $article->title }}
                </a>
            </h5>
            <p>{{ $article->truncated }}</p>
        </div>
    </div>
    @endforeach
</section>
@endsection