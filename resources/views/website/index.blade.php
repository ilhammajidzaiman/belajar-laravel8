@extends('website.templates.main')
@section('container')

<section class="mt-5 p t-5">
    @foreach($articles as $article)
    <div class="row justify-content-center mb-5">
        <div class="col-md-3">
            <a class="" href="{{ url('/'.$controller.'/'.$article->slug) }}">
                <img src="{{ asset('storage/'.$article->file) }}" alt="{{ asset('storage/'.$article->file) }}"
                    class="img-fluid rounded w-100">
            </a>
        </div>
        <div class="col-md-6">
            <h4 class="text-capitalize">
                <a class="text-decoration-none" href="{{ url('/'.$controller.'/'.$article->slug) }}">
                    {{ $article->title }}
                </a>
            </h4>
            <p><small class="text-secondary">{{ date('D, d-m-Y, H:i:s',strtotime($article->created_at)) }}</small></p>
            <p>{{ $article->truncated }}</p>
            <a class="badge rounded-pill btn btn-primary text-capitalize"
                href="{{ url('/'.$controller.'/'.$article->slug) }}">
                selengkapnya...
            </a>
        </div>
    </div>
    @endforeach
</section>
@endsection