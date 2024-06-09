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
                <form class="row" action="{{ route('aspu.pengukuran.kinerja') }}" method="GET">
                    @csrf
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
                            <option value="" selected>- Pilih Triwulan -</option>
                            <option value="1" selected>1</option>
                            <option value="2" selected>2</option>
                            <option value="3" selected>3</option>
                            <option value="4" selected>4</option>
                            <option value="tahun" selected>tahun</option>
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
                                <table class="table table-striped table-hover" id="data-pengukuran-kinerja">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Perangkat Daerah</th>
                                            <th class="text-center">Tahun</th>
                                            <th class="text-center">Triwulan</th>
                                            <th class="text-center">Capaian (%)</th>
                                            <th class="text-center">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $item->user->name }}</td>
                                                <td class="text-center">{{ $item->tahun }}</td>
                                                <td class="text-center text-capitalize">{{ $item->triwulan }}</td>
                                                <td class="text-center">
                                                    @if ($item->triwulan == 'tahun')
                                                        {{ $item->tahunan_capaian }}
                                                    @else
                                                        {{ $item->capaian }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a
                                                        href="{{ route('aspu.pengukuran.kinerja.detail', ['user' => $item->user->id, 'tahun' => $item->tahun,'triwulan'=>$item->triwulan]) }}">
                                                        Detail
                                                    </a>
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
