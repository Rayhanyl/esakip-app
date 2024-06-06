@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Edit Pengukuran Kinerja</h3>
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
                            <div class="card-body">
                                <form class="row g-3"
                                    action="{{ route('perda.pengukuran-kinerja.update', $perdaPengukuranKinerja->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <x-admin.form.select col="col-12 col-lg-6" label="Tahun" name="tahun"
                                        :lists="$tahun_options" value="{{ $perdaPengukuranKinerja->tahun }}" />
                                    <x-admin.form.select col="col-12 col-lg-6" label="Triwulan" name="triwulan"
                                        :lists="$triwulan_options" value="{{ $perdaPengukuranKinerja->triwulan }}" />
                                    <div class="col-12" id="section-triwulan">
                                        <div class="row g-3">
                                            <x-admin.form.label-heading>
                                                Pengukuran Kinerja
                                            </x-admin.form.label-heading>
                                            <x-admin.form.select col="col-12 col-lg-6" label="Sasaran Strategis"
                                                name="sasaran_strategis_id" :lists="$sasaran_strategis_options"
                                                value="{{ $perdaPengukuranKinerja->sasaran_strategis_id }}" />
                                            <x-admin.form.select col="col-12 col-lg-6" label="Indikator Sasaran"
                                                name="sasaran_strategis_indikator_id"
                                                value="{{ $perdaPengukuranKinerja->sasaran_strategis_indikator_id }}" />
                                            <x-admin.form.select col="col-12 col-lg-4" label="Sasaran Sub-Kegiatan"
                                                name="sasaran_sub_kegiatan_id" :lists="$sasaran_sub_kegiatan_options"
                                                value="{{ $perdaPengukuranKinerja->sasaran_sub_kegiatan_id }}" />
                                            <x-admin.form.select col="col-12 col-lg-4"
                                                label="Indikator Sasaran Sub-Kegiatan"
                                                name="sasaran_sub_kegiatan_indikator_id"
                                                value="{{ $perdaPengukuranKinerja->sasaran_sub_kegiatan_indikator_id }}" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Target Sasaran Sub-Kegiatan"
                                                name="sasaran_sub_kegiatan_target" readonly=true decimal=true
                                                value="{{ $perdaPengukuranKinerja->sasaran_sub_kegiatan_target }}" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Realisasi" name="realisasi"
                                                value="{{ $perdaPengukuranKinerja->realisasi }}" decimal=true />
                                            <x-admin.form.select col="col-12 col-lg-4" label="Karakteristik"
                                                value="{{ $perdaPengukuranKinerja->karakteristik }}" name="karakteristik"
                                                :lists="$karakteristik_options" value="1" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Capaian" name="capaian"
                                                readonly=true value="{{ $perdaPengukuranKinerja->capaian }}" />
                                            {{-- Anggaran --}}
                                            <x-admin.form.label-heading>
                                                Anggaran
                                            </x-admin.form.label-heading>
                                            <x-admin.form.select col="col-12 col-lg-6" label="Sub-Kegiatan"
                                                name="anggaran_sub_kegiatan_id" :lists="$sasaran_sub_kegiatan_options" readonly=true
                                                value="{{ $perdaPengukuranKinerja->anggaran_sub_kegiatan_id }}" />
                                            <x-admin.form.text col="col-12 col-lg-6" label="Pagu" name="anggaran_pagu"
                                                currency=true readonly=true
                                                value="{{ $perdaPengukuranKinerja->anggaran_pagu }}" />
                                            <x-admin.form.text col="col-12 col-lg-6" label="Realisasi"
                                                name="anggaran_realisasi" currency=true
                                                value="{{ $perdaPengukuranKinerja->anggaran_realisasi }}" />
                                            <x-admin.form.text col="col-12 col-lg-6" label="Capaian" name="anggaran_capaian"
                                                readonly=true value="{{ $perdaPengukuranKinerja->anggaran_capaian }}" />
                                            {{-- Anggaran --}}
                                        </div>
                                    </div>
                                    {{-- Triwulan --}}
                                    {{-- Tahunan --}}
                                    <div class="col-12" id="section-tahunan">
                                        <div class="row g-3">
                                            <x-admin.form.label-heading>
                                                Tahunan
                                            </x-admin.form.label-heading>
                                            <x-admin.form.select col="col-12 col-lg-4" label="Sasaran Strategis"
                                                name="tahunan_sasaran_strategis_id" :lists="$sasaran_strategis_options"
                                                value="{{ $perdaPengukuranKinerja->sasaran_strategis_id }}" />
                                            <x-admin.form.select col="col-12 col-lg-4" label="Indikator Sasaran"
                                                name="tahunan_sasaran_strategis_indikator_id"
                                                value="{{ $perdaPengukuranKinerja->sasaran_strategis_indikator_id }}" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Target" name="tahunan_target"
                                                readonly=true decimal=true />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Realisasi"
                                                name="tahunan_realisasi" decimal=true
                                                value="{{ $perdaPengukuranKinerja->tahunan_realisasi }}" />
                                            <x-admin.form.select col="col-12 col-lg-4" label="Karakteristik"
                                                name="tahunan_karakteristik" :lists="$karakteristik_options" value="1"
                                                value="{{ $perdaPengukuranKinerja->tahunan_karakteristik }}" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Capaian"
                                                name="tahunan_capaian" readonly=true
                                                value="{{ $perdaPengukuranKinerja->tahunan_capaian }}" />
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
                </div>
            </section>
        </div>
    </div>

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#section-triwulan').hide();
                $('#section-tahunan').hide();

                let data = @json($perdaPengukuranKinerja);
                getSasaranStrategisIndikator(data.sasaran_strategis_id, $('#id-sasaran_strategis_indikator_id'));
                getSasaranStrategisIndikator(data.sasaran_strategis_id, $(
                    '#id-tahunan_sasaran_strategis_indikator_id'));
                getSasaranSubKegiatanIndikator(data.sasaran_sub_kegiatan_id, $(
                    '#id-sasaran_sub_kegiatan_indikator_id'));
                visibility_form(data.triwulan);

                $('#id-tahun').on('select2:select', function() {
                    getSasaranStrategis($(this).val(), $('#id-tahunan_sasaran_strategis_id'));
                    getSasaranStrategis($(this).val(), $('#id-sasaran_strategis_id'));
                    reset_form();
                });
                $('#id-triwulan').on('select2:select', function() {
                    let triwulan = $(this).val();
                    getSasaranStrategis($('#id-tahun').val(), $('#id-sasaran_strategis_id'));
                    visibility_form(triwulan);
                    reset_form();
                });

                $('#id-sasaran_strategis_id').on('select2:select', function() {
                    getSasaranStrategisIndikator($(this).val(), $('#id-sasaran_strategis_indikator_id'));
                });
                $('#id-tahunan_sasaran_strategis_id').on('select2:select', function() {
                    getSasaranStrategisIndikator($(this).val(), $(
                        '#id-tahunan_sasaran_strategis_indikator_id'));
                });
                $('#id-tahunan_sasaran_strategis_indikator_id').on('select2:select', function() {
                    getTahunanSasaranTarget($(this).val());
                })

                function getTahunanSasaranTarget(id) {
                    $.get("{{ route('perda.pengukuran-kinerja.get-target-tahunan') }}", {
                        id
                    }, function(data) {
                        $('#tahunan_target').val(data);
                    });
                }

                $('#id-tahunan_sasaran_strategis_indikator_id').on('select2:select', function() {
                    getTahunanSasaranTarget($(this).val());
                })

                function getSasaranStrategis(tahun, element) {
                    $.get("{{ route('perda.pengukuran-kinerja.get-sasaran-strategis') }}", {
                        tahun
                    }, function(data) {
                        let list = data.map(el => ({
                            id: el.id,
                            text: el.sasaran_strategis,
                        }));
                        $(element).html('').select2({
                            data: list,
                            theme: 'bootstrap-5'
                        });
                        if (list.length === 1) {
                            $(element).val(list[0].id).trigger('select2:select');
                        }
                    });
                }

                function getSasaranStrategisIndikator(id, element) {
                    $.get("{{ route('perda.pengukuran-kinerja.get-indicator') }}", {
                        id
                    }, function(data) {
                        let list = data.map(el => ({
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
                    });
                }

                $('#id-sasaran_sub_kegiatan_id').on('select2:select', function() {
                    getSasaranSubKegiatanIndikator($(this).val(), $('#id-sasaran_sub_kegiatan_indikator_id'));
                    getSasaranSubKegiatanPagu($(this).val());
                    $('#id-anggaran_sub_kegiatan_id').val($(this).val()).trigger('change');
                });

                function getSasaranSubKegiatanPagu(id) {
                    $.get("{{ route('perda.pengukuran-kinerja.get-pagu-sub-kegiatan') }}", {
                        id
                    }, function(data) {
                        $('#anggaran_pagu').val(data[0].anggaran);
                    });
                }

                function getSasaranSubKegiatanIndikator(id, element) {
                    $.get("{{ route('perda.pengukuran-kinerja.get-indicator-sub-kegiatan') }}", {
                        id
                    }, function(data) {
                        let list = data.map(el => ({
                            id: el.id,
                            text: el.indikator_sub_kegiatan,
                        }));
                        $(element).html('').select2({
                            data: list,
                            theme: 'bootstrap-5'
                        });
                        if (list.length === 1) {
                            $(element).val(list[0].id).trigger('select2:select');
                        }
                    });
                }

                $('#id-sasaran_sub_kegiatan_indikator_id').on('select2:select', function() {
                    getSasaranSubKegiatanTarget($(this).val(), $('#id-triwulan').val());
                })

                function getSasaranSubKegiatanTarget(id, triwulan) {
                    $.get("{{ route('perda.pengukuran-kinerja.get-target-sub-kegiatan') }}", {
                        id,
                        triwulan
                    }, function(data) {
                        $('#sasaran_sub_kegiatan_target').val(data);
                    });
                }

                function visibility_form(triwulan) {
                    if (triwulan == 'tahun') {
                        $('#section-triwulan').hide();
                        $('#section-tahunan').show();
                    } else {
                        $('#section-triwulan').show();
                        $('#section-tahunan').hide();
                    }
                }

                function reset_form() {
                    $('#id-sasaran_strategis_id').val('').trigger('change');
                    $('#id-sasaran_strategis_indikator_id').val('').trigger('change');
                    $('#id-sasaran_sub_kegiatan_id').val('').trigger('change');
                    $('#id-sasaran_sub_kegiatan_indikator_id').val('').trigger('change');
                    $('#sasaran_sub_kegiatan_target').val('');
                    $('#realisasi').val('');
                    $('#id-karakteristik').val(1).trigger('change');
                    $('#capaian').val('');

                    $('#id-tahunan_sasaran_strategis_id').val('').trigger('change');
                    $('#id-tahunan_sasaran_strategis_indikator_id').val('').trigger('change');
                    $('#tahunan_target').val('');
                    $('#tahunan_realisasi').val('');
                    $('#id-tahunan_karakteristik').val(1).trigger('change');
                    $('#tahunan_capaian').val('');
                }

                $('#anggaran_realisasi').on('keydown', function() {
                    calculateCapaianAnggaran();
                })
                $('#id-anggaran_karakteristik').on('select2:select', function() {
                    calculateCapaianAnggaran();
                })

                function calculateCapaianAnggaran() {
                    const realisasi = parseFloat($('#anggaran_realisasi').val()) || 0;
                    const pagu = parseFloat($('#anggaran_pagu').val().replace(/\D/g, '').replace(',', '.')) || 0;
                    let achievement = pagu !== 0 ? (realisasi / pagu) * 100 : 0;
                    $('#anggaran_capaian').val(achievement.toFixed(2));
                }

                $('#tahunan_realisasi').on('keydown', function() {
                    calculateCapaianTahunan();
                })
                $('#id-tahunan_karakteristik').on('select2:select', function() {
                    calculateCapaianTahunan();
                })

                function calculateCapaianTahunan() {
                    const realisasi = parseFloat($('#tahunan_realisasi').val()) || 0;
                    const target = parseFloat($('#tahunan_target').val()) || 0;
                    const karakteristik = $('#id-tahunan_karakteristik').val();
                    let capaian = 0;
                    if (karakteristik === "1") {
                        capaian = (realisasi / target) * 100;
                    } else if (karakteristik === "2") {
                        capaian = ((target - (realisasi - target)) / target) * 100;
                    }

                    $('#tahunan_capaian').val(capaian.toFixed(2));
                }

                $('#realisasi').on('keydown', function() {
                    calculateCapaian();
                })
                $('#id-karakteristik').on('select2:select', function() {
                    calculateCapaian();
                })

                function calculateCapaian() {
                    const realisasi = parseFloat($('#realisasi').val()) || 0;
                    const target = parseFloat($('#sasaran_sub_kegiatan_target').val()) || 0;
                    const karakteristik = $('#id-karakteristik').val();
                    let capaian = 0;

                    if (karakteristik === "1") {
                        capaian = (realisasi / target) * 100;
                    } else if (karakteristik === "2") {
                        capaian = ((target - (realisasi - target)) / target) * 100;
                    }

                    $('#capaian').val(capaian.toFixed(2));
                }
            });
        </script>
    @endpush
@endsection
