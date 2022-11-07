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

<form action="{{url('/'.$controller)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9 mb-3">
            <div class="form-floating mb-3">
                <input type="text" name="title" id="title" placeholder="" value="{{ old('title') }}"
                    class="form-control @error('title') is-invalid @enderror" autofocus>
                <label for="title">judul</label>
                @error('title')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <textarea name="content" id="summernote" cols="30" rows="10"
                class="@error('content') is-invalid @enderror">{{ old('content') }}</textarea>
            @error('content')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>

        <div class="col-md-3">
            <img src="{{url('assets/images/default-img.svg')}}" alt=" default.svg"
                class="img-fluid rounded w-100 mb-3 img-preview">

            <div class=" mb-3">
                <label for="file" class="form-label">thumbnail</label>
                <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror"
                    onchange="previewImg()" accept=".jpg,.jpeg,.png">
                @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row mb-3">
                <div class="col">
                    <p>kategori</p>
                    @foreach ($categories as $category)
                    <div class="form-check">
                        <input type="checkbox" name="category[]" id="category{{ $category->id }}"
                            value="{{ $category->id }}" class="form-check-input" <?php
                                                                // if ($category->id == old('category[]')) :
                                                                //     $selected = 'checked';
                                                                // else :
                                                                //     $selected = '';
                                                                // endif;
                                                                // echo $selected;
                                                                ?>
                            {{-- {{ (is_array(old('category[]')) && in_array($category->id, old('category[]'))) ? ' checked' : '' }}
                            --}}>
                        <label for="category{{ $category->id }}">{{ $category->category }}</label>
                    </div>
                    @endforeach
                    @error('category[]')<small class="text-danger">{{$message}}</small>@enderror
                </div>
            </div>
            </h1>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="publish" checked>
                <label class="form-check-label" for="publish">Publish</label>
            </div>

            <button type="submit" class="rounded-pill btn btn-primary"><i class="fa-fw fas fa-save"></i>
                simpan</button>
        </div>
    </div>
</form>
@endsection