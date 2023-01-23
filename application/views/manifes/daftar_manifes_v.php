<?php
// var_dump($manifes->result());
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <h3>Daftar Manifes Hari Ini</h3>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input class="form-control" id="search_sj" type="number" placeholder="Search manifes" aria-label="Search">
                </div>
            </div>
        </div>
        <br> -->
        <div class="row" id="manifest_container">
            <?php $this->load->view('manifes/daftar_manifest_ajax') ?>
        </div>
    </div>
</section>