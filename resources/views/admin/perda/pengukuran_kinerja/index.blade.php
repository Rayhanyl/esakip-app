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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <h4 class="card-title">Form</h4>
                            </div> --}}
                            <div class="card-body">
                                <form class="row g-3" action="{{ route('perda.pengukuran-kinerja.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12 col-lg-6 form-group">
                                        <h6>Tahun</h6>
                                        <fieldset class="form-group">
                                            <select class="form-select select2" id="tahun-select" name="tahun">
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
                                        <h6>Triwulan</h6>
                                        <fieldset class="form-group">
                                            <select class="form-select select2" name="triwulan" id="triwulan-select">
                                                <option value="" selected>- Pilih Triwulan -</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="tahun">Tahunan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    {{-- Triwulan --}}
                                    <div class="col-12" id="section-triwulan">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <h4>Pengukuran Kinerja</h4>
                                                <hr>
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <h6>Sasaran Strategis</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2" name="sasaran_strategis_id"
                                                        id="sasaran_strategis_id">
                                                        <option value="" selected>- Pilih Sasaran Strategis -</option>
                                                        @foreach ($sasaran_strategis_options ?? [] as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <h6>Indikator Sasaran</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2"
                                                        name="sasaran_strategis_indikator_id"
                                                        id="sasaran_strategis_indikator_id">
                                                        <option value="" selected>- Pilih Indikator Sasaran Strategis
                                                            -
                                                        </option>
                                                        @foreach ($sasaran_strategis_indikator_options ?? [] as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <h6>Sasaran Sub-Kegiatan</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2" name="sasaran_sub_kegiatan_id"
                                                        id="sasaran_sub_kegiatan_id">
                                                        <option value="" selected>- Pilih Sasaran Sub-Kegiatan -
                                                        </option>
                                                        @foreach ($sasaran_sub_kegiatan_options ?? [] as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <h6>Indikator Sasaran Sub-Kegiatan</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2"
                                                        name="sasaran_sub_kegiatan_indikator_id"
                                                        id="sasaran_sub_kegiatan_indikator">
                                                        <option value="" selected disabled>- Pilih Indikator Sasaran
                                                            Sub-Kegiatan -
                                                        </option>
                                                        {{-- @foreach ($sasaran_sub_kegiatan_indikator_options ?? [] as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <h6>Target Sasaran Sub-Kegiatan</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2" name="sasaran_sub_kegiatan_target"
                                                        id="sasaran_sub_kegiatan_target">
                                                        <option value="" selected disabled>- Pilih Indikator Sasaran
                                                            Sub-Kegiatan -
                                                        </option>
                                                        {{-- @foreach ($sasaran_sub_kegiatan_target_options ?? [] as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </fieldset>
                                            </div>
                                            {{-- <div class="col-12 col-lg-4 form-group">
                                                <label for="">Target</label>
                                                <input type="number" name="target" id="sasaran_sub_kegiatan_target" class="form-control">
                                            </div> --}}
                                            <div class="col-12 col-lg-4 form-group">
                                                <label for="">Realisasi</label>
                                                <input type="text" name="realisasi" id="realisasi"
                                                    class="form-control decimal-input">
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <h6>Karakteristik</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2" name="karakteristik"
                                                        id="karakteristik">
                                                        <option value="" selected>- Pilih Karakteristik -</option>
                                                        <option value="1">Semakin tinggi realisasi maka capaian semakin
                                                            bagus
                                                        </option>
                                                        <option value="2">Semakin rendah realisasi maka capaian semakin
                                                            bagus
                                                        </option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <label for="">Capaian</label>
                                                <input type="text" name="capaian" id="capaian" class="form-control"
                                                    readonly>
                                            </div>
                                            {{-- Anggaran --}}
                                            <div class="col-12">
                                                <h4>Anggaran</h4>
                                                <hr>
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <h6>Sub-Kegiatan</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2" name="anggaran_sub_kegiatan_id">
                                                        <option value="" selected>- Pilih Sub-Kegiatan -</option>
                                                        @foreach ($sasaran_sub_kegiatan_options ?? [] as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <label for="">Pagu</label>
                                                <input type="text" name="anggaran_pagu" id="anggaran_pagu"
                                                    class="form-control idr-currency">
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <label for="">Realisasi</label>
                                                <input type="text" name="anggaran_realisasi" id="anggaran_realisasi"
                                                    class="form-control idr-currency">
                                            </div>
                                            <div class="col-12 col-lg-6 form-group">
                                                <label for="">Capaian</label>
                                                <input type="text" name="anggaran_capaian" id="anggaran_capaian"
                                                    class="form-control" readonly>
                                            </div>
                                            {{-- Anggaran --}}
                                        </div>
                                    </div>
                                    {{-- Triwulan --}}
                                    {{-- Tahunan --}}
                                    <div class="col-12" id="section-tahunan">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <h4>Tahunan</h4>
                                                <hr>
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <h6>Sasaran Strategis</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2"
                                                        name="tahunan_sasaran_strategis_id"
                                                        id="tahunan_sasaran_strategis_id">
                                                        <option value="" selected>- Pilih Sasaran Strategis -
                                                        </option>
                                                        @foreach ($sasaran_strategis_options ?? [] as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <h6>Indikator Sasaran</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2"
                                                        name="tahunan_sasaran_strategis_indikator_id"
                                                        id="tahunan_sasaran_strategis_indikator_id">
                                                        <option value="" selected>- Pilih Indikator Sasaran Strategis
                                                            -
                                                        </option>
                                                        @foreach ($sasaran_strategis_indikator_options ?? [] as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <label for="">Target</label>
                                                <input type="text" name="tahunan_target"
                                                    id="tahunan_target_sasaran_strategis"
                                                    class="form-control decimal-input" readonly>
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <label for="">Realisasi</label>
                                                <input type="text" name="tahunan_realisasi" id="tahunan_realisasi"
                                                    class="form-control decimal-input">
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <h6>Karakteristik</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select select2" name="tahunan_karakteristik"
                                                        id="karakteristik_tahunan">
                                                        <option value="" selected>- Pilih Karakteristik -</option>
                                                        <option value="1">Semakin tinggi realisasi maka capaian
                                                            semakin bagus
                                                        </option>
                                                        <option value="2">Semakin rendah realisasi maka capaian
                                                            semakin bagus
                                                        </option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-lg-4 form-group">
                                                <label for="capaian">Capaian</label>
                                                <input type="text" name="tahunan_capaian" id="tahunan_capaian"
                                                    class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Tahunan --}}
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary w-50">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Table Pengukuran Kerja
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover"
                                        id="data-table-pengukuran-kinerja-perda">
                                        <thead class="table-info">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tahun</th>
                                                <th class="text-center">Triwulan</th>
                                                <th class="text-center">Capaian</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $index => $item)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td class="text-center">{{ $item->tahun }}</td>
                                                    <td class="text-center">
                                                        {{ $item->triwulan }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $item->capaian }} %
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="p-2">
                                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Edit Pengukuran Kinerja"
                                                                    class="btn btn-warning btn-sm" href="#">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </a>
                                                            </div>
                                                            <div class="p-2">
                                                                <button
                                                                    class="btn btn-danger btn-sm delete-laporan-kinerja"
                                                                    data-id="{{ $item->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Delete Pengukuran Kinerja">
                                                                    <i class="bi bi-trash3"></i>
                                                                </button>
                                                                <form id="delete-form-{{ $item->id }}" action="#"
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

                $('#data-table-pengukuran-kinerja-perda').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });

                const $triwulanSelect = $("#triwulan-select");
                const $sectionTriwulan = $("#section-triwulan");
                const $sectionTahunan = $("#section-tahunan");

                // Hide both sections initially
                $sectionTriwulan.hide();
                $sectionTahunan.hide();

                // Show or hide sections based on selected triwulan
                $triwulanSelect.change(function() {
                    if (this.value === "tahun") {
                        $sectionTriwulan.hide();
                        $sectionTahunan.show();
                    } else {
                        $sectionTriwulan.show();
                        $sectionTahunan.hide();
                    }
                });

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

                // Tahunan
                // Event listener for year selection
                function resetValues() {
                    // Reset nilai-nilai yang diinginkan ke nilai default mereka di sini
                    $('#tahunan_sasaran_strategis_id').val('').trigger('change');
                    $('#tahunan_sasaran_strategis_indikator_id').val('').trigger('change');
                    $('#tahunan_target_sasaran_strategis').val('');
                    $('#tahunan_realisasi').val('');
                    $('#karakteristik_tahunan').val('');
                    $('#tahunan_capaian').val('');
                }
                $('#tahun-select').change(function() {
                    resetValues(); // Panggil fungsi resetValues()
                    var selectedYear = $(this).val();
                    if (selectedYear) {
                        $.ajax({
                            url: "{{ route('perda.pengukuran-kinerja.get-indicator-tahunan') }}",
                            type: 'GET',
                            data: {
                                year: selectedYear
                            },
                            success: function(data) {
                                var strategisSelect = $('#tahunan_sasaran_strategis_id');
                                strategisSelect.empty();
                                strategisSelect.append(
                                    '<option value="" selected>- Pilih Sasaran Strategis -</option>'
                                );
                                $.each(data, function(key, value) {
                                    strategisSelect.append('<option value="' + key + '">' +
                                        value + '</option>');
                                });
                                strategisSelect.trigger(
                                    'change'); // Trigger change event to update select2
                            }
                        });
                    }
                });

                $('#tahunan_sasaran_strategis_id').on("select2:select", function(e) {
                    const el = "#tahunan_sasaran_strategis_indikator_id";
                    getIndikator($(this).val(), el);
                });

                $('#tahunan_sasaran_strategis_indikator_id').on("select2:select", function(e) {
                    const el = "#tahunan_target_sasaran_strategis";
                    getTargetTahunan($(this).val(), el);
                });

                // Event listener for selecting a strategis
                $('#tahunan_sasaran_strategis_id').on("select2:select", function(e) {
                    const el = "#tahunan_sasaran_strategis_indikator_id";
                    getIndikator($(this).val(), el);
                });

                // Event listener for selecting an indikator
                $('#tahunan_sasaran_strategis_indikator_id').on("select2:select", function(e) {
                    const el = "#tahunan_target_sasaran_strategis";
                    getTargetTahunan($(this).val(), el);
                });

                // Function to fetch and populate indicators
                function getIndikatorTahunan(id, element) {
                    $.ajax({
                        url: "{{ route('perda.pengukuran-kinerja.get-indicator-tahunan') }}",
                        data: {
                            id: id
                        },
                        success: function(result) {
                            let list = result.map(el => ({
                                id: el.id,
                                text: el.indikator_sasaran_strategis,
                            }));
                            $(element).html('').select2({
                                data: list,
                                theme: 'bootstrap-5'
                            });
                            if (list.length === 1) {
                                $(element).val(list[0].id).trigger('select2:select');
                            }
                        }
                    });
                }

                // Function to fetch and populate targets
                function getTargetTahunan(id, element) {
                    $.ajax({
                        url: "{{ route('perda.pengukuran-kinerja.get-target-tahunan') }}",
                        data: {
                            id: id
                        },
                        success: function(result) {
                            // Check if result is not empty and has target1 value
                            if (result && result.target1) {
                                // Set the value of the input field
                                $(element).val(result.target1);
                            }
                        }
                    });
                }
                // Tahunan

                $('#sasaran_strategis_id').on("select2:select", function(e) {
                    const el = "#sasaran_strategis_indikator_id";
                    getIndikator($(this).val(), el);
                });

                $('#sasaran_sub_kegiatan_indikator_id').on("select2:select", function(e) {
                    const el = "#sasaran_sub_kegiatan_target";
                    getTarget($(this).val(), el);
                });

                function getTarget(id, element) {
                    $.ajax({
                        url: "{{ route('perda.pengukuran-kinerja.get-target') }}",
                        data: {
                            id
                        },
                        success: function(result) {
                            let list = result.map(el => ({
                                id: el.id,
                                text: el.indikator_sasaran_strategis,
                            }));
                            $(element).html('').select2({
                                data: list,
                                theme: 'bootstrap-5'
                            });
                            if (list.length === 1) {
                                $(element).val(list[0].id).trigger(
                                    'select2:select');
                            }
                        }
                    });
                }

                function getIndikator(id, element) {
                    $.ajax({
                        url: "{{ route('perda.perencanaan-kinerja.sasaran-strategis.get-indicator') }}",
                        data: {
                            id
                        },
                        success: function(result) {
                            let list = result.map(el => ({
                                id: el.id,
                                text: el.indikator_sasaran_strategis,
                            }));
                            $(element).html('').select2({
                                data: list,
                                theme: 'bootstrap-5'
                            });
                            if (list.length === 1) {
                                $(element).val(list[0].id).trigger(
                                    'select2:select');
                            }
                        }
                    });
                }

                // Event listener for input fields
                $('#anggaran_realisasi, #anggaran_pagu').on('input', function() {
                    // Get the values of realisasi and pagu
                    var realisasi = parseFloat($('#anggaran_realisasi').val().replace(/\./g, '').replace(',',
                        '.')) || 0;
                    var pagu = parseFloat($('#anggaran_pagu').val().replace(/\D/g, '').replace(',', '.')) || 0;

                    // Calculate the achievement percentage
                    var achievement = pagu !== 0 ? (realisasi / pagu) * 100 : 0;

                    // Update the value of the capaian input field
                    $('#anggaran_capaian').val(achievement.toFixed(2));
                });

                $('#tahunan_realisasi, #tahunan_target_sasaran_strategis, #karakteristik_tahunan').on('change',
                    function() {
                        // Get the values of realisasi, target, and karakteristik
                        var realisasi = parseFloat($('#tahunan_realisasi').val()) || 0;
                        var target = parseFloat($('#tahunan_target_sasaran_strategis').val()) || 0;
                        var karakteristik = $('#karakteristik_tahunan').val();

                        // Calculate the capaian based on the selected karakteristik
                        var capaian;
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

                        // Update the value of the capaian input field
                        $('#tahunan_capaian').val(capaian.toFixed(2));
                    });

               
                    // adadada
                const sasaranSubKegiatanSelect = $('#sasaran_sub_kegiatan_id');
                const indikatorSelect = $('#sasaran_sub_kegiatan_indikator');
                const targetSelect = $('#sasaran_sub_kegiatan_target');
                const realisasiInput = $('#realisasi');
                const karakteristikSelect = $('#karakteristik');
                const capaianInput = $('#capaian');

                sasaranSubKegiatanSelect.on("select2:select", function() {
                    getSubKegiatanIndikator($(this).val());
                });

                indikatorSelect.on("select2:select", function() {
                    getTargetSubKegiatan($(this).val());
                });

                realisasiInput.add(targetSelect).add(karakteristikSelect).on("change", calculateCapaian);

                function getSubKegiatanIndikator(id) {
                    $.ajax({
                        url: "{{ route('perda.pengukuran-kinerja.get-indicator') }}",
                        data: {
                            id
                        },
                        success: function(result) {
                            let list = result.map(el => ({
                                id: el.id,
                                text: el.indikator_sub_kegiatan
                            }));
                            indikatorSelect.html('').select2({
                                data: list,
                                theme: 'bootstrap-5'
                            });
                            if (list.length === 1) {
                                indikatorSelect.val(list[0].id).trigger('select2:select');
                            }
                        },
                        error: function() {
                            alert("Failed to fetch indicators.");
                        }
                    });
                }

                function getTargetSubKegiatan(id) {
                    $.ajax({
                        url: "{{ route('perda.pengukuran-kinerja.get-target') }}",
                        data: {
                            id
                        },
                        success: function(result) {
                            let list = result.map(el => ({
                                id: el.id,
                                text: el.target
                            }));
                            targetSelect.html('').select2({
                                data: list,
                                theme: 'bootstrap-5'
                            });
                            if (list.length === 1) {
                                targetSelect.val(list[0].id).trigger('select2:select');
                            }
                        },
                        error: function() {
                            alert("Failed to fetch targets.");
                        }
                    });
                }

                function calculateCapaian() {
                    const realisasi = parseFloat(realisasiInput.val()) || 0;
                    const targetOption = targetSelect.find(":selected").text();
                    const target = parseFloat(targetOption) || 0;
                    const karakteristik = karakteristikSelect.val();
                    let capaian = 0;

                    if (karakteristik === "1") {
                        capaian = (realisasi / target) * 100;
                    } else if (karakteristik === "2") {
                        capaian = ((target - (realisasi - target)) / target) * 100;
                    }

                    capaianInput.val(capaian.toFixed(2));
                }
            });
        </script>
    @endpush
@endsection
