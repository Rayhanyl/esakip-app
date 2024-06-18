<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Sasaran Strategis</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['label' => 'Tahun','name' => 'tahun','value' => ''.e($sastra->tahun ?? '2024').'','lists' => $tahun_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Select::resolve(['label' => 'Sasaran Bupati','name' => 'pemkab_sastra_id','value' => ''.e($sastra->pemkab_sastra_id ?? '').'','lists' => $sasaran_bupati_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Sasaran Strategis','name' => 'sasaran','value' => ''.e($sastra->sasaran ?? '').''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    <?php $__empty_1 = true; $__currentLoopData = $sastra->perda_sastra_ins ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $key = Str::random(4);
        ?>
        <div class="col-indikator-sasaran-<?php echo e($key); ?> mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Sasaran Strategis</h6>
                            <?php if($loop->iteration == 1): ?>
                                <button class="btn btn-primary" type="button"
                                    onclick="addComponent('row-indikator-sasaran', '<?php echo e(route('admin.perda.sastra.indicator')); ?>')">Tambah</button>
                            <?php else: ?>
                                <button class="btn btn-danger" type="button"
                                    onclick="removeComponent('col-indikator-sasaran-<?php echo e($key); ?>')">Hapus</button>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <input type="hidden" name="indikator[<?php echo e($key); ?>][id]" value="<?php echo e($item->id); ?>">
                        <?php if (isset($component)) { $__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\TextArea::resolve(['col' => 'col-12','label' => 'Indikator Sasaran Strategis','name' => 'indikator['.e($key).'][indikator]','value' => ''.e($item->indikator).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="fw-bold">Target</label>
                                </div>
                                <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-4','label' => '2024','name' => 'indikator['.e($key).'][target1]','decimal' => 'true','value' => ''.e($item->target1).'','classinput' => 'label-target-1'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-4','label' => '2025','name' => 'indikator['.e($key).'][target2]','decimal' => 'true','value' => ''.e($item->target2).'','classinput' => 'label-target-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-4','label' => '2026','name' => 'indikator['.e($key).'][target3]','decimal' => 'true','value' => ''.e($item->target3).'','classinput' => 'label-target-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-4','label' => 'Satuan','name' => 'indikator['.e($key).'][satuan_id]','lists' => $satuan_options,'value' => ''.e($item->satuan_id).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php if (isset($component)) { $__componentOriginal331d690c46691c4888cd02203f20e0cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal331d690c46691c4888cd02203f20e0cf = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Textarea::resolve(['col' => 'col-8','label' => 'Penjelasan','name' => 'indikator['.e($key).'][penjelasan]','value' => ''.e($item->penjelasan).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal331d690c46691c4888cd02203f20e0cf)): ?>
<?php $attributes = $__attributesOriginal331d690c46691c4888cd02203f20e0cf; ?>
<?php unset($__attributesOriginal331d690c46691c4888cd02203f20e0cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal331d690c46691c4888cd02203f20e0cf)): ?>
<?php $component = $__componentOriginal331d690c46691c4888cd02203f20e0cf; ?>
<?php unset($__componentOriginal331d690c46691c4888cd02203f20e0cf); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['label' => 'Tipe Perhitungan','name' => 'indikator['.e($key).'][tipe_perhitungan]','lists' => $tipe_perhitungan_options,'value' => ''.e($item->tipe_perhitungan).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Sumber Data','name' => 'indikator['.e($key).'][sumber_data]','value' => ''.e($item->sumber_data).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <div class="col-12" id="col-penanggung-jawab-<?php echo e($key); ?>">
                            <?php $__empty_2 = true; $__currentLoopData = $item->penanggung_jawabs ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                <?php
                                    $key2 = Str::random(4);
                                ?>
                                <div class="row row-penanggung-jawab-<?php echo e($key2); ?>">
                                    <input type="hidden"
                                        name="indikator[<?php echo e($key); ?>][penanggung_jawab][<?php echo e($key2); ?>][id]"
                                        value="<?php echo e($item2->id); ?>">
                                    <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-11','label' => 'Penanggung Jawab','name' => 'indikator['.e($key).'][penanggung_jawab]['.e($key2).'][value]','placeholder' => 'Penanggung Jawab','value' => ''.e($item2->penanggung_jawab).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <div class="col-1">
                                        <label for="" class="form-label fw-bold">&nbsp;</label>
                                        <div>
                                            <?php if($loop->iteration == 1): ?>
                                                <button class="btn btn-success" type="button"
                                                    onclick="addSubComponent('col-penanggung-jawab-<?php echo e($key); ?>', '<?php echo e(route('admin.perda.sastra.penanggung-jawab')); ?>', '<?php echo e($key); ?>')">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            <?php else: ?>
                                                <button class="btn btn-danger" type="button"
                                                    onclick="removeComponent('row-penanggung-jawab-<?php echo e($key2); ?>')">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <div class="row row-penanggung-jawab-<?php echo e($key2); ?>">
                                    <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-11','label' => 'Penanggung Jawab','name' => 'indikator['.e($key).'][penanggung_jawab]['.e($key2).'][value]','placeholder' => 'Penanggung Jawab'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <div class="col-1">
                                        <label for="" class="form-label fw-bold">&nbsp;</label>
                                        <div>
                                            <?php if($loop->iteration == 1): ?>
                                                <button class="btn btn-success" type="button"
                                                    onclick="addSubComponent('col-penanggung-jawab-<?php echo e($key); ?>', '<?php echo e(route('admin.perda.sastra.penanggung-jawab')); ?>', '<?php echo e($key); ?>')">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            <?php else: ?>
                                                <button class="btn btn-danger" type="button"
                                                    onclick="removeComponent('row-penanggung-jawab-<?php echo e($key2); ?>')">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
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
                            <h6>Indikator Sasaran Strategis</h6>
                            <button class="btn btn-primary" type="button"
                                onclick="addComponent('row-indikator-sasaran', '<?php echo e(route('admin.perda.sastra.indicator')); ?>')">Tambah</button>
                        </div>
                        <hr>
                        <?php if (isset($component)) { $__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\TextArea::resolve(['col' => 'col-12','label' => 'Indikator Sasaran Strategis','name' => 'indikator['.e($key).'][indikator]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="fw-bold">Target</label>
                                </div>
                                <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-4','label' => '2024','name' => 'indikator['.e($key).'][target1]','decimal' => 'true','type' => 'text','classinput' => 'label-target-1'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-4','label' => '2025','name' => 'indikator['.e($key).'][target2]','decimal' => 'true','type' => 'text','classinput' => 'label-target-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-4','label' => '2026','name' => 'indikator['.e($key).'][target3]','decimal' => 'true','type' => 'text','classinput' => 'label-target-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-4','label' => 'Satuan','name' => 'indikator['.e($key).'][satuan_id]','lists' => $satuan_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php if (isset($component)) { $__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\TextArea::resolve(['col' => 'col-8','label' => 'Penjelasan','name' => 'indikator['.e($key).'][penjelasan]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['label' => 'Tipe Perhitungan','name' => 'indikator['.e($key).'][tipe_perhitungan]','lists' => $tipe_perhitungan_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Sumber Data','name' => 'indikator['.e($key).'][sumber_data]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <div class="col-12" id="col-penanggung-jawab-<?php echo e($key); ?>">
                            <?php
                                $key2 = Str::random(4);
                            ?>
                            <div class="row row-penanggung-jawab-<?php echo e($key2); ?>">
                                <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-11','label' => 'Penanggung Jawab','name' => 'indikator['.e($key).'][penanggung_jawab]['.e($key2).'][value]','placeholder' => 'Penanggung Jawab'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <div class="col-1">
                                    <label for="" class="form-label fw-bold">&nbsp;</label>
                                    <div>
                                        <button class="btn btn-success" type="button"
                                            onclick="addSubComponent('col-penanggung-jawab-<?php echo e($key); ?>', '<?php echo e(route('admin.perda.sastra.penanggung-jawab')); ?>', '<?php echo e($key); ?>')">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/perencanaan/sastra/_partials/form.blade.php ENDPATH**/ ?>