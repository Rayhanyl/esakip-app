@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Evaluasi Internal</h3>
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
                        <form action="{{ route('admin.inspek.evaluasi-internal.index') }}" method="get">
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
                @if (count($inspek_evaluasi_internal) > 0)
                    <form action="{{ route('admin.inspek.evaluasi-internal.update', $inspek_evaluasi_internal[0]->id) }}"
                        method="post">
                        @method('put')
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Evaluasi Internal</h4>
                                <x-admin.form.text col="12" label="No Surat" name="no_surat"
                                    placeholder="Masukan No Surat" value="{{ $inspek_evaluasi_internal[0]->no_surat }}" />
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data-table-evaluasi-internal">
                                        <thead class="table-info">
                                            <tr>
                                                <th>No</th>
                                                <th>Komponen/Sub Komponen/Kriteria</th>
                                                <th width="10%">Bobot</th>
                                                <th width="15%">Nilai</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($inspek_evaluasi_internal[0]->komponens as $item)
                                                <tr class="font-weight-bold bg-primary text-white">
                                                    <td>{{ $item->no }}</td>
                                                    <td>{{ $item->komponen }}</td>
                                                    <td>

                                                        <input type="hidden" class="input-nilai"
                                                            name="komponen[{{ $item->id }}][nilai]"
                                                            value="{{ $item->nilai }}">
                                                        <span id="komponen{{ $item->id }}nilai">
                                                            {{ $item->nilai }}
                                                        </span> /
                                                        {{ $item->bobot }}
                                                    </td>
                                                    <td class="d-flex justify-content-between row-action">
                                                        <input type="hidden" name="komponen[{{ $item->id }}][catatan]"
                                                            value="{{ $item->catatan }}" class="input-catatan">
                                                        <button type="button"
                                                            class="btn btn-sm {{ $item->catatan == '' ? 'btn-light' : 'btn-info' }} btn-catatan">
                                                            <i class="bi bi-card-text"></i> Catatan
                                                        </button>
                                                        <input type="hidden" class="input-rekomendasi"
                                                            name="komponen[{{ $item->id }}][rekomendasi]"
                                                            value="{{ $item->rekomendasi }}">
                                                        <button type="button"
                                                            class="btn btn-sm {{ $item->rekomendasi == '' ? 'btn-light' : 'btn-info' }} btn-rekomendasi">
                                                            <i class="bi bi-info-square"></i> Rekomendasi
                                                        </button>
                                                    </td>
                                                </tr>
                                                @foreach ($item->sub_komponens as $sub_komponen)
                                                    <tr class="font-weight-bold">
                                                        <td>{{ $sub_komponen->no }}</td>
                                                        <td>{{ $sub_komponen->sub_komponen }}</td>
                                                        <td>{{ $sub_komponen->bobot }}</td>
                                                        <td>
                                                            <input type="text"
                                                                id="sub_komponen[{{ $item->id }}][{{ $sub_komponen->id }}][nilai]"
                                                                name="sub_komponen[{{ $sub_komponen->id }}][nilai]"min="0"
                                                                max="{{ $sub_komponen->bobot }}"
                                                                class="form-control input-bobot decimal-input"
                                                                value="{{ $sub_komponen->nilai }}"
                                                                data-komponen="{{ $item->id }}"
                                                                data-sub-komponen="{{ $sub_komponen->id }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                </td>
                                                <td class="text-end">
                                                    Nilai Akuntabilitas Kinerja :
                                                </td>
                                                <td colspan="1"
                                                    class="d-flex justify-content-center align-items-center gap-1">
                                                    <div class="input-group">
                                                        <input type="number" name="total_nilai" id="total-nilai"
                                                            class="form-control"
                                                            value="{{ $inspek_evaluasi_internal[0]->nilai_akuntabilitas_kinerja ?? 0 }}"
                                                            readonly>
                                                    </div>
                                                    <input type="hidden" name="total_bobot" id="total-bobot"
                                                        class="form-control" value="{{ $total }}" readonly disabled>
                                                </td>
                                                <td colspan="1" rowspan="2">
                                                    <button class="btn btn-success btn-lg">
                                                        <i class="bi bi-save"></i>
                                                        Submit
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="1" class="text-end">
                                                    Predikat :
                                                </td>
                                                <td colspan="1">
                                                    <input type="text" name="predikat_nilai" id="predikat-nilai"
                                                        class="form-control"
                                                        value="{{ $inspek_evaluasi_internal[0]->predikat ?? '-' }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </section>
        </div>
    </div>
    @include('admin.inspek.evaluasi_internal._partials.modal-input-catatan')
    @include('admin.inspek.evaluasi_internal._partials.modal-input-rekomendasi')
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.text-catatan').summernote({
                    tabsize: 2,
                    height: 400
                });
                $('.text-rekomendasi').summernote({
                    tabsize: 2,
                    height: 400
                });
                $('.input-bobot').on('keyup', function() {
                    let sumKom = 0;
                    $('input[id^="sub_komponen[' + $(this).data('komponen') + ']"]')
                        .each(function() {
                            sumKom += Number($(this).val());
                        });
                    let komponen = $(this).data('komponen');
                    $(`#komponen${komponen}nilai`).text(sumKom);
                    $('input[name="komponen[' + komponen + '][nilai]"]').val(sumKom);
                    if (parseFloat($(this).val()) > parseFloat($(this).attr('max'))) {
                        $(this).val($(this).attr('max'));
                    }
                    let sum = 0;
                    let total = {{ $total ?? 0 }};
                    $(".input-bobot").each(function() {
                        sum = parseFloat(sum) + (parseFloat($(this).val()) || 0);
                    });
                    $('#total-nilai').val(sum);
                    let p = predikat(sum / total * 100);
                    $('#predikat-nilai').val(p);
                })

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

                let activeCatatan;
                let activeButtonCatatan;
                let activeRekomendasi;
                let activeButtonRekomendasi;
                $('.btn-catatan').on('click', function() {
                    activeCatatan = $(this).closest('.row-action').find('.input-catatan');
                    activeButtonCatatan = $(this);
                    $('.text-catatan').summernote("code", activeCatatan.val());
                    $('#inputCatatanModal').modal('show');
                })
                $('.btn-save-catatan').on('click', function() {
                    activeCatatan.val($('.text-catatan').val());
                    if ($('.text-catatan').val() !== '') {
                        activeButtonCatatan.addClass('btn-info').removeClass('btn-light');
                    } else {
                        activeButtonCatatan.addClass('btn-light').removeClass('btn-info');
                    }
                    $('.text-catatan').summernote('reset');
                    $('#inputCatatanModal').modal('hide');
                })
                $('.btn-rekomendasi').on('click', function() {
                    activeRekomendasi = $(this).closest('.row-action').find('.input-rekomendasi');
                    activeButtonRekomendasi = $(this);
                    $('.text-rekomendasi').summernote("code", activeRekomendasi.val());
                    $('#inputRekomendasiModal').modal('show');
                })
                $('.btn-save-rekomendasi').on('click', function() {
                    activeRekomendasi.val($('.text-rekomendasi').val());
                    if ($('.text-rekomendasi').val() !== '') {
                        activeButtonRekomendasi.addClass('btn-info').removeClass('btn-light');
                    } else {
                        activeButtonRekomendasi.addClass('btn-light').removeClass('btn-info');
                    }
                    $('.text-rekomendasi').summernote('reset');
                    $('#inputRekomendasiModal').modal('hide');
                })
            })
        </script>
    @endpush
@endsection
