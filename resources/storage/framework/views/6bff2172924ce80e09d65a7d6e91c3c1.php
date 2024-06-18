<?php echo $__env->make('layout.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="main-content">
    <div class="page-heading">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
<?php echo $__env->make('layout.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\laragon\www\esakip-app\resources\views/layout/admin/app.blade.php ENDPATH**/ ?>