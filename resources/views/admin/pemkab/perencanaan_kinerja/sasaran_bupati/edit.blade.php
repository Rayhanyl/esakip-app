@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row g-4">
                    <div class="col-12">
                        <a href="{{ route('pemkab.perencanaan-kinerja.index') }}" class="text-subtitle text-muted">
                            <i class="bi bi-arrow-left-circle"></i> Back to Sasaran Bupati
                        </a>
                    </div>
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Edit Sasaran Bupati</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pemkab.perencanaan-kinerja.index') }}">Sasaran Bupati</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Sasaran Bupati
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <form action="{{ route('pemkab.perencanaan-kinerja.update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Sasaran Bupati</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <label for="tahun" class="form-label fw-bold">Tahun</label>
                                    <select class="form-select select2" id="tahun" name="tahun">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <x-admin.form.text col="col-12 col-lg-4" label="Sasaran Bupati" name="sasaran_bupati" />
                                <div class="col-12 col-lg-4">
                                    <label for="pengampu" class="form-label fw-bold">Pengampu</label>
                                    <select class="form-select select2" name="pengampu_id" id="pengampu_id">
                                        <option value="" selected disabled>--Pilih Pengampu--</option>
                                        @foreach ($user_options ?? [] as $id => $user)
                                            <option value="{{ $id }}">{{ $user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="row-indikator-sasaran-bupati">
                        <div class="col-indikator-sasaran-bupati mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12 d-flex justify-content-between my-3">
                                            <h6>Indikator Sasaran Bupati</h6>
                                            <button class="btn btn-primary btn-add-indicator" type="button">Tambah</button>
                                        </div>
                                        <hr>
                                        <x-admin.form.text label="Indikator Sasaran Bupati"
                                            name="indikator_sasaran_bupati[1][indikator_sasaran_bupati]" />
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="fw-bold">Target</label>
                                                </div>
                                                <x-admin.form.text col="col-4" label="2024"
                                                    name="indikator_sasaran_bupati[1][target1]" type="number" />
                                                <x-admin.form.text col="col-4" label="2025"
                                                    name="indikator_sasaran_bupati[1][target2]" type="number" />
                                                <x-admin.form.text col="col-4" label="2026"
                                                    name="indikator_sasaran_bupati[1][target3]" type="number" />
                                            </div>
                                        </div>
                                        <x-admin.form.text col="col-12 col-lg-6" label="Satuan"
                                            name="indikator_sasaran_bupati[1][satuan]" />
                                        <x-admin.form.text col="col-12 col-lg-6" label="Penjelasan"
                                            name="indikator_sasaran_bupati[1][penjelasan]" />
                                        <div class="col-12 col-lg-6">
                                            <label for="indikator_sasaran_bupati[1][tipe_perhitungan]"
                                                class="form-label fw-bold">
                                                Tipe Perhitungan
                                            </label>
                                            <select class="form-select"
                                                name="indikator_sasaran_bupati[1][tipe_perhitungan]">
                                                <option value="-" selected disabled>- Pilih Tipe Perhitungan -</option>
                                                <option value="1">Kumulatif</option>
                                                <option value="2">Non-Kumulatif</option>
                                            </select>
                                        </div>
                                        <x-admin.form.text col="col-12 col-lg-6" label="Sumber Data"
                                            name="indikator_sasaran_bupati[1][sumber_data]" />
                                        <x-admin.form.text col="col-12 col-lg-6" label="Penanggung Jawab"
                                            name="indikator_sasaran_bupati[1][penanggung_jawab]" />
                                        <x-admin.form.text col="col-12 col-lg-6" label="Simple Action"
                                            name="indikator_sasaran_bupati[1][simple_action]" />
                                    </div>
                                </div>
                            </div>
                        </div>
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
                $('#select-tahun').select2({
                    theme: 'bootstrap-5'
                });

                $('.delete-sasaran-bupati').click(function() {
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

                $(document).on('click', '.btn-add-simple-action', function() {
                    const i = $(this).data('id');
                    add_simple_action(i);
                });

                $(document).on('click', '.btn-remove-simple-action', function() {
                    remove_simple_action($(this));
                });

                function remove_simple_action(el) {
                    el.parents('.row-simple-action').remove();
                }

                function add_simple_action(iter) {
                    $.ajax({
                        url: "{{ route('pemkab.perencanaan-kinerja.simple-action') }}",
                        data: {
                            iter
                        },
                        success: function(result) {
                            $(`#col-simple-action${iter}`).append(result);
                        }
                    });
                }

                function remove_indicator(el) {
                    el.parents('.col-indikator-sasaran-bupati').remove();
                }

                function add_indicator(iter, tahun) {
                    $.ajax({
                        url: "{{ route('pemkab.perencanaan-kinerja.indicator') }}",
                        data: {
                            iter,
                            tahun
                        },
                        success: function(result) {
                            $('#row-indikator-sasaran-bupati').append(result);
                            decimalInput();
                            idrCurrency();
                            $('.select2').select2({
                                theme: 'bootstrap-5'
                            });
                        }
                    });
                }

                decimalInput();
                idrCurrency();
            });

            function decimalInput() {
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
            }

            function idrCurrency() {
                // Initialize Inputmask for currency input in IDR format
                $('.idr-currency').inputmask('numeric', {
                    radixPoint: ',', // Decimal separator
                    groupSeparator: '.', // Thousand separator
                    alias: 'numeric',
                    digits: 0,
                    autoGroup: true,
                    autoUnmask: true,
                    prefix: 'Rp ', // IDR currency symbol
                    rightAlign: false,
                    removeMaskOnSubmit: true // Remove mask when form submitted
                });
            }
        </script>
    @endpush
@endsection
