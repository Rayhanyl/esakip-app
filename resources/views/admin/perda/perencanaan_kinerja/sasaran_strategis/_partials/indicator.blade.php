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
                    <div class="col-4 form-group">
                        <label for="pengampu" class="form-label label-target-1">{{ $tahun }}</label>
                        <input type="number" name="indikator_sasaran[{{ $iter ?? 0 }}][target1]"
                            class="form-control" aria-describedby="pengampu">
                    </div>
                    <div class="col-4 form-group">
                        <label for="pengampu" class="form-label label-target-2">{{ $tahun + 1 }}</label>
                        <input type="number" name="indikator_sasaran[{{ $iter ?? 0 }}][target2]"
                            class="form-control" aria-describedby="pengampu">
                    </div>
                    <div class="col-4 form-group">
                        <label for="pengampu" class="form-label label-target-3">{{ $tahun + 2 }}</label>
                        <input type="number" name="indikator_sasaran[{{ $iter ?? 0 }}][target3]"
                            class="form-control" aria-describedby="pengampu">
                    </div>
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Satuan</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][satuan]" class="form-control"
                        aria-describedby="pengampu">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Penjelasan</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][penjelasan]""
                        class="form-control" aria-describedby="pengampu">
                </div>
                <div class="col-12 col-lg-12 form-group">
                    <h6>Tipe Perhitungan</h6>
                    <fieldset class="form-group">
                        <select class="form-select" id="basicSelect"
                            name="indikator_sasaran[{{ $iter ?? 0 }}][tipe_perhitungan]">
                            <option value="-" selected>- Pilih Tipe Perhitungan -</option>
                            <option value="1" selected>Kumulatif</option>
                            <option value="2" selected>Non-Kumulatif</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="pengampu" class="form-label">Sumber Data</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][sumber_data]" id="pengampu"
                        class="form-control" aria-describedby="pengampu">
                </div>
                <div class="col-12 col-lg-6">
                    <label for="pengampu" class="form-label">Penanggung Jawab</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][penanggung_jawab]"
                        id="pengampu" class="form-control" aria-describedby="pengampu">
                </div>
            </div>
        </div>
    </div>
</div>
