<?php defined('BASEPATH') or exit('No direct script access allowed');

class manifes_m extends CI_Model
{

    public function get_manifes($post)
    {
        $no_manifes = $post['nomor_manifes'];
        $sql = "exec [pk_get_status_manifest] '$no_manifes'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_manifes_by_username(){
        $username = $this->session->userdata('username');
        $sql = "exec [pk_get_manifest_by_username] '$username'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_manifes_by_no_manifest($post){
        $no_manifes = $post['nomor_manifes'];
        $sql = "exec [dbo].[get_manifes_by_no_manifest] '$no_manifes' ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_sj_item($sj, $manifes)
    {
        $sql = "exec [dbo].[pk_sj_item] '$manifes','$sj'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function search_sj($manifes, $sj)
    {
        $sql = "exec [dbo].[pk_sj_search] '$manifes' , '$sj'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_manifes_by_sj($sj){
        $sql = "exec [dbo].[pk_get_manifest_by_sj] '$sj'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_no_manifes($sj){
        $sql = "exec [dbo].[pk_get_manifest_by_sj] '$sj'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function simpan_status_selesai($post){
        $params = array(
            'no_manifes' => $post['manifes'],
            'sj' => $post['sj'],
            'status' => $post['status'],
            'reason' => $post['reason'],
            'penerima' => $post['penerima'],
            'foto_bukti' => $post['foto_gr'],
            'img_signature' => $post['img_signature'],
            'keterangan' => $post['keterangan'],
            'created_by' => $this->session->userdata('username')
        );
        // var_dump($params);
        $this->db->insert('me_manifest', $params);
    }

    public function get_status(){
        $sql = "select * from master_status";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_reason(){
        $sql = "select * from master_reason";
        $query = $this->db->query($sql);
        return $query;
    }
}
