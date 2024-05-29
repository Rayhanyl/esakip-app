<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('design/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('design/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('design/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('design/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('design/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('design/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('design/css/flatpickr.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/pemkab_favicon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/pemkab_favicon.png') }}" type="image/png" />
    <link
        href="https://cdn.datatables.net/v/bs5/dt-2.0.6/date-1.5.2/fc-5.0.0/fh-4.0.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/datatables.min.css"
        rel="stylesheet">

    <title>e-SAKIP</title>
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            <a href="#" class="logo m-0 float-start">E-SAKIP<span
                                    class="text-primary">.</span></a>
                        </div>
                        <div class="col-8 text-center ">
                            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                <li class="active"><a href="#">Beranda</a></li>
                                <li><a href="{{ route ('view.perencanaan.kinerja.page') }}">Perencanaan Kerja</a></li>
                                <li><a href="#">Pengukuran Kinerja</a></li>
                                <li><a href="#">Pelaporan Kinerja</a></li>
                                <li><a href="#">Evaluasi Internal</a></li>
                            </ul>
                        </div>
                        <div class="col-2 text-end">
                            <a href="#"
                                class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                                <span></span>
                            </a>

                            <a href="{{ route('view.login.page') }}" class="call-us d-flex align-items-center">
                                <span class="icon-phone"></span>
                                <span>Masuk</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
