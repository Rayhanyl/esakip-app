@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Pelaporan Kinerja</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                {{-- Breadcrumb navigation if needed --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Pelaporan Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('perda.store.pelaporan.kinerja') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Tahun</h6>
                                <fieldset class="form-group">
                                    <select class="form-select" name="tahun" id="basicSelect">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 5; $i >= date('Y') - 5; $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Upload</h6>
                                <input class="form-control" type="file" name="file" id="formFile">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-50">Submit</button>
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
                            <table class="table" id="data-table-pelaporan-kinerja">
                                <thead class="table-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>File</th>
                                        <th>Create at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelaporanKinerja as $index => $pelaporan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $pelaporan->year }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('perda.download.file', $pelaporan->evidence) }}">Download</a>
                                            </td>
                                            <td>{{ $pelaporan->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#data-table-pelaporan-kinerja').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [5, 10, 15, -1],
                        [5, 10, 15, 'All'],
                    ],
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    @endpush
@endsection
