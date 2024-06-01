@extends('layout.admin.app')
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
                <form class="row g-3" action="{{ route('perda.perencanaan-kinerja.sasaran-strategis.store') }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sasaran Strategis</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
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
                                        <select class="form-select" id="sasaran_bupati" name="sasaran_bupati">
                                            <option value="" selected>- Pilih Sasaran Bupati -</option>
                                            @foreach ($sasaran_bupati ?? [] as $item)
                                                <option value="{{ $item->id }}">{{ $item->sasaran_bupati }}</option>
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
                                    <label for="pengampu" class="form-label">Sasaran Strategis</label>
                                    <input type="text" name="sasaran_strategis" class="form-control"
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
                                            <h6>Indikator Sasaran Strategis</h6>
                                            <button class="btn btn-primary btn-add-indicator" type="button">Tambah</button>
                                        </div>
                                        <hr>
                                        <div class="col-12 form-group">
                                            <label for="pengampu" class="form-label">Indikator Sasaran</label>
                                            <input type="text" name="indikator_sasaran[1][indikator_sasaran]"
                                                id="pengampu" class="form-control" aria-describedby="pengampu">
                                        </div>
                                        <div class="col-12 row my-3">
                                            <h6>Target</h6>
                                            <div class="col-4 form-group">
                                                <label for="pengampu" class="form-label">2024</label>
                                                <input type="text" name="indikator_sasaran[1][target1]"
                                                    class="form-control" aria-describedby="pengampu">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="pengampu" class="form-label">2025</label>
                                                <input type="text" name="indikator_sasaran[1][target2]"
                                                    class="form-control" aria-describedby="pengampu">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label for="pengampu" class="form-label">2026</label>
                                                <input type="text" name="indikator_sasaran[1][target3]"
                                                    class="form-control" aria-describedby="pengampu">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="pengampu" class="form-label">Satuan</label>
                                            <input type="text" name="indikator_sasaran[1][satuan]"
                                                class="form-control" aria-describedby="pengampu">
                                        </div>
                                        <div class="col-12 col-lg-6 form-group">
                                            <label for="pengampu" class="form-label">Penjelasan</label>
                                            <input type="text" name="indikator_sasaran[1][penjelasan]""
                                                class="form-control" aria-describedby="pengampu">
                                        </div>
                                        <div class="col-12 col-lg-12 form-group">
                                            <h6>Tipe Perhitungan</h6>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect"
                                                    name="indikator_sasaran[1][tipe_perhitungan]">
                                                    <option value="-" selected>- Pilih Tipe Perhitungan -</option>
                                                    <option value="1" selected>Kumulatif</option>
                                                    <option value="2" selected>Non-Kumulatif</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label for="pengampu" class="form-label">Sumber Data</label>
                                            <input type="text" name="indikator_sasaran[1][sumber_data]"
                                                id="pengampu" class="form-control" aria-describedby="pengampu">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label for="pengampu" class="form-label">Penanggung Jawab</label>
                                            <input type="text" name="indikator_sasaran[1][penanggung_jawab]"
                                                id="pengampu" class="form-control" aria-describedby="pengampu">
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
                let iter = 1;
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
                $('#sasaran_bupati').on('change', function() {

                })

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
                        url: "{{ route('perda.perencanaan.kinerja.strategis.ajax') }}",
                        data: {
                            iter
                        },
                        success: function(result) {
                            $('#row-indikator-sasaran-bupati').append(result);
                        }
                    });
                }

                // function getAJaxData(el) {
                //     $.ajax({
                //         url: "{{ route('pemkab.pengukuran.kinerja.ajax') }}",
                //         data: {
                //             sasaran_bupati: el.val()
                //         },
                //         success: function(result) {
                //             $.each(result.sasaran_strategis, function(index, test) {
                //                 $(
                //                     '#sasaran_bupati option'
                //                 ) remove(); // first remove the old options
                //                 $('#sasaran_bupati').append(
                //                     $('<option></option>').attr("value", test.id).text(test)
                //                 )
                //             })
                //         }
                //     });
                // }
            });
        </script>
    @endpush
@endsection
