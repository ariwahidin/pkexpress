<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('data_m');
    }

    public function index()
    {
        $manifes = $this->data_m->get_manifes();
        $data = array(
            'manifes' => $manifes,
        );
        $this->template->load('template', 'data/pengiriman_v', $data);
    }

    public function sj_item($sj,$manifes){
        $sql = "exec [dbo].[pk_sj_item] '$manifes','$sj'";
        $query = $this->db->query($sql);
        $data = array(
            'item' => $query,
        );
        $this->template->load('template', 'data/detail_sj_v', $data);
    }
}
