@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Create User</h3>
                        {{-- <p class="text-subtitle text-muted">
                            Navbar will appear on the top of the page.
                        </p> --}}
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                {{-- <li class="breadcrumb-item">
                                    <a href="index.html">Pengukuran Kinerja</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Layout Vertical Navbar
                                </li> --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card shadow rounded-4">
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('admin.user-management.store') }}" method="POST">
                            @csrf
                            <div class="col-12 col-lg-6">
                                <label class="form-label" for="#">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label" for="#">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label" for="#">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label" for="#">Role</label>
                                <select class="form-select" aria-label="role" name="role" id="role">
                                    <option selected>-- Select Role --</option>
                                    <option value="perda">Perangkat Daerah</option>
                                    <option value="pemkab">Pemerintah Kabupaten</option>
                                    <option value="inspektorat">Inspektorat</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- Modal --}}
    {{-- Modal --}}
    @push('scripts')
        <script></script>
    @endpush
@endsection
