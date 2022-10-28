<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/images/imz-icon.svg' )}}">
    <link rel="stylesheet" href="{{ url('/')}}/plugin/fontawesome5/css/all.css">
    <link rel="stylesheet" href="{{ url('/')}}/plugin/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/plugin/summernote-0.8.18-dist/summernote-lite.min.css">

</head>

<body id="home" class="pt-5 bg-light">

    <nav class="navbar navbar-light navbar-expand-lg bg-white shadow fixed-top fw-light">
        <div class="container-xxl text-capitalize">

            <a class="navbar-brand me-auto" href="{{ url('/') }}">
                <img src="{{ url('assets/images/imz-icon.svg')}}" alt="logo" height="24"
                    class="d-inline-block align-text-top">
                website
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg"
                aria-controls="navbarOffcanvasLg">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg"
                aria-labelledby="navbarOffcanvasLgLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <div class="navbar-nav justify-content-end flex-grow-1 pe-3 text-capitalize ms-auto">
                        <a class="nav-item nav-link {{ Request::is('category')?'text-primary':'' }}"
                            href="{{ url('/websites') }}">
                            berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- e3f2fd -->
    <section class="wrapper bg-dark hero" style="min-height: 400px;">
        <div class="container-xxl col-xxl-8 py-5">
        </div>
    </section>

    <section class="wrapper" id="article">
        <div class="container-xxl pt-5">