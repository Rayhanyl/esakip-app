
<?php $__env->startSection('content-landingpage'); ?>
    <div class="hero overlay">
        <img src="<?php echo e(asset('design/images/blob.svg')); ?>" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-between pt-5">
                <div class="col-lg-6 text-center text-lg-start pe-lg-5">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Sistem Akuntabilitas Kinerja Instansi.</h1>
                    <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">Pemerintah Kabupaten Majalengka</p>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="">
                        <div class="card bg-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="<?php echo e(asset('assets/images/logo/pemkab1.png')); ?>" alt="Image"
                                        class="img-fluid rounded w-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Nilai SAKIP <i class="bi bi-graph-down"></i></h3>
                    <hr>
                </div>
                <div class="col-12">
                    <div class="card shadow rounded-5">
                        <div class="card-body rounded-5">
                            <canvas id="myLineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('script-landingpage'); ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const labels = <?php echo json_encode($labels, 15, 512) ?>;
                const data = <?php echo json_encode($data, 15, 512) ?>;

                const ctx = document.getElementById('myLineChart').getContext('2d');
                const myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Grafik Nilai SAKIP',
                            data: data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Year'
                                }
                            },
                            y: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Value'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.akses_publik.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/aspu/beranda/index.blade.php ENDPATH**/ ?>