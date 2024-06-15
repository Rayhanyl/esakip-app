@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h4 class="text-white mb-3" data-aos="fade-up">
                        Pengukuran Kinerja {{ $user->name }} Detail
                    </h4>
                    <h1 class="heading text-white mb-3" data-aos="fade-up">
                        Rangking ( 1 )
                    </h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="col-12 mb-4">
                <a href="{{ route('aspu.pengukuran.index') }}" class="fw-bold">
                    Back to pengukuran kinerja
                </a>
            </div>
            <form
                action="{{ route('aspu.pengukuran.detail') }}"
                method="get">
                @csrf
                <div class="row g-3">
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                        <select class="form-select" id="tahun" name="tahun">
                            <option value="" selected>- Pilih Tahun -</option>
                            @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="triwulan">Triwulan</label>
                        <select class="form-select" id="triwulan" name="triwulan">
                            <option value="" selected>- Pilih Triwulan -</option>
                            <option value="1" {{ $triwulan == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $triwulan == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $triwulan == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $triwulan == '4' ? 'selected' : '' }}>4</option>
                            <option value="tahun" {{ $triwulan == 'tahun' ? 'selected' : '' }}>Tahun</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 py-4">
                        <button class="btn btn-primary btn-sm w-100 ">Search</button>
                    </div>
                </div>
            </form>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pengukuran Kinerja {{ $user->name }} Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-perangkat-daerah-detail">
                                    <thead class="table-info">
                                        <tr style="font-size:13px;">
                                            <th class="text-center" colspan="8">Kinerja</th>
                                            <th class="text-center" colspan="4">Anggaran</th>
                                        </tr>
                                        <tr style="font-size:12px;">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Sasaran Strategis</th>
                                            <th class="text-center">Indikator Sasaran</th>
                                            <th class="text-center">Sasaran Sub-kegiatan</th>
                                            <th class="text-center">Indikator Sub-kegiatan</th>
                                            <th class="text-center">Target</th>
                                            <th class="text-center">Realisasi</th>
                                            <th class="text-center">Capaian (%)</th>
                                            <th class="text-center">Sub Kegiatan</th>
                                            <th class="text-center">PAGU</th>
                                            <th class="text-center">Realisasi</th>
                                            <th class="text-center">Capaian (%)</th>
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
