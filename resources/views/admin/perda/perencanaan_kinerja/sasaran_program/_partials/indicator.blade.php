<div class="col-indikator-sasaran-bupati mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex justify-content-between my-3">
                    <h6>Indikator Sasaran Program</h6>
                    <button class="btn btn-danger btn-remove-indicator" type="button">Hapus</button>
                </div>
                <hr>
                <div class="col-12 form-group">
                    <label for="pengampu" class="form-label">Indikator Sasaran</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][indikator_sasaran_program]"
                        id="pengampu" class="form-control" aria-describedby="pengampu">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Target</label>
                    <input type="number" name="indikator_sasaran[{{ $iter ?? 0 }}][target]" class="form-control"
                        aria-describedby="pengampu">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Satuan</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][satuan]" class="form-control"
                        aria-describedby="pengampu">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Program</label>
                    <input type="text" name="indikator_sasaran[{{ $iter ?? 0 }}][program]"" class="form-control"
                        aria-describedby="pengampu">
                </div>
                <div class="col-12 col-lg-6 form-group">
                    <label for="pengampu" class="form-label">Anggaran</label>
                    <input type="number" name="indikator_sasaran[{{ $iter ?? 0 }}][anggaran]"" class="form-control"
                        aria-describedby="pengampu">
                </div>
            </div>
        </div>
    </div>
</div>
