@extends('layout.admin.app')
@section('content')
    <x-admin.layout.header title="Sasaran Strategis" />
    <section class="section">
        <form class="row g-3" action="{{ route('admin.perda.sastra.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @include('admin.perda.perencanaan.sastra._partials.form')
        </form>
    </section>
@endsection
