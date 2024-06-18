<div class="<?php echo e($col); ?> form-group">
    <label for="<?php echo e($name); ?>" class="form-label fw-bold <?php echo e($classinput); ?>"><?php echo e($label); ?></label>
    <input type="<?php echo e($type); ?>" id="<?php echo e($name); ?>"
        class="form-control <?php echo e($decimal ? 'decimal-input' : ''); ?> <?php echo e($currency ? 'idr-currency' : ''); ?>"
        aria-describedby="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
        placeholder="<?php echo e($placeholder == '' ? 'Masukan ' . $label : $placeholder); ?>" <?php echo e($readonly ? 'readonly' : ''); ?>

        value="<?php echo e($value); ?>" <?php echo e($required ? 'required' : ''); ?>>
</div>
<?php /**PATH C:\laragon\www\esakip-app\resources\views/components/admin/form/text.blade.php ENDPATH**/ ?>