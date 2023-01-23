<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyExpress - by Pandurasa</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/admin_lte/') ?>dist/img/pandurasa_kharisma_pt.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition lockscreen">

    <!-- Automatic element centering -->
    <div id="loading" style="display:none">
        <?php $this->view('manifes/loading') ?>
    </div>

    <div class="lockscreen-wrapper" id="wadah_lockscreen">
        <div class="lockscreen-logo">
            <img src="<?= base_url('assets/admin_lte/') ?>dist/img/pandurasa_kharisma_pt.png" alt="PK Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
        </div>
        <div class="lockscreen-logo">
            <a href=""><b>My</b>Express</a>
        </div>
        <!-- <?php var_dump($_SESSION) ?> -->
        <div class="lockscreen-name">Masukan Nomor Manifes</div>
        <?php if (isset($_GET['nomor_manifes'])) { ?>
            <div class="lockscreen-name"><span class="badge badge-danger">Nomor Manifes <?= $_GET['nomor_manifes'] ?> Tidak Terdaftar</span></div>
        <?php } ?>
        <div class="lockscreen-item">
            <form id="form_manifest" action="<?= base_url('manifes/search_by_no_manifest') ?>" method="POST" class="lockscreen-credentials">

                <div class="input-group">
                    <input type="number" id="nomor_manifes" name="nomor_manifes" class="form-control" placeholder="" required autocomplete="off">

                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div align="center">
            <!-- <a href="<?=base_url('data')?>">Data</a> -->
            <br>
            <a class="btn btn-danger btn-sm" href="<?=base_url('auth/logout')?>">Log Out</a>
        </div>
    </div>
    <!-- /.center -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#nomor_manifes').focus();
        });
        $(document).on('submit', '#form_manifest', function() {
            $('#loading').css('display', 'block')
            $('#wadah_lockscreen').css('display', 'none');
            // $('body').attr('id', 'loading');
        })
        $(document).on('keyup', '#nomor_manifes', function() {
            if ($(this).val().length == 9) {
                $('#form_manifest').submit();
            }
        })
    </script>
</body>

</html>