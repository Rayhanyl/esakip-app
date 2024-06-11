@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Edit Sasaran Bupati</h3>
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
                <form action="{{ route('pemkab.perencanaan-kinerja.update', $sasaranBupati->id) }}"
                    enctype="multipart/form-data" method="POST">
                    @method('put')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Sasaran Bupati</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <x-admin.form.select col="col-12 col-lg-4" label="Tahun" name="tahun" :lists="$tahun_options"
                                    value="{{ $sasaranBupati->tahun }}" />
                                <x-admin.form.text col="col-12 col-lg-4" label="Sasaran Bupati" name="sasaran_bupati"
                                    value="{{ $sasaranBupati->sasaran_bupati }}" />
                                <x-admin.form.select col="col-12 col-lg-4" label="Pengampu" name="pengampu_id"
                                    :lists="$user_options" readonly="true" />
                                <input type="hidden" name="pengampu_id" value="1">
                            </div>
                        </div>
                    </div>

                    <div id="row-indikator-sasaran-bupati">
                        @foreach ($sasaranBupati->sasaran_bupati_indikators as $indikator)
                            <div class="col-indikator-sasaran-bupati mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12 d-flex justify-content-between my-3">
                                                <h6>Indikator Sasaran Bupati</h6>
                                                @if ($loop->iteration == 1)
                                                    <button class="btn btn-primary btn-add-indicator"
                                                        type="button">Tambah</button>
                                                @else
                                                    <button class="btn btn-danger btn-remove-indicator"
                                                        type="button">Hapus</button>
                                                @endif
                                            </div>
                                            <hr>
                                            <x-admin.form.text label="Indikator Sasaran Bupati"
                                                name="indikator_sasaran_bupati[{{ $indikator->id }}][indikator_sasaran_bupati]"
                                                value="{{ $indikator->indikator_sasaran_bupati }}" />
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="fw-bold">Target</label>
                                                    </div>
                                                    <x-admin.form.text col="col-4" label="2024"
                                                        name="indikator_sasaran_bupati[{{ $indikator->id }}][target1]"
                                                        decimal="true" type="text" classinput="label-target-1"
                                                        value="{{ $indikator->target1 }}" />
                                                    <x-admin.form.text col="col-4" label="2025"
                                                        name="indikator_sasaran_bupati[{{ $indikator->id }}][target2]"
                                                        decimal="true" type="text" classinput="label-target-2"
                                                        value="{{ $indikator->target2 }}" />
                                                    <x-admin.form.text col="col-4" label="2026"
                                                        name="indikator_sasaran_bupati[{{ $indikator->id }}][target3]"
                                                        decimal="true" type="text" classinput="label-target-3"
                                                        value="{{ $indikator->target3 }}" />
                                                </div>
                                            </div>
                                            <x-admin.form.select col="col-12 col-lg-6" label="Satuan"
                                                name="indikator_sasaran_bupati[{{ $indikator->id }}][satuan_id]"
                                                :lists="$satuan_options" value="{{ $indikator->satuan_id }}" />
                                            <x-admin.form.text col="col-12 col-lg-6" label="Penjelasan"
                                                name="indikator_sasaran_bupati[{{ $indikator->id }}][penjelasan]"
                                                value="{{ $indikator->penjelasan }}" />
                                            <x-admin.form.select col="col-12 col-lg-6" label="Tipe Perhitungan"
                                                name="indikator_sasaran_bupati[{{ $indikator->id }}][tipe_perhitungan]"
                                                :lists="$tipe_perhitungan_options" value="{{ $indikator->tipe_perhitungan }}" />
                                            <x-admin.form.text col="col-12 col-lg-6" label="Sumber Data"
                                                name="indikator_sasaran_bupati[{{ $indikator->id }}][sumber_data]"
                                                value="{{ $indikator->sumber_data }}" />
                                            <div class="col-12" id="col-penanggung-jawab{{ $indikator->id }}">
                                                @foreach ($indikator->sasaran_penanggung_jawabs as $jawab)
                                                    <div class="row row-penanggung-jawab">
                                                        <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                                            name="indikator_sasaran_bupati[{{ $indikator->id }}][penanggung_jawab][{{ $jawab->id }}]"
                                                            placeholder="Penanggung Jawab"
                                                            value="{{ $jawab->penanggung_jawab }}" />
                                                        <div class="col-1">
                                                            <label for="" class="form-label fw-bold">&nbsp;</label>
                                                            <div>
                                                                @if ($loop->iteration == 1)
                                                                    <button class="btn btn-success btn-add-penanggung-jawab"
                                                                        type="button" data-id="{{ $indikator->id }}">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        class="btn btn-danger btn-remove-penanggung-jawab"
                                                                        type="button">
                                                                        <i class="bi bi-dash"></i>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-12" id="col-simple-action{{ $indikator->id }}">
                                                @foreach ($indikator->simple_actions as $simple)
                                                    <div class="row row-simple-action">
                                                        <x-admin.form.text col="col-11" label="Simple Action"
                                                            name="indikator_sasaran_bupati[{{ $indikator->id }}][simple_action][{{ $simple->id }}]"
                                                            placeholder="Simple Action"
                                                            value="{{ $simple->simple_action }}" />
                                                        <div class="col-1">
                                                            <label for=""
                                                                class="form-label fw-bold">&nbsp;</label>
                                                            <div>
                                                                @if ($loop->iteration == 1)
                                                                    <button class="btn btn-success btn-add-simple-action"
                                                                        type="button" data-id="{{ $indikator->id }}">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                @else
                                                                    <button class="btn btn-danger btn-remove-simple-action"
                                                                        type="button">
                                                                        <i class="bi bi-dash"></i>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="card">
                        <div class="card-footer">
                            <button class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>

                </form>
            </section>
        </div>
    </div>

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#id-tahun').on('select2:select', function() {
                    $('.label-target-1').html($(this).val());
                    $('.label-target-2').html(parseInt($(this).val()) + 1);
                    $('.label-target-3').html(parseInt($(this).val()) + 2);
                })

                $(document).on('click', '.btn-remove-indicator', function() {
                    $(this).parents('.col-indikator-sasaran-bupati').remove();
                });
                $(document).on('click', '.btn-remove-simple-action', function() {
                    $(this).parents('.row-simple-action').remove();
                });
                $(document).on('click', '.btn-remove-penanggung-jawab', function() {
                    $(this).parents('.row-penanggung-jawab').remove();
                });

                let iter = {{ count($sasaranBupati->sasaran_bupati_indikators) }} ?? 1;
                $('.btn-add-indicator').on('click', function() {
                    iter++;
                    let tahun = $('#id-tahun').val();
                    $.ajax({
                        url: "{{ route('pemkab.perencanaan-kinerja.indicator') }}",
                        data: {
                            iter,
                            tahun
                        },
                        success: function(result) {
                            $('#row-indikator-sasaran-bupati').append(result);
                        }
                    });
                })
                $(document).on('click', '.btn-add-simple-action', function() {
                    const iter = $(this).data('id');
                    $.ajax({
                        url: "{{ route('pemkab.perencanaan-kinerja.simple-action') }}",
                        data: {
                            iter
                        },
                        success: function(result) {
                            $(`#col-simple-action${iter}`).append(result);
                        }
                    });
                });
                $(document).on('click', '.btn-add-penanggung-jawab', function() {
                    const iter = $(this).data('id');
                    $.ajax({
                        url: "{{ route('pemkab.perencanaan-kinerja.penanggung-jawab') }}",
                        data: {
                            iter
                        },
                        success: function(result) {
                            $(`#col-penanggung-jawab${iter}`).append(result);
                        }
                    });
                });

            });
        </script>
    @endpush
@endsection
