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
    <link rel="stylesheet" href="{{ asset('assets/css/main/colormask.css') }}" />

    <link rel="stylesheet" href="{{ asset('design/css/flatpickr.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/pemkab_favicon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/pemkab_favicon.png') }}" type="image/png" />
    <link
        href="https://cdn.datatables.net/v/bs5/dt-2.0.6/date-1.5.2/fc-5.0.0/fh-4.0.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/datatables.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
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
                                <li class="{{ Route::is('aspu.index') ? 'active' : '' }}">
                                    <a href="{{ route('aspu.index') }}">Beranda</a>
                                </li>
                                <li
                                    class="has-children
                                {{ Route::is('aspu.perencanaan.perda-renstra') || Route::is('aspu.perencanaan.pemkab-rpjmd') || Route::is('aspu.perencanaan.perda-renja') || Route::is('aspu.perencanaan.pemkab-rkpd') || Route::is('aspu.perencanaan.perda-aksi') || Route::is('aspu.perencanaan.pemkab-aksi') || Route::is('aspu.perencanaan.perda-perjanjian') || Route::is('aspu.perencanaan.pemkab-perjanjian') || Route::is('aspu.perencanaan.perda-iku') || Route::is('aspu.perencanaan.pemkab-iku') ? 'active' : '' }}">
                                    <a>Perencanaan Kerja</a>
                                    <ul class="dropdown">
                                        <li class="has-children">
                                            <a>Perangkat Daerah</a>
                                            <ul class="dropdown">
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.perda-renstra') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.perda-renstra') }}">Renstra</a>
                                                </li>
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.perda-renja') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.perda-renja') }}">Renja</a>
                                                </li>
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.perda-aksi') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.perda-aksi') }}">Rencana
                                                        Aksi</a>
                                                </li>
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.perda-perjanjian') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.perda-perjanjian') }}">Perjanjian
                                                        Kinerja</a>
                                                </li>
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.perda-iku') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.perda-iku') }}">Indikator
                                                        Kinerja
                                                        Utama</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="has-children">
                                            <a>Pemerintah Kabupaten</a>
                                            <ul class="dropdown">
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.pemkab-rpjmd') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.pemkab-rpjmd') }}">RPJMD</a>
                                                </li>
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.pemkab-rkpd') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.pemkab-rkpd') }}">RKPD</a>
                                                </li>
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.pemkab-aksi') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.pemkab-aksi') }}">Rencana
                                                        Aksi</a>
                                                </li>
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.pemkab-perjanjian') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.pemkab-perjanjian') }}">Perjanjian
                                                        Kinerja</a>
                                                </li>
                                                <li
                                                    class="{{ Route::is('aspu.perencanaan.pemkab-iku') ? 'active' : '' }}">
                                                    <a href="{{ route('aspu.perencanaan.pemkab-iku') }}">Indikator
                                                        Kinerja Utama</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pohon Kinerja</a></li>
                                        <li class="{{ Route::is('aspu.perencanaan.cascading') ? 'active' : '' }}">
                                            <a href="{{ route('aspu.perencanaan.cascading') }}">Cascading</a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="has-children {{ Route::is('aspu.pengukuran.perda-index') || Route::is('aspu.pengukuran.pemkab-index') ? 'active' : '' }}">
                                    <a>Pengukuran Kinerja</a>
                                    <ul class="dropdown">
                                        <li>
                                            <a href="{{ route('aspu.pengukuran.perda-index') }}">Perangkat Daerah</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('aspu.pengukuran.pemkab-index') }}">Pemerintah
                                                Kabupaten</a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="has-children {{ Route::is('aspu.pelaporan.perda-index') || Route::is('aspu.pelaporan.pemkab-index') ? 'active' : '' }}">
                                    <a>Pelaporan Kinerja</a>
                                    <ul class="dropdown">
                                        <li>
                                            <a href="{{ route('aspu.pelaporan.perda-index') }}">Perangkat Daerah</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('aspu.pelaporan.pemkab-index') }}">Pemerintah
                                                Kabupaten</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ Route::is('aspu.evaluasi.index') ? 'active' : '' }}">
                                    <a href="{{ route('aspu.evaluasi.index') }}">Evaluasi Internal</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-2 text-end">
                            <a href="{{ route('auth.index') }}"
                                class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                                <span></span>
                            </a>

                            <a href="{{ route('auth.index') }}" class="call-us d-flex align-items-center">
                                <span class="icon-arrow-right"></span>
                                <span>Masuk</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
