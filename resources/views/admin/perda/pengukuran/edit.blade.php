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
                            <div class="card-body">
                                <form class="row g-3" action="{{ route('admin.perda.pengukuran.update', $pengukuran->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <x-admin.form.select col="col-12 col-lg-6" label="Tahun" name="tahun"
                                        :lists="$tahun_options" id="tahun-select2" value="{{ $pengukuran->tahun }}" />
                                    <x-admin.form.select col="col-12 col-lg-6" label="Triwulan" name="tipe"
                                        :lists="$triwulan_options" id="triwulan-select2" value="{{ $pengukuran->tipe }}"
                                        readonly=true />
                                    <div class="col-12" id="section-triwulan"
                                        {{ count($pengukuran->triwulans) > 0 ? '' : 'style=display:none' }}>
                                        <div class="row g-3">
                                            <x-admin.form.label-heading>
                                                Pengukuran Kinerja
                                            </x-admin.form.label-heading>
                                            <input type="hidden" name="triwulan_id" value="{{ $pengukuran->triwulans[0]->id ?? '' }}">
                                            <x-admin.form.select col="col-12 col-lg-6" label="Sasaran Strategis"
                                                name="sasaran_strategis_id" :lists="$sasaran_strategis_options"
                                                value="{{ $pengukuran->triwulans[0]->perda_sastra_id ?? '' }}" />
                                            <x-admin.form.select col="col-12 col-lg-6" label="Indikator Sasaran"
                                                name="sasaran_strategis_indikator_id" :lists="$sasaran_strategis_id_options"
                                                value="{{ $pengukuran->triwulans[0]->perda_sastra_in_id ?? '' }}" />
                                            <x-admin.form.select col="col-12 col-lg-4" label="Sasaran Sub-Kegiatan"
                                                name="sasaran_sub_kegiatan_id" :lists="$sasaran_sub_kegiatan_options"
                                                value="{{ $pengukuran->triwulans[0]->perda_sub_kegia_id ?? '' }}" />
                                            <x-admin.form.select col="col-12 col-lg-4"
                                                label="Indikator Sasaran Sub-Kegiatan"
                                                name="sasaran_sub_kegiatan_indikator_id" :lists="$sasaran_sub_kegiatan_id_options"
                                                value="{{ $pengukuran->triwulans[0]->perda_sub_kegia_in_id ?? '' }}" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Target Sasaran Sub-Kegiatan"
                                                name="sasaran_sub_kegiatan_target" readonly=true decimal=true
                                                value="{{ $pengukuran->triwulans[0]->perda_sub_kegia_target ?? '0' }}" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Realisasi" name="realisasi"
                                                decimal=true value="{{ $pengukuran->triwulans[0]->realisasi ?? '0' }}" />
                                            <x-admin.form.select col="col-12 col-lg-4" label="Karakteristik"
                                                name="karakteristik" :lists="$karakteristik_options"
                                                value="{{ $pengukuran->triwulans[0]->karakteristik ?? '1' }}" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Capaian" name="capaian"
                                                readonly=true value="{{ $pengukuran->triwulans[0]->capaian ?? '0' }}" />
                                            {{-- Anggaran --}}
                                            <x-admin.form.label-heading>
                                                Anggaran
                                            </x-admin.form.label-heading>
                                            <x-admin.form.text col="col-12 col-lg-6" label="Sub Kegiatan"
                                                name="anggaran_sub_kegiatan_id" readonly=true placeholder='-'
                                                value="{{ $pengukuran->triwulans[0]->anggaran_perda_sub_kegia_id ?? '' }}" />
                                            <x-admin.form.text col="col-12 col-lg-6" label="Pagu" name="anggaran_pagu"
                                                currency=true readonly=true
                                                value="{{ $pengukuran->triwulans[0]->anggaran_perda_sub_kegia_pagu ?? '' }}" />
                                            <x-admin.form.text col="col-12 col-lg-6" label="Realisasi"
                                                name="anggaran_realisasi" currency=true
                                                value="{{ $pengukuran->triwulans[0]->anggaran_perda_sub_kegia_realisasi ?? '' }}" />
                                            <x-admin.form.text col="col-12 col-lg-6" label="Capaian" name="anggaran_capaian"
                                                readonly=true
                                                value="{{ $pengukuran->triwulans[0]->anggaran_perda_sub_kegia_capaian ?? '1' }}" />
                                            {{-- Anggaran --}}
                                        </div>
                                    </div>
                                    <div class="col-12" id="section-tahunan"
                                        {{ count($pengukuran->tahunans) > 0 ? '' : 'style=display:none' }}>
                                        <div class="row g-3">
                                            <x-admin.form.label-heading>
                                                Tahunan
                                            </x-admin.form.label-heading>
                                            <input type="hidden" name="tahunan_id" value="{{ $pengukuran->tahunans[0]->id ?? '' }}">
                                            <x-admin.form.select col="col-12 col-lg-4" label="Sasaran Strategis"
                                                name="tahunan_sasaran_strategis_id" id="tahunan_sasaran_strategis_id"
                                                :lists="$sasaran_strategis_options"
                                                value="{{ $pengukuran->tahunans[0]->perda_sastra_id ?? '' }}" />
                                            <x-admin.form.select col="col-12 col-lg-4" label="Indikator Sasaran"
                                                name="tahunan_sasaran_strategis_indikator_id"
                                                id="tahunan_sasaran_strategis_indikator_id"
                                                value="{{ $pengukuran->tahunans[0]->perda_sastra_in_id ?? '' }}"
                                                :lists="$sasaran_strategis_id_options" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Target" name="tahunan_target"
                                                id="tahunan_target" readonly=true decimal=true
                                                value="{{ $pengukuran->tahunans[0]->tahunan_target ?? '' }}" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Realisasi"
                                                name="tahunan_realisasi" id="tahunan_realisasi" decimal=true
                                                value="{{ $pengukuran->tahunans[0]->tahunan_realisasi ?? '' }}" />
                                            <x-admin.form.select col="col-12 col-lg-4" label="Karakteristik"
                                                name="tahunan_karakteristik" id="tahunan_karakteristik" :lists="$karakteristik_options"
                                                value="{{ $pengukuran->tahunans[0]->tahunan_karakteristik ?? '1' }}" />
                                            <x-admin.form.text col="col-12 col-lg-4" label="Capaian"
                                                name="tahunan_capaian" id="tahunan_capaian" readonly=true
                                                value="{{ $pengukuran->tahunans[0]->tahunan_capaian ?? '' }}" />
                                        </div>
                                    </div>
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
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#triwulan-select2').on('select2:select', function() {
                show_hide($(this).val());
                getData('sastra', $('#tahun-select2').val(), '#tahunan_sasaran_strategis_id');
                getData('sastra', $('#tahun-select2').val(), '#id-sasaran_strategis_id');
                getData('sasubkegia', $('#tahun-select2').val(), '#id-sasaran_sub_kegiatan_id');
            })
            $('#tahun-select2').on('select2:select', function() {
                getData('sastra', $(this).val(), '#tahunan_sasaran_strategis_id');
                getData('sastra', $(this).val(), '#id-sasaran_strategis_id');
                getData('sasubkegia', $(this).val(), '#id-sasaran_sub_kegiatan_id');
                reset_form();
            })

            $('#id-sasaran_strategis_id').on('select2:select', function() {
                getData('sastra_in', $(this).val(), $('#id-sasaran_strategis_indikator_id'));
            });
            $('#id-sasaran_sub_kegiatan_id').on('select2:select', function() {
                getData('sasubkegia_in', $(this).val(), $('#id-sasaran_sub_kegiatan_indikator_id'));
            });
            $('#id-sasaran_sub_kegiatan_indikator_id').on('select2:select', function() {
                getSubData($(this).val(), $('#triwulan-select2').val(), $('#sasaran_sub_kegiatan_target'));
                getValue('anggaran_sasubkegia', $(this).val(), '#anggaran_sub_kegiatan_id');
                getPagu($(this).val(), $('#anggaran_pagu'));
            });

            function getPagu(id, element) {
                $.get("{{ route('admin.perda.pengukuran.get-pagu') }}", {
                    id
                }, function(data) {
                    $(element).val(data);
                });
            }

            $('#tahunan_sasaran_strategis_id').on('select2:select', function() {
                getData('sastra_in', $(this).val(), $(
                    '#tahunan_sasaran_strategis_indikator_id'));
            });

            $('#tahunan_sasaran_strategis_indikator_id').on('select2:select', function() {
                getValue('target_tahunan', $(this).val(), $(
                    '#tahunan_target'));
            });
            $('#realisasi').on('keydown', function() {
                calculateCapaian();
            })
            $('#karakteristik').on('select2:select', function() {
                calculateCapaian();
            })

            $('#tahunan_realisasi').on('keydown', function() {
                calculateCapaianTahunan();
            })
            $('#tahunan_karakteristik').on('select2:select', function() {
                calculateCapaianTahunan();
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

            function calculateCapaianTahunan() {
                const realisasi = parseFloat($('#tahunan_realisasi').val()) || 0;
                const target = parseFloat($('#tahunan_target').val()) || 0;
                const karakteristik = $('#tahunan_karakteristik').val();
                let capaian = 0;
                if (karakteristik === "1") {
                    capaian = (realisasi / target) * 100;
                } else if (karakteristik === "2") {
                    capaian = ((target - (realisasi - target)) / target) * 100;
                }

                $('#tahunan_capaian').val(capaian.toFixed(2));
            }

            function getValue(type, params, element) {
                $.ajax({
                    url: "{{ route('admin.perda.pengukuran.get-value') }}",
                    data: {
                        type,
                        params,
                    },
                    success: function(result) {
                        $(element).val(result);
                    }
                });
            }

            function getSubData(id, triwulan, element) {
                $.ajax({
                    url: "{{ route('admin.perda.pengukuran.get-sub-data') }}",
                    data: {
                        id,
                        triwulan,
                    },
                    success: function(result) {
                        $(element).val(result);
                    }
                });
            }

            function getData(type, params, element) {
                $.ajax({
                    url: "{{ route('admin.perda.pengukuran.get-data') }}",
                    data: {
                        type,
                        params,
                    },
                    success: function(result) {
                        let list = result.map(el => ({
                            id: el.id,
                            text: el.sasaran || el.indikator,
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

            function show_hide(label) {
                if (label == 'tahun') {
                    $('#section-tahunan').show();
                    $('#section-triwulan').hide();
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
        })
    </script>
@endpush
