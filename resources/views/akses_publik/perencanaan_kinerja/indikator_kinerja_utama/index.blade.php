@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Indikator Kinerja Utama</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <form class="row" action="{{ route('aspu.indikator.kinerja.utama') }}" method="get">
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
                                <label class="form-label fs-5 fw-bold" for="perda">Perangkat Daerah</label>
                                <select class="form-select" id="perda" name="perda">
                                    <option value="" selected>- Pilih Perangkat Daerah -</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $perda ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 py-4">
                                <button class="btn btn-primary btn-sm w-100 ">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Indikator Kinerja Utama</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-table-indikator-kinerja-utama">
                                    <thead class="table-info">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-center" colspan="3">Target Kinerja</th>
                                        </tr>
                                        <tr style="font-size: 12px">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Sasaran Strategis</th>
                                            <th class="text-center">Indikator Sasaran</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Penjelasan / Formulasi</th>
                                            <th class="text-center">Sumber Data</th>
                                            <th class="text-center">Penanggung Jawab</th>
                                            <th class="text-center">2024</th>
                                            <th class="text-center">2025</th>
                                            <th class="text-center">2026</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $iter = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            @foreach ($item->indikators as $indikator)
                                            @php
                                                $iter++
                                            @endphp
                                                <tr style="font-size: 12px">
                                                    <td class="text-center">{{ $iter }}</td>
                                                    <td class="text-center">{{ $item->sasaran_strategis }}</td>
                                                    <td class="text-center">{{ $indikator->indikator_sasaran_strategis }}</td>
                                                    <td class="text-center">
                                                        @foreach ($satuans as $satuan)
                                                            @if ($satuan->id == $indikator->satuan_id)
                                                                {{ $satuan->satuan }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $indikator->penjelasan }}">
                                                        {{ Str::limit($indikator->penjelasan, '25', '...') }}
                                                    </td>
                                                    <td class="text-center">{{ $indikator->sumber_data }}</td>
                                                    <td class="text-center">{{ $item->sasaran_penanggungjawab->penanggung_jawab }}</td>
                                                    <td class="text-center">{{ $indikator->target1 }}</td>
                                                    <td class="text-center">{{ $indikator->target2 }}</td>
                                                    <td class="text-center">{{ $indikator->target3 }}</td>
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
                $('#data-table-indikator-kinerja-utama').DataTable({
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
