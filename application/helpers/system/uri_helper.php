<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function redirectDashboard()
{
    redirect('dashboard', 'refresh');
}

function redirectAdmin()
{
    $ci = &get_instance();
    if (!$ci->ion_auth->is_admin()) {
        redirect('dashboard', 'refresh');
    }
}

function redirectLogin()
{
    $ci = &get_instance();
    if (!$ci->ion_auth->logged_in()) {
        redirect('/login');
    }
}
