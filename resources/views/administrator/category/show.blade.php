@extends('administrator.templates.main')
@section('container')
<a class="rounded-pill btn btn-sm btn-secondary text-capitalize mb-3" href="{{ url('/'.$controller)}}">
    <i class="fa-fw fas fa-arrow-left"></i>
    kembali
</a>



<div class="form-floating mb-3">
    <input type="text" name="category" id="category" value="{{ $category->category }}" placeholder=""
        class="form-control">
    <label for="category">kategori</label>
</div>
@endsection