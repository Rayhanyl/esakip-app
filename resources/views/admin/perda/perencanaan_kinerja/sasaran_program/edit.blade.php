@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Sasaran Program</h3>
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
                    action="{{ route('perda.perencanaan-kinerja.sasaran-program.update', $sasaranProgram->id) }}"
                    enctype="multipart/form-data" method="POST">
                    @method('put')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sasaran Program</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12 col-lg-6 form-group">
                                    <h6>Tahun</h6>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="tahun">
                                            <option value="" selected>- Pilih Tahun -</option>
                                            @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                                <option value="{{ $i }}"
                                                    {{ $sasaranProgram->tahun == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <h6>Sasaran Strategis</h6>
                                    <fieldset class="form-group">
                                        <select class="form-select select2" id="sasaran_bupati" name="sasaran_strategis_id">
                                            <option value="" selected>- Pilih Sasaran Strategis -</option>
                                            @foreach ($sasaran_strategis_options ?? [] as $key => $item)
                                                <option value="{{ $key }}"> {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label for="pengampu" class="form-label">Pengampu</label>
                                    <select class="form-select select2" name="pengampu_id" id="get-data-pengampu">
                                        <option value="" selected disabled>--Pilih Pengampu--</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="pengampu" class="form-label">Sasaran Program</label>
                                    <input type="text" name="sasaran_program" class="form-control"
                                        aria-describedby="pengampu" value="{{ $sasaranProgram->sasaran_program }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="row-indikator-sasaran-bupati">
                        @foreach ($sasaranProgram->indikators as $indikator)
                            <div class="col-indikator-sasaran-bupati mt-3">
                                <input type="hidden" name="indikator_sasaran[{{ $indikator->id }}][id]"
                                    value="{{ $indikator->id }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-between my-3">
                                                <h6>Indikator Sasaran Program</h6>
                                                @if ($loop->iteration == 1)
                                                    <button class="btn btn-primary btn-add-indicator"
                                                        type="button">Tambah</button>
                                                @else
                                                    <button class="btn btn-danger btn-remove-indicator"
                                                        type="button">Hapus</button>
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="col-12 form-group">
                                                <label for="pengampu" class="form-label">Indikator Sasaran</label>
                                                <input type="text"
                                                    name="indikator_sasaran[{{ $indikator->id }}][indikator_sasaran_program]"
                                                    id="pengampu" class="form-control" aria-describedby="pengampu"
                                                    value="{{ $indikator->indikator_sasaran_program }}">
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <label for="pengampu" class="form-label">Target</label>
                                                <input type="text"
                                                    name="indikator_sasaran[{{ $indikator->id }}][target]"
                                                    class="form-control decimal-input" aria-describedby="pengampu"
                                                    value="{{ $indikator->target }}">
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <x-admin.form.select col="col-12" label="Satuan"
                                                    name="indikator_sasaran[{{ $indikator->id }}][satuan_id]"
                                                    :lists="$satuan_options" />
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <label for="program" class="form-label">Program</label>
                                                <input type="text"
                                                    name="indikator_sasaran[{{ $indikator->id }}][program]"
                                                    class="form-control" aria-describedby="program"
                                                    value="{{ $indikator->program }}"">
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <label for="anggaran" class="form-label">Anggaran</label>
                                                <input type="text"
                                                    name="indikator_sasaran[{{ $indikator->id }}][anggaran]"
                                                    class="form-control idr-currency" aria-describedby="anggaran"
                                                    value="{{ $indikator->anggaran }}">
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
                getDecimalInput();
                getFormatIdr();
                let iter = 1;
                $('.delete-sasaran-program').click(function() {
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

                $('.btn-add-indicator').on('click', function() {
                    iter++;
                    add_indicator(iter);
                })
                $(document).on('click', '.btn-remove-indicator', function() {
                    remove_indicator($(this));
                });

                function remove_indicator(el) {
                    el.parents('.col-indikator-sasaran-bupati').remove();
                }

                function add_indicator(iter) {
                    $.ajax({
                        url: "{{ route('perda.perencanaan-kinerja.sasaran-program.indicator') }}",
                        data: {
                            iter
                        },
                        success: function(result) {
                            $('#row-indikator-sasaran-bupati').append(result);
                            getDecimalInput();
                            getFormatIdr();
                        }
                    });
                }

                $('#get-data-pengampu').select2({
                    theme: 'bootstrap-5',
                    ajax: {
                        url: "{{ route('perda.perencanaan-kinerja.sasaran-strategis.get-pengampu') }}",
                        dataType: 'json',
                        delay: 250,
                        processResults: function(response) {
                            var items = response.data;
                            var formattedData = $.map(items, function(item) {
                                return {
                                    id: item.nip,
                                    text: item.nip + '-' + item.nama_pegawai
                                };
                            });
                            return {
                                results: formattedData
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 1
                });

            });

            function getDecimalInput() {
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

            function getFormatIdr() {
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
