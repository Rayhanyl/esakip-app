@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Kegiatan" />
    <section class="section">
        <form class="row g-3" action="{{ route('admin.perda.saske.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @include('admin.perda.perencanaan.kegiatan._partials.form')
        </form>
    </section>
@endsection
