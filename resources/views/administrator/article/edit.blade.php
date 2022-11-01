@extends('administrator.templates.main')
@section('container')
<a class="rounded-pill btn btn-sm btn-secondary text-capitalize mb-3" href="{{ url('/'.$controller)}}">
    <i class="fa-fw fas fa-arrow-left"></i>
    kembali
</a>

<form action="{{ url('/'.$controller.'/'.$article->slug) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-9 mb-3">
            <div class="form-floating mb-3">
                <input type="text" name="title" id="title" placeholder="" value="{{ old('title',$article->title) }}" class="form-control @error('title') is-invalid @enderror" autofocus>
                <label for="title">judul</label>
                @error('title')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>

            <textarea name="content" id="summernote" cols="30" rows="10" class="@error('content') is-invalid @enderror">{{ old('content',$article->content) }}</textarea>
            @error('content')<div class="invalid-feedback">{{$message}}</div>@enderror

        </div>

        <div class="col-md-3">

            <img src="{{ asset('storage/'.$article->file) }}" alt="{{ asset('storage/'.$article->file) }}" class="img-fluid rounded w-100 mb-3 img-preview">

            <div class=" mb-3">
                <label for="file" class="form-label">thumbnail</label>
                <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" onchange="previewImg()" accept=".jpg,.jpeg,.png">
                @error('file')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="category" aria-label="Floating label select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="category">Works with selects</label>
            </div>


            <div class="row mb-3">
                <div class="col">
                    <p>Kategori</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="kategori2">
                        <label class="form-check-label" for="kategori2">Default checkbox</label>
                    </div>
                </div>
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="publish" checked>
                <label class="form-check-label" for="publish">Publish</label>
            </div>

            <button type="submit" class="rounded-pill btn btn-sm btn-primary"><i class="fa-fw fas fa-save"></i>
                simpan</button>
        </div>
    </div>
</form>
@endsection