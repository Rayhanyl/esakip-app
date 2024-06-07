<div class="col-indikator-sasaran-bupati mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex justify-content-between my-3">
                    <h6>Indikator Sasaran Strategis</h6>
                    <button class="btn btn-danger btn-remove-indicator" type="button">Hapus</button>
                </div>
                <hr>
                <div class="col-12 form-group">
                    <label for="pengampu" class="form-label">Indikator Sasaran</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][indikator_sasaran_strategis]"
                        id="pengampu" class="form-control" aria-describedby="pengampu">
                </div>
                <div class="col-12 row my-3">
                    <h6>Target</h6>
                    <x-admin.form.text col="col-4" label="2024"
                        name="indikator_sasaran[{{ $iter ?? 0 }}][target1]" decimal="true" type="text"
                        classinput="label-target-1" />
                    <x-admin.form.text col="col-4" label="2025"
                        name="indikator_sasaran[{{ $iter ?? 0 }}][target2]" decimal="true" type="text"
                        classinput="label-target-2" />
                    <x-admin.form.text col="col-4" label="2026"
                        name="indikator_sasaran[{{ $iter ?? 0 }}][target3]" decimal="true" type="text"
                        classinput="label-target-3" />
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <x-admin.form.select col="col-12" label="Satuan"
                        name="indikator_sasaran[{{ $iter ?? 0 }}][satuan]" :lists="$satuan_options" />
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Penjelasan</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][penjelasan]" class="form-control"
                        aria-describedby="pengampu">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <x-admin.form.select col="col-12" label="Tipe Perhitungan"
                        name="indikator_sasaran[{{ $iter ?? 0 }}][tipe_perhitungan]" :lists="$tipe_perhitungan_options" />
                </div>
                <div class="col-12 col-lg-6">
                    <label for="pengampu" class="form-label">Sumber Data</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][sumber_data]" id="pengampu"
                        class="form-control" aria-describedby="pengampu">
                </div>
                <div class="col-12" id="col-penanggung-jawab1">
                    <div class="row row-penanggung-jawab">
                        <x-admin.form.text col="col-11" label="Penanggung Jawab"
                            name="indikator_sasaran[{{ $iter ?? 0 }}][penanggung_jawab][]"
                            placeholder="Penanggung Jawab" />
                        <div class="col-1">
                            <label for="" class="form-label fw-bold">&nbsp;</label>
                            <div>
                                <button class="btn btn-success btn-add-penanggung-jawab" type="button" data-id="1">
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
