<div class="col-indikator-sasaran-bupati mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex justify-content-between my-3">
                    <h6>Indikator Sasaran Bupati</h6>
                    <button class="btn btn-danger btn-remove-indicator" type="button">Hapus</button>
                </div>
                <hr>
                <div class="col-12">
                    <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][indikator_sasaran_bupati]"
                        class="form-label">Indikator Sasaran
                        Bupati</label>
                    <input type="text" name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][indikator_sasaran_bupati]"
                        class="form-control">
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 my-2">
                            <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target_1]"
                                class="text-primary fw-bold">Target</label>
                        </div>
                        <div class="col-4">
                            <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target_1]"
                                class="form-label">2023</label>
                            <input type="text" name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target_1]"
                                class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target_2]"
                                class="form-label">2024</label>
                            <input type="text" name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target_2]"
                                class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target_3]"
                                class="form-label">2025</label>
                            <input type="text" name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target_3]"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][satuan]" class="form-label">Satuan</label>
                    <input type="text" id="indikator_sasaran_bupati[{{ $iter ?? 0 }}][satuan]"
                        class="form-control">
                </div>
                <div class="col-12 col-lg-6">
                    <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][penjelasan]"
                        class="form-label">Penjelasan</label>
                    <input type="text" name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][penjelasan]"
                        class="form-control">
                </div>
                <div class="col-12 col-lg-12 my-2">
                    <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][tipe_perhitungan]"
                        class="text-primary fw-bold">
                        Tipe Perhitungan
                    </label>
                    <select class="form-select" name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][tipe_perhitungan]">
                        <option value="-" selected disabled>- Pilih Tipe Perhitungan -</option>
                        <option value="kumulatif">Kumulatif</option>
                        <option value="non-kumulatif">Non-Kumulatif</option>
                    </select>
                </div>
                <div class="col-12 col-lg-4">
                    <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][sumber_data]" class="form-label">Sumber
                        Data</label>
                    <input type="text" name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][sumber_data]"
                        class="form-control">
                </div>
                <div class="col-12 col-lg-4">
                    <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][penanggung_jawab]"
                        class="form-label">Penanggung Jawab</label>
                    <input type="text" id="indikator_sasaran_bupati[{{ $iter ?? 0 }}][penanggung_jawab]"
                        class="form-control">
                </div>
                <div class="col-12 col-lg-4">
                    <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][simple_action]" class="form-label">Simple
                        Action</label>
                    <input type="text" id="indikator_sasaran_bupati[{{ $iter ?? 0 }}][simple_action]"
                        class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
