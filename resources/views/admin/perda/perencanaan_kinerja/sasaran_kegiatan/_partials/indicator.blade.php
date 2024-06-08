<div class="col-indikator-sasaran-bupati mt-3">
    <div class="row">
        <div class="col-12 d-flex justify-content-between my-3">
            <h6>Indikator Sasaran Kegiatan</h6>
            <button class="btn btn-danger btn-remove-indicator" type="button">Hapus</button>
        </div>
        <hr>
        <div class="col-12 col-lg-4 form-group">
            <label for="indikator_kegiatan" class="form-label">Indikator Kegiatan</label>
            <input type="text" id="indikator_kegiatan" class="form-control" aria-describedby="pengampu"
                name="indikator_sasaran[{{ $iter ?? 0 }}][indikator_kegiatan]">
        </div>
        <div class="col-12 col-lg-4 form-group">
            <label for="target" class="form-label">Target</label>
            <input type="text" id="target" class="form-control decimal-input"
            aria-describedby="target" name="indikator_sasaran[{{ $iter ?? 0 }}][target]">
        </div>
        <div class="col-12 col-lg-4 form-group">
            <x-admin.form.select col="col-12" label="Satuan"
            name="indikator_sasaran[{{ $iter ?? 0 }}][satuan_id]" :lists="$satuan_options" />
        </div>
        <div class="col-12 col-lg-4 form-group">
            <label for="kagiatan" class="form-label">Kegiatan</label>
            <input type="text" id="kagiatan" class="form-control" aria-describedby="pengampu"
                name="indikator_sasaran[{{ $iter ?? 0 }}][kegiatan]">
        </div>
        <div class="col-12 col-lg-4 form-group">
            <label for="anggaran" class="form-label">Anggaran</label>
            <input type="text" id="anggaran" class="form-control idr-currency"
            aria-describedby="anggaran" name="indikator_sasaran[{{ $iter ?? 0 }}][anggaran]">
        </div>
    </div>
</div>
