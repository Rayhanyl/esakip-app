@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Kegiatan" />
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Tabel Sasaran Kegiatan</h4>
                <a href="{{ route('admin.perda.saske.create') }}" class="btn btn-success">
                    Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-datatable">
                        <thead class="table-info">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Sasaran Kegiatan</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $saske)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $saske->sasaran }}</td>
                                    <td>{{ $saske->tahun }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <x-admin.form.button-edit title="Edit Sasaran Kegiatan"
                                                route="admin.perda.saske.edit" id="{{ $saske->id }}" />
                                            <x-admin.form.button-delete title="Delete  Sasaran Kegiatan"
                                                route="admin.perda.saske.destroy" id="{{ $saske->id }}" />
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
