<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        /** Load Helper */
        $this->load->helper(
            array('system/uri_helper', 
                  'system/title_helper', 
                  'system/page_helper', 
                  'system/gravatar_helper',
                  'system/security_helper',
                  'system/active_link_helper')
        );

        redirectLogin();

        /** Get Data URL */
        $this->url1 = $this->uri->segment(1);
        $this->url2 = $this->uri->segment(2);
        $this->url3 = $this->uri->segment(3);
        $this->url4 = $this->uri->segment(4);
        $this->url5 = $this->uri->segment(5);

        /** Get Data User */
        $this->user = $user['user'] = $this->ion_auth->user()->row();
        $this->id_user = $user['user']->id;
        $this->username = $user['user']->username;
        $this->full_name = $user['user']->full_name;

        /** Get Data Group */
        $this->users_groups = $this->ion_auth->get_users_groups()->result();
        
        /** Load Model */
        $this->load->model('main_dashboard/m_main_dashboard');
    }

    public function index()
    {
        redirectDashboard();
    }

    public function dashboard()
    {
        $data = array(
            'title' => myTitle($this->url1, $this->url2),
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'user_data' => $this->user,
        );

        renPa('main_dashboard/content/contents', 'main_dashboard/component/pages/pages-content/content', $data);
    }
}
