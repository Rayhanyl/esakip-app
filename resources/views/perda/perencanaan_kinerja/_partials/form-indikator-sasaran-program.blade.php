<div class="col-indikator-sasaran-bupati mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex justify-content-between my-3">
                    <h6>Indikator Sasaran Program</h6>
                    <button class="btn btn-danger btn-remove-indicator" type="button">Hapus</button>
                </div>
                <hr>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Indikator Program</label>
                    <input type="text" id="pengampu" class="form-control" aria-describedby="pengampu"
                        name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][indikator_program]">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Target</label>
                    <input type="text" id="pengampu" class="form-control" aria-describedby="pengampu"
                        name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][target]">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Satuan</label>
                    <input type="text" id="pengampu" class="form-control" aria-describedby="pengampu"
                        name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][satuan]">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Program</label>
                    <input type="text" id="pengampu" class="form-control" aria-describedby="pengampu"
                        name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][program]">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="anggaran" class="form-label">Anggaran</label>
                    <input type="text" id="pengampu" class="form-control" aria-describedby="anggaran"
                        name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][anggaran]">
                </div>
            </div>
        </div>
    </div>
</div>
