
<?php $__env->startSection('content-landingpage'); ?>
    <div class="hero overlay inner-page">
        <img src="<?php echo e(asset('design/images/blob.svg')); ?>" alt="" class="img-fluid blob">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Indikator Kinerja Utama</h1>
                </div>
            </div>
        </div>
    </div>

    
    <div class="section sec-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <form class="row g-3" action="<?php echo e(route('aspu.perencanaan.pemkab-iku')); ?>" method="GET">
                            <div class="col-12 col-lg-12">
                                <div class="col-4">
                                    <label class="form-label fs-5 fw-bold" for="tahun">Tahun</label>
                                    <select class="form-select select2" id="tahun" name="tahun">
                                        <option value="" selected>- Pilih Tahun -</option>
                                        <?php for($i = date('Y') + 5; $i >= date('Y') - 5; $i--): ?>
                                            <option value="<?php echo e($i); ?>">
                                                <?php echo e($i); ?>

                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="col-4">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Indikator Kinerja Utama</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover"
                                    id="data-table-indikator-kinerja-utama-pemkab" style="width: 100%;">
                                    <thead class="table-info">
                                        <tr style="font-size: 10px">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-center" colspan="3">Target Kinerja</th>
                                        </tr>
                                        <tr style="font-size: 10px">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Sasaran Strategis</th>
                                            <th class="text-center">Indikator Sasaran</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Penjelasan / Formulasi</th>
                                            <th class="text-center">Sumber Data</th>
                                            <th class="text-center">Penanggung Jawab</th>
                                            <th class="text-center">2024</th>
                                            <th class="text-center">2025</th>
                                            <th class="text-center">2026</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr style="font-size: 10px">
                                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($item->pemkab_sastra->sasaran); ?></td>
                                                <td><?php echo e($item->indikator); ?></td>
                                                <td class="text-center"><?php echo e($item->satuan->satuan); ?></td>
                                                <td><?php echo e($item->penjelasan); ?></td>
                                                <td><?php echo e($item->sumber_data); ?></td>
                                                <td>
                                                    <ul>
                                                        <?php $__currentLoopData = $item->penanggung_jawabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penanggung_jawab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($penanggung_jawab->penanggung_jawab); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </td>
                                                <td class="text-center"><?php echo e($item->target1); ?></td>
                                                <td class="text-center"><?php echo e($item->target2); ?></td>
                                                <td class="text-center"><?php echo e($item->target3); ?></td>
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
                $('#data-table-indikator-kinerja-utama-pemkab').DataTable({
                    lengthMenu: [
                        [5, 25, 50, -1],
                        [5, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.akses_publik.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/aspu/perencanaan/pemkab/iku/index.blade.php ENDPATH**/ ?>