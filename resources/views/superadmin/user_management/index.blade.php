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
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <a href="{{ route('admin.user-management.create') }}" class="btn btn-success">
                                            <i class="bi bi-plus-lg"></i>
                                            Buat User Baru
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="table-user-management"
                                        style="width: 100%">
                                        <thead class="table-info">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Username</th>
                                                <th class="text-center">email</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Create at</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ $user->created_at ? $user->created_at->format('F j, Y') : 'N/A' }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="px-2">
                                                                <a class="btn btn-warning"
                                                                    href="{{ route('admin.user-management.edit', $user->id) }}">
                                                                    Edit
                                                                </a>
                                                            </div>
                                                            <div class="px-2">
                                                                <button class="btn btn-danger delete-user" data-id="{{ $user->id }}">Delete</button>
                                                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.user-management.destroy', $user->id) }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
                $('#table-user-management').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });
            });

            $('.delete-user').on('click', function() {
                var userId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#delete-form-' + userId).submit();
                    }
                });
            });
        </script>
    @endpush
@endsection
