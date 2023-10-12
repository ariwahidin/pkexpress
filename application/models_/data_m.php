<?php defined('BASEPATH') or exit('No direct script access allowed');

class data_m extends CI_Model
{

    public function get_manifes()
    {
        if ($this->session->userdata('dept') == 'rt') {
            $sql = "exec [dbo].[pk_rt_get_manifest]";
        } else if ($this->session->userdata('dept') == 'fs') {
            $sql = "exec [dbo].[pk_fs_get_manifest]";
        } else {
            $sql = "exec [dbo].[pk_admin_get_manifest]";
        }
        $query = $this->db->query($sql);
        return $query;
    }
}
