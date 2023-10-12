<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-6">
                <h4>Form Request Maintenance Kendaraan</h4>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div> -->
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?=base_url('maintenance/proses')?>" method="POST" enctype="multipart/form-data" id="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tanggal*</label>
                                <input type="date" name="tanggal" id="tanggal" value="<?=date('Y-m-d')?>" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Driver*</label>
                                <input type="text" name="driver_name" id="driver_name" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">No. Plat Kendaraan*</label>
                                <select class="form-control" name="plat_number" id="plat_number" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($plat_nomor->result() as $pn){?>
                                        <option value="<?=$pn->plate_number?>"><?=$pn->plate_number?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kendaraan / Merk dan Type*</label>
                                <select class="form-control" name="jenis_kendaraan" id="jenis_kendaraan" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($jenis_kendaraan->result() as $jk){?>
                                        <option value="<?=$jk->jenis_kendaraan?>"><?=$jk->jenis_kendaraan?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kilo Meter saat ini*</label>
                                <input type="number" name="kilometer" id="kilo_meter" class="form-control"autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">STNK*</label>
                                <select class="form-control" name="status_stnk" id="status_stnk" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_stnk->result() as $ss){?>
                                        <option value="<?=$ss->status?>"><?=$ss->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">KIR*</label>
                                <select class="form-control" name="status_kir" id="status_kir" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_kir->result() as $sk){?>
                                        <option value="<?=$sk->status?>"><?=$sk->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Buku Service*</label>
                                <select class="form-control" name="status_buku_service" id="status_buku service" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_buku_service->result() as $sbs){?>
                                        <option value="<?=$sbs->status?>"><?=$sbs->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Rem Tangan*</label>
                                <select class="form-control" name="status_rem_tangan" id="status_rem_tangan" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_rem_tangan->result() as $srt){?>
                                        <option value="<?=$srt->status?>"><?=$srt->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Rem Kaki*</label>
                                <select class="form-control" name="status_rem_kaki" id="status_rem_kaki" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_rem_kaki->result() as $srk){?>
                                        <option value="<?=$srk->status?>"><?=$srk->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Klakson*</label>
                                <select class="form-control" name="status_klakson" id="status_klakson" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_klakson->result() as $skl){?>
                                        <option value="<?=$skl->status?>"><?=$skl->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Spedometer*</label>
                                <select class="form-control" name="status_spedometer" id="status_spedometer" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_baik->result() as $sab){?>
                                        <option value="<?=$sab->status?>"><?=$sab->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kursi/Jok*</label>
                                <select class="form-control" name="status_kursi" id="status_kursi" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_baik->result() as $sab){?>
                                        <option value="<?=$sab->status?>"><?=$sab->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sabuk Pengaman*</label>
                                <select class="form-control" name="status_sabuk_pengaman" id="status_sabuk_pengaman" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_baik->result() as $sab){?>
                                        <option value="<?=$sab->status?>"><?=$sab->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kotak P3K*</label>
                                <select class="form-control" name="status_p3k" id="status_p3k" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_ada->result() as $sad){?>
                                        <option value="<?=$sad->status?>"><?=$sad->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kunci Roda*</label>
                                <select class="form-control" name="status_kunci_roda" id="status_kunci_roda" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_ada->result() as $sad){?>
                                        <option value="<?=$sad->status?>"><?=$sad->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Alat Pemadam Kebakaran*</label>
                                <select class="form-control" name="status_apar" id="status_apar" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_apar->result() as $sap){?>
                                        <option value="<?=$sap->status?>"><?=$sap->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Segitiga Pengaman*</label>
                                <select class="form-control" name="status_segitiga_pengaman" id="status_segitiga_pengaman" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_ada->result() as $sad){?>
                                        <option value="<?=$sad->status?>"><?=$sad->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Radio / Tape / Cassete/ CD Player*</label>
                                <select class="form-control" name="status_radio" id="status_radio" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_ada->result() as $sad){?>
                                        <option value="<?=$sad->status?>"><?=$sad->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">AC Mobil*</label>
                                <select class="form-control" name="status_ac_mobil" id="status_ac_mobil" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_fungsi->result() as $sf){?>
                                        <option value="<?=$sf->status?>"><?=$sf->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Air Radiator*</label>
                                <select class="form-control" name="status_air_radiator" id="status_air_radiator" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_cukup->result() as $sck){?>
                                        <option value="<?=$sck->status?>"><?=$sck->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Air Wiper*</label>
                                <select class="form-control" name="status_air_wiper" id="status_air_wiper" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_cukup->result() as $sck){?>
                                        <option value="<?=$sck->status?>"><?=$sck->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Minyak Rem*</label>
                                <select class="form-control" name="status_minyak_rem" id="status_minyak_rem" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_cukup->result() as $sck){?>
                                        <option value="<?=$sck->status?>"><?=$sck->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Oli Mesin*</label>
                                <select class="form-control" name="status_oli_mesin" id="status_oli_mesin" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_cukup->result() as $sck){?>
                                        <option value="<?=$sck->status?>"><?=$sck->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lampu Depan Kanan/Kiri dan Lampu Dim*</label>
                                <select class="form-control" name="status_lampu_depan" id="status_lampu_depan" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_fungsi->result() as $sf){?>
                                        <option value="<?=$sf->status?>"><?=$sf->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lampu Sein Depan Kanan/Kiri*</label>
                                <select class="form-control" name="status_sein_depan" id="status_sein_depan" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_fungsi->result() as $sf){?>
                                        <option value="<?=$sf->status?>"><?=$sf->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lampu Sein Belakang Kanan Kiri*</label>
                                <select class="form-control" name="status_sein_belakang" id="status_sein_belakang" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_fungsi->result() as $sf){?>
                                        <option value="<?=$sf->status?>"><?=$sf->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lampu Hazard*</label>
                                <select class="form-control" name="status_lampu_hazard" id="status_lampu_hazard" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_fungsi->result() as $sf){?>
                                        <option value="<?=$sf->status?>"><?=$sf->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lampu Kota*</label>
                                <select class="form-control" name="status_lampu_kota" id="status_lampu_kota" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_fungsi->result() as $sf){?>
                                        <option value="<?=$sf->status?>"><?=$sf->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lampu Mundur*</label>
                                <select class="form-control" name="status_lampu_mundur" id="status_lampu_mundur" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_fungsi->result() as $sf){?>
                                        <option value="<?=$sf->status?>"><?=$sf->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Alarm Mundur*</label>
                                <select class="form-control" name="status_alarm_mundur" id="status_alarm_mundur" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_fungsi->result() as $sf){?>
                                        <option value="<?=$sf->status?>"><?=$sf->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lampu Rem*</label>
                                <select class="form-control" name="status_lampu_rem" id="status_lampu_rem" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_fungsi->result() as $sf){?>
                                        <option value="<?=$sf->status?>"><?=$sf->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ban Depan Kanan/Kiri*</label>
                                <select class="form-control" name="status_ban_depan" id="status_ban_depan" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_baik->result() as $sab){?>
                                        <option value="<?=$sab->status?>"><?=$sab->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ban Belakang Kanan/Kiri*</label>
                                <select class="form-control" name="status_ban_belakang" id="status_ban_belakang" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_baik->result() as $sab){?>
                                        <option value="<?=$sab->status?>"><?=$sab->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pintu Depan Kanan/Kiri*</label>
                                <select class="form-control" name="status_pintu_depan" id="status_pintu_depan" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_baik->result() as $sab){?>
                                        <option value="<?=$sab->status?>"><?=$sab->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kondisi Box (Dinding, Atap, Belakang)*</label>
                                <select class="form-control" name="status_kondisi_box" id="status_kondisi_box" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_box->result() as $sbx){?>
                                        <option value="<?=$sbx->status?>"><?=$sbx->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Logo / Sticker Box*</label>
                                <select class="form-control" name="status_logo" id="status_logo" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_baik->result() as $sab){?>
                                        <option value="<?=$sab->status?>"><?=$sab->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ban Serep*</label>
                                <select class="form-control" name="status_ban_serep" id="status_ban_serep" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_ada->result() as $sad){?>
                                        <option value="<?=$sad->status?>"><?=$sad->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Trolley Barang*</label>
                                <select class="form-control" name="status_trolley_barang" id="status_trolley_barang" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_ada->result() as $sad){?>
                                        <option value="<?=$sad->status?>"><?=$sad->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kebersihan Unit*</label>
                                <select class="form-control" name="status_kebersihan_unit" id="status_kebersihan_unit" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_kebersihan->result() as $skb){?>
                                        <option value="<?=$skb->status?>"><?=$skb->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kondisi Pendingin*</label>
                                <select class="form-control" name="status_kondisi_pendingin" id="status_kondisi_pendingin" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach($status_pendingin->result() as $spn){?>
                                        <option value="<?=$spn->status?>"><?=$spn->status?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Komentar Driver*</label>
                                <input type="text" name="komentar_driver" class="form-control" id="komentar_driver" required autocomplete="off">
                            </div>
                            <div class="card-footer" align="right">
                                <a type="button" onclick="loading()" href="<?= base_url('maintenance') ?>" class="btn btn-warning">Kembali</a>
                                <button type="submit" id="btn_kirim" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<script>

</script>