<button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e($title); ?>"
    onclick="confirmDelete(<?php echo e($id); ?>)">
    <i class="bi bi-trash3"></i>
</button>
<form id="delete-form-<?php echo e($id); ?>" action="<?php echo e(route($route, $id)); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
</form>
<?php /**PATH C:\laragon\www\esakip-app\resources\views/components/admin/form/button-delete.blade.php ENDPATH**/ ?>