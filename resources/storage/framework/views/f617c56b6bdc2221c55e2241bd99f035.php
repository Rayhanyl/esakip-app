
<?php $__env->startSection('content-landingpage'); ?>
    <div class="hero overlay inner-page">
        <img src="<?php echo e(asset('design/images/blob.svg')); ?>" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Pelaporan Kinerja</h1>
                    <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">Pelaporan kinerja merupakan bentuk
                        akuntabilitas dari pelaksanaan tugas dan fungsi yang dipercayakan kepada setiap instansi
                        pemerintahan atas penggunaan anggaran</p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <form class="row g-3" action="<?php echo e(route('aspu.pelaporan.index')); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="perda">Perangkat Daerah</label>
                        <select class="form-select select2" id="perda" name="perda">
                            <option value="" selected>-- All --</option>
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $perda ? 'selected' : ''); ?>>
                                    <?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                        <select class="form-select" id="tahun" name="tahun">
                            <option value="" selected>-- All --</option>
                            <?php for($i = date('Y') + 10; $i >= date('Y') - 5; $i--): ?>
                                <option value="<?php echo e($i); ?>" <?php echo e($i == $tahun ? 'selected' : ''); ?>>
                                    <?php echo e($i); ?>

                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 py-4">
                        <button class="btn btn-primary btn-sm w-100"><i class="bi bi-search"></i>
                            Search</button>
                    </div>
                </form>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Pelaporan Kinerja</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-pelaporan-kinerja">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Perangkat Daerah</th>
                                            <th class="text-center">Tahun</th>
                                            <th class="text-center">File pelaporan Kinerja</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Terdownload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pelaporan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                <td class="text-center"><?php echo e($pelaporan->user->name); ?></td>
                                                <td class="text-center"><?php echo e($pelaporan->tahun); ?></td>
                                                <td class="text-center">
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Download File Pelaporan Kinerja"
                                                        class="text-primary btn-count-file" data-id="<?php echo e($pelaporan->id); ?>"
                                                        href="<?php echo e(route('aspu.pelaporan.download', ['id' => $pelaporan->id])); ?>">
                                                        <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo e($pelaporan->keterangan); ?>

                                                </td>
                                                <td class="text-center">
                                                    <span class="keterangan-count" id="keterangan-<?php echo e($pelaporan->id); ?>">
                                                        <b class="text-primary">
                                                            (<?php echo e($pelaporan->count ?? '0'); ?>)
                                                        </b>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('script-landingpage'); ?>
        <script>
            $(document).ready(function() {
                $('#data-pelaporan-kinerja').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });

                $('.btn-count-file').on('click', function(event) {
                    var downloadUrl = $(this).attr('href');
                    window.open(downloadUrl, '_blank');
                });

                $('.btn-count-file').on('click', function(event) {
                    event.preventDefault();
                    var pelaporanId = $(this).data('id');
                    $.ajax({
                        url: '<?php echo e(route('aspu.pelaporan.count')); ?>',
                        type: 'POST',
                        data: {
                            id: pelaporanId,
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#keterangan-' + pelaporanId).text(response.count);
                            } else {
                                console.log('Gagal menambahkan keterangan.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error: ' + error);
                        }
                    });
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.akses_publik.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/aspu/pelaporan/index.blade.php ENDPATH**/ ?>