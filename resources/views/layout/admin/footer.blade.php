</div>
</div>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inputmask.js') }}"></script>
<script src="{{ asset('assets/js/inputmask.binding.js') }}"></script>
<script src="{{ asset('assets/js/inputmask.js') }}"></script>
<script src="{{ asset('assets/js/colormask.js') }}"></script>
<script
    src="https://cdn.datatables.net/v/bs5/dt-2.0.6/date-1.5.2/fc-5.0.0/fh-4.0.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/datatables.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        initPlugins();
    })

    function getDataPengampu(el) {
        $(`${el}`).select2({
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
            minimumInputLength: 4
        });
    }

    function confirmDelete(id) {
        var form = $('#delete-form-' + id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }

    function addComponent(el, route) {
        $.ajax({
            url: route,
            success: function(result) {
                $(`#${el}`).append(result);
                initPlugins();
            }
        });
    }

    function removeComponent(elform) {
        $(`.${elform}`).remove();
    }

    function addSubComponent(el, route, params) {
        $.ajax({
            url: route,
            data: {
                params
            },
            success: function(result) {
                $(`#${el}`).append(result);
                initPlugins();
            }
        });
    }

    function initPlugins() {
        $('.select2').select2({
            theme: 'bootstrap-5'
        });
        getDataPengampu('.pengampu-select2');

        $('.table-datatable').DataTable({
            responsive: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            order: [
                [0, 'asc']
            ],
        });

        $('.decimal-input').inputmask({
            alias: 'decimal',
            groupSeparator: ',',
            autoGroup: true,
            digits: 2,
            digitsOptional: false,
            placeholder: '0',
            rightAlign: false,
            removeMaskOnSubmit: true
        });

        $('.idr-currency').inputmask('numeric', {
            radixPoint: ',',
            groupSeparator: '.',
            alias: 'numeric',
            digits: 0,
            autoGroup: true,
            autoUnmask: true,
            prefix: 'Rp ',
            rightAlign: false,
            removeMaskOnSubmit: true
        });
    }

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@stack('scripts')
<!-- Need: Apexcharts -->
<script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script> --}}
@include('sweetalert::alert')

</body>

</html>
