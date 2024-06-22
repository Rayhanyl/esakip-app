@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Evaluasi Internal</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <form class="row g-3" action="{{ route('admin.perda.evaluasi-internal.index') }}" method="GET"
                    enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <h6>Tahun</h6>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="tahun">
                                                <option value="" selected>- Pilih Tahun -</option>
                                                @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ app('request')->input('tahun') == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @if ($perda_evaluasi_internal)
                    <div class="card">
                        <div class="card-header">
                            @switch($status)
                                @case('new')
                                    <h3 class="text-primary">Data Evaluasi Internal dapat diisi.</h3>
                                @break

                                @case('submit')
                                    <h3 class="text-warning">Data Evaluasi Internal telah disubmit.</h3>
                                @break

                                @case('complete')
                                    <h3 class="text-success">Data Evaluasi Internal telah dinilai.</h3>
                                @break

                                @default
                            @endswitch
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-info">
                                        <tr>
                                            <th>No</th>
                                            <th></th>
                                            <th></th>
                                            <th>Komponen/Sub Komponen/Kriteria</th>
                                            <th width="20%">Keterangan</th>
                                            <th>Eviden</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form
                                            action="{{ route('admin.perda.evaluasi-internal.update', $perda_evaluasi_internal->id ?? 0) }}"
                                            method="post" id="form_perda_evaluasi_internal" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            @foreach ($perda_evaluasi_internal->komponens as $komponen)
                                                <tr>
                                                    <td class="bg-info fw-bold text-light" colspan="1">
                                                        {{ $komponen->no }}</td>
                                                    <td class="bg-info fw-bold text-light" colspan="1"></td>
                                                    <td class="bg-info fw-bold text-light" colspan="4">
                                                        {{ $komponen->komponen }}
                                                        <input type="hidden"
                                                            name="komponen[{{ $komponen->id }}][total_bobot]">
                                                    </td>
                                                </tr>
                                                @foreach ($komponen->sub_komponens as $sub_komponen)
                                                    <tr>
                                                        <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                                        <td class="bg-secondary fw-bold text-light" colspan="1">
                                                            {{ $sub_komponen->no }}
                                                        </td>
                                                        <td class="bg-secondary fw-bold text-light" colspan="4">
                                                            {{ $sub_komponen->sub_komponen }}
                                                            <input type="hidden"
                                                                name="sub_komponen[{{ $sub_komponen->id }}][total_bobot]">
                                                        </td>
                                                    </tr>
                                                    @foreach ($sub_komponen->kriterias as $kriteria)
                                                        <tr>
                                                            <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                                            <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                                            <td class="bg-secondary fw-bold text-light" colspan="1">
                                                                {{ $kriteria->no }}
                                                            </td>
                                                            <td class="bg-secondary fw-bold text-light" colspan="1">
                                                                {{ $kriteria->kriteria }}
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-select-sm"
                                                                    name="kriteria[{{ $kriteria->id }}][status]"
                                                                    id="kriteria[{{ $komponen->id }}][{{ $sub_komponen->id }}][{{ $kriteria->id }}][status]"
                                                                    data-komponen="{{ $komponen->id }}"
                                                                    data-sub-komponen="{{ $sub_komponen->id }}"
                                                                    data-kriteria="{{ $kriteria->id }}"
                                                                    {{ in_array($status, ['complete']) ? 'disabled' : '' }}>
                                                                    @foreach ($kriteria->answers as $answer)
                                                                        <option
                                                                            value="
                                                                        {{ $answer->bobot }}"
                                                                            {{ $kriteria->status == $answer->bobot ? 'selected' : '' }}>
                                                                            {{ $answer->jawaban }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    @if (!in_array($status, ['complete']))
                                                                        <input class="form-control form-control-sm"
                                                                            type="file"
                                                                            name="kriteria[{{ $kriteria->id }}][upload]">
                                                                    @endif
                                                                    @if ($kriteria->upload)
                                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Download File Kriteria"
                                                                            class="btn btn-success btn-sm"
                                                                            href="{{ route('admin.perda.evaluasi-internal.download', $kriteria->upload) }}">
                                                                            <i
                                                                                class="bi bi-file-earmark-arrow-down-fill"></i>
                                                                            Download
                                                                        </a>
                                                                    @endif
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            <input type="hidden" name="total-nilai" id="total-nilai" value="">
                                            <input type="hidden" name="predikat-nilai" id="predikat-nilai" value="">
                                        </form>
                                    </tbody>
                                    <tfoot>
                                        @if (!in_array($status, ['complete']))
                                            <td colspan="6" class="text-end">
                                                <button class="btn btn-primary btn-lg" type="submit"
                                                    form="form_perda_evaluasi_internal">Submit</button>
                                            </td>
                                        @endif
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </section>
        </div>
    </div>

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script>
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
                console.log(nilai, predikat);
                return predikat;
            }
        </script>
    @endpush
@endsection
