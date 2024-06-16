@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Sub Kegiatan" />
    <section class="section">
        <form class="row g-3" action="{{ route('admin.perda.sasubkegia.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @include('admin.perda.perencanaan.subkegiatan._partials.form')
        </form>
    </section>
@endsection
