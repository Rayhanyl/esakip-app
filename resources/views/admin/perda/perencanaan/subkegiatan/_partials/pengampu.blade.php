@php
    $keyp = Str::random(4);
@endphp
<div class="row col-pengampu-{{ $keyp }}">
    <x-admin.form.select col="col-11" label="Pengampu" class="get-data-pengampu"
        name="pengampu[{{ $keyp }}][value]" :lists="[]" />
    <div class="col-1">
        <label for="" class="form-label fw-bold">&nbsp;</label>
        <div>
            <button class="btn btn-danger" type="button" onclick="removeComponent('col-pengampu-{{ $keyp }}')">
                <i class="bi bi-dash"></i>
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        getDataPengampu('.get-data-pengampu');
    })
</script>
