<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <h3>Detail SJ</h3>
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
                                    <th>Manifes</th>
                                    <th>SJ</th>
                                    <th>Ship To</th>
                                    <th>Item Name</th>
                                    <th>Qty (crt)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($item->result() as $data) { ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$data->manifes?></td>
                                        <td><?=$data->sj?></td>
                                        <td><?=$data->ship_to?></td>
                                        <td><?=$data->item_name?></td>
                                        <td><?=$data->qty_crt?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#example1x').DataTable();
    })
</script>