@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row g-4">
                    <div class="col-12">
                        <a href="{{ route('pemkab.pelaporan-kinerja.index') }}" class="text-subtitle text-muted">
                            <i class="bi bi-arrow-left-circle"></i> Back to Pelaporan Kinerja
                        </a>
                    </div>
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Edit Pelaporan Kinerja</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pemkab.pelaporan-kinerja.index') }}">Form Pelaporan Kinerja</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Pelaporan Kinerja
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <hr>
            <section class="section">
                <div class="card shadow rounded-4">
                    <div class="card-header">
                        <h4 class="card-title">Edit Pelaporan Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('pemkab.pelaporan-kinerja.update', $data->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Tahun</h6>
                                <fieldset class="form-group">
                                    <select class="form-select select2" id="tahun" name="tahun">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 10; $i >= date('Y') - 10; $i--)
                                            <option value="{{ $i }}" {{ $data->tahun == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <h6>Upload</h6>
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-50">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
