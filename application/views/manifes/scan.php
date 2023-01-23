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
    <div class="lockscreen-wrapper">
        <!-- <div class="lockscreen-logo">
            <img src="<?= base_url('assets/admin_lte/') ?>dist/img/pandurasa_kharisma_pt.png" alt="PK Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
        </div> -->
        <!-- <div class="lockscreen-logo">
            <a href=""><b>My</b>Express</a>
        </div> -->
        <!-- User name -->
        <div class="lockscreen-name">Scan QR Code Atau Upload Foto QR Code Manifest</div>
        <?php if (isset($_GET['nomor_manifes'])) { ?>
            <div class="lockscreen-name"><span class="badge badge-danger">Nomor Manifes <?= $_GET['nomor_manifes'] ?> Tidak Terdaftar</span></div>
        <?php } ?>
        <!-- START LOCK SCREEN ITEM -->
        <div id="qr-reader" class="box"></div>
        <br>
        <div class="lockscreen-item">
            <!-- lockscreen credentials (contains the form) -->
            <form id="form_manifes" action="<?= base_url('manifes/manifes_data') ?>" method="POST" class="lockscreen-credentials">
                <div class="input-group">
                    <input type="number" id="nomor_manifes" name="nomor_manifes" class="form-control" placeholder="" required>

                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->
        </div>
        <div align="center">
            <button class="btn btn-warning" onclick="window.location.href='<?=base_url('manifes')?>'">Kembali</button>
        </div>
        <!-- <div class="lockscreen-footer text-center">
            Copyright &copy; 2022-2023 <b><a href="" class="text-black">PK IT</a></b>
        </div> -->
    </div>
    <!-- /.center -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>scan/scan_barcode_lib.js"></script>
    <script>
        function masuk() {
            // console.log($('#nomor_manifes').val().length)
            if ($('#nomor_manifes').val().length == 9) {
                // alert('teng')
                $('#form_manifes').submit();
            }

        }
    </script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code scanned = ${decodedText}`, decodedResult);
            $('#nomor_manifes').val(`${decodedText}`)
            masuk()
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 200
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>


</body>

</html>