<div class="row row-penanggung-jawab">
    <x-admin.form.text col="col-11" label=""
        name="indikator_sasaran_bupati[{{ $iter ?? 0 }}][penanggung_jawab][]"
        placeholder="Penanggung Jawab" />
    <div class="col-1">
        <label for="" class="form-label fw-bold">&nbsp;</label>
        <div>
            <button class="btn btn-danger btn-remove-penanggung-jawab" type="button" data-id="{{ $iter ?? 0 }}">
                <i class="bi bi-dash"></i>
            </button>
        </div>
    </div>
</div>
