<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function myTitle($uri2, $uri3)
{
    $ci = &get_instance();
    $output =
        ucwords(str_replace('_', ' ', $uri2)) .
        ' ' .
        $uri3 .
        ' | ' .
        $ci->config->item('site_title', 'ion_auth') .
        ' - ' .
        $ci->config->item('site_title_slogan', 'ion_auth');
    return $output;
}
