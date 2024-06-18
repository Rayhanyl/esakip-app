
<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Pelaporan Kinerja</h3>
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
                                        <a href="<?php echo e(route('admin.perda.pelaporan.create')); ?>" class="btn btn-success">
                                            <i class="bi bi-plus-lg"></i>
                                            Buat Laporan Baru
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="data-table-pelaporan-kinerja-perda"
                                        style="width: 100%">
                                        <thead class="table-info">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tahun</th>
                                                <th class="text-center">File</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $perdaPelaporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pelaporan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center"><?php echo e($index + 1); ?></td>
                                                    <td class="text-center"><?php echo e($pelaporan->tahun); ?></td>
                                                    <td class="text-center">
                                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Download File Pelaporan Kinerja" class="text-primary"
                                                            href="<?php echo e(route('admin.perda.pelaporan.download', ['pelaporan' => $pelaporan->id])); ?>">
                                                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center"><?php echo e($pelaporan->keterangan); ?></td>
                                                    <td class="text-center">
                                                        <div class="row  g-0">
                                                            <div class="col-12 col-md-6 col-lg-6">
                                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Edit Pelaporan Kinerja"
                                                                    class="btn btn-warning btn-sm"
                                                                    href="<?php echo e(route('admin.perda.pelaporan.edit', ['pelaporan' => $pelaporan->id])); ?>">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-6">
                                                                <button class="btn btn-danger btn-sm delete-laporan-kinerja"
                                                                    data-id="<?php echo e($pelaporan->id); ?>" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Delete Pelaporan Kinerja">
                                                                    <i class="bi bi-trash3"></i>
                                                                </button>
                                                                <form id="delete-form-<?php echo e($pelaporan->id); ?>"
                                                                    action="<?php echo e(route('admin.perda.pelaporan.destroy', ['pelaporan' => $pelaporan->id])); ?>"
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
                    </div>
                </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            $(document).ready(function() {
                $('#data-table-pelaporan-kinerja-perda').DataTable({
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
                $('.delete-laporan-kinerja').on('click', function() {
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

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/pelaporan/index.blade.php ENDPATH**/ ?>