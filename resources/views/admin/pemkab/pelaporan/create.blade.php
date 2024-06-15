@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Create Pelaporan Kinerja" />
    <section class="section">
        <div class="card">
            <div class="card-header">
                <x-admin.layout.label-create label="Form Pelaporan Kinerja"
                    route="{{ route('pemkab.perencanaan-kinerja.create') }}">
                    Tambah
                </x-admin.layout.label-create>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('pemkab.pelaporan-kinerja.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <x-admin.form.select label="Tahun" name="tahun" value="{{ $tahun }}" :lists="$tahun_options" />
                    <x-admin.form.upload label="Upload" />
                    <x-admin.form.submit />
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script></script>
@endpush
