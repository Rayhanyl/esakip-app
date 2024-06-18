
<?php $__env->startSection('content-landingpage'); ?>
    <div class="hero overlay inner-page">
        <img src="<?php echo e(asset('design/images/blob.svg')); ?>" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">RKPD</h1>
                </div>
            </div>
        </div>
    </div>

    
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <form class="row" action="<?php echo e(route('aspu.perencanaan.pemkab-rkpd')); ?>" method="GET">

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
                        <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                    </div>
                </form>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Renja</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-table-renja" style="width: 100%;">
                                    <thead class="table-info">
                                        <tr style="font-size: 12px">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Sasaran Strategis</th>
                                            <th class="text-center">Indikator</th>
                                            <th class="text-center">Target</th>
                                            <th class="text-center">Program</th>
                                            <th class="text-center">Kegiatan</th>
                                            <th class="text-center">Sub-Kegiatan</th>
                                            <th class="text-center">Anggaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $iter = 0; ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $item->perda_sastras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $strategis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $strategis->perda_progs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $__currentLoopData = $program->perda_prog_ins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator_program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $__currentLoopData = $program->perda_kegias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__currentLoopData = $kegiatan->perda_kegia_ins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator_kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $__currentLoopData = $kegiatan->perda_sub_kegias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php $__currentLoopData = $sub_kegiatan->perda_subkegia_ins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php $__currentLoopData = $item->pemkab_sastra_ins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator_bupati): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $iter++; ?>
                                                                            <tr style="font-size: 12px">
                                                                                <td class="text-center"><?php echo e($iter); ?>

                                                                                </td>
                                                                                <td><?php echo e($item->sasaran); ?></td>
                                                                                <td>
                                                                                    <?php echo e($indikator_bupati->indikator); ?>

                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <?php echo e($indikator_bupati->target1); ?>

                                                                                </td>
                                                                                <td class="text-start">
                                                                                    <?php echo e($indikator_program->program); ?>

                                                                                </td>
                                                                                <td class="text-start">
                                                                                    <?php echo e($indikator_kegiatan->kegiatan); ?>

                                                                                </td>
                                                                                <td class="text-start">
                                                                                    <?php echo e($indikator_sub->subkegiatan); ?>

                                                                                </td>
                                                                                <td class="text-start">
                                                                                    <div class="idr-currency">
                                                                                        <?php echo e($indikator_sub->anggaran); ?>

                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            function formatIDR(value) {
                return 'Rp ' + parseInt(value, 10).toLocaleString('id-ID');
            }

            $(document).ready(function() {
                $('#data-table-renja').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });

                $('.idr-currency').each(function() {
                    let value = $(this).text();
                    if (!isNaN(parseInt(value, 10))) {
                        $(this).text(formatIDR(value));
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.akses_publik.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/aspu/perencanaan/pemkab/rkpd/index.blade.php ENDPATH**/ ?>