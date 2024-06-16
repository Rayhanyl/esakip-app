@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row g-4">
                    <div class="col-12">
                        <a href="{{ route('admin.pemkab.pengukuran.index') }}" class="text-subtitle text-muted fs-5">
                            <i class="bi bi-arrow-left-circle"></i>
                            Kembali ke halaman pengukuran kinerja
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <section class="section mt-3">
                <div class="card shadow rounded-4">
                    <div class="card-header">
                        <h4 class="card-title">Edit Pengukuran Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3"
                            action="{{ route('admin.pemkab.pengukuran.update', ['pengukuran' => $pengukuran->id]) }}"
                            enctype="multipart/form-data" method="POST">
                            @method('put')
                            @csrf
                            <div class="col-12 col-lg-6 form-group">
                                <label for="sasaran_bupati" class="form-label fw-bold">Sasaran Bupati</label>
                                <fieldset class="form-group">
                                    <select class="form-select select2" name="pemkab_sastra_id" id="sasaran_bupati">
                                        <option value="-" selected disabled>- Pilih Sasaran Bupati -</option>
                                        @foreach ($sasaran_bupati_options ?? [] as $key => $item)
                                            <option value="{{ $key }}"
                                                {{ $key == $pengukuran->pemkab_sastra_id ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="indikator_sasaran" class="form-label fw-bold">Indikator Sasaran</label>
                                <select name="pemkab_sastra_in_id" id="indikator_sasaran"
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
                                <input type="text" name="realisasi" id="realisasi" class="form-control"
                                    value="{{ $pengukuran->realisasi }}" min="0">
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="karakteristik" class="form-label fw-bold">Karakteristik</label>
                                <fieldset class="form-group">
                                    <select class="form-select" name="karakteristik" id="karakteristik">
                                        <option value="">- Pilih Karakteristik -</option>
                                        <option value="1" {{ '1' == $pengukuran->karakteristik ? 'selected' : '' }}>
                                            Semakin
                                            tinggi realisasi maka capaian semakin bagus</option>
                                        <option value="2" {{ '2' == $pengukuran->karakteristik ? 'selected' : '' }}>
                                            Semakin
                                            rendah realisasi maka capaian semakin bagus</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="capaian" class="form-label fw-bold">Capaian</label>
                                <input type="text" name="capaian" id="capaian" class="form-control">
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50 rounded-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {

                const sasaranBupatiId = '{{ $pengukuran->pemkab_sastra_id }}';
                const indikatorSasaranId = '{{ $pengukuran->pemkab_sastra_in_id }}';
                const targetSasaran = '{{ $pengukuran->target }}';

                getIndikator(sasaranBupatiId, indikatorSasaranId, targetSasaran);

                $('#sasaran_bupati').on("change", function() {
                    const sasaranBupatiId = $(this).val();
                    getIndikator(sasaranBupatiId);
                });
                $('#indikator_sasaran').on("change", function() {
                    const indikatorId = $(this).val();
                    getTarget(indikatorId, targetSasaran);
                });
                updateCapaian();
                $('#indikator_sasaran, #target_sasaran, #karakteristik, #realisasi').on('change', function() {
                    updateCapaian();
                });

            });

            function updateCapaian() {
                const karakteristik = $('#karakteristik').val();
                const realisasi = parseFloat($('#realisasi').val());
                const target = parseFloat($('#target_sasaran').val());
                const capaian = getCapaian(karakteristik, realisasi, target);
                $('#capaian').val(capaian);
            }

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

            function getIndikator(sasaranBupatiId, indikatorSasaranId = null, targetSasaran = null) {
                $.ajax({
                    url: "{{ route('admin.pemkab.pengukuran.get-indikator') }}",
                    data: {
                        id: sasaranBupatiId
                    },
                    success: function(result) {
                        let list = [];
                        result.forEach(el => {
                            const item = {
                                id: el.id,
                                text: el.indikator,
                            };
                            list.push(item);
                        });
                        $("#indikator_sasaran").html('').select2({
                            data: list,
                            theme: 'bootstrap-5'
                        });
                        if (indikatorSasaranId) {
                            $('#indikator_sasaran').val(indikatorSasaranId).trigger('change');
                        }
                    }
                });
            }

            function getTarget(indikatorId, targetSasaran = null) {
                $.ajax({
                    url: "{{ route('admin.pemkab.pengukuran.get-target') }}",
                    data: {
                        id: indikatorId
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
                        if (targetSasaran) {
                            $('#target_sasaran').val(targetSasaran).trigger('change');
                        }
                    }
                });
            }
        </script>
    @endpush
@endsection
