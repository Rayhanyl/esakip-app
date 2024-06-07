@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Evaluasi Internal</h3>
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
                <form class="row g-3" action="{{ route('perda.evaluasi-internal.index') }}" method="GET"
                    enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <h6>Tahun</h6>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="tahun">
                                                <option value="" selected>- Pilih Tahun -</option>
                                                @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ app('request')->input('tahun') == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card">
                    <div class="card-header">
                        @switch($status)
                            @case('new')
                                <h3 class="text-primary">Data Evaluasi Internal dapat diisi.</h3>
                            @break

                            @case('submit')
                                <h3 class="text-warning">Data Evaluasi Internal telah disubmit.</h3>
                            @break

                            @case('complete')
                                <h3 class="text-success">Data Evaluasi Internal telah dinilai.</h3>
                            @break

                            @default
                        @endswitch
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
                                        <th width="20%">Keterangan</th>
                                        <th>Eviden</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form
                                        action="{{ route('perda.evaluasi-internal.update', $perda_evaluasi_internal->id ?? 0) }}"
                                        method="post" id="form_perda_evaluasi_internal" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        @foreach ($perda_evaluasi_internal->komponens as $komponen)
                                            <tr>
                                                <td class="bg-info fw-bold text-light" colspan="1">
                                                    {{ $komponen->no }}</td>
                                                <td class="bg-info fw-bold text-light" colspan="1"></td>
                                                <td class="bg-info fw-bold text-light" colspan="4">
                                                    {{ $komponen->komponen }}
                                                </td>
                                            </tr>
                                            @foreach ($komponen->sub_komponens as $sub_komponen)
                                                <tr>
                                                    <td class="bg-secondary fw-bold text-light" colspan="1"></td>
                                                    <td class="bg-secondary fw-bold text-light" colspan="1">
                                                        {{ $sub_komponen->no }}
                                                    </td>
                                                    <td class="bg-secondary fw-bold text-light" colspan="4">
                                                        {{ $sub_komponen->sub_komponen }}
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
                                                                name="kriteria[{{ $kriteria->id }}][status]"
                                                                {{ in_array($status, ['submit', 'complete']) ? 'disabled' : '' }}>
                                                                @foreach ($kriteria->answers as $answer)
                                                                    <option
                                                                        value="
                                                                        {{ $answer->bobot }}"
                                                                        {{ $kriteria->status == $answer->bobot ? 'selected' : '' }}>
                                                                        {{ $answer->jawaban }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                @if (!in_array($status, ['submit', 'complete']))
                                                                    <input class="form-control form-control-sm"
                                                                        type="file"
                                                                        name="kriteria[{{ $kriteria->id }}][upload]">
                                                                @endif
                                                                @if ($kriteria->upload)
                                                                    <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Download File Kriteria"
                                                                        class="btn btn-success btn-sm"
                                                                        href="{{ route('perda.evaluasi-internal.download', $kriteria->upload) }}">
                                                                        <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                                        Download
                                                                    </a>
                                                                @endif
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </form>
                                </tbody>
                                <tfoot>
                                    @if (!in_array($status, ['submit', 'complete']))
                                        <td colspan="6" class="text-end">
                                            <button class="btn btn-primary btn-lg" type="submit"
                                                form="form_perda_evaluasi_internal">Submit</button>
                                        </td>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script>
            // 
        </script>
    @endpush
@endsection
