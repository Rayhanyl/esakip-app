@php
    $keyp = Str::random(4);
@endphp
<div class="row col-pengampu-{{ $keyp }}">
    <x-admin.form.select col="col-11" label="Pengampu" name="pengampu[{{ $keyp }}][value]" :lists="[]"
        id="get-data-pengampu{{ $keyp }}" pengampu=true />
    <div class="col-1">
        <label for="" class="form-label fw-bold">&nbsp;</label>
        <div>
            <button class="btn btn-danger" type="button" onclick="removeComponent('col-pengampu-{{ $keyp }}')">
                <i class="bi bi-dash"></i>
            </button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#get-data-pengampu{{ $keyp }}").select2({
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
        });
    })
</script>
