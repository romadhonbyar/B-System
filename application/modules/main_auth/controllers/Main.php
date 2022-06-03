<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        /** Load Helper */
        $this->load->helper(
            array('system/uri_helper', 
                  'system/title_helper', 
                  'system/page_helper')
        );

        /** Get Data URL */
        $this->url1 = $this->uri->rsegment(1);
        $this->url2 = $this->uri->rsegment(2);
        $this->url3 = $this->uri->rsegment(3);
        $this->url4 = $this->uri->rsegment(4);
        $this->url5 = $this->uri->rsegment(5);
        
        /** Load Model */
    }

    public function index()
    {
        redirectLogin();
    }

    public function login()
    {
        if ($this->ion_auth->logged_in()) {
            redirectDashboard();
        }

        $data = [
            'title' => myTitle($this->url2, $this->url3),
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
        ];

        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $referred_from = $this->session->userdata('referred_from');
                if ($referred_from == true) {
                    redirect($referred_from, 'refresh');
                } else {
                    redirectDashboard();
                }
            } else {
                $this->session->set_flashdata('message', validation_errors() ? validation_errors() : $this->ion_auth->errors());
                redirectLogin();
            }
        } else {
            $data['message'] = validation_errors() ? validation_errors() : $this->session->flashdata('message');

            $data['identity'] = [
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('identity'),
                'placeholder' => lang('login_identity_label'),
                'required' => 'required',
                'autocomplete' => 'nope',
                'autocorrect' => 'off',
                'autocapitalize' => 'off',
                'spellcheck' => 'false',
                'pattern' => '[ \S]+',
            ];

            $data['password'] = [
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => lang('login_password_label'),
                'required' => 'required',
            ];

            renPa('main_auth/content/contents', 'main_auth/component/pages/pages-content/content', $data);
        }
    }

    public function logout()
    {
        if ($this->ion_auth->logout()) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirectLogin();
        } else {
            die(lang('logout_failed'));
        }
    }
}
