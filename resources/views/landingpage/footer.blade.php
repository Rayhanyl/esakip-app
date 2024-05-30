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

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('design/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('design/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('design/js/flatpickr.min.js') }}"></script>
    <script src="{{ asset('design/js/aos.js') }}"></script>
    <script src="{{ asset('design/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('design/js/navbar.js') }}"></script>
    <script src="{{ asset('design/js/counter.js') }}"></script>
    <script src="{{ asset('design/js/custom.js') }}"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/dt-2.0.6/date-1.5.2/fc-5.0.0/fh-4.0.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/datatables.min.js">
    </script>
    @stack('script-landingpage')
    </body>

    </html>
