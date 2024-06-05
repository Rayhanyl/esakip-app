<div class="col-indikator-sasaran-bupati mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-12 d-flex justify-content-between my-3">
                    <h6>Indikator Sasaran Bupati</h6>
                    <button class="btn btn-danger btn-remove-indicator" type="button">Hapus</button>
                </div>
                <hr>
                <x-admin.form.text label="Indikator Sasaran Bupati"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][indikator_sasaran_bupati]" />
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 my-2">
                            <label class="text-primary fw-bold">Target</label>
                        </div>
                        <x-admin.form.text col="col-4" label="2024"
                            name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target1]" decimal="true"
                            type="text" />
                        <x-admin.form.text col="col-4" label="2025"
                            name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target2]" decimal="true"
                            type="text" />
                        <x-admin.form.text col="col-4" label="2026"
                            name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target3]" decimal="true"
                            type="text" />
                    </div>
                </div>
                <x-admin.form.select col="col-12 col-lg-6" label="Satuan"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][satuan_id]" :lists="$satuan_options" />
                <x-admin.form.text col="col-12 col-lg-6" label="Penjelasan"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][penjelasan]" />
                <x-admin.form.select col="col-12 col-lg-6" label="Tipe Perhitungan"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][tipe_perhitungan]" :lists="$tipe_perhitungan_options" />
                <x-admin.form.text col="col-12 col-lg-6" label="Sumber Data"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][sumber_data]" />
                <x-admin.form.text col="col-12 col-lg-12" label="Penanggung Jawab"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][penanggung_jawab]" />
                <div class="col-12" id="col-simple-action{{ $iter ?? 0 }}">
                    <div class="row row-simple-action">
                        <x-admin.form.text col="col-11" label="Simple Action"
                            name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][simple_action][]" />
                        <div class="col-1">
                            <label for="" class="form-label fw-bold">&nbsp;</label>
                            <div>
                                <button class="btn btn-success btn-add-simple-action" type="button"
                                    data-id="{{ $iter ?? 0 }}">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
