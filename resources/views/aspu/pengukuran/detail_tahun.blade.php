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
                                        <tr>
                                            <td class="text-center">Perangkat Daerah</td>
                                            <td class="text-center">Tahun</td>
                                            <td class="text-center">Sasaran Strategis</td>
                                            <td class="text-center">Indikator Sasaran</td>
                                            <td class="text-center">Target</td>
                                            <td class="text-center">Realisasi</td>
                                            <td class="text-center">Capaian</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tahunan as $item)
                                            @foreach ($item->tahunans as $tahunan)
                                                <tr style="font-size:12px;">
                                                    <td class="text-start">{{ $item->user->name }}</td>
                                                    <td class="text-center">{{ $item->tahun }}</td>
                                                    <td class="text-start">{{ $tahunan->perda_sastra->sasaran }}</td>
                                                    <td class="text-start">{{ $tahunan->perda_sastra_in->indikator }}</td>
                                                    <td class="text-center">{{ $tahunan->perda_sastra_in->target1 }}</td>
                                                    <td class="text-center">{{ $tahunan->tahunan_realisasi }}</td>
                                                    <td class="text-center">{{ $tahunan->tahunan_capaian }}</td>
                                                </tr>
                                            @endforeach
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
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });
            });
        </script>
    @endpush
@endsection
