<button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $title }}"
    onclick="confirmDelete({{ $id }})">
    <i class="bi bi-trash3"></i>
</button>
<form id="delete-form-{{ $id }}" action="{{ route($route, $id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
