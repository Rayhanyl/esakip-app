@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Sasaran Bupati</h3>
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
                <form action="{{ route('pemkab.perencanaan-kinerja.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Sasaran Bupati</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <label for="tahun" class="form-label fw-bold">Tahun</label>
                                    <select class="form-select select2" id="select-tahun" name="tahun">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                            <option value="{{ $i }}" {{ date('Y') == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <x-admin.form.text col="col-12 col-lg-4" label="Sasaran Bupati" name="sasaran_bupati" />
                                {{-- <div class="col-12 col-lg-4">
                                    <label for="pengampu" class="form-label fw-bold">Pengampu</label>
                                    <input type="text" class="form-control" name="pengampu" value="Bupati" readonly>
                                </div> --}}
                                <x-admin.form.select col="col-12 col-lg-4" label="Pengampu" name="pengampu_id"
                                    :lists="$user_options" readonly="true" />
                                <input type="hidden" name="pengampu_id" value="1">
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
                                                    name="indikator_sasaran_bupati[1][target1]" decimal="true"
                                                    type="text" classinput="label-target-1" />
                                                <x-admin.form.text col="col-4" label="2025"
                                                    name="indikator_sasaran_bupati[1][target2]" decimal="true"
                                                    type="text" classinput="label-target-2" />
                                                <x-admin.form.text col="col-4" label="2026"
                                                    name="indikator_sasaran_bupati[1][target3]" decimal="true"
                                                    type="text" classinput="label-target-3" />
                                            </div>
                                        </div>
                                        <x-admin.form.select col="col-12 col-lg-6" label="Satuan"
                                            name="indikator_sasaran_bupati[1][satuan_id]" :lists="$satuan_options" />
                                        <x-admin.form.text col="col-12 col-lg-6" label="Penjelasan"
                                            name="indikator_sasaran_bupati[1][penjelasan]" />
                                        <x-admin.form.select col="col-12 col-lg-6" label="Tipe Perhitungan"
                                            name="indikator_sasaran_bupati[1][tipe_perhitungan]" :lists="$tipe_perhitungan_options" />
                                        <x-admin.form.text col="col-12 col-lg-6" label="Sumber Data"
                                            name="indikator_sasaran_bupati[1][sumber_data]" />
                                        <div class="col-12" id="col-penanggung-jawab1">
                                            <div class="row row-penanggung-jawab">
                                                <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                                    name="indikator_sasaran_bupati[1][penanggung_jawab][]"
                                                    placeholder="Penanggung Jawab" />
                                                <div class="col-1">
                                                    <label for="" class="form-label fw-bold">&nbsp;</label>
                                                    <div>
                                                        <button class="btn btn-success btn-add-penanggung-jawab"
                                                            type="button" data-id="1">
                                                            <i class="bi bi-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" id="col-simple-action1">
                                            <div class="row row-simple-action">
                                                <x-admin.form.text col="col-11" label="Simple Action"
                                                    name="indikator_sasaran_bupati[1][simple_action][]"
                                                    placeholder="Simple Action" />
                                                <div class="col-1">
                                                    <label for="" class="form-label fw-bold">&nbsp;</label>
                                                    <div>
                                                        <button class="btn btn-success btn-add-simple-action"
                                                            type="button" data-id="1">
                                                            <i class="bi bi-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Sasaran Strategis</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="data-table-pemkab-sasaran-bupati">
                                <thead class="table-info">
                                    <tr>
                                        <th class="text-center">Sasaran Bupati</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sasaran_bupati ?? [] as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->sasaran_bupati }}</td>
                                            <td class="text-center">{{ $item->tahun }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Sasaran Bupati" class="btn btn-warning btn-sm"
                                                            href="{{ route('pemkab.perencanaan-kinerja.edit', $item->id) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-danger btn-sm delete-sasaran-bupati"
                                                            data-id="{{ $item->id }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Sasaran Bupati">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('pemkab.perencanaan-kinerja.destroy', $item->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                $('#data-table-pemkab-sasaran-bupati').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
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
                        url: "{{ route('pemkab.perencanaan-kinerja.penanggung-jawab') }}",
                        data: {
                            iter
                        },
                        success: function(result) {
                            $(`#col-penanggung-jawab${iter}`).append(result);
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
