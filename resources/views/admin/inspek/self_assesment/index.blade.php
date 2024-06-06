@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Self Assesment Perangkat Daerah</h3>
                        {{-- <p class="text-subtitle text-muted">
                            Navbar will appear on the top of the page.
                        </p> --}}
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                {{-- <li class="breadcrumb-item">
                                    <a href="index.html">Pengukuran Kinerja</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Layout Vertical Navbar
                                </li> --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('inspek.self-assesment.index') }}" method="get">
                            <div class="row g-3">
                                <x-admin.form.select col="col-12 col-lg-6" label="Tahun" name="tahun"
                                    value="{{ $tahun }}" :lists="$tahun_options" />
                                <x-admin.form.select col="col-12 col-lg-6" label="Perangkat Daerah" name="perangkat_daerah"
                                    value="{{ $perangkat_daerah }}" :lists="$user_options" />
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Pelaporan Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th>No</th>
                                        <th></th>
                                        <th></th>
                                        <th>Komponen/Sub Komponen/Kriteria</th>
                                        <th width="10%">Keterangan</th>
                                        <th>Eviden</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form
                                        action="{{ route('inspek.self-assesment.update', $perda_evaluasi_internal[0]->id ?? 0) }}"
                                        method="post" id="form_perda_evaluasi_internal" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        @foreach ($perda_evaluasi_internal as $pei)
                                            @foreach ($pei->komponens as $komponen)
                                                <tr>
                                                    <td class="bg-info fw-bold text-light" colspan="1">
                                                        {{ $komponen->no }}</td>
                                                    <td class="bg-info fw-bold text-light" colspan="3">
                                                        {{ $komponen->komponen }}
                                                    </td>
                                                    <td class="bg-info fw-bold text-light" colspan="1">
                                                        {{ $komponen->bobot }}
                                                    </td>
                                                    <td class="bg-info fw-bold text-light" colspan="1">
                                                    </td>
                                                </tr>
                                                @foreach ($komponen->sub_komponens as $sub_komponen)
                                                    <tr>
                                                        <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                                        <td class="bg-secondary fw-bold text-light" colspan="1">
                                                            {{ $sub_komponen->no }}
                                                        </td>
                                                        <td class="bg-secondary fw-bold text-light" colspan="2">
                                                            {{ $sub_komponen->sub_komponen }}
                                                        </td>
                                                        <td class="bg-secondary fw-bold text-light" colspan="2">
                                                            {{ $sub_komponen->bobot }}
                                                        </td>
                                                    </tr>
                                                    @foreach ($sub_komponen->kriterias as $kriteria)
                                                        <tr>
                                                            <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                                            <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                                            <td class="bg-secondary fw-bold text-light" colspan="1">
                                                                {{ $kriteria->no }}
                                                            </td>
                                                            <td class="bg-secondary fw-bold text-light" colspan="1">
                                                                {{ $kriteria->kriteria }}
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-select-sm" aria-label="1a"
                                                                    name="kriteria[{{ $kriteria->id }}][status]">
                                                                    @foreach ($kriteria->answers as $answer)
                                                                        <option value="{{ $answer->id }}"
                                                                            {{ (float) $answer->bobot == (float) $kriteria->status ? 'selected' : '' }}>
                                                                            {{ $answer->jawaban }} ({{ $answer->bobot }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    @if ($kriteria->upload)
                                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="Download File Kriteria"
                                                                            class="btn btn-success btn-sm"
                                                                            href="{{ route('perda.evaluasi-internal.download', $kriteria->upload) }}">
                                                                            <i
                                                                                class="bi bi-file-earmark-arrow-down-fill"></i>
                                                                            Download
                                                                        </a>
                                                                    @endif
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </form>
                                </tbody>
                                <tfoot>
                                    <td colspan="6" class="text-end">
                                        <button class="btn btn-primary btn-lg" type="submit"
                                            form="form_perda_evaluasi_internal">Submit</button>
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
