
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <h3>Data Manifes</h3>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1x" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Dept</th>
                                    <th>Manifes</th>
                                    <th>SJ</th>
                                    <th>PO Customer</th>
                                    <th>Ship date</th>
                                    <th>Cardname</th>
                                    <th>Driver</th>
                                    <th>Status</th>
                                    <th>Reason</th>
                                    <th>Detail</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($manifes as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->dept ?></td>
                                        <td><?= $data->manifes ?></td>
                                        <td><a href="<?= base_url('data/sj_item/') . $data->sj.'/'.$data->manifes ?>"><?= $data->sj ?></a></td>
                                        <td><?= $data->po_customer ?></td>
                                        <td width="10%"><?= date('d-m-Y', strtotime($data->ship_date)) ?></td>
                                        <td><?= $data->cardname ?></td>
                                        <td><?= $data->driver ?></td>
                                        <td><?= $data->gr_status_me ?></td>
                                        <td><?= $data->reason ?></td>
                                        <td>
                                            <?php if ($data->gr_status_me != '') { ?>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data->sj ?>">
                                                    Lihat
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?= $data->sj ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail Penerima</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col col-md-6">
                                                                            <label for="recipient-name" class="col-form-label">Penerima:</label>
                                                                            <input type="text" class="form-control" id="recipient-name" value="<?= $data->penerima ?>" readonly>
                                                                        </div>
                                                                        <div class="col col-md-6">
                                                                            <label for="recipient-name" class="col-form-label">Created:</label>
                                                                            <input type="text" class="form-control" id="recipient-name" value="<?= date('d-m-Y H:i:s', strtotime($data->created)) ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col col-md-12">
                                                                            <label for="recipient-name" class="col-form-label">Ttd:</label><br>
                                                                            <img src="<?= base_url('uploads/signature/' . $data->img_signature) ?>" alt="..." class="img-fluid img-thumbnail" style="max-width: 100%;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($data->gr_status_me != '') { ?>
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#img<?= $data->sj ?>">
                                                    Lihat
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="img<?= $data->sj ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Foto</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col col-md-12">
                                                                            <img src="<?= base_url('uploads/foto_gr/' . $data->foto_bukti) ?>" alt="..." class="img-fluid img-thumbnail" style="max-width: 100%;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('#example1x').DataTable();
    })
</script>