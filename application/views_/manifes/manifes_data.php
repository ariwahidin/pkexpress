<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <h3>Daftar SJ </h3>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <span class="info-box-number">Manifes : <a onclick="loading()" href="<?=base_url('manifes/manifes_list')?>"><?= $manifes->row()->manifes ?></a></span>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><?= $manifes->row()->driver ?></li>
                    <li class="breadcrumb-item"><?= $manifes->row()->no_pol ?></li>
                    <li class="breadcrumb-item"><?= date('d-m-Y', strtotime($manifes->row()->ship_date)) ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input class="form-control" id="search_sj" type="number" placeholder="Search SJ" aria-label="Search">
                </div>
            </div>
        </div>
        <br>
        <div class="row" id="sj_container">
            <?php $this->load->view('manifes/sj_data_ajax') ?>
        </div>
    </div>
</section>
<script>
    $(document).on('keyup', '#search_sj', function() {
        var manifes = '<?= $manifes->row()->manifes ?>';
        var sj = $(this).val();
        $('#sj_container').load('<?= base_url('manifes/get_search_sj') ?>',{manifes,sj})
    })
</script>