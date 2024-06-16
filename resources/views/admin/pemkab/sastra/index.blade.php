@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Strategis" />
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Tabel Sasaran Strategis</h4>
                <a href="{{ route('admin.pemkab.sastra.create') }}" class="btn btn-success">
                    Tambah
                </a>
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
                            @foreach ($pemkabSastraData as $sastra)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sastra->sasaran }}</td>
                                    <td>{{ $sastra->tahun }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <x-admin.admin.button-edit title="Edit Sasaran Strategis"
                                                id="{{ $sastra->id }}" route="admin.pemkab.sastra.edit" />
                                            <x-admin.admin.button-delete title="Delete Sasaran Strategis"
                                                id="{{ $sastra->id }}" route="admin.pemkab.sastra.edit" />
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
