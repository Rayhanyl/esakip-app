@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Sasaran Strategis</h3>
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
                <form class="row g-3"
                    action="{{ route('perda.perencanaan-kinerja.sasaran-strategis.update', $sasaranStrategis->id) }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sasaran Strategis</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <x-admin.form.select col="12 col-lg-6" label="Tahun" name="tahun"
                                    value="{{ $sasaranStrategis->tahun }}" :lists="$tahun_options" />
                                <x-admin.form.select col="12 col-lg-6" label="Sasaran Bupati" name="sasaran_bupati_id"
                                    value="{{ $sasaranStrategis->sasaran_bupati_id }}" :lists="$sasaran_bupati_options" />
                                <x-admin.form.select col="12 col-lg-6" label="Pengampu" name="sasaran_pengampu_id"
                                    value="{{ $sasaranStrategis->sasaran_pengampu_id }}" :lists="$pengampu_sementara" />
                                <x-admin.form.text col="12 col-lg-6" label="Sasaran Strategis" name="sasaran_strategis"
                                    value="{{ $sasaranStrategis->sasaran_strategis }}" />
                            </div>
                        </div>
                    </div>
                    <div id="row-indikator-sasaran-bupati">
                        @foreach ($sasaranStrategis->indikators as $indikator)
                            <div class="col-indikator-sasaran-bupati mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-between my-3">
                                                <h6>Indikator Sasaran Strategis</h6>
                                                @if ($loop->iteration == 1)
                                                    <button class="btn btn-primary btn-add-indicator"
                                                        type="button">Tambah</button>
                                                @else
                                                    <button class="btn btn-danger btn-remove-indicator"
                                                        type="button">Hapus</button>
                                                @endif
                                            </div>
                                            <hr>
                                            <x-admin.form.text col="12" label="Indikator Sasaran"
                                                name="indikator_sasaran[{{ $indikator->id }}][indikator_sasaran_strategis]"
                                                value="{{ $indikator->indikator_sasaran_strategis }}" />
                                            <div class="col-12 row my-3">
                                                <label for="#" class="form-label fw-bold">Target</label>
                                                <x-admin.form.text col="12 col-lg-4" label="{{ $sasaranStrategis->tahun }}"
                                                    name="indikator_sasaran[{{ $indikator->id }}][target1]"
                                                    value="{{ $indikator->target1 }}" decimal=true />
                                                <x-admin.form.text col="12 col-lg-4"
                                                    label="{{ $sasaranStrategis->tahun + 1 }}"
                                                    name="indikator_sasaran[{{ $indikator->id }}][target2]"
                                                    value="{{ $indikator->target2 }}" decimal=true />
                                                <x-admin.form.text col="12 col-lg-4"
                                                    label="{{ $sasaranStrategis->tahun + 2 }}"
                                                    name="indikator_sasaran[{{ $indikator->id }}][target3]"
                                                    value="{{ $indikator->target3 }}" decimal=true />
                                            </div>
                                            <x-admin.form.select col="12 col-lg-6" label="Satuan"
                                                name="indikator_sasaran[{{ $indikator->id }}][satuan_id]"
                                                value="{{ $indikator->satuan_id }}" :lists="$satuan_options" />
                                            <x-admin.form.text col="12 col-lg-4" label="Penjelasan"
                                                name="indikator_sasaran[{{ $indikator->id }}][penjelasan]"
                                                value="{{ $indikator->penjelasan }}" />
                                            <x-admin.form.select col="12 col-lg-6" label="Tipe Perhitungan"
                                                name="indikator_sasaran[{{ $indikator->id }}][tipe_perhitungan]"
                                                value="{{ $indikator->tipe_perhitungan }}" :lists="$tipe_perhitungan_options" />
                                            <x-admin.form.text col="12 col-lg-6" label="Sumber data"
                                                name="indikator_sasaran[{{ $indikator->id }}][sumber_data]"
                                                value="{{ $indikator->sumber_data }}" />
                                            <div class="col-12" id="col-penanggung-jawab1">
                                                @foreach ($indikator->sasaran_penanggung_jawabs as $jawab)
                                                    <div class="row row-penanggung-jawab">
                                                        <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                                            name="indikator_sasaran[{{ $indikator->id }}][penanggung_jawab][{{ $jawab->id }}]"
                                                            placeholder="Penanggung Jawab"
                                                            value="{{ $jawab->penanggung_jawab }}" />
                                                        <div class="col-1">
                                                            <label for="" class="form-label fw-bold">&nbsp;</label>
                                                            <div>
                                                                @if ($loop->iteration == 1)
                                                                    <button class="btn btn-success btn-add-penanggung-jawab"
                                                                        type="button" data-id={{ $indikator->id }}">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        class="btn btn-danger btn-remove-penanggung-jawab"
                                                                        type="button" data-id={{ $indikator->id }}">
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
                        <div class="card-body">
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50">Submit</button>
                            </div>
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
                $('#select-tahun').select2({
                    theme: 'bootstrap-5'
                });
                $('.decimal-input').inputmask({
                    alias: 'decimal',
                    groupSeparator: ',',
                    autoGroup: true,
                    digits: 2,
                    digitsOptional: false,
                    placeholder: '0',
                    rightAlign: false,
                    removeMaskOnSubmit: true
                });

                $('.delete-sasaran-strategis').click(function() {
                    var id = $(this).data('id');
                    var form = $('#delete-form-' + id);

                    // SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });

                let iter = 1;

                $('.btn-add-indicator').on('click', function() {
                    iter++;
                    let tahun = $('#select-tahun').val();
                    add_indicator(iter, tahun);
                })

                $('#select-tahun').on('select2:select', function() {
                    $('.label-target-1').html($(this).val());
                    $('.label-target-2').html(parseInt($(this).val()) + 1);
                    $('.label-target-3').html(parseInt($(this).val()) + 2);
                })

                $(document).on('click', '.btn-remove-indicator', function() {
                    remove_indicator($(this));
                });

                function remove_indicator(el) {
                    el.parents('.col-indikator-sasaran-bupati').remove();
                }

                function add_indicator(iter, tahun) {
                    $.ajax({
                        url: "{{ route('perda.perencanaan-kinerja.sasaran-strategis.indicator') }}",
                        data: {
                            iter,
                            tahun
                        },
                        success: function(result) {
                            $('#row-indikator-sasaran-bupati').append(result);
                        }
                    });
                }

                $(document).on('click', '.btn-add-penanggung-jawab', function() {
                    const i = $(this).data('id');
                    add_penanggung_jawab(i);
                });

                $(document).on('click', '.btn-remove-penanggung-jawab', function() {
                    remove_penanggung_jawab($(this));
                });

                function remove_penanggung_jawab(el) {
                    el.parents('.row-penanggung-jawab').remove();
                }

                function add_penanggung_jawab(iter) {
                    $.ajax({
                        url: "{{ route('perda.perencanaan-kinerja.sasaran-strategis.penanggung-jawab') }}",
                        data: {
                            iter
                        },
                        success: function(result) {
                            $(`#col-penanggung-jawab${iter}`).append(result);
                        }
                    });
                }

            });
        </script>
    @endpush
@endsection
