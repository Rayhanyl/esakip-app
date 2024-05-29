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
                        <form class="row g-3" action="{{ route('perda.store.pengukuran.kinerja') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Tahun</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="year">
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
                                    <select class="form-select" id="triwulan" name="triwulan">
                                        <option value="" selected>- Pilih Triwulan -</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="tahun">Tahunan</option>
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
                                    <select class="form-select" id="triwulan"
                                        name="perencanaan_kinerja_strategic_target_id">
                                        <option value="" selected>- Pilih Sasaran Strategis -</option>
                                        @foreach ($sasaran_bupati as $item)
                                            <option value="{{ $item->id }}">{{ $item->sasaran_bupati }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="">Indikator Sasaran</label>
                                <input type="text" name="indikator_sasaran" id="indikator_sasaran" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Sasaran Sub-Kegiatan</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan" name="sub_activity_id">
                                        <option value="" selected>- Pilih Sasaran Sub-Kegiatan -</option>
                                        @foreach ($sasaran_bupati as $item)
                                            <option value="{{ $item->id }}">{{ $item->sasaran_bupati }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="">Indikator Sub-Kegiatan</label>
                                <input type="text" name="indikator_sub_kegiatan" id="indikator_sub_kegiatan"
                                    class="form-control">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="">Target</label>
                                <input type="number" name="target" id="target" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="">Realisasi</label>
                                <input type="number" name="realisasi" id="realisasi" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Karakteristik</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" name="karakteristik" id="karakteristik">
                                        <option value="" selected>- Pilih Karakteristik -</option>
                                        <option value="1">Semakin tinggi realisasi maka capaian semakin bagus</option>
                                        <option value="2">Semakin rendah realisasi maka capaian semakin bagus</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="">Capaian</label>
                                <input type="text" name="capaian" id="capaian" class="form-control" readonly>
                            </div>
                            {{-- Anggaran --}}
                            <div class="col-12">
                                <h4>Anggaran</h4>
                                <hr>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Sub-Kegiatan</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="triwulan" name="anggaran_sub_kegiatan">
                                        <option value="" selected>- Pilih Sub-Kegiatan -</option>
                                        @foreach ($sasaran_bupati as $item)
                                            <option value="{{ $item->id }}">{{ $item->sasaran_bupati }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="">Pagu</label>
                                <input type="number" name="anggaran_pagu" id="anggaran_pagu" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="">Realisasi</label>
                                <input type="number" name="anggaran_realisasi" id="anggaran_realisasi"
                                    class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="">Capaian</label>
                                <input type="text" name="anggaran_capaian" id="anggaran_capaian" class="form-control"
                                    readonly>
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
                                    <select class="form-select" id="triwulan" name="tahunan_sasaran_strategis">
                                        <option value="" selected>- Pilih Sasaran Strategis -</option>
                                        @foreach ($sasaran_bupati as $item)
                                            <option value="{{ $item->id }}">{{ $item->sasaran_bupati }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="">Indikator Sasaran</label>
                                <input type="text" name="tahunan_indikator_sasaran" id="tahunan_indikator_sasaran"
                                    class="form-control">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="">Target</label>
                                <input type="number" name="tahunan_target" id="tahunan_target" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="">Realisasi</label>
                                <input type="number" name="tahunan_realisasi" id="tahunan_realisasi"
                                    class="form-control">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Karakteristik</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" name="karakteristik_tahunan" id="karakteristik_tahunan">
                                        <option value="" selected>- Pilih Karakteristik -</option>
                                        <option value="1">Semakin tinggi realisasi maka capaian semakin bagus</option>
                                        <option value="2">Semakin rendah realisasi maka capaian semakin bagus</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="capaian">Capaian</label>
                                <input type="text" name="tahunan_capaian" id="tahunan_capaian" class="form-control"
                                    readonly>
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
            $(document).ready(function() {
                // Event listener for input fields
                $('#anggaran_realisasi, #anggaran_pagu').on('input', function() {
                    // Get the values of realisasi and pagu
                    var realisasi = parseFloat($('#anggaran_realisasi').val()) || 0;
                    var pagu = parseFloat($('#anggaran_pagu').val()) || 0;

                    // Calculate the achievement percentage
                    var achievement = (realisasi / pagu) * 100 || 0;

                    // Update the value of the capaian input field
                    $('#anggaran_capaian').val(achievement.toFixed(2) + '%');
                });

                $('#tahunan_realisasi, #tahunan_target, #karakteristik_tahunan').on('change', function() {
                    // Get the values of realisasi, target, and karakteristik
                    var realisasi = parseFloat($('#tahunan_realisasi').val()) || 0;
                    var target = parseFloat($('#tahunan_target').val()) || 0;
                    var karakteristik = $('#karakteristik_tahunan').val();

                    // Calculate the capaian based on the selected karakteristik
                    var capaian;
                    switch (karakteristik) {
                        case "1":
                            capaian = (realisasi / target) * 100;
                            break;
                        case "2":
                            capaian = ((target - (realisasi - target)) / target) * 100;
                            break;
                        default:
                            capaian = 0;
                            break;
                    }

                    // Update the value of the capaian input field
                    $('#tahunan_capaian').val(capaian.toFixed(2) + '%');
                });

                $('#realisasi, #target, #karakteristik').on('change', function() {
                    // Get the values of realisasi, target, and karakteristik
                    var realisasi = parseFloat($('#realisasi').val()) || 0;
                    var target = parseFloat($('#target').val()) || 0;
                    var karakteristik = $('#karakteristik').val();

                    // Calculate the capaian based on the selected karakteristik
                    var capaian;
                    switch (karakteristik) {
                        case "1":
                            capaian = (realisasi / target) * 100;
                            break;
                        case "2":
                            capaian = ((target - (realisasi - target)) / target) * 100;
                            break;
                        default:
                            capaian = 0;
                            break;
                    }

                    // Update the value of the capaian input field
                    $('#capaian').val(capaian.toFixed(2) + '%');
                });
            });
        </script>
    @endpush
@endsection
