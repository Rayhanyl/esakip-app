<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal9d6f3d191d43deffded4ffa85bf5a6c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9d6f3d191d43deffded4ffa85bf5a6c5 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Layout\Header::resolve(['title' => 'Sasaran Kegiatan'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Header::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9d6f3d191d43deffded4ffa85bf5a6c5)): ?>
<?php $attributes = $__attributesOriginal9d6f3d191d43deffded4ffa85bf5a6c5; ?>
<?php unset($__attributesOriginal9d6f3d191d43deffded4ffa85bf5a6c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d6f3d191d43deffded4ffa85bf5a6c5)): ?>
<?php $component = $__componentOriginal9d6f3d191d43deffded4ffa85bf5a6c5; ?>
<?php unset($__componentOriginal9d6f3d191d43deffded4ffa85bf5a6c5); ?>
<?php endif; ?>
    <section class="section">
        <form class="row g-3" action="<?php echo e(route('admin.perda.saske.update', $saske->id)); ?>" enctype="multipart/form-data"
            method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <?php echo $__env->make('admin.perda.perencanaan.kegiatan._partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/perencanaan/kegiatan/edit.blade.php ENDPATH**/ ?>