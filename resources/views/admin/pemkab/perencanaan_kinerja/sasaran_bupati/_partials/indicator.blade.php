<div class="col-indikator-sasaran-bupati mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
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
                            name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target1]" type="number" />
                        <x-admin.form.text col="col-4" label="2025"
                            name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target2]" type="number" />
                        <x-admin.form.text col="col-4" label="2026"
                            name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target3]" type="number" />
                    </div>
                </div>
                <x-admin.form.text col="col-12 col-lg-6" label="Satuan"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][satuan]" />
                <x-admin.form.text col="col-12 col-lg-6" label="Penjelasan"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][penjelasan]" />
                <div class="col-12 col-lg-6 my-2">
                    <label for="indikator_sasaran_bupati[{{ $iter ?? 0 }}][tipe_perhitungan]"
                        class="text-primary fw-bold">
                        Tipe Perhitungan
                    </label>
                    <select class="form-select" name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][tipe_perhitungan]">
                        <option value="-" selected disabled>- Pilih Tipe Perhitungan -</option>
                        <option value="1">Kumulatif</option>
                        <option value="2">Non-Kumulatif</option>
                    </select>
                </div>
                <x-admin.form.text col="col-12 col-lg-6" label="Sumber Data"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][sumber_data]" />
                <x-admin.form.text col="col-12 col-lg-6" label="Penanggung Jawab"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][penanggung_jawab]" />
                <x-admin.form.text col="col-12 col-lg-6" label="Simple Action"
                    name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][simple_action]" />
            </div>
        </div>
    </div>
</div>
