<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('maintenance_m');
        check_not_login();
    }

    function index()
    {
        $data = array(
            'form' => $this->maintenance_m->get_form_maintenance()
        );
        $this->template->load('template', 'maintenance/maintenance_data', $data);
    }

    function get_form_maintenance_by_plat_nomor(){
        $plat_nomor = $_POST['plat_nomor'];
        $form = $this->maintenance_m->get_form_maintenance_by_plat_nomor($plat_nomor);
        $data = array(
            'form' => $form
        );
        $this->load->view('maintenance/data_ajax', $data);
    }

    function detail($id)
    {
        $data = array(
            'column' => $this->maintenance_m->get_form_maintenance($id)
        );
        $this->template->load('template', 'maintenance/maintenance_data_detail', $data);
    }

    function form_request()
    {
        $data = array(
            'plat_nomor' => $this->maintenance_m->get_plate_number(),
            'status_stnk' => $this->maintenance_m->get_status_stnk(),
            'status_kir' => $this->maintenance_m->get_status_kir(),
            'status_buku_service' => $this->maintenance_m->get_status_buku_service(),
            'status_rem_tangan' => $this->maintenance_m->get_status_rem_tangan(),
            'status_rem_kaki' => $this->maintenance_m->get_status_rem_kaki(),
            'status_klakson' => $this->maintenance_m->get_status_klakson(),
            'status_fungsi' => $this->maintenance_m->get_status_fungsi(),
            'status_ada' => $this->maintenance_m->get_status_ada(),
            'status_baik' => $this->maintenance_m->get_status_baik(),
            'status_cukup' => $this->maintenance_m->get_status_cukup(),
            'status_apar' => $this->maintenance_m->get_status_apar(),
            'status_box' => $this->maintenance_m->get_status_box(),
            'jenis_kendaraan' => $this->maintenance_m->get_jenis_kendaraan(),
            'status_kebersihan' => $this->maintenance_m->get_status_kebersihan(),
            'status_pendingin' => $this->maintenance_m->get_status_pendingin()
        );
        $this->template->load('template', 'maintenance/form_request', $data);
    }

    function proses()
    {
        if ($this->input->post()) {
            $post = $this->input->post();
            $post['created_by'] = $this->session->userdata('username');
            // var_dump($post);
            $this->maintenance_m->simpan_form($post);

            if ($this->db->affected_rows() > 0) {
                redirect('maintenance');
            } else {
                redirect('maintenance/form_request');
            }
        }
    }
}
