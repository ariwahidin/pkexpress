<?php

function check_already_login()
{
    $ci = &get_instance();
    $session = $ci->session->userdata('username');
    if ($session) {
        redirect('manifes');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $session = $ci->session->userdata('username');
    if (!$session) {
        redirect('auth');
    }
}
