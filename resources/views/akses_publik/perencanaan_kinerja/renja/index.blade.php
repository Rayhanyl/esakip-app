@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Renja</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <form class="row" action="{{ route('aspu.renja') }}" method="GET">
                    
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
                    <div class="col-12 col-lg-3 py-4">
                        <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                    </div>
                </form>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Renja</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-table-renja">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Sasaran Strategis</th>
                                            <th class="text-center">Indikator</th>
                                            <th class="text-center">Target</th>
                                            <th class="text-center">Program</th>
                                            <th class="text-center">Kegiatan</th>
                                            <th class="text-center">Sub-Kegiatan</th>
                                            <th class="text-center">Anggaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $iter = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            @foreach ($item->sasaran_programs as $sasaran_program)
                                                @foreach ($sasaran_program->sasaran_kegiatans as $sasaran_kegiatan)
                                                    @foreach ($sasaran_kegiatan->sasaran_sub_kegiatans as $sasaran_sub_kegiatan)
                                                        @php
                                                            $iter++
                                                        @endphp
                                                        <tr>
                                                            <td class="text-center">{{ $iter }}</td>
                                                            <td>{{ $item->sasaran_strategis }}</td>
                                                            <td>
                                                                <ul>
                                                                    @foreach ($item->indikators as $indikator)
                                                                        <li>{{ $indikator->indikator_sasaran_strategis }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    @foreach ($item->indikators as $indikator)
                                                                        <li>{{ $indikator->target1 }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>{{ $sasaran_program->sasaran_program }}</td>
                                                            <td>{{ $sasaran_kegiatan->sasaran_kegiatan }}</td>
                                                            <td>{{ $sasaran_sub_kegiatan->sasaran_sub_kegiatan }}</td>
                                                            <td>
                                                                <ul>
                                                                    @foreach ($sasaran_sub_kegiatan->indikators as $indikator_sub)
                                                                        <li class="idr-currency">
                                                                            {{ $indikator_sub->anggaran }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
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
            function formatIDR(value) {
                return 'Rp ' + parseInt(value, 10).toLocaleString('id-ID');
            }

            $(document).ready(function() {
                $('#data-table-renja').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });
                
                $('.idr-currency').each(function() {
                    let value = $(this).text();
                    $(this).text(formatIDR(value));
                });
            });
        </script>
    @endpush
@endsection
