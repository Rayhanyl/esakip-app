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
                <form class="row g-3" action="{{ route('perda.perencanaan-kinerja.sasaran-strategis.store') }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sasaran Strategis</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="#" class="form-label fw-bold">Tahun</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="select-tahun" name="tahun">
                                            <option value="" selected>- Pilih Tahun -</option>
                                            @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                                <option value="{{ $i }}" {{ date('Y') == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="#" class="form-label fw-bold">Sasaran Bupati</label>
                                    <fieldset class="form-group">
                                        <select class="form-select select2" id="sasaran_bupati" name="sasaran_bupati_id">
                                            <option value="" selected>- Pilih Sasaran Bupati -</option>
                                            @foreach ($sasaran_bupati_options ?? [] as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label for="pengampu" class="form-label fw-bold">Pengampu</label>
                                    <select class="form-select select2" name="pengampu_id" id="pengampu_id">
                                        <option value="" selected disabled>--Pilih Pengampu--</option>
                                        @foreach ($pengampu_sementara ?? [] as $id => $user)
                                            <option value="{{ $id }}">{{ $user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="#" class="form-label fw-bold">Sasaran Strategis</label>
                                    <input type="text" name="sasaran_strategis" class="form-control"
                                        aria-describedby="Sasaran Strategis">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="row-indikator-sasaran-bupati">
                        <div class="col-indikator-sasaran-bupati mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-between my-3">
                                            <h6>Indikator Sasaran Strategis</h6>
                                            <button class="btn btn-primary btn-add-indicator" type="button">Tambah</button>
                                        </div>
                                        <hr>
                                        <div class="col-12 form-group">
                                            <label for="#" class="form-label fw-bold">Indikator Sasaran</label>
                                            <input type="text" name="indikator_sasaran[1][indikator_sasaran_strategis]"
                                                id="" class="form-control" aria-describedby="Indikator Sasaran">
                                        </div>
                                        <div class="col-12 row my-3">
                                            <label for="#" class="form-label fw-bold">Target</label>
                                            <div class="col-4 form-group">
                                                <label for="#" class="form-label label-target-1">2024</label>
                                                <input type="text" name="indikator_sasaran[1][target1]"
                                                    id="decimal-input" class="form-control decimal-input"
                                                    aria-describedby="2024">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="#" class="form-label label-target-2">2025</label>
                                                <input type="text" name="indikator_sasaran[1][target2]" id=""
                                                    class="form-control decimal-input" aria-describedby="2025">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="#" class="form-label label-target-3">2026</label>
                                                <input type="text" name="indikator_sasaran[1][target3]" id=""
                                                    class="form-control decimal-input" aria-describedby="2026">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="#" class="form-label fw-bold">Satuan</label>
                                            <fieldset class="form-group">
                                                <select class="form-select select2" id="satuan"
                                                    name="indikator_sasaran[1][satuan_id]">
                                                    <option value="" selected>- Pilih Satuan -</option>
                                                    @foreach ($satuan as $key)
                                                        <option value="{{ $key->id }}">{{ $key->satuan }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="#" class="form-label fw-bold">Penjelasan</label>
                                            <input type="text" name="indikator_sasaran[1][penjelasan]"
                                                class="form-control" aria-describedby="Penjelasan">
                                        </div>
                                        <div class="col-12 col-lg-12 form-group">
                                            <label for="#" class="form-label fw-bold">Tipe Perhitungan</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id=""
                                                    name="indikator_sasaran[1][tipe_perhitungan]">
                                                    <option value="-" selected>- Pilih Tipe Perhitungan -</option>
                                                    <option value="1" selected>Kumulatif</option>
                                                    <option value="2" selected>Non-Kumulatif</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label for="#" class="form-label fw-bold">Sumber Data</label>
                                            <input type="text" name="indikator_sasaran[1][sumber_data]" id=""
                                                class="form-control" aria-describedby="Sumber Data">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label for="penanggung_jawab" class="form-label fw-bold">Penanggung
                                                Jawab</label>
                                            <input type="text" class="form-control"
                                                name="indikator_sasaran[1][penanggung_jawab]" id="penanggung_jawab">
                                            {{-- <fieldset class="form-group">
                                                <select class="form-select select2" id="penanggung_jawab"
                                                    name="indikator_sasaran[1][penanggung_jawab_id]">
                                                    <option value="" selected>- Pilih Penanggung Jawab -</option>
                                                    @foreach ($penanggung_jawab as $key)
                                                        <option value="{{ $key->id }}">
                                                            {{ $key->penanggung_jawab }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Sasaran Strategis</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="data-table-sasaran-strategis">
                                <thead class="table-info">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Sasaran Strategis</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sasaran_strategis ?? [] as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->sasaran_strategis }}</td>
                                            <td class="text-center">{{ $item->tahun }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Sasaran Strategis" class="btn btn-warning btn-sm"
                                                            href="#">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-danger btn-sm delete-sasaran-strategis"
                                                            data-id="{{ $item->id }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Sasaran Strategis">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('perda.perencanaan-kinerja.sasaran-strategis.destroy', $item->id) }}"
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
                $('#data-table-sasaran-strategis').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
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
            });
        </script>
    @endpush
@endsection
