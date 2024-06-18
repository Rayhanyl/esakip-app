<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row g-4">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Sasaran Strategis</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Tabel Sasaran Strategis</h4>
                        <a href="<?php echo e(route('admin.pemkab.sastra.create')); ?>" class="btn btn-success">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-datatable">
                                <thead class="table-info">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Sasaran Bupati</th>
                                        <th>Tahun</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pemkabSastraData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sastra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                            <td class="text-start"><?php echo e($sastra->sasaran); ?></td>
                                            <td class="text-center"><?php echo e($sastra->tahun); ?></td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="p-2">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Pelaporan Kinerja" class="btn btn-warning btn-sm"
                                                            href="<?php echo e(route('admin.pemkab.sastra.edit', $sastra->id)); ?>">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-danger btn-sm delete-laporan-kinerja"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Delete Pelaporan Kinerja"
                                                            onclick="confirmDelete(<?php echo e($sastra->id); ?>)">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                        <form id="delete-form-<?php echo e($sastra->id); ?>"
                                                            action="<?php echo e(route('admin.pemkab.sastra.destroy', $sastra->id)); ?>"
                                                            method="POST" style="display: none;">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/pemkab/sastra/index.blade.php ENDPATH**/ ?>