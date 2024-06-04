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
                        <form action="{{ route('inspek.evaluasi-internal.index') }}" method="get">
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Evaluasi Internal</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="data-table-evaluasi-internal">
                                <thead class="table-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Komponen/Sub Komponen/Kriteria</th>
                                        <th>Bobot</th>
                                        <th width="15%">Nilai</th>
                                    </tr>
                                </thead>
                                <form action="{{ route('inspek.evaluasi-internal.update') }}" method="post">
                                    @method('put')
                                    @csrf
                                    <tbody>
                                        @foreach ($inspek_evaluasi_internal[0]->komponens as $item)
                                            <tr class="font-weight-bold bg-primary text-white">
                                                <td>{{ $item->no }}</td>
                                                <td>{{ $item->komponen }}</td>
                                                <td>{{ $item->bobot }}</td>
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
                                                        <input type="number"
                                                            name="sub_komponen[{{ $sub_komponen->id }}][nilai]"
                                                            id="" min="0" max="{{ $sub_komponen->bobot }}"
                                                            class="form-control input-bobot"
                                                            value="{{ $sub_komponen->nilai }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <td colspan="6">
                                            <button class="btn btn-success float-end btn-lg">
                                                <i class="bi bi-save"></i>
                                                Submit
                                            </button>
                                        </td>
                                    </tfoot>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('admin.inspek.evaluasi_internal._partials.modal-input-catatan')
    @include('admin.inspek.evaluasi_internal._partials.modal-input-rekomendasi')
    @push('scripts')
        <script>
            $('.input-bobot').on('keyup', function() {
                if (parseInt($(this).val()) > parseInt($(this).attr('max'))) {
                    $(this).val($(this).attr('max'));
                }
            })
            let activeCatatan;
            let activeButtonCatatan;
            let activeRekomendasi;
            let activeButtonRekomendasi;
            $('.btn-catatan').on('click', function() {
                activeCatatan = $(this).closest('.row-action').find('.input-catatan');
                activeButtonCatatan = $(this);
                $('.text-catatan').val(activeCatatan.val());
                $('#inputCatatanModal').modal('show');
            })
            $('.btn-save-catatan').on('click', function() {
                activeCatatan.val($('.text-catatan').val());
                if ($('.text-catatan').val() !== '') {
                    activeButtonCatatan.addClass('btn-info').removeClass('btn-light');
                } else {
                    activeButtonCatatan.addClass('btn-light').removeClass('btn-info');
                }
                $('.text-catatan').val('');
                $('#inputCatatanModal').modal('hide');
            })
            $('.btn-rekomendasi').on('click', function() {
                activeRekomendasi = $(this).closest('.row-action').find('.input-rekomendasi');
                activeButtonRekomendasi = $(this);
                $('.text-rekomendasi').val(activeRekomendasi.val());
                $('#inputRekomendasiModal').modal('show');
            })
            $('.btn-save-rekomendasi').on('click', function() {
                activeRekomendasi.val($('.text-rekomendasi').val());
                if ($('.text-rekomendasi').val() !== '') {
                    activeButtonRekomendasi.addClass('btn-info').removeClass('btn-light');
                } else {
                    activeButtonRekomendasi.addClass('btn-light').removeClass('btn-info');
                }
                $('.text-rekomendasi').val('');
                $('#inputRekomendasiModal').modal('hide');
            })
        </script>
    @endpush
@endsection
