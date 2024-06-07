<div class="col-indikator-sasaran-bupati mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex justify-content-between my-3">
                    <h6>Indikator Sasaran Sub-Kegiatan</h6>
                    <button class="btn btn-danger btn-remove-indicator" type="button">Hapus</button>
                </div>
                <hr>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Indikator Sub-Kegiatan</label>
                    <input type="text" id="pengampu" class="form-control" aria-describedby="pengampu"
                        name="indikator_sasaran[{{ $iter ?? 0 }}][indikator_sub_kegiatan]">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="target" class="form-label">Target</label>
                    <input type="text" id="target" class="form-control decimal-input"
                        aria-describedby="target" name="indikator_sasaran[{{ $iter ?? 0 }}][target]">
                </div>
                <div class="col-12 col-lg-3 form-group">
                    <label for="triwulan1" class="form-label">Triwulan 1</label>
                    <input type="text" id="triwulan1" class="form-control decimal-input"
                        aria-describedby="triwulan1" name="indikator_sasaran[{{ $iter ?? 0 }}][triwulan1]">
                </div>
                <div class="col-12 col-lg-3 form-group">
                    <label for="triwulan2" class="form-label">Triwulan 2</label>
                    <input type="text" id="triwulan2" class="form-control decimal-input"
                        aria-describedby="triwulan2" name="indikator_sasaran[{{ $iter ?? 0 }}][triwulan2]">
                </div>
                <div class="col-12 col-lg-3 form-group">
                    <label for="triwulan3" class="form-label">Triwulan 3</label>
                    <input type="text" id="triwulan3" class="form-control decimal-input"
                        aria-describedby="triwulan3" name="indikator_sasaran[{{ $iter ?? 0 }}][triwulan3]">
                </div>
                <div class="col-12 col-lg-3 form-group">
                    <label for="triwulan4" class="form-label">Triwulan 4</label>
                    <input type="text" id="triwulan4" class="form-control decimal-input"
                        aria-describedby="triwulan4" name="indikator_sasaran[{{ $iter ?? 0 }}][triwulan4]">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Satuan</label>
                    <fieldset class="form-group">
                        <select class="form-select select2" id="satuan"
                            name="indikator_sasaran[{{ $iter ?? 0 }}][satuan_id]">
                            <option value="" selected>- Pilih Satuan -</option>
                            @foreach ($satuan as $key)
                                <option value="{{ $key->id }}">{{ $key->satuan }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Sub-Kegiatan</label>
                    <input type="text" id="pengampu" class="form-control" aria-describedby="pengampu"
                        name="indikator_sasaran[{{ $iter ?? 0 }}][sub_kegiatan]">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="anggaran" class="form-label">Anggaran</label>
                    <input type="text" id="anggaran" class="form-control idr-currency"
                        aria-describedby="anggaran" name="indikator_sasaran[{{ $iter ?? 0 }}][anggaran]">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
