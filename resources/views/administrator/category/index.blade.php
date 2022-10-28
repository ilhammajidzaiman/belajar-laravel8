@extends('administrator.templates.main')
@section('container')
<a class="rounded-pill btn btn-sm btn-secondary text-capitalize mb-3" href="{{ url('/'.$controller.'/create')}}">
    <i class="fa-fw fas fa-plus"></i>
    baru
</a>

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
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorys as $category)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$category->category}}</td>
                <td>
                    <span class="float-end text-capitalize">
                        <a class="badge rounded-pill btn btn-primary"
                            href="{{ url('/'.$controller.'/'.$category->slug) }}">
                            <i class="fa-fw fas fa-eye"></i>
                            lihat
                        </a>
                        <a class="badge rounded-pill btn btn-success"
                            href="{{ url('/'.$controller.'/'.$category->slug.'/edit') }}">
                            <i class="fa-fw fas fa-edit"></i>
                            edit
                        </a>
                        <form action="{{ url('/'.$controller.'/'.$category->slug) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge rounded-pill btn btn-danger"
                                onclick="return confirm('Hapus data: {{ $category->category }} ?');">
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