<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>e-SAKIP</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main/app.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main/app-dark.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main/colormask.css')); ?>" />
    <link
        href="https://cdn.datatables.net/v/bs5/dt-2.0.6/date-1.5.2/fc-5.0.0/fh-4.0.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/datatables.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo/pemkab_favicon.png')); ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo/pemkab_favicon.png')); ?>" type="image/png" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/images/logo/pemkab2.png')); ?>" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="#">
                                <img style="width:100%;height:80px;" src="<?php echo e(asset('assets/images/logo/pemkab1.png')); ?>"
                                    alt="Logo" srcset="" />
                            </a>
                        </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input me-0" type="checkbox" id="toggle-dark" />
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <?php if(session('role') == 'admin'): ?>
                            <li class="sidebar-title">Menu Admin</li>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'admin.index','icon' => 'house'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Dashboard
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'admin.user-management.index','icon' => 'person-fill'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                User Management
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if(session('role') == 'perda'): ?>
                            <li class="sidebar-title">Menu Pemerintah Daerah</li>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'admin.perda.beranda.index','icon' => 'house'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Dashboard
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                            <li class="sidebar-item has-sub">
                                <a href="#" class="sidebar-link">
                                    <i class="bi bi-stack"></i>
                                    <span>Perencanaan Kinerja</span>
                                </a>
                                <ul
                                    class="submenu <?php echo e(Route::is('perda.perencanaan-kinerja.sasaran-strategis.index') || Route::is('perda.perencanaan-kinerja.sasaran-program.index') || Route::is('perda.perencanaan-kinerja.sasaran-kegiatan.index') || Route::is('perda.perencanaan-kinerja.sasaran-sub-kegiatan.index') ? 'active' : ''); ?>">
                                    <?php if (isset($component)) { $__componentOriginal8eda5ac0770540e6300f394c53194f79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8eda5ac0770540e6300f394c53194f79 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebarItem::resolve(['route' => 'admin.perda.sastra.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebarItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Sasaran Strategis
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $attributes = $__attributesOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__attributesOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $component = $__componentOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__componentOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal8eda5ac0770540e6300f394c53194f79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8eda5ac0770540e6300f394c53194f79 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebarItem::resolve(['route' => 'admin.perda.saspro.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebarItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Sasaran Program
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $attributes = $__attributesOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__attributesOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $component = $__componentOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__componentOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal8eda5ac0770540e6300f394c53194f79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8eda5ac0770540e6300f394c53194f79 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebarItem::resolve(['route' => 'admin.perda.saske.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebarItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Sasaran Kegiatan
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $attributes = $__attributesOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__attributesOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $component = $__componentOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__componentOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal8eda5ac0770540e6300f394c53194f79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8eda5ac0770540e6300f394c53194f79 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebarItem::resolve(['route' => 'admin.perda.sasubkegia.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebarItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Sasaran Sub-Kegiatan
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $attributes = $__attributesOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__attributesOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $component = $__componentOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__componentOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
                                </ul>
                            </li>
                            <li class="sidebar-item has-sub">
                                <a href="#" class="sidebar-link">
                                    <i class="bi bi-stack"></i>
                                    <span>Pengukuran Kinerja</span>
                                </a>
                                <ul
                                    class="submenu <?php echo e(Route::is('admin.perda.pengukuran.tahunan') || Route::is('admin.perda.pengukuran.triwulan')); ?>">
                                    <?php if (isset($component)) { $__componentOriginal8eda5ac0770540e6300f394c53194f79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8eda5ac0770540e6300f394c53194f79 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebarItem::resolve(['route' => 'admin.perda.pengukuran.tahunan'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebarItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Tahunan
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $attributes = $__attributesOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__attributesOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $component = $__componentOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__componentOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal8eda5ac0770540e6300f394c53194f79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8eda5ac0770540e6300f394c53194f79 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebarItem::resolve(['route' => 'admin.perda.pengukuran.triwulan'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebarItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Triwulan
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $attributes = $__attributesOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__attributesOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8eda5ac0770540e6300f394c53194f79)): ?>
<?php $component = $__componentOriginal8eda5ac0770540e6300f394c53194f79; ?>
<?php unset($__componentOriginal8eda5ac0770540e6300f394c53194f79); ?>
<?php endif; ?>
                                </ul>
                            </li>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'admin.perda.pelaporan.index','icon' => 'archive'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Pelaporan Kinerja
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'admin.perda.pelaporan.index','icon' => 'clipboard-data'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Evaluasi internal
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                        <?php elseif(session('role') == 'pemkab'): ?>
                            <li class="sidebar-title">Menu Pemerintah Kabupaten</li>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'admin.pemkab.beranda.index','icon' => 'house'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Dashboard
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'admin.pemkab.sastra.index','icon' => 'person-lines-fill'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Perencanaan Kinerja
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'admin.pemkab.pengukuran.index','icon' => 'card-checklist'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Pengukuran Kinerja
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'admin.pemkab.pelaporan.index','icon' => 'archive'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Pelaporan Kinerja
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                        <?php elseif(session('role') == 'inspek'): ?>
                            <li class="sidebar-title">Menu Inspektorat</li>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'inspek.index','icon' => 'house'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Dashboard
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'inspek.self-assesment.index','icon' => 'clipboard2-check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Self Assesment Perangkat Daerah
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247 = $attributes; } ?>
<?php $component = App\View\Components\Layout\ListSidebar::resolve(['route' => 'inspek.evaluasi-internal.index','icon' => 'clipboard-data'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.list-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\ListSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Evaluasi Internal
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $attributes = $__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__attributesOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247)): ?>
<?php $component = $__componentOriginal151d5c42c4f3063782c77bb5c3bd0247; ?>
<?php unset($__componentOriginal151d5c42c4f3063782c77bb5c3bd0247); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class="layout-navbar">
            <header class="mb-3">
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">

                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo e(session('name') ?? 'No name'); ?></h6>
                                            
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?php echo e(asset('assets/images/faces/profile.jpg')); ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?php echo e(session('name') ?? 'No name'); ?></h6>
                                    </li>
                                    
                                    
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('auth.logout')); ?>"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i>
                                            Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
<?php /**PATH C:\laragon\www\esakip-app\resources\views/layout/admin/header.blade.php ENDPATH**/ ?>