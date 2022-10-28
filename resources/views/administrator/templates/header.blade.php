<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/images/imz-icon.svg' )}}">
    <link rel="stylesheet" href="{{ url('/')}}/plugin/fontawesome5/css/all.css">
    {{--
    <link rel="stylesheet" href="{{ url('/')}}/plugin/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/plugin/summernote-0.8.18-dist/summernote-lite.min.css"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <link href="https://getbootstrap.com/docs/5.1/examples/offcanvas-navbar/offcanvas.css" rel="stylesheet">
</head>

<body class="pt-5 bg-light">

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow fw-light" aria-label="Main navigation">
        <div class="container-xxl text-capitalize">
            <a class="navbar-brand" href="">
                <img src="{{ url('assets/images/imz-icon.svg')}}" alt="logo" height="30"
                    class="d-inline-blockk align-text-top">
            </a>

            <button class="navbar-toggler" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <div class="navbar-nav me-auto">
                    <a class="nav-item nav-link {{ Request::is('category*')?'text-primary':'' }}"
                        href="{{url('/category')}}">
                        kategori
                    </a>
                    <a class="nav-item nav-link {{ Request::is('article*')?'text-primary':'' }}"
                        href="{{url('/article')}}">
                        artikel
                    </a>
                </div>

                <div class="navbar-nav">
                    <a class="nav-item nav-link hover" href="{{url('/profil')}}">
                        <img src="{{ url('assets/users/default.svg' )}}" alt="user-logo" height="30"
                            class="shadow-sm rounded-circle me-2 rounded-circle">
                        nama profil
                    </a>
                    <a class="nav-item nav-link hover" href="{{url('/')}}/logout">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        keluar
                    </a>
                </div>

            </div>
        </div>
    </nav>


    <!-- e3f2fd -->
    <section class="wrapper bg-dark hero" style="min-height: 400px;">
        <div class="container-xxl col-xxl-8 py-5">
        </div>
    </section>

    <section class="wrapper" id="about" style="margin-top: -150px;">
        <div class="container-xxl pt-5">
            <h3 class="text-white fw-light text-capitalize">{{ $title }}</h3>
            <div class="card border-0 shadow" style="min-height:500px;">
                <div class="card-body">