<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Sasaran Kegiatan</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <x-admin.form.select label="Tahun" name="tahun" value="{{ $saske->tahun ?? '2024' }}" :lists="$tahun_options" />
            <x-admin.form.select label="Sasaran Program" name="perda_prog_id" value="{{ $saske->perda_prog_id ?? '' }}"
                :lists="$saspro_options" />
            @if ($old_pengampu['id'] ?? false)
                <input type="hidden" value="{{ $old_pengampu['id'] }}" name="old_pengampu_id">
                <x-admin.form.text col="{{ $old_pengampu['id'] ?? false ? 'col-3' : 'col-6' }}"
                    label="Pengampu yg dipilih" name="old_pengampu_name" value="{{ $old_pengampu['name'] }}"
                    readonly=true />
            @endif
            <x-admin.form.select col="{{ $old_pengampu['id'] ?? false ? 'col-3' : 'col-6' }}"
                label="{{ $old_pengampu['id'] ?? false ? 'Ubah Pengampu' : 'Pengampu' }}" name="pengampu_id"
                :lists="[]" id="get-data-pengampu" value="{{ $saspro->pengampu_id ?? '' }}" />
            <x-admin.form.text label="Sasaran Kegiatan" name="sasaran" value="{{ $saske->sasaran ?? '' }}" />
        </div>
    </div>
</div>

<div id="row-indikator-sasaran">
    @forelse ($saske->perda_kegia_ins ?? [] as $item)
        @php
            $key = Str::random(4);
        @endphp
        <div class="col-indikator-sasaran-{{ $key }} mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Kegiatan</h6>
                            @if ($loop->iteration == 1)
                                <button class="btn btn-primary" type="button"
                                    onclick="addComponent('row-indikator-sasaran', '{{ route('admin.perda.saske.indicator') }}')">Tambah</button>
                            @else
                                <button class="btn btn-danger" type="button"
                                    onclick="removeComponent('col-indikator-sasaran-{{ $key }}')">Hapus</button>
                            @endif
                        </div>
                        <hr>
                        <input type="hidden" name="indikator[{{ $key }}][id]" value="{{ $item->id }}">
                        <x-admin.form.text-area col="col-12" label="Indikator Kegiatan"
                            name="indikator[{{ $key }}][indikator]" value="{{ $item->indikator }}" />
                        <x-admin.form.text label="Target" name="indikator[{{ $key }}][target]"
                            value="{{ $item->target }}" />
                        <x-admin.form.select label="Satuan" name="indikator[{{ $key }}][satuan_id]"
                            :lists="$satuan_options" value="{{ $item->satuan_id }}" />
                        <x-admin.form.text label="Kegiatan" name="indikator[{{ $key }}][kegiatan]"
                            value="{{ $item->kegiatan }}" />
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
        <div class="col-indikator-sasaran mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Sasaran Kegiatan</h6>
                            <button class="btn btn-primary" type="button"
                                onclick="addComponent('row-indikator-sasaran', '{{ route('admin.perda.saske.indicator') }}')">Tambah</button>
                        </div>
                        <hr>
                        <x-admin.form.text-area col="col-12" label="Indikator Kegiatan"
                            name="indikator[{{ $key }}][indikator]" />
                        <x-admin.form.text label="Target" name="indikator[{{ $key }}][target]" />
                        <x-admin.form.select label="Satuan" name="indikator[{{ $key }}][satuan_id]"
                            :lists="$satuan_options" />
                        <x-admin.form.text label="Kegiatan" name="indikator[{{ $key }}][kegiatan]" />
                        <x-admin.form.text label="Anggaran" name="indikator[{{ $key }}][anggaran]" />
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


@push('scripts')
    <script>
        $(document).ready(function() {
            getDataPengampu('#get-data-pengampu');
        })
    </script>
@endpush
