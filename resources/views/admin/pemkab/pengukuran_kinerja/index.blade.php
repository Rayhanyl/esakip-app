@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Pengukuran Kinerja</h3>
                    </div>
                </div>
            </div>
            <section class="section mt-2">
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
                                            <option value="{{ $key }}">{{ $item }}</option>
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
                                <input type="text" name="realisasi" id="realisasi" class="form-control decimal-input"
                                    min="0">
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
                                <input type="text" name="capaian" id="capaian" class="form-control" readonly>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50" type="submit">Submit</button>
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
                                                    {{ $item->sasaran_bupati->sasaran_bupati ?? '' }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p data-bs-toggle="tooltip" data-bs-placement="top" title=''>
                                                    {{-- {{ Str::limit($item->sasaran_bupati_indikator->indikator_sasaran_bupati, 10, '...') }} --}}
                                                    {{ $item->sasaran_bupati_indikator->indikator_sasaran_bupati ?? '' }}
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
                                            <td class="text-center">{{ number_format($item->capaian, 2) }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Pengukuran Kinerja" class="btn btn-warning btn-sm"
                                                            href="{{ route('pemkab.pengukuran-kinerja.edit', $item->id) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-danger btn-sm delete-pengukuran-kinerja"
                                                            data-id="{{ $item->id }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Pengukuran Kinerja">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('pemkab.pengukuran-kinerja.destroy', $item->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
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

                $('.decimal-input').inputmask({
                    alias: 'decimal',
                    groupSeparator: ',',
                    autoGroup: true,
                    digits: 2,
                    digitsOptional: false,
                    placeholder: '0',
                    rightAlign: false,
                    removeMaskOnSubmit: true
                });

                // Initialize Inputmask for currency input in IDR format
                $('.idr-currency').inputmask('numeric', {
                    radixPoint: ',', // Decimal separator
                    groupSeparator: '.', // Thousand separator
                    alias: 'numeric',
                    digits: 0,
                    autoGroup: true,
                    autoUnmask: true,
                    prefix: 'Rp ', // IDR currency symbol
                    rightAlign: false,
                    removeMaskOnSubmit: true // Remove mask when form submitted
                });

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

                // SweetAlert delete confirmation
                $('.delete-pengukuran-kinerja').on('click', function() {
                    var userId = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#delete-form-' + userId).submit();
                        }
                    });
                });

                $('#sasaran_bupati').on("select2:select", function(e) {
                    getIndikator($(this).val());
                });

                $('#indikator_sasaran').on("select2:select", function(e) {
                    getTarget($(this).val());
                });

                $('#realisasi, #karakteristik, #target_sasaran').on('change', function() {
                    const capaian = getCapaian($('#karakteristik').val(), $('#realisasi').val(), $(
                        '#target_sasaran').val());
                    $('#capaian').val(capaian);
                });

                function getCapaian(karakteristik, realisasi, target) {
                    let capaian;
                    realisasi = parseFloat(realisasi);
                    target = parseFloat(target);
                    if (isNaN(realisasi) || isNaN(target)) return 0;

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
                    return capaian.toFixed(2);
                }

                function getIndikator(id) {
                    $.ajax({
                        url: "{{ route('pemkab.pengukuran-kinerja.get-indicator') }}",
                        data: {
                            id
                        },
                        success: function(result) {
                            let list = result.map(el => ({
                                id: el.id,
                                text: el.indikator_sasaran_bupati,
                            }));
                            $("#indikator_sasaran").html('').select2({
                                data: list,
                                theme: 'bootstrap-5'
                            });
                            if (list.length === 1) {
                                $('#indikator_sasaran').val(list[0].id).trigger('select2:select');
                            }
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

                function validateForm() {
                    const realisasi = document.getElementById('realisasi').value;
                    if (realisasi < 0) {
                        alert("Nilai realisasi tidak boleh minus.");
                        return false;
                    }
                    return true;
                }
            });
        </script>
    @endpush
@endsection
