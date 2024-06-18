<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal9d6f3d191d43deffded4ffa85bf5a6c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9d6f3d191d43deffded4ffa85bf5a6c5 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Layout\Header::resolve(['title' => 'Sasaran Program'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Tabel Sasaran Program</h4>
                <a href="<?php echo e(route('admin.perda.saspro.create')); ?>" class="btn btn-success">
                    Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-datatable">
                        <thead class="table-info">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Sasaran Program</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $perdaProgData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saspro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($saspro->sasaran); ?></td>
                                    <td><?php echo e($saspro->tahun); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <?php if (isset($component)) { $__componentOriginal0ad9171a71f20e4ab86ac3e3a439baa2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ad9171a71f20e4ab86ac3e3a439baa2 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\ButtonEdit::resolve(['title' => 'Edit Sasaran Program','route' => 'admin.perda.saspro.edit','id' => ''.e($saspro->id).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.button-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\ButtonEdit::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ad9171a71f20e4ab86ac3e3a439baa2)): ?>
<?php $attributes = $__attributesOriginal0ad9171a71f20e4ab86ac3e3a439baa2; ?>
<?php unset($__attributesOriginal0ad9171a71f20e4ab86ac3e3a439baa2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ad9171a71f20e4ab86ac3e3a439baa2)): ?>
<?php $component = $__componentOriginal0ad9171a71f20e4ab86ac3e3a439baa2; ?>
<?php unset($__componentOriginal0ad9171a71f20e4ab86ac3e3a439baa2); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginal18826eba58f8dd53fd8d9171e06d3675 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18826eba58f8dd53fd8d9171e06d3675 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\ButtonDelete::resolve(['title' => 'Delete  Sasaran Program','route' => 'admin.perda.saspro.destroy','id' => ''.e($saspro->id).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.button-delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\ButtonDelete::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18826eba58f8dd53fd8d9171e06d3675)): ?>
<?php $attributes = $__attributesOriginal18826eba58f8dd53fd8d9171e06d3675; ?>
<?php unset($__attributesOriginal18826eba58f8dd53fd8d9171e06d3675); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18826eba58f8dd53fd8d9171e06d3675)): ?>
<?php $component = $__componentOriginal18826eba58f8dd53fd8d9171e06d3675; ?>
<?php unset($__componentOriginal18826eba58f8dd53fd8d9171e06d3675); ?>
<?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/perencanaan/program/index.blade.php ENDPATH**/ ?>