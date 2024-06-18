
<?php $__env->startSection('content-landingpage'); ?>
    <div class="hero overlay inner-page">
        <img src="<?php echo e(asset('design/images/blob.svg')); ?>" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Rencana Aksi</h1>
                </div>
            </div>
        </div>
    </div>

    
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="row" action="<?php echo e(route('aspu.perencanaan.perda-aksi')); ?>" method="get">
                        <div class="col-12 col-lg-3">
                            <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                            <select class="form-select" id="tahun" name="tahun">
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
                                <option value="" selected>-- All --</option>
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
                            <h4 class="card-title">Tabel Rencana Aksi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="data-table-rencana-aksi"
                                    style="width: 100%;">
                                    <thead class="table-info">
                                        <tr style="font-size: 12px">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-center" colspan="4">Target</th>
                                            <th></th>
                                        </tr>
                                        <tr style="font-size: 12px">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Perangkat Daerah</th>
                                            <th class="text-center">IKU</th>
                                            <th class="text-center">Rencana Aksi</th>
                                            <th class="text-center">Indikator</th>
                                            <th class="text-center">I</th>
                                            <th class="text-center">II</th>
                                            <th class="text-center">III</th>
                                            <th class="text-center">IV</th>
                                            <th class="text-center">Penanggung Jawab</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $iter = 0;
                                        ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $item->perda_sastra->perda_progs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $program->perda_kegias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $__currentLoopData = $kegiatan->perda_sub_kegias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $__currentLoopData = $subkegiatan->perda_subkegia_ins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $iter++;
                                                            ?>
                                                            <tr style="font-size: 12px">
                                                                <td class="text-center"><?php echo e($iter); ?></td>
                                                                <td><?php echo e($indikator->user->name); ?></td>
                                                                <td><?php echo e($item->indikator); ?></td>
                                                                <td><?php echo e($subkegiatan->sasaran); ?></td>
                                                                <td><?php echo e($indikator->indikator); ?></td>
                                                                <td class="text-center">
                                                                    <?php echo e($indikator->triwulan1 ? $indikator->triwulan1 : '-'); ?>

                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo e($indikator->triwulan2 ? $indikator->triwulan2 : '-'); ?>

                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo e($indikator->triwulan3 ? $indikator->triwulan3 : '-'); ?>

                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo e($indikator->triwulan4 ? $indikator->triwulan4 : '-'); ?>

                                                                </td>
                                                                <td>
                                                                    <ul>
                                                                        <?php $__currentLoopData = $item->penanggung_jawabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penanggung_jawab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li><?php echo e($penanggung_jawab->penanggung_jawab); ?>

                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                </td>
                                                            </tr>
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
            $(document).ready(function() {
                $('#data-table-rencana-aksi').DataTable({
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

<?php echo $__env->make('layout.akses_publik.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/aspu/perencanaan/perda/aksi/index.blade.php ENDPATH**/ ?>