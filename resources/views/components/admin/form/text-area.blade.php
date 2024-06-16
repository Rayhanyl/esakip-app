<div class="{{ $col }} form-group">
    <label for="{{ $name }}" class="form-label fw-bold">{{ $label }}</label>
    <textarea name="{{ $name }}" class="form-control" cols="20" rows="3" class="form-control"
        name="{{ $name }}" placeholder="{{ $placeholder == '' ? 'Masukan ' . $label : $placeholder }}"
        {{ $readonly ? 'readonly' : '' }} {{ $required ? 'required' : '' }}>{{ $value }}</textarea>
</div>
