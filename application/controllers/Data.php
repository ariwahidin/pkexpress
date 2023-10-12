<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['data_m', 'manifest_model']);
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }

    public function index()
    {
        // var_dump($this->session->userdata());
        // die;
        if (!$this->cache->get('data_manifest')) {
            // $cache = 'tidak ada cache';
            $query = $this->data_m->get_manifes();
            if ($query->num_rows() > 0) {
                $data_manifest = $query->result();
                $this->cache->save('data_manifest', $data_manifest, 300);
                // Save into the cache for 5 minutes
            } else {
                $data_manifest = 0;
            }
        } else {
            $data_manifest = $this->cache->get('data_manifest');
            // $cache = 'ada cache';
        }
        // var_dump($cache);
        $data = array(
            'manifes' => $data_manifest,
        );
        $this->template->load('template', 'data/pengiriman_v', $data);
    }

    public function sj_item($sj, $manifes)
    {
        $sql = "exec [dbo].[pk_sj_item] '$manifes','$sj'";
        $query = $this->db->query($sql);
        $data = array(
            'item' => $query,
        );
        $this->template->load('template', 'data/detail_sj_v', $data);
    }

    public function dataManifest()
    {
        $list = $this->manifest_model->get_datatables();
        // var_dump($this->db->last_query());
        // var_dump($list);
        // die;

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->dept;
            $row[] = $field->manifes;
            $row[] = $field->sj;
            $row[] = $field->po_customer;
            $row[] = $field->ship_date;
            $row[] = $field->cardname;
            $row[] = $field->driver;
            $row[] = $field->gr_status_me;
            $row[] = $field->reason;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->manifest_model->count_all(),
            "recordsFiltered" => $this->manifest_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
