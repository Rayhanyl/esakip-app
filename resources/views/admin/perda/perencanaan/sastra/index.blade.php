@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Strategis" />
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Tabel Sasaran Strategis</h4>
                <a href="{{ route('admin.perda.sastra.create') }}" class="btn btn-success">
                    Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-datatable">
                        <thead class="table-info">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Sasaran Strategis</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $sastra)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sastra->sasaran }}</td>
                                    <td>{{ $sastra->tahun }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <x-admin.form.button-edit title="Edit Sasaran Strategis"
                                                route="admin.perda.sastra.edit" id="{{ $sastra->id }}" />
                                            <x-admin.form.button-delete title="Delete  Sasaran Strategis"
                                                route="admin.perda.sastra.destroy" id="{{ $sastra->id }}" />
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
