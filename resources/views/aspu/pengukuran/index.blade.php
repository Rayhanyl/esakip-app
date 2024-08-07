@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Pengukuran Kinerja</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <form class="row" action="{{ route('aspu.pengukuran.perda-index') }}" method="GET">
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                        <select class="form-select" id="tahun" name="tahun">
                            <option value="" selected>-- All --</option>
                            @for ($i = date('Y') + 10; $i >= date('Y') - 5; $i--)
                                <option value="{{ $i }}" {{ $i == $tahun ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="perda">Perangkat Daerah</label>
                        <select class="form-select select2" id="perda" name="perda">
                            <option value="" selected>-- All --</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $perda ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="triwulan">Triwulan</label>
                        <select class="form-select" id="triwulan" name="triwulan">
                            <option value="">-- All --</option>
                            <option value="1" {{ $triwulan == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $triwulan == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $triwulan == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $triwulan == '4' ? 'selected' : '' }}>4</option>
                            <option value="tahun" {{ $triwulan == 'tahun' ? 'selected' : '' }}>tahun</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 py-4">
                        <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                    </div>
                </form>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pengukuran Kinerja</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-pengukuran-kinerja"
                                    style="width: 100%;">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Perangkat Daerah</th>
                                            <th class="text-center">Tahun</th>
                                            <th class="text-center">Triwulan</th>
                                            <th class="text-center">Capaian Tahunan (%)</th>
                                            <th class="text-center">Capaian Triwulan (%)</th>
                                            <th class="text-center">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $item['user']->name }}</td>
                                                <td class="text-center">{{ $item['tahun'] }}</td>
                                                <td class="text-center">{{ $item['tipe'] }}</td>
                                                <td class="text-center">
                                                    @if ($item['tahunans']->isEmpty())
                                                        -
                                                    @else
                                                        {{ number_format($item['sum_tahunan_capaian'], 2) }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item['triwulans']->isEmpty())
                                                        -
                                                    @else
                                                        {{ number_format($item['average_triwulan_capaian'], 2) }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item['tipe'] == 'tahun')
                                                        <a
                                                            href="{{ route('aspu.pengukuran.perda-detail', ['id' => $item['items']->first()->id, 'tahun' => $item['tahun'], 'triwul' => $item['tipe'], 'tipe' => 'tahunan', 'user' => $item['user']->id]) }}">
                                                            Detail
                                                        </a>
                                                    @else
                                                        <a
                                                            href="{{ route('aspu.pengukuran.perda-detail', ['id' => $item['items']->first()->id, 'tahun' => $item['tahun'], 'triwul' => $item['tipe'], 'tipe' => 'triwulan', 'user' => $item['user']->id]) }}">
                                                            Detail
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
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
                $('#data-pengukuran-kinerja').DataTable({
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
