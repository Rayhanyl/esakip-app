<div class="{{ $col }}">
    <label for="{{ $name }}" class="form-label fw-bold">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}" class="form-control {{ $decimal ? 'decimal-input':'' }}" aria-describedby="{{ $name }}"
        name="{{ $name }}">
</div>
