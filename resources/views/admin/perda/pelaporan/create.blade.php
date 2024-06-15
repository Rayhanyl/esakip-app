@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row g-4">
                    <div class="col-12">
                        <a href="{{ route('admin.perda.pelaporan.index') }}" class="text-subtitle text-muted">
                            <i class="bi bi-arrow-left-circle"></i> Kembali ke halaman pelaporan kinerja
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <section class="section">
                <div class="card shadow rounded-4">
                    <div class="card-header">
                        <h4 class="card-title">Create Pelaporan Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('admin.perda.pelaporan.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="col-12 col-lg-6 form-group">
                                <label for="tahun" class="form-label fw-bold">Tahun</label>
                                <fieldset class="form-group">
                                    <select class="form-select" name="tahun" id="tahun">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        @for ($i = date('Y') + 10; $i >= date('Y'); $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-6 form-group">
                                <label for="file" class="form-label fw-bold">Upload</label>
                                <input class="form-control" type="file" name="file" id="file"
                                    accept=".doc, .docx, .pdf, .txt">
                            </div>
                            <div class="col-12 form-group">
                                <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" cols="2" rows="2"></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-50 rounded-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
