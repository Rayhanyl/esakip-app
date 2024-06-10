@if ($iter == 0)
    @php
        $id = \Illuminate\Support\Str::random(4);
    @endphp
@endif
<div class="col-indikator-sasaran-bupati mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-12 d-flex justify-content-between my-3">
                    <h6>Indikator Sasaran Bupati</h6>
                    @if ($iter == 1)
                        <button class="btn btn-primary btn-add-indicator" type="button">Tambah</button>
                    @else
                        <button class="btn btn-danger btn-remove-indicator" type="button">Hapus</button>
                    @endif
                </div>
                <hr>
                <x-admin.form.text label="Indikator Sasaran Bupati"
                    name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][indikator_sasaran_bupati]"
                    value="{{ $indikator->indikator_sasaran_bupati ?? '' }}" />
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <label class="fw-bold">Target</label>
                        </div>
                        <x-admin.form.text col="col-4" label="2024"
                            name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][target1]" decimal="true"
                            type="text" classinput="label-target-1" value="{{ $indikator->target1 ?? '' }}" />
                        <x-admin.form.text col="col-4" label="2025"
                            name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][target2]" decimal="true"
                            type="text" classinput="label-target-2" value="{{ $indikator->target2 ?? '' }}" />
                        <x-admin.form.text col="col-4" label="2026"
                            name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][target3]" decimal="true"
                            type="text" classinput="label-target-3" value="{{ $indikator->target3 ?? '' }}" />
                    </div>
                </div>
                <x-admin.form.select col="col-12 col-lg-6" label="Satuan"
                    name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][satuan_id]" :lists="$satuan_options"
                    value="{{ $indikator->satuan_id ?? '' }}" />
                <x-admin.form.text col="col-12 col-lg-6" label="Penjelasan"
                    name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][penjelasan]"
                    value="{{ $indikator->penjelasan ?? '' }}" />
                <x-admin.form.select col="col-12 col-lg-6" label="Tipe Perhitungan"
                    name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][tipe_perhitungan]" :lists="$tipe_perhitungan_options"
                    value="{{ $indikator->tipe_perhitungan ?? '' }}" />
                <x-admin.form.text col="col-12 col-lg-6" label="Sumber Data"
                    name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][sumber_data]"
                    value="{{ $indikator->sumber_data ?? '' }}" />
                <div class="col-12" id="col-penanggung-jawab{{ $indikator->id ?? '' }}">
                    @forelse ($indikator->sasaran_penanggung_jawabs ?? [] as $jawab)
                        <div class="row row-penanggung-jawab">
                            <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][penanggung_jawab][{{ $jawab->id }}]"
                                placeholder="Penanggung Jawab" value="{{ $jawab->penanggung_jawab ?? '' }}" />
                            <div class="col-1">
                                <label for="" class="form-label fw-bold">&nbsp;</label>
                                <div>
                                    @if ($loop->iteration == 1)
                                        <button class="btn btn-success btn-add-penanggung-jawab" type="button"
                                            data-id="{{ $indikator->id ?? 0 + 1 }}">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-danger btn-remove-penanggung-jawab" type="button">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row row-penanggung-jawab">
                            <x-admin.form.text col="col-11" label="Penanggung Jawab"
                                name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][penanggung_jawab][]"
                                placeholder="Penanggung Jawab" value="{{ $jawab->penanggung_jawab ?? '' }}" />
                            <div class="col-1">
                                <label for="" class="form-label fw-bold">&nbsp;</label>
                                <div>
                                    <button class="btn btn-success btn-add-penanggung-jawab" type="button"
                                        data-id="{{ $indikator->id ?? 0 + 1 }}">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="col-12 col-simple-action">
                    @forelse ($indikator->simple_actions ?? [] as $simple)
                        <div class="row row-simple-action">
                            <x-admin.form.text col="col-11" label="Simple Action"
                                name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][simple_action][{{ $simple->id }}]"
                                placeholder="Simple Action" value="{{ $simple->simple_action ?? '' }}" />
                            <div class="col-1">
                                <label for="" class="form-label fw-bold">&nbsp;</label>
                                <div>
                                    @if ($loop->iteration == 1)
                                        <button class="btn btn-success btn-add-simple-action" type="button"
                                            data-id="{{ $indikator->id + 1 }}">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-danger btn-remove-simple-action" type="button">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row row-simple-action">
                            <x-admin.form.text col="col-11" label="Simple Action"
                                name="indikator_sasaran_bupati[{{ $indikator->id ?? '' }}][simple_action][]"
                                placeholder="Simple Action" value="{{ $simple->simple_action ?? '' }}" />
                            <div class="col-1">
                                <label for="" class="form-label fw-bold">&nbsp;</label>
                                <div>
                                    <button class="btn btn-success btn-add-simple-action" type="button"
                                        data-id="{{ $indikator->id ?? 0 + 1 }}">
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
</div>
