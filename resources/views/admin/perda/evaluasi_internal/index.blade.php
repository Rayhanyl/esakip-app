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
                        <div class="card-header">
                            <h4 class="card-title">Evaluasi Internal</h4>
                        </div>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-info">
                                    <tr>
                                        <th>No</th>
                                        <th></th>
                                        <th></th>
                                        <th>Komponen/Sub Komponen/Kriteria</th>
                                        <th>Keterangan</th>
                                        <th>Eviden</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form
                                        action="{{ route('perda.evaluasi-internal.update', $perda_evaluasi_internal[0]->id ?? 0) }}"
                                        method="post" id="form_perda_evaluasi_internal">
                                        @csrf
                                        @method('put')
                                        @foreach ($perda_evaluasi_internal as $pei)
                                            @foreach ($pei->komponens as $komponen)
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
                                                                <select class="form-select form-control-sm" aria-label="1a"
                                                                    name="kriteria[{{ $kriteria->id }}][status]">
                                                                    <option value="1"
                                                                        {{ $kriteria->status == '1' ? 'selected' : '' }}>Ya
                                                                    </option>
                                                                    <option value="2"
                                                                        {{ $kriteria->status == '2' ? 'selected' : '' }}>
                                                                        Tidak</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control form-control-sm" type="file"
                                                                    name="kriteria[{{ $kriteria->id }}][upload]">
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

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script>
            // 
        </script>
    @endpush
@endsection
