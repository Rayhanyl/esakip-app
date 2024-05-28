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
                    {{-- <div class="card-header">
                        <h4 class="card-title">Form</h4>
                    </div> --}}
                    <div class="card-body">
                        <form class="row g-3" action="#" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Tahun</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Triwulan</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Triwulan -</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="tahun">tahun</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <h4>Pengukuran Kinerja</h4>
                                <hr>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Sasaran Strategis</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Sasaran Strategis -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Indikator Sasaran</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Indikator Sasaran -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Sasaran Sub-Kegiatan</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Sasaran Sub-Kegiatan -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Indikator Sub-Kegiatan</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Indikator Sub-Kegiatan -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Target</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih target -</option>
                                    </select>
                                </fieldset>
                            </div>
                            {{-- Anggaran --}}
                            <div class="col-12">
                                <h4>Anggaran</h4>
                                <hr>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Sub-Kegiatan</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Sub-Kegiatan -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Pagu</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Pagu -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Realisasi</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Realisasi -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Capaian</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Capaian -</option>
                                    </select>
                                </fieldset>
                            </div>
                            {{-- Anggaran --}}

                            {{-- Tahunan --}}
                            <div class="col-12">
                                <h4>Tahunan</h4>
                                <hr>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Sasaran Strategis</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Sasaran Strategis -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Indikator Sasaran</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Indikator Sasaran -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Target</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Target -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Realisasi</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Realisasi -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Karakteristik</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Karakteristik -</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Capaian</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan">
                                        <option value="" selected>- Pilih Capaian -</option>
                                    </select>
                                </fieldset>
                            </div>
                            {{-- Tahunan --}}
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
