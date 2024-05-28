@extends('layouts.app')
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
                    <div class="card-header">
                        <h4 class="card-title">Evaluasi Internal</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
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
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th>NO</th>
                                        <th>Komponen/Sub Komponen/Kriteria</th>
                                        <th>Keterangan</th>
                                        <th>Eviden</th>
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
            // 
        </script>
    @endpush
@endsection
