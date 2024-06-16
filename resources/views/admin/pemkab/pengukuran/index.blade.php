@extends('layout.admin.app')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Pengukuran Kinerja</h3>
                    </div>
                </div>
            </div>
            <section class="section mt-2">
                <div class="card shadow rounded-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 text-end">
                                <a href="{{ route('admin.pemkab.pengukuran.create') }}" class="btn btn-success rounded-4">
                                    <i class="bi bi-plus-lg"></i>
                                    Create New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-datatable" style="width: 100%;">
                                <thead class="table-info">
                                    <tr style="font-size: 14px;">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Sasaran Bupati</th>
                                        <th class="text-center">Indikator Sasaran</th>
                                        <th class="text-center">Target Sasaran</th>
                                        <th class="text-center">Realisasi</th>
                                        <th class="text-center">Karakteristik</th>
                                        <th class="text-center">Capaian</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengukuran as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-start">
                                                <p data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title='{{ $item->pemkab_sastra->sasaran }}'>
                                                    {{ Str::limit($item->pemkab_sastra->sasaran, 25, '...') }}
                                                </p>
                                            </td>
                                            <td class="text-start">
                                                <p data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title='{{ $item->pemkab_sastra_in->indikator }}'>
                                                    {{ Str::limit($item->pemkab_sastra_in->indikator, 25, '...') }}
                                                </p>
                                            </td>
                                            <td class="text-center">{{ $item->target }}</td>
                                            <td class="text-center">{{ $item->realisasi }}</td>
                                            <td class="text-center">
                                                @if ($item->karakteristik == '1')
                                                    <p data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Semakin tinggi realisasi maka capaian semakin bagus">
                                                        {{ Str::limit('Semakin tinggi realisasi maka capaian semakin bagus', 10, '...') }}
                                                    </p>
                                                @else
                                                    <p data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Semakin rendah realisasi maka capaian semakin bagus">
                                                        {{ Str::limit('Semakin rendah realisasi maka capaian semakin bagus', 10, '...') }}
                                                    </p>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ number_format($item->capaian, 2) }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Pengukuran Kinerja" class="btn btn-warning btn-sm"
                                                            href="{{ route('admin.pemkab.pengukuran.edit', ['pengukuran' => $item->id]) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Pengukuran Kinerja"
                                                            onclick="confirmDelete({{ $item->id }})">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('admin.pemkab.pengukuran.destroy', ['pengukuran' => $item->id]) }}"
                                                            method="POST" style="display: none;">
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
            </section>
        </div>
    </div>
@endsection
