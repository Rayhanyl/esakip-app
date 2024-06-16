@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Program" />
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Tabel Sasaran Program</h4>
                <a href="{{ route('admin.perda.saspro.create') }}" class="btn btn-success">
                    Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-datatable">
                        <thead class="table-info">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Sasaran Program</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perdaProgData as $saspro)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $saspro->sasaran }}</td>
                                    <td>{{ $saspro->tahun }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <x-admin.form.button-edit title="Edit Sasaran Program"
                                                route="admin.perda.saspro.edit" id="{{ $saspro->id }}" />
                                            <x-admin.form.button-delete title="Delete  Sasaran Program"
                                                route="admin.perda.saspro.destroy" id="{{ $saspro->id }}" />
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
