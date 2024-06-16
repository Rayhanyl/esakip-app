@php
    $keyp = Str::random(4);
@endphp
<div class="row col-pengampu-{{ $keyp }}">
    <x-admin.form.select col="col-11" label="Pengampu" name="pengampu_id" :lists="[]" readonly="true" />
    <input type="hidden" name="pengampu[{{ $keyp }}][value]" value="1">
    <div class="col-1">
        <label for="" class="form-label fw-bold">&nbsp;</label>
        <div>
            <button class="btn btn-danger" type="button" onclick="removeComponent('col-pengampu-{{ $keyp }}')">
                <i class="bi bi-dash"></i>
            </button>
        </div>
    </div>
</div>
