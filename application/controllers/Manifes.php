<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manifes extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('manifes_m');
        check_not_login();
    }

    public function  index($get = null)
    {
        $this->manifes_list();
    }

    public function manifes_list()
    {
        $manifes = $this->manifes_m->get_manifes_by_username();
        $data = array(
            'manifes' => $manifes
        );

        $username = $this->session->userdata('username');
        $sql = "select is_admin from master_user where username = '$username'";
        $cek_is_admin = $this->db->query($sql);

        if ($cek_is_admin->row()->is_admin == 'y') {
            redirect('data');
        } else {
            $this->template->load('template', 'manifes/daftar_manifes_v', $data);
        }
    }


    public function search_by_no_manifest()
    {
        $post = $_POST;
        $get_manifest = $this->manifes_m->get_manifes_by_no_manifest($post);
        if ($get_manifest->num_rows() > 0) {
            $this->manifes_data($get_manifest->row()->manifes);
        } else {
            $this->manifes_data($post['nomor_manifes']);
        }
    }

    public function manifes_data($no_manifest = null)
    {
        $post = $_POST;

        if ($no_manifest != null) {
            $post['nomor_manifes'] = $no_manifest;
        }

        if (strlen($post['nomor_manifes']) > 9) {
            redirect(base_url('manifes/index'));
            return false;
        }

        $get_manifes = $this->manifes_m->get_manifes($post);

        if ($get_manifes->num_rows() > 0) {
            $data = array(
                'manifes' => $get_manifes
            );
            $this->template->load('template', 'manifes/manifes_data', $data);
        } else {
            $_GET['nomor_manifes'] = $post['nomor_manifes'];
            redirect(base_url('manifes/index') . '/' . $_GET['nomor_manifes']);
        }
    }

    public function sj($sj, $manifes)
    {
        // session_not_same($manifes);
        $item = $this->manifes_m->get_sj_item($sj, $manifes);
        $data = array(
            'item' => $item,
        );
        $this->template->load('template', 'surat_jalan/sj_data.php', $data);
    }

    public function get_sj($params)
    {
        $temp1 = explode(',', $params);
        $sj = $temp1[0];
        $manifes = $this->manifes_m->get_no_manifes($sj);
        if ($manifes->num_rows() > 0) {
            redirect(base_url('manifes/sj/') . $sj . '/' . $manifes->row()->manifes);
        }
    }


    public function get_search_sj()
    {
        $item = $this->manifes_m->search_sj($_POST['manifes'], $_POST['sj']);

        $data = array(
            'manifes' => $item,
        );

        $this->load->view('manifes/sj_data_ajax', $data);
    }


    public function selesaikan_sj()
    {;
        $sj = $this->manifes_m->get_manifes_by_sj($_POST['sj']);
        $status = $this->manifes_m->get_status();
        $reason = $this->manifes_m->get_reason();
        $data = array(
            'sj' => $sj,
            'status' => $status,
            'reason' => $reason
        );
        $this->template->load('template', 'surat_jalan/form_selesaikan_sj.php', $data);
    }

    public function proccess()
    {
        // var_dump($_POST);
        // var_dump($_FILES);
        // var_dump($_FILES["foto_gr_compressed"]["tmp_name"]);
        // die;
        $target_dir = APPPATH . '../uploads/foto_gr/';
        $target_dir_signature = APPPATH . '../uploads/signature/';
        $file_name = $_POST['manifes'] . '_' . $_POST['sj'] . '.jpg';
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $_POST['foto_gr'] = $file_name;

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto_gr_compressed"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            return false;
        }

        // Check file size
        if ($_FILES["foto_gr_compressed"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            return false;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            return false;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return false;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto_gr_compressed"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["foto_gr_compressed"]["name"])) . " has been uploaded.";
                $sig_string = $_POST['signature'];
                $nama_file = "signature_" . $_POST['manifes'] . '_' .  $_POST['sj'] . ".png";
                $_POST['img_signature'] = $nama_file;
                file_put_contents('uploads/signature/' . $nama_file, file_get_contents($sig_string));
                $this->manifes_m->simpan_status_selesai($_POST);
                // $_POST;
                // die;
            } else {
                echo "Sorry, there was an error uploading your file.";
                return false;
            }
        }

        if ($this->db->affected_rows() > 0) {
            // redirect(base_url('manifes/manifes_data/') . $_POST['manifes']);
            $data = array(
                'direct' => base_url('manifes/sj/') . $_POST['sj'] . '/' . $_POST['manifes'],
            );
            $this->template->load('template', 'alert/alert_success', $data);
        } else {
            echo "<csript>alert('Gagal Simpan Data')</script>";
            redirect(base_url('manifes/sj/') . $_POST['sj'] . '/' . $_POST['manifes']);
        }
    }

    public function laporan()
    {
        $this->template->load('template', 'manifes/laporan');
    }
}
