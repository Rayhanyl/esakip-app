<li class="sidebar-item <?php echo e(Route::is($route) ? 'active' : ''); ?>">
    <a href="<?php echo e(route($route)); ?>" class="sidebar-link">
        <i class="bi bi-<?php echo e($icon); ?>"></i>
        <span><?php echo e($slot); ?></span>
    </a>
</li>
<?php /**PATH C:\laragon\www\esakip-app\resources\views/components/layout/list-sidebar.blade.php ENDPATH**/ ?>