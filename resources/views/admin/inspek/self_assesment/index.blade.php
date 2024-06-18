@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Self Assesment Perangkat Daerah</h3>
                        {{-- <p class="text-subtitle text-muted">
                            Navbar will appear on the top of the page.
                        </p> --}}
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                {{-- <li class="breadcrumb-item">
                                    <a href="index.html">Pengukuran Kinerja</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Layout Vertical Navbar
                                </li> --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.inspek.self-assesment.index') }}" method="get">
                            <div class="row g-3">
                                <x-admin.form.select col="col-12 col-lg-6" label="Tahun" name="tahun"
                                    value="{{ $tahun }}" :lists="$tahun_options" />
                                <x-admin.form.select col="col-12 col-lg-6" label="Perangkat Daerah" name="perangkat_daerah"
                                    value="{{ $perangkat_daerah }}" :lists="$user_options" />
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if ($perda_evaluasi_internal)
                    <div class="card">
                        <div class="card-header">
                            @switch($status)
                                @case('new')
                                    <h3 class="text-danger">Data Evaluasi Internal belum tersedia</h3>
                                @break

                                @case('submit')
                                    <h3 class="text-warning">Data Evaluasi Internal belum dinilai</h3>
                                @break

                                @case('complete')
                                    <h3 class="text-success">Data Evaluasi Internal telah dinilai</h3>
                                @break

                                @default
                            @endswitch
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Tabel Pelaporan Kinerja</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-info">
                                        <tr>
                                            <th>No</th>
                                            <th></th>
                                            <th></th>
                                            <th>Komponen/Sub Komponen/Kriteria</th>
                                            <th width="10%">Keterangan</th>
                                            <th>Eviden</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form
                                            action="{{ route('admin.inspek.self-assesment.update', $perda_evaluasi_internal->id ?? 0) }}"
                                            method="post" id="form_perda_evaluasi_internal" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            @foreach ($perda_evaluasi_internal->komponens as $komponen)
                                                <tr class="fw-bold text-light" style="background: #333333">
                                                    <td>
                                                        {{ $komponen->no }}</td>
                                                    <td colspan="3">
                                                        {{ $komponen->komponen }}
                                                    </td>
                                                    <td colspan="2">
                                                        <input type="hidden"
                                                            name="komponen[{{ $komponen->id }}][total_bobot]"
                                                            value="{{ $komponen->nilai ?? 0 }}">
                                                        <span
                                                            id="komponen{{ $komponen->id }}">{{ $komponen->nilai ?? 0 }}</span>
                                                    </td>
                                                </tr>
                                                @foreach ($komponen->sub_komponens as $sub_komponen)
                                                    <tr class="bg-secondary fw-bold text-light">
                                                        <td>
                                                        </td>
                                                        <td>
                                                            {{ $sub_komponen->no }}
                                                        </td>
                                                        <td colspan="2">
                                                            {{ $sub_komponen->sub_komponen }}
                                                        </td>
                                                        <td colspan="2">
                                                            <input type="hidden"
                                                                name="sub_komponen[{{ $sub_komponen->id }}][total_bobot]"
                                                                value="{{ $sub_komponen->nilai ?? 0 }}">
                                                            <span
                                                                id="sub_komponen{{ $sub_komponen->id }}">{{ $sub_komponen->nilai ?? 0 }}</span>
                                                        </td>
                                                    </tr>
                                                    @foreach ($sub_komponen->kriterias as $kriteria)
                                                        <tr class="fw-bold">
                                                            <td colspan="2"></td>
                                                            <td>
                                                                {{ $kriteria->no }}
                                                            </td>
                                                            <td>
                                                                {{ $kriteria->kriteria }}
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-select-sm"
                                                                    name="kriteria[{{ $kriteria->id }}][status]"
                                                                    id="kriteria[{{ $komponen->id }}][{{ $sub_komponen->id }}][{{ $kriteria->id }}][status]"
                                                                    data-komponen="{{ $komponen->id }}"
                                                                    data-sub-komponen="{{ $sub_komponen->id }}"
                                                                    data-kriteria="{{ $kriteria->id }}"
                                                                    {{ in_array($status, ['new']) ? 'disabled' : '' }}>
                                                                    <option value="0" selected disabled>- Pilih -
                                                                    </option>
                                                                    @foreach ($kriteria->answers as $answer)
                                                                        <option value="{{ $answer->bobot }}"
                                                                            {{ (float) $answer->bobot == (float) ($kriteria->inspek_status ?? $kriteria->status) ? 'selected' : '' }}>
                                                                            {{ $answer->jawaban }}
                                                                            ({{ $answer->bobot }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                @if ($kriteria->upload)
                                                                    <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Download File Kriteria"
                                                                        class="btn btn-success btn-sm"
                                                                        href="{{ route('admin.perda.evaluasi-internal.download', $kriteria->upload) }}">
                                                                        <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                                        Download
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        </form>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-end">
                                                Nilai Akuntabilitas Kinerja :
                                            </td>
                                            <td class="d-flex justify-content-center align-items-center gap-1">
                                                <div class="input-group">
                                                    <input type="number" name="total_nilai" id="total-nilai"
                                                        class="form-control" value="0" readonly>
                                                </div>
                                                <input type="hidden" name="total_bobot" id="total-bobot"
                                                    class="form-control" value="0" readonly disabled>
                                            </td>
                                            <td rowspan="2">
                                                @if (!in_array($status, ['new']))
                                                    <button class="btn btn-success btn-lg"
                                                        form="form_perda_evaluasi_internal">
                                                        <i class="bi bi-save"></i>
                                                        Submit
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-end">
                                                Predikat :
                                            </td>
                                            <td>
                                                <input type="text" name="predikat_nilai" id="predikat-nilai"
                                                    class="form-control" value="0" readonly>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </section>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                let sum = 0;
                $('select[id^="kriteria"]')
                    .each(function() {
                        sum += Number($(this).val());
                    });
                $('#total-nilai').val(sum);
                let total = 100;
                let p = predikat(sum / total * 100);
                $('#predikat-nilai').val(p);
                $('select[id^="kriteria"]').trigger('change');
                $('select[id^="kriteria"]').on('change', function() {
                    let sum = 0;
                    $('select[id^="kriteria"]')
                        .each(function() {
                            sum += Number($(this).val());
                        });
                    $('#total-nilai').val(sum);
                    let total = 100;
                    let p = predikat(sum / total * 100);
                    $('#predikat-nilai').val(p);

                    let sumKom = 0;
                    $('select[id^="kriteria[' + $(this).data('komponen') + ']"]')
                        .each(function() {
                            sumKom += Number($(this).val());
                        });
                    $('#komponen' + $(this).data('komponen')).text(sumKom);
                    $('input[name="komponen[' + $(this).data('komponen') + '][total_bobot]"]').val(sumKom);
                    let sumSub = 0;
                    $('select[id^="kriteria[' + $(this).data('komponen') + '][' + $(this).data('sub-komponen') +
                            ']"]')
                        .each(function() {
                            sumSub += Number($(this).val());
                        });
                    $('#sub_komponen' + $(this).data('sub-komponen')).text(sumSub);
                    $('input[name="sub_komponen[' + $(this).data('sub-komponen') + '][total_bobot]"]').val(
                        sumSub);
                });

                function predikat(nilai) {
                    let predikat;
                    if (nilai == 0) {
                        predikat = 'E';
                    } else if (nilai <= 30) {
                        predikat = 'D';
                    } else if (nilai <= 50) {
                        predikat = 'C';
                    } else if (nilai <= 60) {
                        predikat = 'CC';
                    } else if (nilai <= 70) {
                        predikat = 'B';
                    } else if (nilai <= 80) {
                        predikat = 'BB';
                    } else if (nilai <= 90) {
                        predikat = 'A';
                    } else if (nilai <= 100) {
                        predikat = 'AA';
                    };
                    return predikat;
                }
            })
        </script>
    @endpush
@endsection
