@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-between pt-5">
                <div class="col-lg-6 text-center text-lg-start pe-lg-5">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Sistem Akuntabilitas Kinerja Instansi.</h1>
                    <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">Pemerintah Kabupaten Majalengka</p>
                    {{-- <div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
                        <a href="contact.html" class="btn btn-outline-white-reverse me-4">Contact us</a>
                        <a href="https://www.youtube.com/watch?v=Mb1zrW_zra4" class="text-white glightbox">Watch the
                            video</a>
                    </div> --}}
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="">
                        <div class="card bg-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/images/logo/pemkab1.png') }}" alt="Image"
                                        class="img-fluid rounded w-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
