<div class="table-responsive">
    <table class="table table-striped table-hover" id="data-table-sasaran-program">
        <thead class="table-info">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Sasaran Program</th>
                <th class="text-center">Tahun</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sasaran_program ?? [] as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->sasaran_program }}</td>
                    <td class="text-center">{{ $item->tahun }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <div class="p-2">
                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit Sasaran Program" class="btn btn-warning btn-sm"
                                    href="{{ route('perda.perencanaan-kinerja.sasaran-program.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                            <div class="p-2">
                                <button class="btn btn-danger btn-sm delete-sasaran-program"
                                    data-id="{{ $item->id }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Delete Sasaran Program">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('perda.perencanaan-kinerja.sasaran-program.destroy', $item->id) }}"
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
