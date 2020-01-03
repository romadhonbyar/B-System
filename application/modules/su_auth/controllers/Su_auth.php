<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Auth.php
 *
 * @package     CI-ACL
 * @author      Steve Goodwin
 * @copyright   2015 Plumps Creative Limited
 */
class Su_auth extends CI_Controller {

    function __construct(){
        parent::__construct();
		
		$this->url1 = $this->uri->rsegment(1);
		$this->url2 = $this->uri->rsegment(2);
		$this->url3 = $this->uri->rsegment(3);
		$this->url4 = $this->uri->rsegment(4);
		$this->url5 = $this->uri->rsegment(5);
    }

    public function index() { redirect('/login'); }
	
	public function login(){
		if( $this->ion_auth->logged_in()){
			redirect('dashboard');
		} else {
			$data['title'] = lang('login_title');
			$data['url2'] = $this->uri->rsegment(2);
			$data['url3'] = $this->uri->rsegment(3);
			
			$this->form_validation->set_rules('identity', 'Identity', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == true){
				$remember = (bool) $this->input->post('remember');
				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)){
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					/** cek url dari detail hotel */
					$referred_from = $this->session->userdata('referred_from');
					if($referred_from==TRUE){
						redirect($referred_from, 'refresh');
					} else {
						redirect('dashboard', 'refresh');
					}
				} else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				}
			} else {
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$data['identity'] = array('name' => 'identity',
					'id'    => 'identity',
					'type'  => 'text',
					'class'  => 'form-control',
					'value' => $this->form_validation->set_value('identity'),
					'placeholder'  => lang('login_identity_label'),
					'required'  => "required",
					//'data-error'  => "isi bidang ini",
				);
				$data['password'] = array('name' => 'password',
					'id'   => 'password',
					'type' => 'password',
					'class'  => 'form-control',
					'placeholder'  => lang('login_password_label'),
					'required'  => "required",
				);	

				$this->_render_page('su_auth/content/contents', 'su_auth/component/pages/pages-auth/page-login',$data);
			}
		}
	}

    public function logout(){
		$data['title'] = lang('logout_title');
		//log_act("logout", "keluar dari sistem");
        if( $this->ion_auth->logout() ){
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('login', 'refresh');
        }else{
			//log_act("logout", "gagal keluar dari sistem");
            die(lang('logout_failed'));
		}
	}
	
	/* registrasi user */
	function register_ajax(){
        $tables = $this->config->item('tables','ion_auth');
        $identity_column_alt = $this->config->item('identity_alt','ion_auth');
		
		$data['min_password_length'] = $min_password_length = $this->config->item('min_password_length', 'ion_auth');
		
		$this->form_validation->set_rules('full_name', $this->lang->line('create_user_validation_fullname_label'), 'required|alpha_spaces');
        $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|alpha_dash|is_unique['.$tables['users'].'.'.$identity_column_alt.']');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
		
        //$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
			$email    = strtolower($this->input->post('email'));
            $identity = ($identity_column_alt==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'full_name'      => $this->input->post('full_name'),
            );
        }
		
		if ($this->form_validation->run() == true && $id_user = $this->ion_auth->register($identity, 
																						  $password, 
																						  $email, 
																						  $additional_data))
        {
			$grp = "10";
			$idUser = $id_user; //get_id_user

			$data_user_type = array(	
				'unique_us'  => "ME".unique_(), // Kode IDunik member
				'user_type'  => "02",
			);
			$this->m_manage_users_member->update_user_type($idUser, $data_user_type);
			$this->ion_auth->add_to_group($grp, $idUser); // langsung di tambahkan ke group sesuai dengan pilihan

			$data_json = array(
				'message' => 'Hello'.$this->ion_auth->messages(),
            );

            echo json_encode($data_json);
        }else{
			$data_json = array(
                'full_name' => form_error('full_name'),
				'identity' => form_error('identity'),
				'email' => form_error('email'),
				'password' => form_error('password'),
				'password_confirm' => form_error('password_confirm'),
				'message' => (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))),
            );
            echo json_encode($data_json);
        }
	}

	function register(){
		if ($this->ion_auth->logged_in()){
			redirect('/login', 'refresh');
		} 

		$data['min_password_length'] = $min_password_length = $this->config->item('min_password_length', 'ion_auth');
		
		$data = array(
			'title' => "Register",
			'url2' => $this->url2,
			'url3' => $this->url3,
			'url4' => $this->url4,
			'message' => '',
		);
		
		$data['full_name'] = array(
            'name'  => 'full_name',
            'id'    => 'full_name',
            'type'  => 'text',
			'class' => 'form-control',
            'value' => $this->form_validation->set_value('full_name'),
			'placeholder' => 'Nama Lengkap',
        );
        $data['identity'] = array(
            'name'  => 'identity',
            'id'    => 'identity',
            'type'  => 'text',
			'class' => 'form-control',
            'value' => $this->form_validation->set_value('identity'),
			'placeholder' => 'Nama Pengguna',
        );
        $data['email'] = array(
            'name'  => 'email',
            'id'    => 'email',
            'type'  => 'email',
			'class' => 'form-control',
            'value' => $this->form_validation->set_value('email'),
			'placeholder' => 'Contoh: nama@email.com',
        );
        $data['password'] = array(
            'name'  => 'password',
            'id'    => 'password',
            'type'  => 'password',
			'class' => 'form-control',
            'value' => $this->form_validation->set_value('password'),
			'placeholder' => sprintf(lang('change_password_new_password_label_palceholder'), $min_password_length),
        );
        $data['password_confirm'] = array(
            'name'  => 'password_confirm',
            'id'    => 'password_confirm',
            'type'  => 'password',
			'class' => 'form-control',
            'value' => $this->form_validation->set_value('password_confirm'),
			'placeholder' => 'Konfirmasi Kata Sandi',
        );

		$this->_render_page('su_auth/content/contents', 'su_auth/component/pages/pages-auth/page-register',$data);
	}
	
	/* forgot password *
	function forgot_password(){
		$data = array(
			'title' => lang('forgot_password_title'),
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		
		// setting validation rules by checking wheather identity is username or email
		if($this->config->item('identity', 'ion_auth') != 'email' )
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false)
		{
			$data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'class' => 'form-control',
				'placeholder' => lang('forgot_password_identity_label'),
			);

			if ( $this->config->item('identity', 'ion_auth') != 'email' ){
				$data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			$this->_render_page('su_auth/content/contents', 'su_auth/component/pages/pages-auth/page-forgot-password', $data);
		}
		else
		{
			$identity_column = $this->config->item('identity','ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if(empty($identity)) {

	            		if($this->config->item('identity', 'ion_auth') != 'email')
		            	{
		            		$this->ion_auth->set_error('forgot_password_identity_not_found');
		            	}
		            	else
		            	{
		            	   $this->ion_auth->set_error('forgot_password_email_not_found');
		            	}

		                $this->session->set_flashdata('message', $this->ion_auth->errors());
                		redirect("forgot_password", 'refresh');
            		}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("forgot_password", 'refresh');
			}
		}
	}
	
	// reset password - final step for forgotten password
	public function reset_password($code = NULL){
		$data = array(
			'title' => lang('reset_password_title'),
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		
		if (!$code){
			show_404('Ada yang kurang! coba ingat - ingat lagi ...');
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user){
			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');
			if ($this->form_validation->run() == false){
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
					'type' => 'password',
					'class'  => 'form-control',
					'pattern' => '^.{'.$data['min_password_length'].'}.*$',
				);
				$data['new_password_confirm'] = array(
					'name'    => 'new_confirm',
					'id'      => 'new_confirm',
					'type'    => 'password',
					'class'  => 'form-control',
					'pattern' => '^.{'.$data['min_password_length'].'}.*$',
				);
				$data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				
				$this->_render_page('su_auth/content/contents', 'su_auth/component/pages/pages-auth/reset_password', $data);
			} else {
				$identity = $user->{$this->config->item('identity', 'ion_auth')};

				$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

				if ($change) {
					// if the password was successfully changed
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect("login", 'refresh');
				} else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect('reset_password/' . $code, 'refresh');
				}
			}
		} else {
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("forgot_password", 'refresh');
		}
	}*/

	function _render_page($view, $data=null, $returnhtml=false){ //I think this makes more sense
		$this->viewdata = (empty($data)) ? $data: $data;
		$view_html = $this->template->load($view, $this->viewdata, $returnhtml);
		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
}