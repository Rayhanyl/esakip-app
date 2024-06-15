@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Strategis" />
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tabel Sasaran Strategis</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-datatable">
                        <thead class="table-info">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Sasaran Bupati</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemkabPelaporan as $pelaporan)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pelaporan->tahun }}</td>
                                    <td>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Download File Pelaporan Kinerja" class="text-primary"
                                            href="{{ route('pemkab.pelaporan-kinerja.download', $pelaporan->upload) }}">
                                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                        </a>
                                    </td>
                                    <td>
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
@endsection
@push('scripts')
    <script></script>
@endpush
