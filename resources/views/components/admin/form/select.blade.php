<div class="{{ $col }}">
    <label for="{{ $name }}" class="form-label fw-bold">
        {{ $label }}
    </label>
    <select class="form-select select2" name="{{ $name }}">
        <option value="-" selected disabled>- Pilih Tipe {{ $label }} -</option>
        @foreach ($lists ?? [] as $key => $list)
            <option value="{{ $key }}">{{ $list }}</option>
        @endforeach
    </select>
</div>
