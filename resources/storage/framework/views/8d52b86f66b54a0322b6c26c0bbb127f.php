<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Sasaran Sub Kegiatan</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-4','label' => 'Tahun','name' => 'tahun','value' => ''.e($sasubkegium->tahun ?? '2024').'','lists' => $tahun_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-4','label' => 'Sasaran Kegiatan','name' => 'perda_kegia_id','value' => ''.e($sasubkegium->perda_kegia_id ?? '').'','lists' => $kegia_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-4','label' => 'Sasaran Sub Kegiatan','name' => 'sasaran','value' => ''.e($sasubkegium->sasaran ?? '').''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <div class="row" id="row-pengampu">
                <?php $__empty_1 = true; $__currentLoopData = $sasubkegium->perda_subkegia_pengampus ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengampu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $keyp = Str::random(4);
                    ?>
                    <div class="row col-pengampu-<?php echo e($keyp); ?>">
                        <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-11','label' => 'Pengampu','name' => 'pengampu_id','lists' => [],'readonly' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <input type="hidden" name="pengampu[<?php echo e($keyp); ?>][id]" value="1">
                        <input type="hidden" name="pengampu[<?php echo e($keyp); ?>][value]" value="1">
                        <div class="col-1">
                            <label for="" class="form-label fw-bold">&nbsp;</label>
                            <div>
                                <?php if($loop->iteration == 1): ?>
                                    <button class="btn btn-success" type="button"
                                        onclick="addComponent('row-pengampu', '<?php echo e(route('admin.perda.sasubkegia.pengampu')); ?>')">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-danger" type="button"
                                        onclick="removeComponent('col-pengampu-<?php echo e($keyp); ?>')">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php
                        $keyp = Str::random(4);
                    ?>
                    <div class="row col-pengampu-<?php echo e($keyp); ?>">
                        <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-11','label' => 'Pengampu','name' => 'pengampu_id','lists' => [],'readonly' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <input type="hidden" name="pengampu[<?php echo e($keyp); ?>][value]" value="1">
                        <div class="col-1">
                            <label for="" class="form-label fw-bold">&nbsp;</label>
                            <div>
                                <button class="btn btn-success" type="button"
                                    onclick="addComponent('row-pengampu', '<?php echo e(route('admin.perda.sasubkegia.pengampu')); ?>')">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div id="row-indikator-sasaran">
    <?php $__empty_1 = true; $__currentLoopData = $sasubkegium->perda_subkegia_ins ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $key = Str::random(4);
        ?>
        <div class="col-indikator-sasaran-<?php echo e($key); ?> mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Sasaran Sub Kegiatan</h6>
                            <?php if($loop->iteration == 1): ?>
                                <button class="btn btn-primary" type="button"
                                    onclick="addComponent('row-indikator-sasaran', '<?php echo e(route('admin.perda.sasubkegia.indicator')); ?>')">Tambah</button>
                            <?php else: ?>
                                <button class="btn btn-danger" type="button"
                                    onclick="removeComponent('col-indikator-sasaran-<?php echo e($key); ?>')">Hapus</button>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <input type="hidden" name="indikator[<?php echo e($key); ?>][id]" value="<?php echo e($item->id); ?>">
                        <?php if (isset($component)) { $__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\TextArea::resolve(['col' => 'col-12','label' => 'Indikator Sasaran Sub Kegiatan','name' => 'indikator['.e($key).'][indikator]','value' => ''.e($item->indikator).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-12','label' => 'Target','name' => 'indikator['.e($key).'][target]','decimal' => 'true','value' => ''.e($item->target).'','classinput' => 'label-target-1'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-3','label' => 'Triwulan 1','name' => 'indikator['.e($key).'][triwulan1]','decimal' => 'true','value' => ''.e($item->triwulan1).'','classinput' => 'label-target-1'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-3','label' => 'Triwulan 2','name' => 'indikator['.e($key).'][triwulan2]','decimal' => 'true','value' => ''.e($item->triwulan2).'','classinput' => 'label-target-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-3','label' => 'Triwulan 3','name' => 'indikator['.e($key).'][triwulan3]','decimal' => 'true','value' => ''.e($item->triwulan3).'','classinput' => 'label-target-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-3','label' => 'Triwulan 4','name' => 'indikator['.e($key).'][triwulan4]','decimal' => 'true','value' => ''.e($item->triwulan4).'','classinput' => 'label-target-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['label' => 'Sub Kegiatan','name' => 'indikator['.e($key).'][subkegiatan]','value' => ''.e($item->subkegiatan).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <div class="col-indikator-sasaran-<?php echo e($key); ?> mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-between my-3">
                            <h6>Indikator Sasaran Sub Kegiatan</h6>
                            <button class="btn btn-primary" type="button"
                                onclick="addComponent('row-indikator-sasaran', '<?php echo e(route('admin.perda.sasubkegia.indicator')); ?>')">Tambah</button>
                        </div>
                        <hr>
                        <?php if (isset($component)) { $__componentOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf68a00c9b97ea00ccfbcb83950efb7c6 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\TextArea::resolve(['col' => 'col-12','label' => 'Indikator Sasaran Sub Kegiatan','name' => 'indikator['.e($key).'][indikator]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-12','label' => 'Target','name' => 'indikator['.e($key).'][target]','decimal' => 'true','classinput' => 'label-target-1'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-3','label' => 'Triwulan 1','name' => 'indikator['.e($key).'][triwulan1]','decimal' => 'true','classinput' => 'label-target-1'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-3','label' => 'Triwulan 2','name' => 'indikator['.e($key).'][triwulan2]','decimal' => 'true','classinput' => 'label-target-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-3','label' => 'Triwulan 3','name' => 'indikator['.e($key).'][triwulan3]','decimal' => 'true','classinput' => 'label-target-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-3','label' => 'Triwulan 4','name' => 'indikator['.e($key).'][triwulan4]','decimal' => 'true','classinput' => 'label-target-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <?php if (isset($component)) { $__componentOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaba835d4d7e25596a8dd13dc7fe0b567 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-4','label' => 'Sub Kegiatan','name' => 'indikator['.e($key).'][subkegiatan]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Text::resolve(['col' => 'col-4','label' => 'Anggaran','name' => 'indikator['.e($key).'][anggaran]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/perencanaan/subkegiatan/_partials/form.blade.php ENDPATH**/ ?>