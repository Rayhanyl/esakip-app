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
                        <h4 class="card-title">Sasaran Strategis</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('perda.strategis.store') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Tahun</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="year">
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
                                <h6>Sasaran Bupati</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="sasaran_bupati">
                                        <option value="" selected>- Pilih Sasaran Bupati -</option>
                                        @foreach ($sasaran_bupati ?? [] as $item)
                                            <option value="{{ $item->id }}">{{ $item->sasaran_bupati }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="pengampu" class="form-label">Pengampu</label>
                                <input type="text" name="pengampu" id="pengampu" class="form-control"
                                    aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="pengampu" class="form-label">Sasaran Strategis</label>
                                <input type="text" name="sasaran_strategis" class="form-control"
                                    aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-4 form-group">
                                <label for="pengampu" class="form-label">Indikator Sasaran</label>
                                <input type="text" name="indikator_sasaran" id="pengampu" class="form-control"
                                    aria-describedby="pengampu">
                            </div>
                            <div class="col-12 row my-3">
                                <h6>Target</h6>
                                <div class="col-4 form-group">
                                    <label for="pengampu" class="form-label">2024</label>
                                    <input type="text" name="target1" class="form-control" aria-describedby="pengampu">
                                </div>
                                <div class="col-4 form-group">
                                    <label for="pengampu" class="form-label">2025</label>
                                    <input type="text" name="target2" class="form-control" aria-describedby="pengampu">
                                </div>
                                <div class="col-4 form-group">
                                    <label for="pengampu" class="form-label">2026</label>
                                    <input type="text" name="target3" class="form-control" aria-describedby="pengampu">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="pengampu" class="form-label">Satuan</label>
                                <input type="text" name="satuan" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="pengampu" class="form-label">Penjelasan</label>
                                <input type="text" name="penjelasan"" class="form-control" aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-12 form-group">
                                <h6>Tipe Perhitungan</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="tiper_perhitungan">
                                        <option value="-" selected>- Pilih Tipe Perhitungan -</option>
                                        <option value="1" selected>Kumulatif</option>
                                        <option value="2" selected>Non-Kumulatif</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="pengampu" class="form-label">Sumber Data</label>
                                <input type="text" name="sumber_data" id="pengampu" class="form-control"
                                    aria-describedby="pengampu">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="pengampu" class="form-label">Penanggung Jawab</label>
                                <input type="text" name="penanggung_jawab" id="pengampu" class="form-control"
                                    aria-describedby="pengampu">
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50">Submit</button>
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
                            <table class="table" id="data-table-sasaran-strategis w-100">
                                <thead class="table-info">
                                    <tr>
                                        <th>NO</th>
                                        <th>Sasaran Strategis</th>
                                        <th>Tahun</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sasaran_strategis as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->sasaran_strategis }}</td>
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
        </div>
    </div>

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#data-table-sasaran-strategis').DataTable({
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
