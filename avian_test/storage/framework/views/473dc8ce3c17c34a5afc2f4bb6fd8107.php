<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->yieldContent('style'); ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')); ?>">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/jqvmap/jqvmap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/summernote/summernote-bs4.css')); ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    
    <link href="<?php echo e(asset('js/cropper/cropper.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-50BBRYS4HY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-50BBRYS4HY');
    </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <?php if(auth()->check() && (auth()->user()->hasRole('owner') || auth()->user()->hasRole('staff'))): ?>
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <?php endif; ?>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo e(route('catalog.index')); ?>" class="nav-link">Catalog</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">

                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">UAS LARALUX</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="/dashboard" class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/catalog" class="nav-link <?php echo e(Request::is('catalog') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Catalog
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?php echo e(route('transaction.index')); ?>" class="nav-link <?php echo e(Request::is('transactions') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Riwayat Transaksi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?php echo e(route('report.index')); ?>" class="nav-link <?php echo e(Request::is('report') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>
                        <?php if (\Illuminate\Support\Facades\Blade::check('role', 'staff')): ?>
                        <li class="nav-item has-treeview">
                            <a href="/admin/hotels" class="nav-link <?php echo e(Request::is('hotels') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Hotels
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/hoteltypes" class="nav-link <?php echo e(Request::is('hoteltypes') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Hotels Type
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/products" class="nav-link <?php echo e(Request::is('products') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Products
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/producttypes" class="nav-link <?php echo e(Request::is('producttypes') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Products Type
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if (\Illuminate\Support\Facades\Blade::check('role', 'owner')): ?>
                        <li class="nav-item has-treeview">
                            <a href="<?php echo e(route('users.index')); ?>" class="nav-link <?php echo e(Request::is('users') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <?php echo $__env->yieldContent('page-bar'); ?>
                    </div>
                </div>
            </div>

            <section class="content">
                <?php echo $__env->yieldContent('contents'); ?>
            </section>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; <a href="http://adminlte.io">UAS LARALUX</a>.</strong>
            All rights reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?php echo e(asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo e(asset('adminlte/plugins/chart.js/Chart.min.js')); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo e(asset('adminlte/plugins/sparklines/sparkline.js')); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo e(asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e(asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo e(asset('adminlte/plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminlte/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo e(asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo e(asset('adminlte/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo e(asset('adminlte/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo e(asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('adminlte/dist/js/adminlte.js')); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('adminlte/dist/js/pages/dashboard.js')); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e(asset('adminlte/dist/js/demo.js')); ?>"></script>
    
    <script src="<?php echo e(asset('js/cropper/cropper.min.js')); ?>"></script>

    
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <?php echo $__env->yieldContent('javascript'); ?>
</body>

</html><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/layouts/adminlte.blade.php ENDPATH**/ ?>