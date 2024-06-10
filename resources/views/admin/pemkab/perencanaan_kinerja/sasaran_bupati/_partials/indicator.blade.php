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
                    name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][indikator_sasaran_bupati]" />
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 my-2">
                            <label class="text-primary fw-bold">Target</label>
                        </div>
                        <x-admin.form.text col="col-4 label-target-1" label="{{ $tahun }}"
                            name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][target1]" decimal="true"
                            type="text" />
                        <x-admin.form.text col="col-4 label-target-2" label="{{ $tahun + 1 }}"
                            name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][target2]" decimal="true"
                            type="text" />
                        <x-admin.form.text col="col-4 label-target-3" label="{{ $tahun + 2 }}"
                            name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][target3]" decimal="true"
                            type="text" />
                    </div>
                </div>
                <x-admin.form.select col="col-12 col-lg-6" label="Satuan"
                    name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][satuan_id]" :lists="$satuan_options" />
                <x-admin.form.text col="col-12 col-lg-6" label="Penjelasan"
                    name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][penjelasan]" />
                <x-admin.form.select col="col-12 col-lg-6" label="Tipe Perhitungan"
                    name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][tipe_perhitungan]" :lists="$tipe_perhitungan_options" />
                <x-admin.form.text col="col-12 col-lg-6" label="Sumber Data"
                    name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][sumber_data]" />
                <div class="col-12" id="col-penanggung-jawab{{ $iter + 500 ?? 0 }}">
                    <div class="row row-penanggung-jawab">
                        <x-admin.form.text col="col-11" label="Penanggung Jawab"
                            name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][penanggung_jawab][]"
                            placeholder="Penanggung Jawab" />
                        <div class="col-1">
                            <label for="" class="form-label fw-bold">&nbsp;</label>
                            <div>
                                <button class="btn btn-success btn-add-penanggung-jawab" type="button"
                                    data-id="{{ $iter + 500 ?? 0 }}">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" id="col-simple-action{{ $iter + 500 ?? 0 }}">
                    <div class="row row-simple-action">
                        <x-admin.form.text col="col-11" label="Simple Action"
                            name="indikator_sasaran_bupati[{{ $iter + 500 ?? 0 }}][simple_action][]"
                            placeholder="Simple Action" />
                        <div class="col-1">
                            <label for="" class="form-label fw-bold">&nbsp;</label>
                            <div>
                                <button class="btn btn-success btn-add-simple-action" type="button"
                                    data-id="{{ $iter + 500 ?? 0 }}">
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
