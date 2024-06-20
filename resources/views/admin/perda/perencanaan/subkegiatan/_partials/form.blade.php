<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Sasaran Sub Kegiatan</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <x-admin.form.select col="col-4" label="Tahun" name="tahun" value="{{ $sasubkegium->tahun ?? '2024' }}"
                :lists="$tahun_options" id="tahun_select2" />
            <x-admin.form.select col="col-4" label="Sasaran Kegiatan" name="perda_kegia_id"
                value="{{ $sasubkegium->perda_kegia_id ?? '' }}" :lists="$kegia_options" id="sasaran_select2" />
            <x-admin.form.text col="col-4" label="Sasaran Sub Kegiatan" name="sasaran"
                value="{{ $sasubkegium->sasaran ?? '' }}" />
            <div class="row" id="row-pengampu">
                @forelse ($sasubkegium->perda_subkegia_pengampus ?? [] as $pengampu)
                    @php
                        $keyp = Str::random(4);
                    @endphp
                    <div class="row col-pengampu-{{ $keyp }}">
                        @if ($pengampu->old_pengampu_id ?? false)
                            <input type="hidden" value="{{ $pengampu->old_pengampu_id }}" name="pengampu[{{ $keyp }}][old_id]">
                            <x-admin.form.text col="{{ ($pengampu->old_pengampu_id ?? false) ? 'col-5' : 'col-11' }}"
                                label="Pengampu yg dipilih" name="pengampu[{{ $keyp }}][old_value]" value="{{ $pengampu->old_pengampu_name }}"
                                readonly=true />
                        @endif
                        <x-admin.form.select col="{{ ($pengampu->old_pengampu_id ?? false) ? 'col-6' : 'col-11' }}"
                            label="{{ ($pengampu->old_pengampu_id ?? false) ? 'Ubah Pengampu' : 'Pengampu' }}"
                            name="pengampu[{{ $keyp }}][value]" :lists="[]" id="get-data-pengampu{{ $keyp }}" pengampu=true
                            value="{{ $value->pengampu_id ?? '' }}" />
                        <div class="col-1">
                            <label for="" class="form-label fw-bold">&nbsp;</label>
                            <div>
                                @if ($loop->iteration == 1)
                                    <button class="btn btn-success" type="button"
                                        onclick="addComponent('row-pengampu', '{{ route('admin.perda.sasubkegia.pengampu') }}')">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                @else
                                    <button class="btn btn-danger" type="button"
                                        onclick="removeComponent('col-pengampu-{{ $keyp }}')">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    @php
                        $keyp = Str::random(4);
                    @endphp
                    <div class="row col-pengampu-{{ $keyp }}">
                        <x-admin.form.select col="col-11" class="get-data-pengampu" label="Pengampu"
                            name="pengampu[{{ $keyp }}][value]" :lists="[]" />
                        <div class="col-1">
                            <label for="" class="form-label fw-bold">&nbsp;</label>
                            <div>
                                <button class="btn btn-success" type="button"
                                    onclick="addComponent('row-pengampu', '{{ route('admin.perda.sasubkegia.pengampu') }}')">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div id="row-indikator-sasaran">
    @forelse ($sasubkegium->perda_subkegia_ins ?? [] as $item)
        @php
            $key = Str::random(4);
        @endphp
        <div class="col-indikator-sasaran-{{ $key }} mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Sasaran Sub Kegiatan</h6>
                            @if ($loop->iteration == 1)
                                <button class="btn btn-primary" type="button"
                                    onclick="addComponent('row-indikator-sasaran', '{{ route('admin.perda.sasubkegia.indicator') }}')">Tambah</button>
                            @else
                                <button class="btn btn-danger" type="button"
                                    onclick="removeComponent('col-indikator-sasaran-{{ $key }}')">Hapus</button>
                            @endif
                        </div>
                        <hr>
                        <input type="hidden" name="indikator[{{ $key }}][id]" value="{{ $item->id }}">
                        <x-admin.form.text-area col="col-12" label="Indikator Sasaran Sub Kegiatan"
                            name="indikator[{{ $key }}][indikator]" value="{{ $item->indikator }}" />
                        <div class="col-12">
                            <div class="row">
                                <x-admin.form.text col="col-12" label="Target"
                                    name="indikator[{{ $key }}][target]" decimal="true"
                                    value="{{ $item->target }}" classinput="label-target-1" />
                                <x-admin.form.text col="col-3" label="Triwulan 1"
                                    name="indikator[{{ $key }}][triwulan1]" decimal="true"
                                    value="{{ $item->triwulan1 }}" classinput="label-target-1" />
                                <x-admin.form.text col="col-3" label="Triwulan 2"
                                    name="indikator[{{ $key }}][triwulan2]" decimal="true"
                                    value="{{ $item->triwulan2 }}" classinput="label-target-2" />
                                <x-admin.form.text col="col-3" label="Triwulan 3"
                                    name="indikator[{{ $key }}][triwulan3]" decimal="true"
                                    value="{{ $item->triwulan3 }}" classinput="label-target-3" />
                                <x-admin.form.text col="col-3" label="Triwulan 4"
                                    name="indikator[{{ $key }}][triwulan4]" decimal="true"
                                    value="{{ $item->triwulan4 }}" classinput="label-target-3" />
                            </div>
                        </div>
                        <x-admin.form.select label="Satuan" name="indikator[{{ $key }}][satuan_id]"
                            :lists="$satuan_options" value="{{ $item->satuan_id }}" id="satuan_select2" />
                        <x-admin.form.text label="Sub Kegiatan" name="indikator[{{ $key }}][subkegiatan]"
                            value="{{ $item->subkegiatan }}" />
                        <x-admin.form.text label="Anggaran" name="indikator[{{ $key }}][anggaran]"
                            value="{{ $item->anggaran }}" />
                    </div>
                </div>
            </div>
        </div>
    @empty
        @php
            $key = Str::random(4);
        @endphp
        <div class="col-indikator-sasaran-{{ $key }} mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Sasaran Sub Kegiatan</h6>
                            <button class="btn btn-primary" type="button"
                                onclick="addComponent('row-indikator-sasaran', '{{ route('admin.perda.sasubkegia.indicator') }}')">Tambah</button>
                        </div>
                        <hr>
                        <x-admin.form.text-area col="col-12" label="Indikator Sasaran Sub Kegiatan"
                            name="indikator[{{ $key }}][indikator]" />
                        <div class="col-12">
                            <div class="row">
                                <x-admin.form.text col="col-12" label="Target"
                                    name="indikator[{{ $key }}][target]" decimal="true"
                                    classinput="label-target-1" />
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
                        <x-admin.form.select col="col-4" label="Satuan"
                            name="indikator[{{ $key }}][satuan_id]" :lists="$satuan_options" />
                        <x-admin.form.text col="col-4" label="Sub Kegiatan"
                            name="indikator[{{ $key }}][subkegiatan]" />
                        <x-admin.form.text col="col-4" label="Anggaran"
                            name="indikator[{{ $key }}][anggaran]" />
                    </div>
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="card">
    <div class="card-footer text-center">
        <button class="btn btn-primary btn-lg w-50">Submit</button>
    </div>
</div>

