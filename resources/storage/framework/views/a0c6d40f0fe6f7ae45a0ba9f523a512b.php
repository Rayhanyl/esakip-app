
<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row g-4">
                    <div class="col-12">
                        <a href="<?php echo e(route('admin.perda.pengukuran.index')); ?>" class="text-subtitle text-muted">
                            <i class="bi bi-arrow-left-circle"></i> Kembali ke halaman pengukuran kinerja
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <section class="section">
                <div class="card shadow rounded-4">
                    <div class="card-header">
                        <h4 class="card-title">Create Pengukuran Kinerja</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="<?php echo e(route('admin.perda.pengukuran.store')); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-12 col-lg-6','label' => 'Tahun','name' => 'tahun','id' => 'master-tahun','lists' => $tahun_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac)): ?>
<?php $attributes = $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac; ?>
<?php unset($__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac)): ?>
<?php $component = $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac; ?>
<?php unset($__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac); ?>
<?php endif; ?>
                            <div class="col-12 col-lg-6">
                                <label for="master-triwulan" class="form-label fw-bold">Triwulan</label>
                                <select class="form-control" id="master-triwulan" name="triwulan">
                                    <option>-- Pilih Triwulan --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="tahunan">Tahunan</option>
                                </select>
                            </div>
                            <div class="col-12" id="section-triwulan">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <?php if (isset($component)) { $__componentOriginalc4e60ed76eadee7fcd0fab12033ada25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\LabelHeading::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\LabelHeading::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Pengukuran Kinerja
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25)): ?>
<?php $attributes = $__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25; ?>
<?php unset($__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4e60ed76eadee7fcd0fab12033ada25)): ?>
<?php $component = $__componentOriginalc4e60ed76eadee7fcd0fab12033ada25; ?>
<?php unset($__componentOriginalc4e60ed76eadee7fcd0fab12033ada25); ?>
<?php endif; ?>
                                    </div>
                                    <div class="col-12">
                                        <?php if (isset($component)) { $__componentOriginalc4e60ed76eadee7fcd0fab12033ada25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\LabelHeading::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\LabelHeading::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Anggaran
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25)): ?>
<?php $attributes = $__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25; ?>
<?php unset($__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4e60ed76eadee7fcd0fab12033ada25)): ?>
<?php $component = $__componentOriginalc4e60ed76eadee7fcd0fab12033ada25; ?>
<?php unset($__componentOriginalc4e60ed76eadee7fcd0fab12033ada25); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="section-tahunan">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <?php if (isset($component)) { $__componentOriginalc4e60ed76eadee7fcd0fab12033ada25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\LabelHeading::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\LabelHeading::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Tahunan
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25)): ?>
<?php $attributes = $__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25; ?>
<?php unset($__attributesOriginalc4e60ed76eadee7fcd0fab12033ada25); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4e60ed76eadee7fcd0fab12033ada25)): ?>
<?php $component = $__componentOriginalc4e60ed76eadee7fcd0fab12033ada25; ?>
<?php unset($__componentOriginalc4e60ed76eadee7fcd0fab12033ada25); ?>
<?php endif; ?>
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-12 col-lg-4','label' => 'Sasaran Strategis Tahunan','id' => 'id-sasaran-strategis-tahunan','name' => 'tahunan_sasaran_strategis_id','lists' => $sasaran_strategis_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac)): ?>
<?php $attributes = $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac; ?>
<?php unset($__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac)): ?>
<?php $component = $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac; ?>
<?php unset($__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-12 col-lg-4','label' => 'Indikator Sasaran Tahunan','id' => 'id-indikator-sasaran-tahunan','name' => 'tahunan_sasaran_strategis_indikator_id'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac)): ?>
<?php $attributes = $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac; ?>
<?php unset($__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac)): ?>
<?php $component = $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac; ?>
<?php unset($__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-12 col-lg-4','label' => 'Target','name' => 'tahunan_target','readonly' => 'true','decimal' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'id-terget-tahunan']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567)): ?>
<?php $attributes = $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567; ?>
<?php unset($__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567)): ?>
<?php $component = $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567; ?>
<?php unset($__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-12 col-lg-4','label' => 'Realisasi','name' => 'tahunan_realisasi','decimal' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'id-realisasi-tahunan']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567)): ?>
<?php $attributes = $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567; ?>
<?php unset($__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567)): ?>
<?php $component = $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567; ?>
<?php unset($__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-12 col-lg-4','label' => 'Karakteristik','id' => 'id-karakteristik-tahunan','name' => 'tahunan_karakteristik','lists' => $karakteristik_options,'value' => '1'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac)): ?>
<?php $attributes = $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac; ?>
<?php unset($__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac)): ?>
<?php $component = $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac; ?>
<?php unset($__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-12 col-lg-4','label' => 'Capaian','name' => 'tahunan_capaian','readonly' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'id-capaian-tahunan']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567)): ?>
<?php $attributes = $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567; ?>
<?php unset($__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567)): ?>
<?php $component = $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567; ?>
<?php unset($__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567); ?>
<?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-50">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/pengukuran/create.blade.php ENDPATH**/ ?>