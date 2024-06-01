@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Pelaporan Kinerja</h3>
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
                    <div class="card-header">
                        <h4 class="card-title">Form Pelaporan Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('pemkab.pelaporan-kinerja.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Tahun</h6>
                                <fieldset class="form-group">
                                    <select class="form-select select2" id="tahun" name="tahun">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 10; $i >= date('Y') - 10; $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Upload</h6>
                                <input class="form-control" type="file" id="formFile" name="file">
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
                            <table class="table table-striped table-hover" id="data-table-pelaporan-kinerja-pemkab">
                                <thead class="table-info">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">File</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $pelaporan)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $pelaporan->tahun }}</td>
                                            <td class="text-center">
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Download File Pelaporan Kinerja" class="text-primary"
                                                    href="{{ route('pemkab.pelaporan-kinerja.download', $pelaporan->upload) }}">
                                                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Pelaporan Kinerja" class="btn btn-warning btn-sm"
                                                            href="{{ route('pemkab.pelaporan-kinerja.edit', $pelaporan->id) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-danger btn-sm delete-laporan-kinerja"
                                                            data-id="{{ $pelaporan->id }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Pelaporan Kinerja">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $pelaporan->id }}"
                                                            action="{{ route('pemkab.pelaporan-kinerja.destroy', $pelaporan->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
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

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#data-table-pelaporan-kinerja-pemkab').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });

                // SweetAlert delete confirmation
                $('.delete-laporan-kinerja').on('click', function() {
                    var userId = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#delete-form-' + userId).submit();
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
