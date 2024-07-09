@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h4 class="text-white mb-3" data-aos="fade-up">
                        Detail Pengukuran Kinerja <b class="text-warning">{{ $users->name }}</b>
                    </h4>
                    <h1 class="heading text-white mb-3" data-aos="fade-up">
                        Ranking ( {{ $ranking['ranking'] }} )
                    </h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="col-12 mb-4">
                <a href="{{ route('aspu.pengukuran.perda-index') }}" class="fw-bold">
                    Back to pengukuran kinerja
                </a>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pengukuran Kinerja {{ $users->name }} Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-perangkat-daerah-detail"
                                    style="width: 100%">
                                    <thead class="table-info">
                                        <tr style="font-size:13px;">
                                            <th class="text-center" colspan="7">Kinerja</th>
                                            <th class="text-center" colspan="5">Anggaran</th>
                                        </tr>
                                        <tr style="font-size:10px;">
                                            <th class="text-center">Perangkat Daerah</th>
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
                                        @foreach ($triwulan as $item)
                                            @if ($item->triwulans)
                                                @foreach ($item->triwulans as $triwulan)
                                                    <tr style="font-size:12px;">
                                                        <td class="text-start">{{ $users->name }}</td>
                                                        <td class="text-start">
                                                            {{ optional($triwulan->perda_sastra)->sasaran }}</td>
                                                        <td class="text-start">
                                                            {{ optional($triwulan->perda_sastra_in)->indikator }}</td>
                                                        <td class="text-start">
                                                            {{ optional($triwulan->perda_sub_kegia)->sasaran }}</td>
                                                        <td class="text-start">
                                                            {{ optional($triwulan->perda_sub_kegia_in)->indikator }}</td>
                                                        <td class="text-center">{{ $triwulan->perda_sub_kegia_target }}
                                                        </td>
                                                        <td class="text-center">{{ $triwulan->realisasi }}</td>
                                                        <td class="text-center">{{ $triwulan->capaian }}</td>
                                                        <td class="text-start">
                                                            {{ optional($triwulan->perda_sastra)->sasaran }}</td>
                                                        <td class="text-center">
                                                            {{ $triwulan->anggaran_perda_sub_kegia_pagu }}</td>
                                                        <td class="text-center">
                                                            {{ $triwulan->anggaran_perda_sub_kegia_realisasi }}</td>
                                                        <td class="text-center">
                                                            {{ $triwulan->anggaran_perda_sub_kegia_capaian }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach

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
