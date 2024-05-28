@extends('layouts.app')
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Sasaran Strategis</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="#" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 col-lg-4 form-group">
                                <h6>Tahun</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="pengampu" class="form-label">Saran Bupati</label>
                                <input type="password" id="pengampu" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="pengampu" class="form-label">Pengampu</label>
                                <input type="password" id="pengampu" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12">
                                <h6>Indikator Saran Bupati</h6>
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                            <hr>
                            <div class="col-12">
                                <label for="pengampu" class="form-label">Indikator Saran Bupati</label>
                                <input type="password" id="pengampu" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Target</h6>
                                    </div>
                                    <div class="col-4">
                                        <label for="pengampu" class="form-label">2023</label>
                                        <input type="password" id="pengampu" class="form-control"
                                            aria-describedby="pengampu">
                                    </div>
                                    <div class="col-4">
                                        <label for="pengampu" class="form-label">2024</label>
                                        <input type="password" id="pengampu" class="form-control"
                                            aria-describedby="pengampu">
                                    </div>
                                    <div class="col-4">
                                        <label for="pengampu" class="form-label">2025</label>
                                        <input type="password" id="pengampu" class="form-control"
                                            aria-describedby="pengampu">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="pengampu" class="form-label">Satuan</label>
                                <input type="password" id="pengampu" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="pengampu" class="form-label">Penejelasan</label>
                                <input type="password" id="pengampu" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-12 form-group">
                                <h6>Tipe Perhitungan</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect">
                                        <option value="" selected>- Pilih Tipe Perhitungan -</option>
                                        <option value="" selected>Kumulatif</option>
                                        <option value="" selected>Non-Kumulatif</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="pengampu" class="form-label">Sumber Data</label>
                                <input type="password" id="pengampu" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="pengampu" class="form-label">Penanggung Jawab</label>
                                <input type="password" id="pengampu" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="pengampu" class="form-label">Simple Action</label>
                                <input type="password" id="pengampu" class="form-control" aria-describedby="pengampu">
                            </div>

                        </form>
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
                                        <th>Nama Kecamatan</th>
                                        <th>Kode Pos</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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
            });
        </script>
    @endpush
@endsection
