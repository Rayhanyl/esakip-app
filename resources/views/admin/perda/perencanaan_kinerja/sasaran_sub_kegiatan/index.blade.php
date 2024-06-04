@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Sasaran Sub-Kegiatan</h3>
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
                <form class="row g-3" action="{{ route('perda.perencanaan-kinerja.sasaran-sub-kegiatan.store') }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sasaran Sub Kegiatan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6 form-group">
                                    <h6>Tahun</h6>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="tahun">
                                            <option value="" selected>- Pilih Tahun -</option>
                                            @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                                <option value="{{ $i }}">
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <h6>Sasaran Kegiatan</h6>
                                    <fieldset class="form-group">
                                        <select class="form-select select2" id="basicSelect" name="sasaran_kegiatan_id">
                                            <option value="" selected>- Pilih Sasaran Kegiatan -</option>
                                            @foreach ($sasaran_kegiatan_options ?? [] as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label for="pengampu" class="form-label">Pengampu</label>
                                    <select class="form-select select2" name="pengampu_id" id="pengampu_id">
                                        <option value="" selected disabled>--Pilih Pengampu--</option>
                                        @foreach ($user_options ?? [] as $id => $user)
                                            <option value="{{ $id }}">{{ $user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="pengampu" class="form-label">Sasaran Sub-Kegiatan</label>
                                    <input type="text" name="sasaran_sub_kegiatan" id="pengampu" class="form-control"
                                        aria-describedby="pengampu">
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
                                            <h6>Indikator Sasaran Sub-Kegiatan</h6>
                                            <button class="btn btn-primary btn-add-indicator" type="button">Tambah</button>
                                        </div>
                                        <hr>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="pengampu" class="form-label">Indikator Sub-Kegiatan</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="pengampu"
                                                name="indikator_sasaran[1][indikator_sub_kegiatan]">
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="pengampu" class="form-label">Target</label>
                                            <input type="text" id="pengampu" class="form-control decimal-input"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][target]">
                                        </div>
                                        <div class="col-12 col-lg-3 form-group">
                                            <label for="pengampu" class="form-label">Triwulan 1</label>
                                            <input type="text" id="pengampu" class="form-control decimal-input"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][triwulan1]">
                                        </div>
                                        <div class="col-12 col-lg-3 form-group">
                                            <label for="pengampu" class="form-label">Triwulan 2</label>
                                            <input type="text" id="pengampu" class="form-control decimal-input"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][triwulan2]">
                                        </div>
                                        <div class="col-12 col-lg-3 form-group">
                                            <label for="pengampu" class="form-label">Triwulan 3</label>
                                            <input type="text" id="pengampu" class="form-control decimal-input"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][triwulan3]">
                                        </div>
                                        <div class="col-12 col-lg-3 form-group">
                                            <label for="pengampu" class="form-label">Triwulan 4</label>
                                            <input type="text" id="pengampu" class="form-control decimal-input"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][triwulan4]">
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="pengampu" class="form-label">Satuan</label>
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
                                            <label for="pengampu" class="form-label">Sub-Kegiatan</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][sub_kegiatan]">
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="anggaran" class="form-label">Anggaran</label>
                                            <input type="text" id="pengampu" class="form-control idr-currency"
                                                aria-describedby="anggaran" name="indikator_sasaran[1][anggaran]">
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
                        <h4 class="card-title">Tabel Sasaran Sub Kegiatan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="data-table-sasaran-subkegiatan">
                                <thead class="table-info">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Sasaran Sub Kegiatan</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sasaran_sub_kegiatan ?? [] as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->sasaran_sub_kegiatan }}</td>
                                            <td class="text-center">{{ $item->tahun }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Sasaran Sub-Kegiatan"
                                                            class="btn btn-warning btn-sm" href="#">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-danger btn-sm delete-sasaran-subkegiatan"
                                                            data-id="{{ $item->id }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Sasaran Sub-Kegiatan">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('perda.perencanaan-kinerja.sasaran-sub-kegiatan.destroy', $item->id) }}"
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
            let iter = 1;
            $('#data-table-sasaran-subkegiatan').DataTable({
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

            $('.delete-sasaran-subkegiatan').click(function() {
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
                console.log(iter);
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
                    url: "{{ route('perda.perencanaan-kinerja.sasaran-sub-kegiatan.indicator') }}",
                    data: {
                        iter
                    },
                    success: function(result) {
                        $('#row-indikator-sasaran-bupati').append(result);
                    }
                });
            }
        </script>
    @endpush
@endsection
