@php
    $key = Str::random(4);
@endphp
<div class="col-indikator-sasaran-{{ $key }} mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-12 d-flex justify-content-between my-3">
                    <h6>Indikator Sasaran Sub Kegiatan</h6>
                    <button class="btn btn-danger" type="button"
                        onclick="removeComponent('col-indikator-sasaran-{{ $key }}')">Hapus</button>
                </div>
                <hr>
                <x-admin.form.text-area col="col-12" label="Indikator Sasaran Sub Kegiatan"
                    name="indikator[{{ $key }}][indikator]" />
                <div class="col-12">
                    <div class="row">
                        <x-admin.form.text col="col-12" label="Target" name="indikator[{{ $key }}][target]"
                            decimal="true" classinput="label-target-1" />
                        <x-admin.form.text col="col-3" label="Triwulan 1"
                            name="indikator[{{ $key }}][triwulan1]" decimal="true"
                            classinput="label-target-1" />
                        <x-admin.form.text col="col-3" label="Triwulan 2"
                            name="indikator[{{ $key }}][triwulan2]" decimal="true"
                            classinput="label-target-2" />
                        <x-admin.form.text col="col-3" label="Triwulan 3"
                            name="indikator[{{ $key }}][triwulan3]" decimal="true"
                            classinput="label-target-3" />
                        <x-admin.form.text col="col-3" label="Triwulan 4"
                            name="indikator[{{ $key }}][triwulan4]" decimal="true"
                            classinput="label-target-3" />
                    </div>
                </div>
                <x-admin.form.select col="col-4" label="Satuan" name="indikator[{{ $key }}][satuan_id]"
                    :lists="$satuan_options" />
                <x-admin.form.text col="col-4" label="Sub Kegiatan"
                    name="indikator[{{ $key }}][subkegiatan]" />
                <x-admin.form.text col="col-4" label="Anggaran" name="indikator[{{ $key }}][anggaran]" />
            </div>
        </div>
    </div>
</div>
