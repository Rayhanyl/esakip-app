@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Strategis" />
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create</h4>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('admin.pemkab.sastra.store') }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @include('admin.pemkab.sastra._partials.form')
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script></script>
@endpush
