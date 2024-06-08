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
                    <label for="#" class="form-label fw-bold">Indikator Sasaran</label>
                    <input type="text" name="indikator_sasaran[{{ $iter }}][indikator_sasaran_strategis]"
                        id="" class="form-control" aria-describedby="Indikator Sasaran">
                </div>
                <div class="col-12 row my-3">
                    <label for="#" class="form-label fw-bold">Target</label>
                    <div class="col-4 form-group">
                        <label for="#" class="form-label label-target-1">2024</label>
                        <input type="text" name="indikator_sasaran[{{ $iter }}][target1]" id="decimal-input"
                            class="form-control decimal-input" aria-describedby="2024">
                    </div>
                    <div class="col-4 form-group">
                        <label for="#" class="form-label label-target-2">2025</label>
                        <input type="text" name="indikator_sasaran[{{ $iter }}][target2]" id=""
                            class="form-control decimal-input" aria-describedby="2025">
                    </div>
                    <div class="col-4 form-group">
                        <label for="#" class="form-label label-target-3">2026</label>
                        <input type="text" name="indikator_sasaran[{{ $iter }}][target3]" id=""
                            class="form-control decimal-input" aria-describedby="2026">
                    </div>
                </div>
                <x-admin.form.select col="col-12 col-lg-6" label="Satuan"
                    name="indikator_sasaran[{{ $iter }}][satuan_id]" :lists="$satuan_options" />
                <div class="col-12 col-lg-6 form-group">
                    <label for="#" class="form-label fw-bold">Penjelasan</label>
                    <input type="text" name="indikator_sasaran[{{ $iter }}][penjelasan]" class="form-control"
                        aria-describedby="Penjelasan">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="#" class="form-label fw-bold">Tipe Perhitungan</label>
                    <fieldset class="form-group">
                        <select class="form-select select2" id=""
                            name="indikator_sasaran[{{ $iter }}][tipe_perhitungan]">
                            <option value="-" selected>- Pilih Tipe Perhitungan -</option>
                            <option value="1" selected>Kumulatif</option>
                            <option value="2" selected>Non-Kumulatif</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="#" class="form-label fw-bold">Sumber Data</label>
                    <input type="text" name="indikator_sasaran[{{ $iter }}][sumber_data]" id=""
                        class="form-control" aria-describedby="Sumber Data">
                </div>
                <div class="col-12" id="col-penanggung-jawab{{ $iter }}">
                    <div class="row row-penanggung-jawab">
                        <x-admin.form.text col="col-11" label="Penanggung Jawab"
                            name="indikator_sasaran[{{ $iter }}][penanggung_jawab][]"
                            placeholder="Penanggung Jawab" />
                        <div class="col-1">
                            <label for="" class="form-label fw-bold">&nbsp;</label>
                            <div>
                                <button class="btn btn-success btn-add-penanggung-jawab" type="button"
                                    data-id="{{ $iter }}">
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
