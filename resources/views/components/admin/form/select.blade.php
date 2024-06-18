<div class="{{ $col }} form-group">
    <label for="{{ $name }}" class="form-label fw-bold">
        {{ $label }}
    </label>
    <select class="form-select select2 {{ $class }}" name="{{ $name }}" id="{{ $id ?? 'id-' . $name }}">
        <option value="-" selected disabled>- Pilih {{ $label }} -</option>
        @foreach ($lists ?? [] as $key => $list)
            <option value="{{ $key }}">{{ $list }}</option>
        @endforeach
    </select>
</div>
@push('scripts')
    <script>
        @if (!$readonly && $value == '')
            $("#id-{{ $name }}").select2({
                theme: 'bootstrap-5',
            })
        @endif
        @if ($readonly)
            $("#id-{{ $name }}").select2({
                theme: 'bootstrap-5',
                disabled: 'readonly',
            }).val("1").trigger('change');
        @endif
        @if ($value !== '')
            $("#id-{{ $name }}").select2({
                theme: 'bootstrap-5',
            }).val("{{ $value }}").trigger('change');
        @endif
    </script>
@endpush
