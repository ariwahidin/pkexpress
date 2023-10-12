<?php defined('BASEPATH') or exit('No direct script access allowed');

class maintenance_m extends CI_Model
{
    function get_plate_number(){
        $sql = "select distinct plate_number from master_vehicle";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_stnk(){
        $sql = "select status from master_status_stnk";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_kir(){
        $sql = "select status from master_status_kir";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_buku_service(){
        $sql = "select status from master_status_buku_service";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_rem_tangan(){
        $sql = "select status from master_status_rem_tangan";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_rem_kaki(){
        $sql = "select status from master_status_rem_kaki";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_klakson(){
        $sql = "select status from master_status_klakson";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_fungsi(){
        $sql = "select status from master_status_fungsi";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_ada(){
        $sql = "select status from master_status_ada";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_baik(){
        $sql = "select status from master_status_baik";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_cukup(){
        $sql = "select status from master_status_cukup";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_apar(){
        $sql = "select status from master_status_apar";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_box(){
        $sql = "select status from master_status_box";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_jenis_kendaraan(){
        $sql = "select jenis_kendaraan from master_jenis_kendaraan";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_kebersihan(){
        $sql = "select status from master_status_kebersihan";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_status_pendingin(){
        $sql = "select status from master_status_pendingin";
        $query = $this->db->query($sql);
        return $query;
    }

    function simpan_form($params){
        $query = $this->db->insert('app_form_maintenance', $params);
        var_dump($this->db->error());
    }

    function get_form_maintenance($id = null){
        $sql = "select * from app_form_maintenance";
        if($id != null){
            $sql .= " where id = '$id'";
        }
        $sql .= " order by id desc";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_form_maintenance_by_plat_nomor($plat_nomor = null){
        $sql = "select * from app_form_maintenance";
        if($plat_nomor != null && $plat_nomor != ""){
            $sql .= " where plat_number like '%$plat_nomor%'";
        }
        $query = $this->db->query($sql);
        return $query;
    }
}