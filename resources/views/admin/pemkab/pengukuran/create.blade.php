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
            <section class="section mt-2">
                <div class="card shadow rounded-4">
                    <div class="card-header">
                        <h4 class="card-title">Create Pengukuran Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('admin.pemkab.pengukuran.store') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="col-12 col-lg-6 form-group">
                                <label for="sasaran_bupati" class="form-label fw-bold">Sasaran Bupati</label>
                                <fieldset class="form-group">
                                    <select class="form-select select2" name="pemkab_sastra_id" id="sasaran_bupati">
                                        <option value="-" selected disabled>- Pilih Sasaran Bupati -</option>
                                        @foreach ($sasaran_bupati_options ?? [] as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="indikator_sasaran" class="form-label fw-bold">Indikator Sasaran</label>
                                <select name="pemkab_sastra_in_id" id="indikator_sasaran" class="form-select select2">
                                    <option value="" selected disabled>--Pilih Indikator--</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="target" class="form-label fw-bold">Target Sasaran</label>
                                <select name="target" id="target" class="form-select select2" required>
                                    <option value="" selected disabled>--Pilih Target--</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="realisasi" class="form-label fw-bold">Realisasi</label>
                                <input type="text" name="realisasi" id="realisasi" class="form-control decimal-input"
                                    min="0" required>
                            </div>
                            <div class="col-12 col-lg-3 form-group">
                                <label for="karakteristik" class="form-label fw-bold">Karakteristik</label>
                                <fieldset class="form-group">
                                    <select class="form-select" name="karakteristik" id="karakteristik" required>
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
                                <button class="btn btn-primary w-50 rounded-4" type="submit">Submit</button>
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
                $('#sasaran_bupati').on("select2:select", function(e) {
                    getIndikator($(this).val());
                });

                $('#indikator_sasaran').on("select2:select", function(e) {
                    getTarget($(this).val());
                });

                $('#realisasi, #karakteristik, #target').on('change', function() {
                    const capaian = getCapaian($('#karakteristik').val(), $('#realisasi').val(), $(
                        '#target').val());
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
                        url: "{{ route('admin.pemkab.pengukuran.get-indikator') }}",
                        data: {
                            id
                        },
                        success: function(result) {
                            let list = result.map(el => ({
                                id: el.id,
                                text: el.indikator,
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
                        url: "{{ route('admin.pemkab.pengukuran.get-target') }}",
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
                            $("#target").html('').select2({
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
