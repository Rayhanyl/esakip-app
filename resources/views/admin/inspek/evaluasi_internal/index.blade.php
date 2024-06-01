@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Evaluasi Internal</h3>
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
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-6">
                                <label class="fw-bold" for="tahun">Perangkat Daerah</label>
                                <select name="perda" id="perda" class="form-select select2">
                                    <option value="">
                                        -- Pilih Perangkat Daerah --
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="fw-bold" for="tahun">Tahun</label>
                                <select name="tahun" id="tahun" class="form-select select2">
                                    <option value="tahun">
                                        -- Pilih Tahun --
                                    </option>
                                    @for ($i = 2029; $i > 2020; $i--)
                                        <option value="{{ $i }}">
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Evaluasi Internal</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="data-table-evaluasi-internal">
                                <thead class="table-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Komponen/Sub Komponen/Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>PERNECANAAN KINERJA</td>
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
@endsection
