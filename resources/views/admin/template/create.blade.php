@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Strategis" />
    <section class="section">
        <form class="row g-3" action="{{ route('admin.pemkab.sastra.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @include('admin.pemkab.sastra._partials.form')
        </form>
    </section>
@endsection
