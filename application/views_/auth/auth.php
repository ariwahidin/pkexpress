<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PK Express - by Pandurasa</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/admin_lte/') ?>dist/img/pandurasa_kharisma_pt.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/admin_lte/') ?>dist/css/adminlte.min.css">

    <style>
        #pageloader {
            background: rgb(54 48 48 / 80%);
            position: fixed;
            display: none;
            height: 120%;
            width: 100%;
            z-index: 9999999 !important;
            margin-top: -160px !important;
        }

        #pageloader img {
            left: 50%;
            margin-left: -32px;
            margin-top: -55px;
            position: absolute;
            top: 50%;
        }

        @media only screen and (max-width: 768px) {
            #pageloader img {
                left: 50%;
                position: absolute;
                top: 50%;
            }

            body {
                margin-top: 70px !important;
            }
        }
    </style>
</head>


<!-- Automatic element centering -->

<div id="pageloader">
    <img src="<?= base_url('assets/admin_lte/') ?>dist/img/loader-large.gif" alt="processing..." />
</div>

<body class="hold-transition lockscreen">
    <div class="lockscreen-wrapper" id="wadah_lockscreen">
        
        <div class="lockscreen-logo">
            <img src="<?= base_url('assets/admin_lte/') ?>dist/img/pandurasa_kharisma_pt.png" width="30%" alt="PK Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
            <!-- <a href=""><b>My</b>Express</a> -->
        </div>

        <div class="lockscreen" align="center">
            <?php if (!empty($_POST)) { ?>
                <span align="center" class="badge badge-danger">username / password salah</span>
            <?php } ?>
        </div>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-12 col-sm-12" style="padding:0 30px !important">
                    <form id="form_login" action="<?= base_url('auth/process') ?>" method="POST">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" id="username" name="username" class="form-control" style="text-transform:uppercase" autofocus required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group" align="right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="col col-md-1"></div> -->
            </div>
        </div>
    </div>
    <!-- /.center -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/admin_lte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    </script>
    <script>
        // loading();

        function loading() {
            $("#pageloader").fadeIn();
        }
        var form = document.getElementById("form_login");
        form.addEventListener('submit', loading)
    </script>
</body>

</html>