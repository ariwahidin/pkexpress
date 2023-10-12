<?php if ($manifes->num_rows() > 0) { ?>
    <?php $no = 1;
    foreach ($manifes->result() as $data) { ?>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <div class="info-box-content">
                    <table>
                        <tr>
                            <td>No Manifes</td>
                            <td>:</td>
                            <td><a onclick="loading()" href="<?= base_url('manifes/manifes_data/' . $data->manifes) ?>"><?= $data->manifes ?></a> </td>
                        </tr>
                        <tr>
                            <td>Driver</td>
                            <td>:</td>
                            <td><?= $data->driver ?></td>
                        </tr>
                        <tr>
                            <td>Ship Date</td>
                            <td>:</td>
                            <td><?= date('d-m-Y', strtotime($data->ship_date)) ?></td>
                        </tr>
                        <tr>
                            <td>Total SJ</td>
                            <td>:</td>
                            <td><?= $data->total_sj?></td>
                        </tr>
                        <tr>
                            <td>Total Titik</td>
                            <td>:</td>
                            <td><?= $data->total_titik?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } else { ?>
    
    <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <div class="info-box-content">
                Tidak Ada Data Manifest untuk user <?= $_SESSION['username']?> hari ini
            </div>
        </div>
<?php } ?>