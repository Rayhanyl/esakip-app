<div class="<?php echo e($col); ?> form-group">
    <label for="<?php echo e($name); ?>" class="form-label fw-bold">
        <?php echo e($label); ?>

    </label>
    <select class="form-select select2" name="<?php echo e($name); ?>" id="<?php echo e($id ?? 'id-' . $name); ?>">
        <option value="-" selected disabled>- Pilih <?php echo e($label); ?> -</option>
        <?php $__currentLoopData = $lists ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>"><?php echo e($list); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        <?php if(!$readonly && $value == ''): ?>
            $("#id-<?php echo e($name); ?>").select2({
                theme: 'bootstrap-5',
            })
        <?php endif; ?>
        <?php if($readonly): ?>
            $("#id-<?php echo e($name); ?>").select2({
                theme: 'bootstrap-5',
                disabled: 'readonly',
            }).val("1").trigger('change');
        <?php endif; ?>
        <?php if($value !== ''): ?>
            $("#id-<?php echo e($name); ?>").select2({
                theme: 'bootstrap-5',
            }).val("<?php echo e($value); ?>").trigger('change');
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\esakip-app\resources\views/components/admin/form/select.blade.php ENDPATH**/ ?>