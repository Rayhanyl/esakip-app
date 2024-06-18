<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Sasaran Program</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['label' => 'Tahun','name' => 'tahun','value' => ''.e($saspro->tahun ?? '2024').'','lists' => $tahun_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Select::resolve(['label' => 'Sasaran Strategis','name' => 'perda_sastra_id','value' => ''.e($saspro->perda_sastra_id ?? '').'','lists' => $sastra_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Select::resolve(['label' => 'Pengampu','name' => 'pengampu_id','lists' => [],'readonly' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <input type="hidden" name="pengampu_id" value="1">
            <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Sasaran Program','name' => 'sasaran','value' => ''.e($saspro->sasaran ?? '').''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
</div>

<div id="row-indikator-sasaran">
    <?php $__empty_1 = true; $__currentLoopData = $saspro->perda_prog_ins ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $key = Str::random(4);
        ?>
        <div class="col-indikator-sasaran-<?php echo e($key); ?> mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Program</h6>
                            <?php if($loop->iteration == 1): ?>
                                <button class="btn btn-primary" type="button"
                                    onclick="addComponent('row-indikator-sasaran', '<?php echo e(route('admin.perda.saspro.indicator')); ?>')">Tambah</button>
                            <?php else: ?>
                                <button class="btn btn-danger" type="button"
                                    onclick="removeComponent('col-indikator-sasaran-<?php echo e($key); ?>')">Hapus</button>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <input type="hidden" name="indikator[<?php echo e($key); ?>][id]" value="<?php echo e($item->id); ?>">
                        <?php if (isset($component)) { $__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\TextArea::resolve(['col' => 'col-12','label' => 'Indikator Program','name' => 'indikator['.e($key).'][indikator]','value' => ''.e($item->indikator).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\TextArea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6)): ?>
<?php $attributes = $__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6; ?>
<?php unset($__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6)): ?>
<?php $component = $__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6; ?>
<?php unset($__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Target','name' => 'indikator['.e($key).'][target]','value' => ''.e($item->target).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
<?php $component = App\View\Components\Admin\Form\Select::resolve(['label' => 'Satuan','name' => 'indikator['.e($key).'][satuan_id]','lists' => $satuan_options,'value' => ''.e($item->satuan_id).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Program','name' => 'indikator['.e($key).'][program]','value' => ''.e($item->program).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Anggaran','name' => 'indikator['.e($key).'][anggaran]','value' => ''.e($item->anggaran).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php
            $key = Str::random(4);
        ?>
        <div class="col-indikator-sasaran mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Sasaran Program</h6>
                            <button class="btn btn-primary" type="button"
                                onclick="addComponent('row-indikator-sasaran', '<?php echo e(route('admin.perda.saspro.indicator')); ?>')">Tambah</button>
                        </div>
                        <hr>
                        <?php if (isset($component)) { $__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\TextArea::resolve(['col' => 'col-12','label' => 'Indikator Program','name' => 'indikator['.e($key).'][indikator]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\TextArea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6)): ?>
<?php $attributes = $__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6; ?>
<?php unset($__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6)): ?>
<?php $component = $__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6; ?>
<?php unset($__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Target','name' => 'indikator['.e($key).'][target]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
<?php $component = App\View\Components\Admin\Form\Select::resolve(['label' => 'Satuan','name' => 'indikator['.e($key).'][satuan_id]','lists' => $satuan_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Program','name' => 'indikator['.e($key).'][program]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Anggaran','name' => 'indikator['.e($key).'][anggaran]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="card">
    <div class="card-footer text-center">
        <button class="btn btn-primary btn-lg w-50">Submit</button>
    </div>
</div>
<?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/perencanaan/program/_partials/form.blade.php ENDPATH**/ ?>