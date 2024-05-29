@extends('layouts.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Sasaran Porgram</h3>
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
                <form class="row g-3" action="{{ route('perda.perencanaan.kinerja.program.store') }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sasaran Program</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
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
                                    <h6>Sasaran Strategis</h6>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="sasaran_strategis">
                                            <option value="" selected>- Pilih Sasaran Strategis -</option>
                                            @foreach ($sasaran_strategis as $item)
                                                <option value="{{ $item->id }}">{{ $item->sasaran_strategis }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="pengampu" class="form-label">Pengampu</label>
                                    <input type="text" name="pengampu" id="pengampu" class="form-control"
                                        aria-describedby="pengampu">
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="pengampu" class="form-label">Sasaran Program</label>
                                    <input type="text" name="sasaran_program" id="pengampu" class="form-control"
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
                                            <h6>Indikator Sasaran Program</h6>
                                            <button class="btn btn-primary btn-add-indicator" type="button">Tambah</button>
                                        </div>
                                        <hr>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="pengampu" class="form-label">Indikator Program</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="pengampu"
                                                name="indikator_sasaran_bupati[1][indikator_program]">
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="pengampu" class="form-label">Target</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="pengampu" name="indikator_sasaran_bupati[1][target]">
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="pengampu" class="form-label">Satuan</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="pengampu" name="indikator_sasaran_bupati[1][satuan]">
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="pengampu" class="form-label">Program</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="pengampu" name="indikator_sasaran_bupati[1][program]">
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="anggaran" class="form-label">Anggaran</label>
                                            <input type="text" id="pengampu" class="form-control"
                                                aria-describedby="anggaran" name="indikator_sasaran_bupati[1][anggaran]">
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
                        <h4 class="card-title">Tabel Sasaran Program</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table w-100" id="data-table-sasaran-program">
                                <thead class="table-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Sasaran Program</th>
                                        <th>Tahun</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sasaran_bupati as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->sasaran_program }}</td>
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
                let iter;
                $('#data-table-sasaran-program').DataTable({
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
                        url: "{{ route('perda.perencanaan.kinerja.program.ajax') }}",
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
