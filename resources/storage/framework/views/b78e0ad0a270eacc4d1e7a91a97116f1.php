
<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Pengukuran Kinerja</h3>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <a href="<?php echo e(route('admin.perda.pengukuran.tahunan')); ?>" class="btn btn-success">
                                            <i class="bi bi-plus-lg"></i>
                                            Create Tahunan
                                        </a>
                                        <a href="<?php echo e(route('admin.perda.pengukuran.triwulan')); ?>" class="btn btn-success">
                                            <i class="bi bi-plus-lg"></i>
                                            Create Triwulan
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="data-table-pengukuran-kinerja-perda"
                                        style="width: 100%">
                                        <thead class="table-info">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tahun</th>
                                                <th class="text-center">Triwulan</th>
                                                <th class="text-center">Capaian</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $pengukuran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $item->pengukuran_tahuns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($item->tahun); ?></td>
                                                        <td>Tahun</td>
                                                        <td><?php echo e($tahun->capaian); ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="p-2">
                                                                    <a href="<?php echo e(route('admin.perda.pengukuran.edit', $tahuns->id)); ?>"
                                                                        class="btn btn-warning btn-sm"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Edit Pengukuran Kinerja">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="p-2">
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm delete-pengukuran-kinerja"
                                                                        data-id="<?php echo e($tahuns->id); ?>"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Delete Pengukuran Kinerja">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                    <form id="delete-form-<?php echo e($tahuns->id); ?>"
                                                                        action="<?php echo e(route('admin.perda.pengukuran.delete', ['tipe' => 'tahunan', 'master' => $perdaPengukuran->id, 'id' => $tahuns->id])); ?>"
                                                                        method="POST" style="display: none;">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('DELETE'); ?>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
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

    <?php $__env->startPush('scripts'); ?>
        <script>
            $(document).ready(function() {
                $('#data-table-pengukuran-kinerja-perda').DataTable({
                    responsive: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'All'],
                    ],
                    order: [
                        [0, 'asc']
                    ],
                });

                // SweetAlert delete confirmation
                $('.delete-pengukuran-kinerja').on('click', function() {
                    var userId = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#delete-form-' + userId).submit();
                        }
                    });
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/pengukuran/index.blade.php ENDPATH**/ ?>