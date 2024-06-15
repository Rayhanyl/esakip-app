<div class="{{ $col }} form-group">
    <label for="{{ $name }}" class="form-label fw-bold {{ $classinput }}">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}"
        class="form-control {{ $decimal ? 'decimal-input' : '' }} {{ $currency ? 'idr-currency' : '' }}"
        aria-describedby="{{ $name }}" name="{{ $name }}"
        placeholder="{{ $placeholder == '' ? 'Masukan ' . $label : $placeholder }}" {{ $readonly ? 'readonly' : '' }}
        value="{{ $value }}" {{ $required ? 'required' : '' }}>
</div>
