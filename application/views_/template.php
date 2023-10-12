<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PK Express - by Pandurasa</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/admin_lte/') ?>dist/img/pandurasa_kharisma_pt.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/sweetalert2/animate.min.css">
    <style>
        .swal2-popup {
            font-size: 0.8rem !important;
        }
    </style>
</head>

<style>
    #pageloader {
        background: rgb(54 48 48 / 80%);
        ;
        display: none;
        height: 100%;
        position: fixed;
        width: 100%;
        z-index: 9999999 !important;
    }

    #pageloader img {
        left: 50%;
        margin-left: -32px;
        margin-top: -32px;
        position: absolute;
        top: 50%;
    }
</style>
<div id="pageloader">
    <img src="<?= base_url('assets/admin_lte/') ?>dist/img/loader-large.gif" alt="processing..." />
</div>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed <?= $this->uri->segment(1) == 'data' ? 'sidebar-collapse' : '' ?> ">

    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble img-circle elevation-3" src="<?= base_url('assets/admin_lte/') ?>dist/img/pandurasa_kharisma_pt.png" alt="pk_logo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <?= ucwords(strtolower($this->session->userdata('username'))) ?>
                        &nbsp;
                        <i class="fa fa-user-circle"></i>
                        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                    </a>
                </li>
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <span class="brand-link">
                <img src="<?= base_url('assets/admin_lte/') ?>dist/img/pandurasa_kharisma_pt.png" alt="PK Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PK Express</span>
            </span>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!--    -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <!-- <li class="nav-item">
                            <a href="<?= base_url('manifes') ?>" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Input Nomor Manifes
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a onclick="loading()" href="<?= base_url('manifes') ?>" class="nav-link">
                                <i class="nav-icon far fa-circle nav-icon"></i>
                                <p>
                                    Manifest
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a onclick="loading()" href="<?= base_url('maintenance/index') ?>" class="nav-link">
                                <i class="nav-icon far fa-circle nav-icon"></i>
                                <p>
                                    Maintenance Kendaraan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a onclick="loading()" href="<?= base_url('auth/logout') ?>" class="nav-link">
                                <i class="nav-icon far fa-circle nav-icon"></i>
                                <p>
                                    Log Out
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- jQuery -->
        <script src="<?= base_url('assets/admin_lte/') ?>plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('assets/admin_lte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets') ?>/sweetalert2/sweetalert2.min.js"></script>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php echo $contents ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer d-none d-sm-inline-block">
            <strong>Copyright &copy; 2022-2023 <a href="">PK-IT</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/admin_lte/') ?>dist/js/adminlte.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/chart.js/Chart.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        function loading() {
            $("#pageloader").fadeIn();
        }
    </script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url('assets/admin_lte/') ?>dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?= base_url('assets/admin_lte/') ?>dist/js/pages/dashboard2.js"></script> -->
</body>

</html>