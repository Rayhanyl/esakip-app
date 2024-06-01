@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Pengukuran Kinerja</h3>
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
                <div class="card shadow rounded-4">
                    <div class="card-header">
                        <h4 class="card-title">Form Pengukuran Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('pemkab.pengukuran-kinerja.store') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="col-12 col-lg-6 form-group">
                                <label for="sasaran_bupati" class="form-label fw-bold">Sasaran Bupati</label>
                                <fieldset class="form-group">
                                    <select class="form-select select2" name="sasaran_bupati_id" id="sasaran_bupati">
                                        <option value="-" selected disabled>- Pilih Sasaran Bupati -</option>
                                        @foreach ($sasaran_bupati_options ?? [] as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="indikator_sasaran" class="form-label fw-bold">Indikator Sasaran</label>
                                <select name="sasaran_bupati_indikator_id" id="indikator_sasaran"
                                    class="form-select select2">
                                    <option value="" selected disabled>--Pilih Indikator--</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="target_sasaran" class="form-label fw-bold">Target Sasaran</label>
                                <select name="target" id="target_sasaran" class="form-select select2">
                                    <option value="" selected disabled>--Pilih Target--</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="realisasi" class="form-label fw-bold">Realisasi</label>
                                <input type="number" name="realisasi" id="realisasi" class="form-control">
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="karakteristik" class="form-label fw-bold">Karakteristik</label>
                                <fieldset class="form-group">
                                    <select class="form-select" name="karakteristik" id="karakteristik">
                                        <option value="" selected>- Pilih Karakteristik -</option>
                                        <option value="1">Semakin tinggi realisasi maka capaian semakin bagus</option>
                                        <option value="2">Semakin rendah realisasi maka capaian semakin bagus</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="capaian" class="form-label fw-bold">Capaian</label>
                                <input type="text" name="capaian" id="capaian" class="form-control">
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card shadow rounded-4">
                    <div class="card-header">
                        <h5>Tabel Pengukuran Kinerja</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="data-table-pengukuran-kinerja">
                                <thead class="table-info">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Sasaran Bupati</th>
                                        <th class="text-center">Indikator Sasaran</th>
                                        <th class="text-center">Target Sasaran</th>
                                        <th class="text-center">Realisasi</th>
                                        <th class="text-center">Karakteristik</th>
                                        <th class="text-center">Capaian</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <p data-bs-toggle="tooltip" data-bs-placement="top" title=''>
                                                    {{-- {{ Str::limit($item->sasaran_bupati->sasaran_bupati, 10, '...') }} --}}
                                                    {{ $item->sasaran_bupati->sasaran_bupati }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p data-bs-toggle="tooltip" data-bs-placement="top" title=''>
                                                    {{-- {{ Str::limit($item->sasaran_bupati_indikator->indikator_sasaran_bupati, 10, '...') }} --}}
                                                    {{ $item->sasaran_bupati_indikator->indikator_sasaran_bupati }}
                                                </p>
                                            </td>
                                            <td class="text-center">{{ $item->target }}</td>
                                            <td class="text-center">{{ $item->realisasi }}</td>
                                            <td class="text-center">
                                                @if ($item->karakteristik == '1')
                                                    <p data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Semakin tinggi realisasi maka capaian semakin bagus">
                                                        {{ Str::limit('Semakin tinggi realisasi maka capaian semakin bagus', 10, '...') }}
                                                    </p>
                                                @else
                                                    <p data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Semakin rendah realisasi maka capaian semakin bagus">
                                                        {{ Str::limit('Semakin rendah realisasi maka capaian semakin bagus', 10, '...') }}
                                                    </p>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $item->capaian }} %</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Pengukuran Kinerja" class="text-warning"
                                                            href="#">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="p-2">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Delete Pengukuran Kinerja" class="text-danger"
                                                            href="#">
                                                            <i class="bi bi-trash3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#data-table-pengukuran-kinerja').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });
            });
            
            $('#indikator_sasaran, #target_sasaran, #karakteristik').on('change', function() {
                const capaian = getCapaian($('#karakteristik').val(), $('#realisasi').val(), $('#target_sasaran')
                    .val());
                $('#capaian').val(capaian);
            });

            function getCapaian(karakteristik, realisasi, target) {
                let capaian;
                switch (karakteristik) {
                    case "1":
                        capaian = (realisasi / target) * 100;
                        break;
                    case "2":
                        capaian = ((target - (realisasi - target)) / target) * 100;
                        break;
                    default:
                        capaian = 0;
                        break;
                }
                if (isNaN(capaian)) {
                    capaian = 0;
                }
                return capaian;
            }

            // function getAJaxData(el) {
            //     $.ajax({
            //         url: "{{ route('pemkab.pengukuran-kinerja.indicator') }}",
            //         data: {
            //             sasaran_bupati: el.val()
            //         },
            //         success: function(result) {
            //             $.each(result.sasaran_strategis, function(index, test) {
            //                 $('#sasaran_bupati option')remove(); // first remove the old options
            //                 $('#sasaran_bupati').append(
            //                     $('<option></option>').attr("value", test.id).text(test)
            //                 )
            //             })
            //         }
            //     });
            // }
            +
            $('#sasaran_bupati').on("select2:select", function(e) {
                getIndikator($(this).val());
            });

            $('#indikator_sasaran').on("select2:select", function(e) {
                getTarget($(this).val());
            });

            function getIndikator(id) {
                $.ajax({
                    url: "{{ route('pemkab.pengukuran-kinerja.get-indicator') }}",
                    data: {
                        id
                    },
                    success: function(result) {
                        let list = [];
                        result.forEach(el => {
                            const item = {
                                id: el.id,
                                text: el.indikator_sasaran_bupati,
                            }
                            list.push(item);
                        });
                        $("#indikator_sasaran").html('').select2({
                            data: list,
                            theme: 'bootstrap-5'
                        });
                    }
                });
            }

            function getTarget(id) {
                $.ajax({
                    url: "{{ route('pemkab.pengukuran-kinerja.get-target') }}",
                    data: {
                        id
                    },
                    success: function(result) {
                        let list = [];
                        if (result) {
                            list = [{
                                id: result[0].target1,
                                text: result[0].target1,
                            }, {
                                id: result[0].target2,
                                text: result[0].target2,
                            }, {
                                id: result[0].target3,
                                text: result[0].target3,
                            }];
                        }
                        $("#target_sasaran").html('').select2({
                            data: list,
                            theme: 'bootstrap-5'
                        });
                    }
                });
            }
        </script>
    @endpush
@endsection
