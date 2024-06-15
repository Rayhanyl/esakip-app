<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Sasaran Bupati</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <x-admin.form.select label="Tahun" name="tahun" value="{{ $pemkabSastra->tahun ?? '2024' }}"
                :lists="$tahun_options" />
            <x-admin.form.text label="Sasaran Bupati" name="sasaran" value="{{ $pemkabSastra->sasaran ?? '' }}" />
            <x-admin.form.select label="Pengampu" name="pengampu_id" :lists="[]" readonly="true" />
            <input type="hidden" name="pengampu_id" value="1">
        </div>
    </div>
</div>

<div id="row-indikator-sasaran-bupati">
    @php
        $key = Str::random(4);
    @endphp
    @if (isset($pemkabSastra->pemkab_sastra_ins))
        @foreach ($pemkabSastra->pemkab_sastra_ins as $item)
            <div class="col-indikator-sasaran-bupati mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 d-flex justify-content-between my-3">
                                <h6>Indikator Sasaran Bupati</h6>
                                <button class="btn btn-primary" type="button"
                                    onclick="addComponent('row-indikator-sasaran-bupati', '{{ route('admin.pemkab.sastra.indicator') }}')">Tambah</button>
                            </div>
                            <hr>
                            <input type="hidden" name="indikator[{{ $key }}][indikator]"
                                value="{{ $item->id }}">
                            <x-admin.form.text-area label="Indikator
                            Sasaran Bupati"
                                name="indikator[{{ $key }}][indikator]" />
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="fw-bold">Target</label>
                                    </div>
                                    <x-admin.form.text col="col-4" label="2024"
                                        name="indikator[{{ $key }}][target1]" decimal="true" type="text"
                                        classinput="label-target-1" />
                                    <x-admin.form.text col="col-4" label="2025"
                                        name="indikator[{{ $key }}][target2]" decimal="true" type="text"
                                        classinput="label-target-2" />
                                    <x-admin.form.text col="col-4" label="2026"
                                        name="indikator[{{ $key }}][target3]" decimal="true" type="text"
                                        classinput="label-target-3" />
                                </div>
                            </div>
                            <x-admin.form.select label="Satuan" name="indikator[{{ $key }}][satuan_id]"
                                :lists="$satuan_options" />
                            <x-admin.form.text label="Penjelasan" name="indikator[{{ $key }}][penjelasan]" />
                            <x-admin.form.select label="Tipe Perhitungan"
                                name="indikator[{{ $key }}][tipe_perhitungan]" :lists="$tipe_perhitungan_options" />
                            <x-admin.form.text label="Sumber Data"
                                name="indikator[{{ $key }}][sumber_data]" />
                            <div class="col-12" id="col-penanggung-jawab-{{ $key }}">
                                <div class="row row-penanggung-jawab">
                                    <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                        name="indikator[{{ $key }}][penanggung_jawab][]"
                                        placeholder="Penanggung Jawab" />
                                    <div class="col-1">
                                        <label for="" class="form-label fw-bold">&nbsp;</label>
                                        <div>
                                            <button class="btn btn-success" type="button"
                                                onclick="addSubComponent('col-penanggung-jawab-{{ $key }}', '{{ route('admin.pemkab.sastra.penanggung-jawab') }}', '{{ $key }}')">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="col-simple-action-{{ $key }}">
                                <div class="row row-simple-action-{{ $key }}">
                                    <x-admin.form.text col="col-11" label="Simple Action"
                                        name="indikator[{{ $key }}][simple_action][]"
                                        placeholder="Simple Action" />
                                    <div class="col-1">
                                        <label for="" class="form-label fw-bold">&nbsp;</label>
                                        <div>
                                            <button class="btn btn-success" type="button"
                                                onclick="addSubComponent('col-simple-action-{{ $key }}', '{{ route('admin.pemkab.sastra.simple-action') }}', '{{ $key }}')">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-indikator-sasaran-bupati mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Sasaran Bupati</h6>
                            <button class="btn btn-primary" type="button"
                                onclick="addComponent('row-indikator-sasaran-bupati', '{{ route('admin.pemkab.sastra.indicator') }}')">Tambah</button>
                        </div>
                        <hr>
                        <x-admin.form.text-area col="col-12" label="Indikator Sasaran Bupati"
                            name="indikator[{{ $key }}][indikator]" />
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="fw-bold">Target</label>
                                </div>
                                <x-admin.form.text col="col-4" label="2024"
                                    name="indikator[{{ $key }}][target1]" decimal="true" type="text"
                                    classinput="label-target-1" />
                                <x-admin.form.text col="col-4" label="2025"
                                    name="indikator[{{ $key }}][target2]" decimal="true" type="text"
                                    classinput="label-target-2" />
                                <x-admin.form.text col="col-4" label="2026"
                                    name="indikator[{{ $key }}][target3]" decimal="true" type="text"
                                    classinput="label-target-3" />
                            </div>
                        </div>
                        <x-admin.form.select col="col-4" label="Satuan" name="indikator[{{ $key }}][satuan_id]"
                            :lists="$satuan_options" />
                        <x-admin.form.text-area col="col-8" label="Penjelasan"
                            name="indikator[{{ $key }}][penjelasan]" />
                        <x-admin.form.select label="Tipe Perhitungan"
                            name="indikator[{{ $key }}][tipe_perhitungan]" :lists="$tipe_perhitungan_options" />
                        <x-admin.form.text label="Sumber Data" name="indikator[{{ $key }}][sumber_data]" />
                        <div class="col-12" id="col-penanggung-jawab-{{ $key }}">
                            <div class="row row-penanggung-jawab">
                                <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                    name="indikator[{{ $key }}][penanggung_jawab][]"
                                    placeholder="Penanggung Jawab" />
                                <div class="col-1">
                                    <label for="" class="form-label fw-bold">&nbsp;</label>
                                    <div>
                                        <button class="btn btn-success" type="button"
                                            onclick="addSubComponent('col-penanggung-jawab-{{ $key }}', '{{ route('admin.pemkab.sastra.penanggung-jawab') }}', '{{ $key }}')">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="col-simple-action-{{ $key }}">
                            <div class="row row-simple-action-{{ $key }}">
                                <x-admin.form.text col="col-11" label="Simple Action"
                                    name="indikator[{{ $key }}][simple_action][]"
                                    placeholder="Simple Action" />
                                <div class="col-1">
                                    <label for="" class="form-label fw-bold">&nbsp;</label>
                                    <div>
                                        <button class="btn btn-success" type="button"
                                            onclick="addSubComponent('col-simple-action-{{ $key }}', '{{ route('admin.pemkab.sastra.simple-action') }}', '{{ $key }}')">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>


<div class="card">
    <div class="card-footer text-center">
        <button class="btn btn-primary btn-lg w-50">Submit</button>
    </div>
</div>
