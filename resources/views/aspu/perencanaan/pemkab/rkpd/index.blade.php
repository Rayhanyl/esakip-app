@extends('layout.akses_publik.app')
@section('content-landingpage')
    <div class="hero overlay inner-page">
        <img src="{{ asset('design/images/blob.svg') }}" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">RKPD</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <form class="row" action="{{ route('aspu.perencanaan.pemkab-rkpd') }}" method="GET">

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
                                <table class="table table-striped table-hover" id="data-table-renja" style="width: 100%;">
                                    <thead class="table-info">
                                        <tr style="font-size: 12px">
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
                                        @php $iter = 0; @endphp
                                        @foreach ($data as $item)
                                            @foreach ($item->perda_sastras as $strategis)
                                                @foreach ($strategis->perda_progs as $program)
                                                    @foreach ($program->perda_prog_ins as $indikator_program)
                                                        @foreach ($program->perda_kegias as $kegiatan)
                                                            @foreach ($kegiatan->perda_kegia_ins as $indikator_kegiatan)
                                                                @foreach ($kegiatan->perda_sub_kegias as $sub_kegiatan)
                                                                    @foreach ($sub_kegiatan->perda_subkegia_ins as $indikator_sub)
                                                                        @foreach ($item->pemkab_sastra_ins as $indikator_bupati)
                                                                            @php $iter++; @endphp
                                                                            <tr style="font-size: 12px">
                                                                                <td class="text-center">{{ $iter }}
                                                                                </td>
                                                                                <td>{{ $item->sasaran }}</td>
                                                                                <td>
                                                                                    {{ $indikator_bupati->indikator }}
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    {{ $indikator_bupati->target1 }}
                                                                                </td>
                                                                                <td class="text-start">
                                                                                    {{ $indikator_program->program }}
                                                                                </td>
                                                                                <td class="text-start">
                                                                                    {{ $indikator_kegiatan->kegiatan }}
                                                                                </td>
                                                                                <td class="text-start">
                                                                                    {{ $indikator_sub->subkegiatan }}
                                                                                </td>
                                                                                <td class="text-start">
                                                                                    <div class="idr-currency">
                                                                                        {{ $indikator_sub->anggaran }}
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
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
                    if (!isNaN(parseInt(value, 10))) {
                        $(this).text(formatIDR(value));
                    }
                });
            });
        </script>
    @endpush
@endsection
