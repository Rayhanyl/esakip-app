@php
    $key = Str::random(4);
@endphp
<div class="col-indikator-sasaran-{{ $key }} mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-12 d-flex justify-content-between my-3">
                    <h6>Indikator Sasaran Program</h6>
                    <button class="btn btn-danger" type="button"
                        onclick="removeComponent('col-indikator-sasaran-{{ $key }}')">Hapus</button>
                </div>
                <hr>
                <x-admin.form.text-area col="col-12" label="Indikator Program"
                    name="indikator[{{ $key }}][indikator]" />
                <x-admin.form.text label="Target" name="indikator[{{ $key }}][target]" />
                <x-admin.form.select label="Satuan" name="indikator[{{ $key }}][satuan_id]"
                    :lists="$satuan_options" />
                <x-admin.form.text label="Program" name="indikator[{{ $key }}][program]" />
                <x-admin.form.text label="Anggaran" name="indikator[{{ $key }}][anggaran]" />
            </div>
        </div>
    </div>
</div>
