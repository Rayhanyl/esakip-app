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
                <form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                    <thead class="table-info">
                                        <tr>
                                            <th>No</th>
                                            <th></th>
                                            <th></th>
                                            <th>Komponen/Sub Komponen/Kriteria</th>
                                            <th>Keterangan</th>
                                            <th>Eviden</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td class="bg-info fw-bold text-light" colspan="1">1</td>
                                            <td class="bg-info fw-bold text-light" colspan="1"></td>
                                            <td class="bg-info fw-bold text-light" colspan="4">PERENCANAAN KINERJA
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                            <td class="bg-secondary fw-bold text-light" colspan="1">1.a</td>
                                            <td class="bg-secondary fw-bold text-light" colspan="4">Dokumen
                                                Perencanaan
                                                kinerja telah tersedia</td>
                                        </tr>
                                        @for ($i = 0; $i < 6; $i++)
                                            <tr>
                                                <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                                <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                                <td class="bg-secondary fw-bold text-light" colspan="1">1</td>
                                                <td class="bg-secondary fw-bold text-light" colspan="1">Terdapat
                                                    pedoman
                                                    teknis perencanaan kinerja.</td>
                                                <td>
                                                    <select class="form-select form-control-sm" aria-label="1a"
                                                        name="1a">
                                                        <option value="ya">Ya</option>
                                                        <option value="tidak">Tidak</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" type="file"
                                                        id="1a_file">
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
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
            // 
        </script>
    @endpush
@endsection
