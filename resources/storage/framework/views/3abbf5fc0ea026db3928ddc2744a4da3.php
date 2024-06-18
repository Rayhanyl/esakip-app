
<?php $__env->startSection('content-landingpage'); ?>
    <div class="hero overlay inner-page">
        <img src="<?php echo e(asset('design/images/blob.svg')); ?>" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Perjanjian Kinerja</h1>
                </div>
            </div>
        </div>
    </div>

    
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="row" action="<?php echo e(route('aspu.perencanaan.perda-perjanjian')); ?>" method="get">
                        <div class="col-12 col-lg-3">
                            <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                            <select class="form-select select2" id="tahun" name="tahun">
                                <option value="" selected>- Pilih Tahun -</option>
                                <?php for($i = date('Y') + 5; $i >= date('Y') - 5; $i--): ?>
                                    <option value="<?php echo e($i); ?>" <?php echo e($tahun == $i ? 'selected' : ''); ?>>
                                        <?php echo e($i); ?>

                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <label class="form-label fs-5 fw-bold" for="perda">Perangkat Daerah</label>
                            <select class="form-select select2" id="perda" name="perda">
                                <option value="" selected>- Pilih Perangkat Daerah -</option>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $perda ? 'selected' : ''); ?>>
                                        <?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3 py-4">
                            <button class="btn btn-primary btn-sm w-100 ">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Perjanjian Kinerja</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-table-perjanjian-kinerja"
                                    style="width: 100%;">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Perangkat Daerah</th>
                                            <th class="text-center">Sasaran Strategis</th>
                                            <th class="text-center">Indikator</th>
                                            <th class="text-center">Target</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo e($loop->iteration); ?>

                                                </td>
                                                <td class="text-start">
                                                    <?php echo e($item->user->name); ?>

                                                </td>
                                                <td class="text-start">
                                                    <?php echo e($item->perda_sastra->sasaran); ?>

                                                </td>
                                                <td class="text-start">
                                                    <?php echo e($item->indikator); ?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo e($item->target1); ?>

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
                $('#data-table-perjanjian-kinerja').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.akses_publik.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/aspu/perencanaan/perda/perjanjian/index.blade.php ENDPATH**/ ?>