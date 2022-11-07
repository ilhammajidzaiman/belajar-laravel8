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

<h5>kategori: {{ $category->category }}</h5>

@endsection