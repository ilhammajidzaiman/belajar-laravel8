@extends('administrator.templates.main')
@section('container')
<a class="rounded-pill btn btn-sm btn-secondary text-capitalize mb-3" href="{{ url('/'.$controller.'/create')}}">
    <i class="fa-fw fas fa-plus"></i>
    baru
</a>

<div class="input-group my-5">
    <a class="rounded-pill btn btn-outline-secondary text-capitalize" href="{{ url('/'.$controller.'/create')}}">
        <i class="fa-fw fas fa-plus"></i>
        baru
    </a>
    <input type="text" class="rounded-pill form-control border-secondary mx-3" placeholder="Recipient's username"
        aria-label="Recipient's username" aria-describedby="button-addon2">
    <button class="rounded-pill btn btn-outline-secondary" type="button" id="button-addon2">
        <i class="fa-fw fas fa-search"></i>
        cari
    </button>
</div>

@php
$message =session('message');
$alert =session('alert')
@endphp

@if($message)
<div class="alert alert-{{ $alert }} alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive">
    <table class="table table-striped table-hover table-borderless">
        <thead>
            <tr class="text-capitalize">
                <th scope="col">#</th>
                <th scope="col">artikel</th>
                <th scope="col">&nbsp;</th>
                <th scope="col" width="220">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    <a class="text-dark text-decoration-none" href="{{ url('/'.$controller.'/'.$article->slug) }}">
                        {{ $article->title }}
                    </a>
                </td>
                <td>
                    <div class="text-end">{{ date('D, d-m-Y, H:i:s',strtotime($article->created_at)) }}</div>
                </td>
                <td>
                    <span class="float-end text-capitalize">
                        <a class="badge rounded-pill btn btn-primary"
                            href="{{ url('/'.$controller.'/'.$article->slug) }}">
                            <i class="fa-fw fas fa-eye"></i>
                            lihat
                        </a>
                        <a class="badge rounded-pill btn btn-success"
                            href="{{ url('/'.$controller.'/'.$article->slug.'/edit') }}">
                            <i class="fa-fw fas fa-edit"></i>
                            edit
                        </a>
                        <form action="{{ url('/'.$controller.'/'.$article->slug) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge rounded-pill btn btn-danger"
                                onclick="return confirm('Hapus data: {{ $article->title }} ?');">
                                <i class="fa-fw fas fa-trash"></i>
                                hapus
                            </button>
                        </form>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection