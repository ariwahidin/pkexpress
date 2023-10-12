<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-6">
                <h4>Maintenace</h4>
            </div>
            <div class="col col-md-6" align="right">
                <a href="<?= base_url('maintenance/form_request') ?>" onclick="loading()" type="button" id="btn_kirim" class="btn btn-success">Form Maintenance</a>
            </div>
        </div>
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input class="form-control" id="search" type="text" placeholder="Search Plat Nomor" aria-label="Search">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" id="form_container">
                    <?php $this->load->view('maintenance/data_ajax') ?>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).on('keyup', '#search', function() {
        var plat_nomor = $(this).val();
        $('#form_container').load('<?= base_url('maintenance/get_form_maintenance_by_plat_nomor') ?>', {
            plat_nomor
        })
    })
</script>