@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Sub Kegiatan" />
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Tabel Sasaran Sub Kegiatan</h4>
                <a href="{{ route('admin.perda.sasubkegia.create') }}" class="btn btn-success">
                    Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-datatable">
                        <thead class="table-info">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Sasaran Sub Kegiatan</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $sasubkegia)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sasubkegia->sasaran }}</td>
                                    <td>{{ $sasubkegia->tahun }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <x-admin.form.button-edit title="Edit Sasaran Sub Kegiatan"
                                                route="admin.perda.sasubkegia.edit" id="{{ $sasubkegia->id }}" />
                                            <x-admin.form.button-delete title="Delete Sasaran Sub Kegiatan"
                                                route="admin.perda.sasubkegia.destroy" id="{{ $sasubkegia->id }}" />
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
