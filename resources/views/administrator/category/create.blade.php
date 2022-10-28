@extends('administrator.templates.main')
@section('container')
<a class="rounded-pill btn btn-sm btn-secondary text-capitalize mb-3" href="{{ url('/'.$controller)}}">
    <i class="fa-fw fas fa-arrow-left"></i>
    kembali
</a>


<form action="{{url('/'.$controller)}}" method="post" class="text-capitalize">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" name="category" id="category" value="{{old('category')}}" placeholder=""
            class="form-control @error('category') is-invalid @enderror" autofocus>
        <label for="category">kategori</label>
        @error('category')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="rounded-pill btn btn-sm btn-primary"><i class="fa-fw fas fa-save"></i> simpan</button>
</form>
@endsection