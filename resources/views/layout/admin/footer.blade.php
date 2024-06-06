</div>
</div>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inputmask.js') }}"></script>
<script src="{{ asset('assets/js/inputmask.binding.js') }}"></script>
<script src="{{ asset('assets/js/inputmask.js') }}"></script>
<script src="{{ asset('assets/js/colormask.js') }}"></script>

<!-- Need: Apexcharts -->
<script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
<script
    src="https://cdn.datatables.net/v/bs5/dt-2.0.6/date-1.5.2/fc-5.0.0/fh-4.0.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/datatables.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@include('sweetalert::alert')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5'
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

        // Initialize Inputmask for currency input in IDR format
        $('.idr-currency').inputmask('numeric', {
            radixPoint: ',', // Decimal separator
            groupSeparator: '.', // Thousand separator
            alias: 'numeric',
            digits: 0,
            autoGroup: true,
            autoUnmask: true,
            prefix: 'Rp ', // IDR currency symbol
            rightAlign: false,
            removeMaskOnSubmit: true // Remove mask when form submitted
        });
    })
</script>
@stack('scripts')
</body>

</html>
