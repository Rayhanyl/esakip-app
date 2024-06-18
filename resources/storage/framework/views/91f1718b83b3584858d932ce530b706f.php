<div class="<?php echo e($col); ?> form-group">
    <label for="<?php echo e($name); ?>" class="form-label fw-bold"><?php echo e($label); ?></label>
    <textarea name="<?php echo e($name); ?>" class="form-control" cols="20" rows="3" class="form-control"
        name="<?php echo e($name); ?>" placeholder="<?php echo e($placeholder == '' ? 'Masukan ' . $label : $placeholder); ?>"
        <?php echo e($readonly ? 'readonly' : ''); ?> <?php echo e($required ? 'required' : ''); ?>><?php echo e($value); ?></textarea>
</div>
<?php /**PATH C:\laragon\www\esakip-app\resources\views/components/admin/form/text-area.blade.php ENDPATH**/ ?>