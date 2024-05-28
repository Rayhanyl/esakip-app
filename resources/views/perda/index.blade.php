@extends('layouts.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Dashboard</h3>
                        {{-- <p class="text-subtitle text-muted">
                            Navbar will appear on the top of the page.
                        </p> --}}
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                {{-- <li class="breadcrumb-item">
                                    <a href="index.html">Pengukuran Kinerja</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Layout Vertical Navbar
                                </li> --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card shadow rounded-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                                <img class="w-100" src="{{ asset('assets/images/logo/person.png') }}" alt="">
                            </div>
                            <div class="col-12 col-lg-8">
                                <p>
                                    <b>Selamat Datang</b> di Aplikasi Sistem Akuntabilitas Kinerja Instansi Pemerintah
                                    Kabupaten
                                    Majalengka
                                </p>
                                <p>
                                    Kami dengan senang hati menyambut Anda di aplikasi ini, yang dirancang untuk
                                    meningkatkan transparansi, efisiensi, dan akuntabilitas kinerja instansi pemerintah di
                                    Kabupaten Majalengka.
                                </p>
                                <p>
                                    Terima kasih telah menggunakan aplikasi ini. Mari bersama-sama kita wujudkan
                                    pemerintahan yang lebih baik dan berintegritas.
                                    Salam,
                                    <br>
                                    Pemerintah Kabupaten Majalengka
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script>
            // 
        </script>
    @endpush
@endsection
