<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table clas="table">
                    <tr>
                        <td>SJ</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $item->row()->sj ?></td>
                    </tr>
                    <tr>
                        <td>Ship Date</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= date('d-m-Y', strtotime($item->row()->ship_date)) ?></td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $item->row()->cardname ?></td>
                    </tr>
                    <tr>
                        <td>Driver</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $item->row()->driver ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($item->result() as $data) { ?>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <div class="info-box-content">
                            <table>
                                <tr>
                                    <td colspan="3"><?= $data->item_name ?></td>
                                </tr>
                                <tr>
                                    <td><?= $data->qty ?> pcs</td>
                                    <td></td>
                                    <td><?= (float)$data->qty_crt < 1 ? '' : (float)$data->qty_crt. ' crt'  ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12" align="right">
                <?php if ($item->row()->gr_status_me == '') { ?>
                    <form action="<?= base_url('manifes/selesaikan_sj') ?>" method="POST">
                        <input type="hidden" name="sj" value="<?= $item->row()->sj ?>">
                        <button onclick="loading()" type="submit" class="btn btn-block btn-primary btn-sm">Selesaikan</button>
                        <br>
                    </form>
                <?php } else { ?>
                    <button type="button" class="btn btn-block btn-success btn-sm"><?= ucfirst($item->row()->gr_status_me) ?></button>
                <?php } ?>
                <a onclick="loading()" href="<?= base_url('manifes/manifes_data/' . $item->row()->manifes) ?>" class="btn btn-block btn-warning btn-sm">Back</a>
            </div>
        </div>
    </div>
</section>