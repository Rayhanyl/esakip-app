@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">
                        Pengukuran Kinerja (Perangkat Daerah) Detail
                    </h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <label class="form-label fs-5 fw-bold" for="">Tahun</label>
                    <select class="form-select" id="year" name="year">
                        <option value="" selected>- Pilih Tahun -</option>
                        @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                            <option value="{{ $i }}">
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-12 col-lg-3">
                    <label class="form-label fs-5 fw-bold" for="">Triwulan</label>
                    <select class="form-select" id="triwulan" name="triwulan">
                        <option value="" selected>- Pilih Triwulan -</option>
                    </select>
                </div>
                <div class="col-12 col-lg-3 py-4">
                    <button class="btn btn-primary btn-sm w-100 ">Search</button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pengukuran Kinerja (Perangkat Daerah) Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-perangkat-daerah-detail">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-center" colspan="6">Kinerja</th>
                                            <th class="text-center" colspan="6">Anggaran</th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>Sasaran Strategis</th>
                                            <th>Indikator Sasaran</th>
                                            <th>Sasaran Sub-kegiatan</th>
                                            <th>Indikator Sub-kegiatan</th>
                                            <th>Target</th>
                                            <th>Realisasi</th>
                                            <th>Capaian (%)</th>
                                            <th>Sub Kegiatan</th>
                                            <th>PAGU</th>
                                            <th>Realisasi</th>
                                            <th>Capaian (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script-landingpage')
        <script>
            $(document).ready(function() {
                $('#data-perangkat-daerah-detail').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    @endpush
@endsection
