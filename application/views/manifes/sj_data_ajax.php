<?php if ($manifes->num_rows() > 0) { ?>
    <?php $no = 1; foreach ($manifes->result() as $data) { ?>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <div class="info-box-content">
                    <table>
                        <tr>
                            <td>No : <?= $no++ ?></td>
                        </tr>
                        <tr>
                            <td>SJ : <?= $data->sj ?></td>
                        </tr>
                        <tr>
                            <td>To : <?= $data->cardname ?></td>
                        </tr>
                        <tr>
                            <td>Status : <?=ucfirst($data->gr_status_me)?></td>
                        </tr>
                    </table>
                    <a onclick="loading()" href="<?= base_url('manifes/sj/') . $data->sj . '/' . $data->manifes ?>" class="info-box-footer" align="right">
                        Lihat <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } else { ?>
    Tidak Ada Data
<?php } ?>