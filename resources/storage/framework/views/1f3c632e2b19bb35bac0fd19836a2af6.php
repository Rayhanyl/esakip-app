
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
                        <h4 class="card-title">Create Pengukuran Kinerja Tahunan</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-4" action="<?php echo e(route('admin.perda.pengukuran.store')); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="type" value="tahunan">
                            <?php if (isset($component)) { $__componentOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b099f880a33b5fbbd5df8fd87ae25ac = $attributes; } ?>
<?php $component = App\View\Components\Admin\Form\Select::resolve(['col' => 'col-12 col-lg-4','label' => 'Tahun','name' => 'tahun','id' => 'master-tahun','lists' => $tahun_options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <div class="col-12 col-lg-4">
                                <label for="id-target-tahunan" class="form-label fw-bold">Target</label>
                                <input type="text" class="form-control decimal-input" name="tahunan_target"
                                    id="id-target-tahunan" readonly>
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="id-realisasi-tahunan" class="form-label fw-bold">Realisasi</label>
                                <input type="text" class="form-control decimal-input" name="tahunan_realisasi"
                                    id="id-realisasi-tahunan">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="id-karakteristik-tahunan" class="form-label fw-bold">Karakteristik</label>
                                <select class="form-control" name="tahunan_karakteristik" id="id-karakteristik-tahunan">
                                    <option>-- Pilih Karakteristik --</option>
                                    <option value="1">Semakin tinggi realisasi maka capaian semakin bagus</option>
                                    <option value="2">Semakin rendah realisasi maka capaian semakin bagus</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="id-capaian-tahunan" class="form-label fw-bold">Capaian</label>
                                <input type="text" class="form-control decimal-input" name="tahunan_capaian"
                                    id="id-capaian-tahunan" readonly>
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
        <script>
            $(document).ready(function() {
                // Initialize input masks
                $('#id-target-tahunan').inputmask({
                    alias: "decimal",
                    rightAlign: false
                });
                $('#id-realisasi-tahunan').inputmask({
                    alias: "decimal",
                    rightAlign: false
                });

                $('#master-tahun').on('select2:select', function() {
                    getSastraTahunan($(this).val(), $('#id-sasaran-strategis-tahunan'));
                    reset_form();
                });

                function reset_form() {
                    $('#id-sasaran-strategis-tahunan').val('').trigger('change');
                    $('#id-indikator-sasaran-tahunan').val('').trigger('change');
                    $('#id-target-tahunan').val('');
                    $('#id-realisasi-tahunan').val('');
                    $('#id-karakteristik-tahunan').val('').trigger('change');
                    $('#id-capaian-tahunan').val('');
                }

                $('#id-sasaran-strategis-tahunan').on('select2:select', function() {
                    getSastraInTahunan($(this).val(), $('#id-indikator-sasaran-tahunan'));
                });

                $('#id-indikator-sasaran-tahunan').on('select2:select', function() {
                    getTargetTahunan($(this).val());
                });

                function getSastraTahunan(tahun, element) {
                    $.get("<?php echo e(route('admin.perda.pengukuran.get-sasaran-strategis')); ?>", {
                        tahun
                    }, function(data) {
                        let list = data.map(el => ({
                            id: el.id,
                            text: el.sasaran,
                        }));
                        $(element).html('').select2({
                            data: list,
                            theme: 'bootstrap-5'
                        });
                        if (list.length === 1) {
                            $(element).val(list[0].id).trigger('select2:select');
                        }
                    });
                }

                function getSastraInTahunan(id, element) {
                    $.get("<?php echo e(route('admin.perda.pengukuran.get-sasaran-indikator-tahunan')); ?>", {
                        id
                    }, function(data) {
                        let list = data.map(el => ({
                            id: el.id,
                            text: el.indikator,
                        }));
                        $(element).html('').select2({
                            data: list,
                            theme: 'bootstrap-5'
                        });
                        if (list.length === 1) {
                            $(element).val(list[0].id).trigger('select2:select');
                        }
                    });
                }

                function getTargetTahunan(id) {
                    $.get("<?php echo e(route('admin.perda.pengukuran.get-target-tahunan')); ?>", {
                            id
                        })
                        .done(function(data) {
                            $('#id-target-tahunan').val(data);
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            console.error('Error fetching target:', textStatus, errorThrown);
                            alert('Failed to fetch target. Please try again.');
                        });
                }

                // Update the value on input change
                $('#id-realisasi-tahunan').on('input', function() {
                    console.log(`Realisasi input changed: ${$(this).val()}`);
                    calculateCapaianTahunan();
                });

                $('#id-karakteristik-tahunan').on('change', function() {
                    console.log(`Karakteristik changed: ${$(this).val()}`);
                    calculateCapaianTahunan();
                });

                function calculateCapaianTahunan() {
                    const realisasi = parseFloat($('#id-realisasi-tahunan').val()) || 0;
                    const target = parseFloat($('#id-target-tahunan').val()) || 0;
                    const karakteristik = $('#id-karakteristik-tahunan').val();

                    console.log(realisasi, target, karakteristik);
                    let capaian = 0;

                    if (karakteristik === "1") {
                        if (target !== 0) {
                            capaian = (realisasi / target) * 100;
                        } else {
                            capaian = 0; // Handle division by zero
                        }
                    } else if (karakteristik === "2") {
                        if (target !== 0) {
                            capaian = ((target - (realisasi - target)) / target) * 100;
                        } else {
                            capaian = 0; // Handle division by zero
                        }
                    }

                    console.log(
                        `Realisasi: ${realisasi}, Target: ${target}, Karakteristik: ${karakteristik}, Capaian: ${capaian}`
                    );
                    $('#id-capaian-tahunan').val(capaian.toFixed(2));
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\esakip-app\resources\views/admin/perda/pengukuran/tahunan.blade.php ENDPATH**/ ?>