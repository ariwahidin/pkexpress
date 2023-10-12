<?php if ($form->num_rows() > 0) { ?>
    <?php $no = 1;
    foreach ($form->result() as $data) { ?>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <div class="info-box-content">
                    <table>
                        <tr>
                            <td>Plat Nomor</td>
                            <td>:</td>
                            <td>
                                <a onclick="loading()" href="<?= base_url('maintenance/detail/' . $data->id) ?>"><?= $data->plat_number ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Driver</td>
                            <td>:</td>
                            <td><?= $data->driver_name ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?= $data->tanggal ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>