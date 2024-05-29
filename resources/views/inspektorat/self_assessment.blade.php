@extends('layouts.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Pelaporan Kinerja</h3>
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
                        <h3>Self Assesment</h3>
                    </div>
                    <div class="card-body">
                        <div class="row gap-1">
                            <div class="col-4">Perangkat Daerah</div>
                            <div class="col-8">
                                <select name="" id="" class="form-select">
                                    <option value="">
                                        --Perangkat Daerah--
                                    </option>
                                </select>
                            </div>
                            <div class="col-4">Tahun</div>
                            <div class="col-8">
                                <select name="" id="" class="form-select">
                                    <option value="">
                                        --Tahun--
                                    </option>
                                    @for ($i = 2029; $i > 2020; $i--)
                                        <option value="{{ $i }}">
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Pelaporan Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="data-table-pelaporan-kinerja">
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
