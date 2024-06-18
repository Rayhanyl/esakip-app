
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
                        <h4 class="card-title">Create Pengukuran Kinerja Triwulan</h4>
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
                                </select>
                            </div>
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

                            <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-12 col-lg-6','label' => 'Sasaran Strategis','name' => 'pengukuran_sastra','id' => 'id-sasaran-strategis','lists' => $sasaran_strategis_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-12 col-lg-6','label' => 'Indikator Sasaran','id' => 'id-sasaran-strategis-indikator','name' => 'pengukuran_sastra_in'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-12 col-lg-4','label' => 'Sasaran Sub-Kegiatan','id' => 'id-sub-kegiatan','name' => 'pengukuran_subkegiatan','lists' => $sasaran_sub_kegiatan_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-12 col-lg-4','label' => 'Indikator Sasaran Sub-Kegiatan','id' => 'id-subkegiatan-indikator','name' => 'pengukuran_subkegiatan_in'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <div class="col-12 col-lg-4">
                                <label for="id-subkegiatan-target" class="form-label fw-bold">Target</label>
                                <input type="text" class="form-control decimal-input" name="pengukuran_target"
                                    id="id-subkegiatan-target" readonly>
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="id-pengukuran-realisasi" class="form-label fw-bold">Realisasi</label>
                                <input type="text" class="form-control decimal-input" name="pengukuran_realisasi"
                                    id="id-pengukuran-realisasi">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="id-pengukuran-karakteristik" class="form-label fw-bold">Karakteristik</label>
                                <select class="form-control" name="pengukuran_karakteristik" id="id-pengukuran-karakteristik">
                                    <option>-- Pilih Karakteristik --</option>
                                    <option value="1">Semakin tinggi realisasi maka capaian semakin bagus</option>
                                    <option value="2">Semakin rendah realisasi maka capaian semakin bagus</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="id-pengukuran-capaian" class="form-label fw-bold">Capaian</label>
                                <input type="text" class="form-control decimal-input" name="pengukuran_capaian"
                                    id="id-pengukuran-capaian" readonly>
                            </div>

                            
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
                            <div class="col-12 col-lg-6">
                                <label for="id-anggaran-subkegiatan" class="form-label fw-bold">Sub Kegiatan</label>
                                <input type="text" class="form-control decimal-input" name="anggaran_sub_kegiatan"
                                    id="id-anggaran-subkegiatan" readonly>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="id-anggaran-pagu" class="form-label fw-bold">Pagu</label>
                                <input type="text" class="form-control idr-currency" name="anggaran_pagu"
                                    id="id-anggaran-pagu" readonly>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="id-realisasi-tahunan" class="form-label fw-bold">Realisasi</label>
                                <input type="text" class="form-control decimal-input" name="anggaran_realisasi"
                                    id="id-anggaran-realisasi">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="id-anggaran-capaian" class="form-label fw-bold">Capaian</label>
                                <input type="text" class="form-control decimal-input" name="anggaran_capaian"
                                    id="id-anggaran-capaian" readonly>
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

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/pengukuran/triwulan.blade.php ENDPATH**/ ?>