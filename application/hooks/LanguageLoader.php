<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        //$ci->load->helper('language');

        $site_lang = $ci->session->userdata('site_lang');
        if ($site_lang) {
            $ci->lang->load('auth',$ci->session->userdata('site_lang'));
            $ci->lang->load('ion_auth',$ci->session->userdata('site_lang'));
            $ci->lang->load('ion_auth_acl',$ci->session->userdata('site_lang'));
        } else {
            $ci->lang->load('auth', $ci->config->item('language'));
            $ci->lang->load('ion_auth', $ci->config->item('language'));
            $ci->lang->load('ion_auth_acl', $ci->config->item('language'));
        }
    }
}