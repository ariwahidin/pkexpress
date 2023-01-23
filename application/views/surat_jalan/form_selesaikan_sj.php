<?php
// var_dump($sj->result());
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <table clas="table">
                    <tr>
                        <td>SJ</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $sj->row()->sj ?></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $sj->row()->ship_date ?></td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $sj->row()->cardname ?></td>
                    </tr>
                    <tr>
                        <td>Driver</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?= $sj->row()->driver ?></td>
                    </tr>
                </table>
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
                    <form action="<?= base_url('manifes/proccess') ?>" method="POST" enctype="multipart/form-data" id="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Penerima</label>
                                <input type="text" name="penerima" class="form-control" id="penerima" autocomplete="off" required>
                                <input type="hidden" name="manifes" class="form-control" id="" value="<?= $sj->row()->manifes ?>">
                                <input type="hidden" name="sj" class="form-control" id="" value="<?= $sj->row()->sj ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Foto</label>
                                <div class="custom-file">
                                    <input type="file" id="foto_gr" class="custom-file-input" accept="image/*;capture=camera" required>
                                    <input type="file" name="foto_gr_compressed" id="foto_gr_new" style="display:none" accept=".jpg, .jpeg, .png" required>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($status->result() as $st) { ?>
                                        <option value="<?= $st->id ?>"><?= $st->status ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Reason</label>
                                <select class="form-control" name="reason" id="reason">
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($reason->result() as $rs) { ?>
                                        <option value="<?= $rs->id ?>"><?= $rs->reason ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="penerima" autocomplete="off">
                            </div>
                            <div class="">
                                <label for="">Tanda Tangan</label>
                                <div class="">
                                    <div id="signature-pad">
                                        <div>
                                            <div id="note" onmouseover="my_function();">Tanda tangan harus ada di dalam kotak</div>
                                            <canvas id="the_canvas" width="auto" height="150px" style="background-color:aliceblue !important;"></canvas>
                                        </div>
                                        <div style=" margin-bottom:5px">
                                            <input type="hidden" id="signature" name="signature" required>
                                            <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                                            <!-- <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Save as PNG</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" align="right">
                                <button type="button" id="btn_kirim" class="btn btn-primary">Selesaikan SJ</button>
                                <a type="button" onclick="loading()" href="<?= base_url('manifes/sj/') . $sj->row()->sj . '/' . $sj->row()->manifes ?>" class="btn btn-warning">Back to SJ</a>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<!-- <script src="<?= base_url('assets/admin_lte/') ?>plugins/jquery/jquery.min.js"></script> -->
<script src="<?= base_url('assets/signature/') ?>signature.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });

    // $(document).on('submit', '#form', () => {
    //     // alert('submit')
    //     $("#pageloader").fadeIn();
    // })
</script>
<script>
    var wrapper = document.getElementById("signature-pad");
    var clearButton = wrapper.querySelector("[data-action=clear]");
    var savePNGButton = wrapper.querySelector("[data-action=save-png]");
    var canvas = wrapper.querySelector("canvas");
    var el_note = document.getElementById("note");
    var signaturePad;
    signaturePad = new SignaturePad(canvas);

    clearButton.addEventListener("click", function(event) {
        document.getElementById("note").innerHTML = "Tanda tangan harus ada di dalam kotak";
        document.getElementById("signature").value = '';
        signaturePad.clear();
    });

    var btn_submit = document.getElementById("btn_kirim");

    btn_submit.addEventListener("click", function(event) {
        if (signaturePad.isEmpty()) {
            // alert("Silahkan tanda tangan terlebih dahulu");
            Swal.fire({
                icon: 'error',
                title: 'Silahkan tanda tangan terlebih dahulu',
                showConfirmButton: false,
                timer: 1500
            })
            event.preventDefault();
        } else {

            var form = document.getElementById("form")
            var penerima = document.getElementById("penerima");
            var foto_gr = document.getElementById("foto_gr");
            var foto_gr_compressed = document.getElementById("foto_gr_new");
            var status = document.getElementById("status");
            var reason = document.getElementById("reason");
            if (penerima.value == '' || foto_gr.value == '' || status.value == '') {
                // alert("inputan tidak boleh kosong");
                Swal.fire({
                    icon: 'warning',
                    title: 'Inputan tidak boleh kosong',
                    showConfirmButton: false,
                    timer: 1500
                })
                return false;
            } else if (foto_gr_compressed.value == '') {
                // alert("Silahkan Upload Foto Ulang");
                Swal.fire({
                    icon: 'warning',
                    title: 'Silahkan Upload Foto Ulang',
                    showConfirmButton: false,
                    timer: 1500
                })
                return false;
            } else if (status.value == '4' && reason.value == '') {
                // alert("Silahkan Upload Foto Ulang");
                Swal.fire({
                    icon: 'warning',
                    title: 'Reason harus diisi',
                    showConfirmButton: false,
                    timer: 1500
                })
                return false;
            } else {
                var canvas = document.getElementById("the_canvas");
                var dataUrl = canvas.toDataURL();
                document.getElementById("signature").value = dataUrl;
                $("#pageloader").fadeIn();
                form.submit();
            }
        }
    });

    function my_function() {
        document.getElementById("note").innerHTML = "";

    }
</script>
<script>
    const WIDTH = 300
    let input = document.getElementById("foto_gr")
    input.addEventListener("change", (event) => {

        let image_file = event.target.files[0]
        console.log(image_file);

        let reader = new FileReader
        reader.readAsDataURL(image_file)

        reader.onload = (event) => {

            let image_url = event.target.result
            let image = document.createElement("img")
            image.src = image_url

            image.onload = (e) => {
                let canvas = document.createElement("canvas")
                let ratio = WIDTH / e.target.width
                canvas.width = WIDTH
                canvas.height = e.target.height * ratio
                const context = canvas.getContext("2d")
                context.drawImage(image, 0, 0, canvas.width, canvas.height)
                let new_image_url = context.canvas.toDataURL("image/jpeg", 90)
                let image_file = url_to_file(new_image_url)
            }

            let url_to_file = (url) => {
                let arr = url.split(",")
                let mime = arr[0].match(/:(.*?);/)[1]
                let data = arr[1]
                let dataStr = atob(data)
                let n = dataStr.length
                let dataArr = new Uint8Array(dataStr.length)

                while (n--) {
                    dataArr[n] = dataStr.charCodeAt(n)
                }

                let file = new File([dataArr], 'File.jpg', {
                    type: mime
                })

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                let foto_gr_compressed = document.getElementById("foto_gr_new")
                foto_gr_compressed.files = dataTransfer.files;
                console.log(foto_gr_compressed.files[0])
                // return file
            }
        }

        // let upload_image = (file) => {

        //     // upload to server
        //     const url = "<?= base_url('manifes/proccess') ?>"

        //     let payload = new FormData()
        //     payload.append('file', file)
        //     fetch(url, {
        //         method: 'POST',
        //         body: payload
        //     })

        // }
    })
</script>