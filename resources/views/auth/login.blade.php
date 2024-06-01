<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-SAKIP</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/pemkab_favicon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/pemkab_favicon.png') }}" type="image/png" />
</head>

<body>
    <div class="vh-100 background-img-login" id="auth">
        <div class="row">
            <div class="col-12 col-lg-7 bg-dark">
                <div class="row py-5 px-5 d-flex algin-items-center justify-content-center">
                    {{-- <h4 class="text-center">Wonderful Majalengka</h4> --}}
                    <div class="col-12">
                        <div class="row p-3 g-3">
                            <div class="col-12 col-lg-6">
                                <img class="w-100 rounded-3 shadow-5"
                                    src="{{ asset('assets/images/logo/picture3.jpg') }}" alt="">
                            </div>
                            <div class="col-12 col-lg-6">
                                <img class="w-100 rounded-3" src="{{ asset('assets/images/logo/picture5.jpg') }}"
                                    alt="">
                            </div>
                            <div class="col-12 col-lg-6">
                                <img class="w-100 rounded-3 shadow-5"
                                    src="{{ asset('assets/images/logo/picture6.jpg') }}" alt="">
                            </div>
                            <div class="col-12 col-lg-6">
                                <img class="w-100 rounded-3" src="{{ asset('assets/images/logo/picture7.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="row g-3 py-5">
                    <div class="col-12 text-center">
                        <img class="w-25" src="{{ asset('assets/images/logo/pemkab1.png') }}" alt="">
                    </div>
                    <div class="col-12 text-center">
                        <h3>e-SAKIP</h3>
                        <p class="fw-semibold">Sistem Akuntabilitas Kinerja Instansi <br> Pemerintah Kabupaten
                            Majalengka</p>
                    </div>
                    <div class="col-12">
                        <form class="row g-3 d-flex justify-content-center" action="{{ route('login.process') }}"
                            method="POST">
                            @csrf
                            <div class="col-10">
                                <label for="username">Username</label>
                                <input type="email" class="form-control" name="email" id="username" required>
                            </div>
                            <div class="col-10">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success rounded-5 w-50">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
</body>
</html>
