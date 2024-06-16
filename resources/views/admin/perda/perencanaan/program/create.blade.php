@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Program" />
    <section class="section">
        <form class="row g-3" action="{{ route('admin.perda.saspro.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @include('admin.perda.perencanaan.program._partials.form')
        </form>
    </section>
@endsection
