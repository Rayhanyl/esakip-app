<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <address>Jl. Jenderal Ahmad Yani No. 1 Majalengka Provinsi Jawa Barat</address>
                    <ul class="list-unstyled links">
                        <li><a href="tel://11234567890">(0233) 281560</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="<?php echo e(asset('assets/js/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('design/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('design/js/tiny-slider.js')); ?>"></script>
    <script src="<?php echo e(asset('design/js/flatpickr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('design/js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('design/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('design/js/navbar.js')); ?>"></script>
    <script src="<?php echo e(asset('design/js/counter.js')); ?>"></script>
    <script src="<?php echo e(asset('design/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.inputmask.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/inputmask.binding.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/inputmask.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/colormask.js')); ?>"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/dt-2.0.6/date-1.5.2/fc-5.0.0/fh-4.0.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/datatables.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://fastly.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap-5'
            });

           function formatIDR(number) {
                return 'Rp ' + number.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
        })
    </script>
    <?php echo $__env->yieldPushContent('script-landingpage'); ?>
    </body>

    </html>
<?php /**PATH C:\laragon\www\esakip-app\resources\views/layout/akses_publik/footer.blade.php ENDPATH**/ ?>