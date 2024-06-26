<div class="{{ $col }} form-group">
    <label for="{{ $name }}" class="form-label fw-bold">
        {{ $label }}
    </label>
    <select class="form-select select2 {{ $className }}" name="{{ $name }}"
        id="{{ $id != '' ? $id : 'id-' . $name }}">
        <option value="-" selected disabled>- Pilih {{ $label }} -</option>
        @foreach ($lists ?? [] as $key => $list)
            <option value="{{ $key }}">{{ $list }}</option>
        @endforeach
    </select>
</div>
@push('scripts')
    <script>
        @if (!$pengampu)
            @if ($readonly)
                $("#{{ $id != '' ? $id : 'id-' . $name }}").select2({
                    theme: 'bootstrap-5',
                    disabled: 'readonly',
                }).val("{{ $value }}").trigger('change');
            @else
                $("#{{ $id != '' ? $id : 'id-' . $name }}").select2({
                    theme: 'bootstrap-5',
                }).val("{{ $value }}").trigger('change');
            @endif
        @endif
    </script>
@endpush
@push('script-landingpage')
    <script>
        @if (!$pengampu)
            @if ($readonly)
                $("#{{ $id != '' ? $id : 'id-' . $name }}").select2({
                    theme: 'bootstrap-5',
                    disabled: 'readonly',
                }).val("{{ $value }}").trigger('change');
            @else
                $("#{{ $id != '' ? $id : 'id-' . $name }}").select2({
                    theme: 'bootstrap-5',
                }).val("{{ $value }}").trigger('change');
            @endif
        @endif
    </script>
@endpush
