<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row g-4">
                    <div class="col-12">
                        <a href="<?php echo e(route('admin.pemkab.sastra.index')); ?>" class="text-subtitle text-muted">
                            <i class="bi bi-arrow-left-circle"></i> Kembali ke halaman sasaran strategis
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <section class="section">
                <form class="row g-3" action="<?php echo e(route('admin.pemkab.sastra.update', $sastra->id)); ?>"
                    enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <?php echo $__env->make('admin.pemkab.sastra._partials.form', ['title'=>'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/pemkab/sastra/edit.blade.php ENDPATH**/ ?>