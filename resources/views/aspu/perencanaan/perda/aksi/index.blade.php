@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Rencana Aksi</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="row" action="{{ route('aspu.perencanaan.perda-aksi') }}" method="get">
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
                            <select class="form-select select2" id="perda" name="perda">
                                <option value="" selected>-- All --</option>
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
                            <h4 class="card-title">Tabel Rencana Aksi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-table-rencana-aksi"
                                    style="width: 100%;">
                                    <thead class="table-info">
                                        <tr style="font-size: 12px">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-center" colspan="4">Target</th>
                                            <th></th>
                                        </tr>
                                        <tr style="font-size: 12px">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Perangkat Daerah</th>
                                            <th class="text-center">IKU</th>
                                            <th class="text-center">Rencana Aksi</th>
                                            <th class="text-center">Indikator</th>
                                            <th class="text-center">I</th>
                                            <th class="text-center">II</th>
                                            <th class="text-center">III</th>
                                            <th class="text-center">IV</th>
                                            <th class="text-center">Penanggung Jawab</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $iter = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            @foreach ($item->perda_sastra->perda_progs as $program)
                                                @foreach ($program->perda_kegias as $kegiatan)
                                                    @foreach ($kegiatan->perda_sub_kegias as $subkegiatan)
                                                        @foreach ($subkegiatan->perda_subkegia_ins as $indikator)
                                                            @php
                                                                $iter++;
                                                            @endphp
                                                            <tr style="font-size: 12px">
                                                                <td class="text-center">{{ $iter }}</td>
                                                                <td>{{ $indikator->user->name }}</td>
                                                                <td>{{ $item->indikator }}</td>
                                                                <td>{{ $subkegiatan->sasaran }}</td>
                                                                <td>{{ $indikator->indikator }}</td>
                                                                <td class="text-center">
                                                                    {{ $indikator->triwulan1 ? $indikator->triwulan1 : '-' }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $indikator->triwulan2 ? $indikator->triwulan2 : '-' }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $indikator->triwulan3 ? $indikator->triwulan3 : '-' }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $indikator->triwulan4 ? $indikator->triwulan4 : '-' }}
                                                                </td>
                                                                <td>
                                                                    <ul>
                                                                        @foreach ($item->penanggung_jawabs as $penanggung_jawab)
                                                                            <li>{{ $penanggung_jawab->penanggung_jawab }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
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
            $(document).ready(function() {
                $('#data-table-rencana-aksi').DataTable({
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
