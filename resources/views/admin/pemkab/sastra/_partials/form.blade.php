<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $title ?? '' }} Sasaran Bupati</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <x-admin.form.select label="Tahun" name="tahun" value="{{ $sastra->tahun ?? '2024' }}" :lists="$tahun_options" />
            <x-admin.form.text label="Sasaran Bupati" name="sasaran" value="{{ $sastra->sasaran ?? '' }}" />
            <x-admin.form.select label="Pengampu" name="pengampu_id" :lists="[]" readonly="true" />
            <input type="hidden" name="pengampu_id" value="1">
        </div>
    </div>
</div>

<div id="row-indikator-sasaran-bupati">
    @if (isset($sastra->pemkab_sastra_ins))
        @foreach ($sastra->pemkab_sastra_ins as $item)
            @php
                $key = Str::random(4);
            @endphp
            <div class="col-indikator-sasaran-bupati-{{ $key }} mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 d-flex justify-content-between my-3">
                                <h6>Indikator Sasaran Bupati</h6>
                                @if ($loop->iteration == 1)
                                    <button class="btn btn-primary" type="button"
                                        onclick="addComponent('row-indikator-sasaran-bupati', '{{ route('admin.pemkab.sastra.indicator') }}')">Tambah</button>
                                @else
                                    <button class="btn btn-danger" type="button"
                                        onclick="removeComponent('col-indikator-sasaran-bupati-{{ $key }}')">Hapus</button>
                                @endif
                            </div>
                            <hr>
                            <input type="hidden" name="indikator[{{ $key }}][id]" value="{{ $item->id }}">
                            <x-admin.form.text-area col="col-12" label="Indikator Sasaran Bupati"
                                name="indikator[{{ $key }}][indikator]" value="{{ $item->indikator }}" />
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="fw-bold">Target</label>
                                    </div>
                                    <x-admin.form.text col="col-4" label="2024"
                                        name="indikator[{{ $key }}][target1]" decimal="true"
                                        value="{{ $item->target1 }}" classinput="label-target-1" />
                                    <x-admin.form.text col="col-4" label="2025"
                                        name="indikator[{{ $key }}][target2]" decimal="true"
                                        value="{{ $item->target2 }}" classinput="label-target-2" />
                                    <x-admin.form.text col="col-4" label="2026"
                                        name="indikator[{{ $key }}][target3]" decimal="true"
                                        value="{{ $item->target3 }}" classinput="label-target-3" />
                                </div>
                            </div>
                            <x-admin.form.select col="col-4" label="Satuan"
                                name="indikator[{{ $key }}][satuan_id]" :lists="$satuan_options"
                                value="{{ $item->satuan_id }}" />
                            <x-admin.form.textarea col="col-8" label="Penjelasan"
                                name="indikator[{{ $key }}][penjelasan]" value="{{ $item->penjelasan }}" />
                            <x-admin.form.select label="Tipe Perhitungan"
                                name="indikator[{{ $key }}][tipe_perhitungan]" :lists="$tipe_perhitungan_options"
                                value="{{ $item->tipe_perhitungan }}" />
                            <x-admin.form.text label="Sumber Data" name="indikator[{{ $key }}][sumber_data]"
                                value="{{ $item->sumber_data }}" />
                            <div class="col-12" id="col-penanggung-jawab-{{ $key }}">
                                @if (isset($item->penanggung_jawabs))
                                    @foreach ($item->penanggung_jawabs as $item2)
                                        @php
                                            $key2 = Str::random(4);
                                        @endphp
                                        <div class="row row-penanggung-jawab-{{ $key2 }}">
                                            <input type="hidden"
                                                name="indikator[{{ $key }}][penanggung_jawab][{{ $key2 }}][id]"
                                                value="{{ $item2->id }}">
                                            <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                                name="indikator[{{ $key }}][penanggung_jawab][{{ $key2 }}][value]"
                                                placeholder="Penanggung Jawab"
                                                value="{{ $item2->penanggung_jawab }}" />
                                            <div class="col-1">
                                                <label for="" class="form-label fw-bold">&nbsp;</label>
                                                <div>
                                                    @if ($loop->iteration == 1)
                                                        <button class="btn btn-success" type="button"
                                                            onclick="addSubComponent('col-penanggung-jawab-{{ $key }}', '{{ route('admin.pemkab.sastra.penanggung-jawab') }}', '{{ $key }}')">
                                                            <i class="bi bi-plus"></i>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-danger" type="button"
                                                            onclick="removeComponent('row-penanggung-jawab-{{ $key2 }}')">
                                                            <i class="bi bi-dash"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row row-penanggung-jawab-{{ $key2 }}">
                                        <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                            name="indikator[{{ $key }}][penanggung_jawab][{{ $key2 }}][value]"
                                            placeholder="Penanggung Jawab" />
                                        <div class="col-1">
                                            <label for="" class="form-label fw-bold">&nbsp;</label>
                                            <div>
                                                @if ($loop->iteration == 1)
                                                    <button class="btn btn-success" type="button"
                                                        onclick="addSubComponent('col-penanggung-jawab-{{ $key }}', '{{ route('admin.pemkab.sastra.penanggung-jawab') }}', '{{ $key }}')">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                @else
                                                    <button class="btn btn-danger" type="button"
                                                        onclick="removeComponent('row-penanggung-jawab-{{ $key2 }}')">
                                                        <i class="bi bi-dash"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12" id="col-simple-action-{{ $key }}">
                                @if (isset($item->simple_actions))
                                    @foreach ($item->simple_actions as $item3)
                                        @php
                                            $key3 = Str::random(4);
                                        @endphp
                                        <div class="row row-simple-action-{{ $key3 }}">
                                            <input type="hidden"
                                                name="indikator[{{ $key }}][action][{{ $key3 }}][id]"
                                                value="{{ $item3->id }}">
                                            <x-admin.form.text col="col-11" label="Simple Action"
                                                name="indikator[{{ $key }}][action][{{ $key3 }}][value]"
                                                placeholder="Simple Action" value="{{ $item3->action }}" />
                                            <div class="col-1">
                                                <label for="" class="form-label fw-bold">&nbsp;</label>
                                                <div>
                                                    @if ($loop->iteration == 1)
                                                        <button class="btn btn-success" type="button"
                                                            onclick="addSubComponent('col-simple-action-{{ $key }}', '{{ route('admin.pemkab.sastra.simple-action') }}', '{{ $key }}')">
                                                            <i class="bi bi-plus"></i>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-danger" type="button"
                                                            onclick="removeComponent('row-simple-action-{{ $key3 }}')">
                                                            <i class="bi bi-dash"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @php
                                        $key3 = Str::random(4);
                                    @endphp
                                    <div class="row row-simple-action-{{ $key3 }}">
                                        <x-admin.form.text col="col-11" label="Simple Action"
                                            name="indikator[{{ $key }}][action][{{ $key3 }}][value]"
                                            placeholder="Simple Action" />
                                        <div class="col-1">
                                            <label for="" class="form-label fw-bold">&nbsp;</label>
                                            <div>
                                                @if ($loop->iteration == 1)
                                                    <button class="btn btn-success" type="button"
                                                        onclick="addSubComponent('col-simple-action-{{ $key }}', '{{ route('admin.pemkab.sastra.simple-action') }}', '{{ $key }}')">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                @else
                                                    <button class="btn btn-danger" type="button"
                                                        onclick="removeComponent('row-simple-action-{{ $key3 }}')">
                                                        <i class="bi bi-dash"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        @php
            $key = Str::random(4);
        @endphp
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
                        <x-admin.form.select col="col-4" label="Satuan"
                            name="indikator[{{ $key }}][satuan_id]" :lists="$satuan_options" />
                        <x-admin.form.text-area col="col-8" label="Penjelasan"
                            name="indikator[{{ $key }}][penjelasan]" />
                        <x-admin.form.select label="Tipe Perhitungan"
                            name="indikator[{{ $key }}][tipe_perhitungan]" :lists="$tipe_perhitungan_options" />
                        <x-admin.form.text label="Sumber Data" name="indikator[{{ $key }}][sumber_data]" />
                        <div class="col-12" id="col-penanggung-jawab-{{ $key }}">
                            @php
                                $key2 = Str::random(4);
                            @endphp
                            <div class="row row-penanggung-jawab-{{ $key2 }}">
                                <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                    name="indikator[{{ $key }}][penanggung_jawab][{{ $key2 }}][value]"
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
                            @php
                                $key2 = Str::random(4);
                            @endphp
                            <div class="row row-simple-action-{{ $key2 }}">
                                <x-admin.form.text col="col-11" label="Simple Action"
                                    name="indikator[{{ $key }}][action][{{ $key2 }}][value]"
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
