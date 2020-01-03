<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class su_copanel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        if (!$this->ion_auth->logged_in()) {
            redirect('/login');
        }

        $this->url1 = $this->uri->segment(1);
        $this->url2 = $this->uri->segment(2);
        $this->url3 = $this->uri->segment(3);
        $this->url4 = $this->uri->segment(4);
        $this->url5 = $this->uri->segment(5);

        $this->user = $user['user'] = $this->ion_auth->user()->row();
        $this->id_user = $user['user']->id;
        $this->username = $user['user']->username;
        $this->full_name = $user['user']->full_name;

        $this->users_groups = $this->ion_auth->get_users_groups()->result();
    }

    public function index()
    {
        redirect('dashboard');
    }

    public function language($language = "", $current = false)
    {
        $language = ($language != "") ? $language : $this->config->item('language', 'config');
        $this->session->set_userdata('site_lang', $language);
        $url = decodeID($current); //decode uri_string ($current)
        redirect($url);
    }

    public function dashboard()
    {
        $data = array(
            'title' => lang('dashboard_title'),
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );
        renpa('su_copanel/content/contents', 'su_copanel/component/pages/pages-content/content', $data);
    }
}
