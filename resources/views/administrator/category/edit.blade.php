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

<form action="{{ url('/'.$controller.'/'.$category->slug) }}" method="post" class="text-capitalize">
    @method('put')
    @csrf
    <div class="form-floating mb-3">
        <input type="text" name="category" id="category" value="{{old('category',$category->category)}}" placeholder=""
            class="form-control @error('category') is-invalid @enderror" autofocus>
        <label for="category">kategori</label>
        @error('category')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="rounded-pill btn btn-primary"><i class="fa-fw fas fa-save"></i> simpan</button>
</form>
@endsection