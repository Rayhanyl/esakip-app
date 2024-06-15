@php
    $key = Str::random(4);
@endphp
<div class="row row-penanggung-jawab-{{ $key }}">
    <x-admin.form.text col="col-11" label="Penanggung Jawab"
        name="indikator_sasaran_bupati[{{ $params }}][penanggung_jawab][]" placeholder="Penanggung Jawab" />
    <div class="col-1">
        <label for="" class="form-label fw-bold">&nbsp;</label>
        <div>
            <button class="btn btn-danger" type="button"
                onclick="removeComponent('row-penanggung-jawab-{{ $key }}')">
                <i class="bi bi-dash"></i>
            </button>
        </div>
    </div>
</div>
