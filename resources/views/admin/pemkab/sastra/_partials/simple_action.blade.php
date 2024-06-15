@php
    $key = Str::random(4);
@endphp
<div class="row row-simple-action-{{ $key }}">
    <x-admin.form.text col="col-11" label="Simple Action"
        name="indikator_sasaran_bupati[{{ $params }}][simple_action][]" placeholder="Simple Action" />
    <div class="col-1">
        <label for="" class="form-label fw-bold">&nbsp;</label>
        <div>
            <button class="btn btn-danger" type="button"
                onclick="removeComponent('row-simple-action-{{ $key }}')">
                <i class="bi bi-dash"></i>
            </button>
        </div>
    </div>
</div>
