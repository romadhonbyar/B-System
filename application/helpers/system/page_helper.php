<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function renPa($view, $data = null, $render = false)
{
    $ci = &get_instance();
    $ci->viewdata = empty($data) ? $data : $data;
    $view_html = $ci->template->load($view, $ci->viewdata, $render);
    if ($render) {
        return $view_html;
    }
}
