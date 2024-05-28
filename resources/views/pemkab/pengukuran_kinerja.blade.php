@extends('layouts.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Pengukuran Kinerja</h3>
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Pengukuran Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="#" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Saran Bupati</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option value="" selected>- Pilih Saran Bupati -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Indikator Saran</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option value="" selected>- Pilih Indikator Saran -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Target</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option value="" selected>- Pilih Target -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 form-group">
                                <label for="pengampu" class="form-label">Realisasi</label>
                                <input type="password" id="pengampu" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Karakteristik</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option value="" selected>- Pilih Karakteristik -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Capaian</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option value="" selected>- Pilih Capaian -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50">Submit</button>
                            </div>
                        </form>
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
