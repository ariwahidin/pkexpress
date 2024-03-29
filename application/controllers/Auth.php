<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
    }

    public function index($params = null)
    {
        check_already_login();
        if ($params != null) {
            $data = array(
                'messages' => $params
            );
            $this->load->view('auth', $data);
        } else {
            $this->load->view('auth/auth');
        }
    }

    public function process()
    {
        date_default_timezone_set('Asia/Jakarta');
        $post = $_POST;
        $login = $this->user_m->get_user($post);
        $jam_operasional = '09:00';
        if (date('H:i') < $jam_operasional) {
            $data['jam_operasional'] = 'Sistem dapat diakses mulai jam '.$jam_operasional;
            $this->load->view('auth/auth', $data);
            return false;
        } else {
            if ($login->num_rows() > 0) {
                $params = array(
                    'username' => $login->row()->username,
                    'dept' => $login->row()->dept
                );
                $this->session->set_userdata($params);
                if ($login->row()->is_admin == 'y') {
                    redirect(base_url('data'));
                } else {
                    redirect(base_url('manifes/manifes_list'));
                }
            } else {
                $data = array(
                    'success' => false
                );
                $this->load->view('auth/auth', $data);
            }
        }
    }

    public function logout()
    {
        $params = array('username', 'dept');
        $this->session->unset_userdata($params);
        redirect(base_url('auth'));
    }
}
