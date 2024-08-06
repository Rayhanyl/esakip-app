@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>User Management</h3>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" action="{{ route ('admin.user-management.store') }}" method="POST">
                                    @csrf
                                    <div class="col-12 col-lg-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" aria-describedby="Name" required>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="Email" required>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="role" class="form-label">Roles</label>
                                        <select class="form-select" name="role" id="role" aria-label="Roles" required>
                                            <option>-- Select Role --</option>
                                            <option value="perda">Perangkat Daerah</option>
                                            <option value="pemkab">Pemerintah Kabupaten</option>
                                            <option value="inspek">Inspektorat</option>
                                          </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group mb-2 @error('password') is-invalid @enderror">
                                            <input type="password" class="form-control" id="password" name="password" required
                                                style="border-right:0px; solid">
                                            <span class="input-group-text bg-white">
                                                <i type="button" id="toggle-password" onclick="togglePassword()"
                                                    class='bi bi-eye'></i>
                                            </span>
                                        </div>
                                        <div>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div id="password" class="form-text">We will not share your information.</div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            //
        });

        function togglePassword() {
        const passwordField = document.getElementById('password');
        const toggleButton = document.getElementById('toggle-password');
        const passwordFieldType = passwordField.getAttribute('type');

        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
            toggleButton.classList.remove('bi-eye');
            toggleButton.classList.add('bi-eye-slash');
        } else {
            passwordField.setAttribute('type', 'password');
            toggleButton.classList.remove('bi-eye-slash');
            toggleButton.classList.add('bi-eye');
        }
    }
    </script>
    @endpush
@endsection
