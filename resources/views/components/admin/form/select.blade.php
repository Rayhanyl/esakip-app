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
        @if ($readonly)
            $("#{{ $id != '' ? $id : 'id-' . $name }}").select2({
                theme: 'bootstrap-5',
                disabled: 'readonly',
            }).val("{{ $value }}").trigger('change');
        @elseif (!$pengampu)
            $("#{{ $id != '' ? $id : 'id-' . $name }}").select2({
                theme: 'bootstrap-5',
            }).val("{{ $value }}").trigger('change');
        @endif
        @if ($pengampu)
            $(document).ready(function() {
                $("#{{ $id != '' ? $id : 'id-' . $name }}").select2({
                    theme: 'bootstrap-5',
                    ajax: {
                        url: "{{ route('get-data.pengampu') }}",
                        dataType: 'json',
                        delay: 250,
                        processResults: function(response) {
                            var items = response.data;
                            var formattedData = $.map(items, function(item) {
                                return {
                                    id: item.nip,
                                    text: item.nip + '-' + item.nama_pegawai
                                };
                            });
                            return {
                                results: formattedData
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 1
                }).val("{{ $value }}").trigger('change');
            })
        @endif
    </script>
@endpush
