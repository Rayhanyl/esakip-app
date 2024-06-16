@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row g-4">
                    <div class="col-12">
                        <a href="{{ route('admin.pemkab.sastra.index') }}" class="text-subtitle text-muted">
                            <i class="bi bi-arrow-left-circle"></i> Kembali ke halaman sasaran strategis
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <section class="section">
                <form class="row g-3" action="{{ route('admin.pemkab.sastra.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @include('admin.pemkab.sastra._partials.form', ['title'=>'Create'])
                </form>
            </section>
        </div>
    </div>
@endsection