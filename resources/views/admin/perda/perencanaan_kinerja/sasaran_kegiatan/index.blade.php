@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Sasaran Kegiatan</h3>
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
                <form class="row g-3" action="{{ route('perda.perencanaan-kinerja.sasaran-kegiatan.store') }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sasaran Kegiatan</h4>
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
                                    <h6>Sasaran Program</h6>
                                    <fieldset class="form-group">
                                        <select class="form-select select2" id="basicSelect" name="sasaran_program_id">
                                            <option value="" selected>- Pilih Sasaran Program -</option>
                                            @foreach ($sasaran_program_options ?? [] as $key => $item)
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
                                    <label for="pengampu" class="form-label">Sasaran Kegiatan</label>
                                    <input type="text" id="sasaran_kegiatan" class="form-control"
                                        aria-describedby="pengampu" name="sasaran_kegiatan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div id="row-indikator-sasaran-bupati">
                                <div class="col-indikator-sasaran-bupati mt-3">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-between my-3">
                                            <h6>Indikator Sasaran Kegiatan</h6>
                                            <button class="btn btn-primary btn-add-indicator" type="button">Tambah</button>
                                        </div>
                                        <hr>
                                        <div class="col-12 col-lg-4 form-group">
                                            <label for="pengampu" class="form-label">Indikator Kegiatan</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][indikator_kegiatan]">
                                        </div>
                                        <div class="col-12 col-lg-4 form-group">
                                            <label for="pengampu" class="form-label">Target</label>
                                            <input type="number" id="pengampu" class="form-control"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][target]">
                                        </div>
                                        <div class="col-12 col-lg-4 form-group">
                                            <label for="pengampu" class="form-label">Satuan</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][satuan]">
                                        </div>
                                        <div class="col-12 col-lg-4 form-group">
                                            <label for="pengampu" class="form-label">Kegiatan</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="pengampu" name="indikator_sasaran[1][kegiatan]">
                                        </div>
                                        <div class="col-12 col-lg-4 form-group">
                                            <label for="anggaran" class="form-label">Anggaran</label>
                                            <input type="number" id="pengampu" class="form-control"
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
                        <h4 class="card-title">Tabel Sasaran Kegiatan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table w-100" id="data-table-sasaran-kegiatan">
                                <thead class="table-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Sasaran Kegiatan</th>
                                        <th>Tahun</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sasaran_kegiatan ?? [] as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->sasaran_kegiatan }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td></td>
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
                let iter;
                $('#data-table-sasaran-kegiatan').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [5, 10, 15, -1],
                        [5, 10, 15, 'All'],
                    ],
                    order: [
                        [0, 'desc']
                    ],
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
                        url: "{{ route('perda.perencanaan-kinerja.sasaran-kegiatan.indicator') }}",
                        data: {
                            iter
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
