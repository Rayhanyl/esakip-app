@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Perjanjian Kinerja</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="row" action="{{ route('aspu.perjanjian.kinerja') }}" method="get">
                        @csrf
                        <div class="col-12 col-lg-3">
                            <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                            <select class="form-select select2" id="tahun" name="tahun">
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
                            <select class="form-select select2" id="perda" name="perda">
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
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Perjanjian Kinerja</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-table-perjanjian-kinerja">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Sasaran Strategis</th>
                                            <th class="text-center">Indikator</th>
                                            <th class="text-center">Target</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $item->sasaran_strategis->sasaran_strategis }}
                                                </td>
                                                <td class="text-center">{{ $item->indikator_sasaran_strategis }}</td>
                                                <td class="text-center">{{ $item->target1 }}</td>
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
                $('#data-table-perjanjian-kinerja').DataTable({
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
