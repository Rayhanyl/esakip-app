<div class="d-flex justify-content-between align-items-center">
    <h4 class="card-title">{{ $label }}</h4>
    <a href="{{ $route }}" class="btn btn-{{ $variant }}">
        <i class="bi bi-{{ $icon }}"></i> {{ $slot }}
    </a>
</div>
