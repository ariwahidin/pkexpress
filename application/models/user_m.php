<?php defined('BASEPATH') or exit('No direct script access allowed');

class user_m extends CI_Model
{
    public function get_user($post = null)
    {
        $params =  array(
            'username' => $post['username'],
            'password' => $post['password']
        );
        $query = $query = $this->db->get_where('master_user', $params);
        return $query;
    }
}
