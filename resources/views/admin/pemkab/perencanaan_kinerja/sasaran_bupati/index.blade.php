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
            <form action="{{ route('pemkab.perencanaan.kinerja.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Sasaran Strategis</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <select class="form-select" id="tahun" name="tahun">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="sasaran_bupati" class="form-label">Sasaran Bupati</label>
                                    <input type="text" id="sasaran_bupati" class="form-control"
                                        aria-describedby="pengampu" name="sasaran_bupati">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="pengampu" class="form-label">Pengampu</label>
                                    <input type="text" id="pengampu" class="form-control" aria-describedby="pengampu"
                                        name="pengampu">
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
                                            <h6>Indikator Sasaran Bupati</h6>
                                            <button class="btn btn-primary btn-add-indicator" type="button">Tambah</button>
                                        </div>
                                        <hr>
                                        <div class="col-12">
                                            <label for="indikator_sasaran_bupati[1][indikator_sasaran_bupati]"
                                                class="form-label">Indikator Sasaran Bupati</label>
                                            <input type="text"
                                                name="indikator_sasaran_bupati[1][indikator_sasaran_bupati]"
                                                class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 my-2">
                                                    <label for="indikator_sasaran_bupati[1][target_1]"
                                                        class="text-primary fw-bold">Target</label>
                                                </div>
                                                <div class="col-4">
                                                    <label for="indikator_sasaran_bupati[1][target_1]"
                                                        class="form-label">2024</label>
                                                    <input type="number" name="indikator_sasaran_bupati[1][target_1]"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label for="indikator_sasaran_bupati[1][target_2]"
                                                        class="form-label">2025</label>
                                                    <input type="number" name="indikator_sasaran_bupati[1][target_2]"
                                                        class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <label for="indikator_sasaran_bupati[1][target_3]"
                                                        class="form-label">2026</label>
                                                    <input type="number" name="indikator_sasaran_bupati[1][target_3]"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label for="indikator_sasaran_bupati[1][satuan]"
                                                class="form-label">Satuan</label>
                                            <input type="text" id="indikator_sasaran_bupati[1][satuan]"
                                                class="form-control">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label for="indikator_sasaran_bupati[1][penjelasan]"
                                                class="form-label">Penjelasan</label>
                                            <input type="text" name="indikator_sasaran_bupati[1][penjelasan]"
                                                class="form-control">
                                        </div>
                                        <div class="col-12 col-lg-12 my-2">
                                            <label for="indikator_sasaran_bupati[1][tipe_perhitungan]"
                                                class="text-primary fw-bold">
                                                Tipe Perhitungan
                                            </label>
                                            <select class="form-select"
                                                name="indikator_sasaran_bupati[1][tipe_perhitungan]">
                                                <option value="-" selected disabled>- Pilih Tipe Perhitungan -</option>
                                                <option value="kumulatif">Kumulatif</option>
                                                <option value="non-kumulatif">Non-Kumulatif</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label for="indikator_sasaran_bupati[1][sumber_data]"
                                                class="form-label">Sumber
                                                Data</label>
                                            <input type="text" name="indikator_sasaran_bupati[1][sumber_data]"
                                                class="form-control">
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label for="indikator_sasaran_bupati[1][penanggung_jawab]"
                                                class="form-label">Penanggung Jawab</label>
                                            <input type="text" name="indikator_sasaran_bupati[1][penanggung_jawab]"
                                                class="form-control">
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label for="indikator_sasaran_bupati[1][simple_action]"
                                                class="form-label">Simple
                                                Action</label>
                                            <input type="text" name="indikator_sasaran_bupati[1][simple_action]"
                                                class="form-control">
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

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Sasaran Strategis</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="data-table-pemkab-sasaran-strategis">
                                    <thead class="table-info">
                                        <tr>
                                            <th>Sasaran Bupati</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sasaran_strategis as $item)
                                            <tr>
                                                <td>{{ $item->sasaran_bupati }}</td>
                                                <td>{{ $item->year }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script>
            $(document).ready(function() {
                let iter = 1;
                $('#data-table-pemkab-sasaran-strategis').DataTable({
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
                        url: "{{ route('pemkab.perencanan.kinerja.form-indikator') }}",
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
