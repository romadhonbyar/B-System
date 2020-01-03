<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Su_manage.php
 *
 * @author      Ahmad Romadhon
 * @copyright   2015 Plumps Creative Limited
 */

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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

    public function index() {redirect('dashboard');}

    public function list_user()
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_users_staff_view')) {
            redirect('/dashboard');
        }

        $data = array(
            'title' => "List Users",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
    }

    // create / add a user staff
    public function add_user()
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_users_staff_add')) {
            redirect('/dashboard');
        }

        $data = array(
            'title' => "Add user",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        $groups = $this->m_manage_users->get_id_name_group();
        $currentGroups = $this->ion_auth->get_users_groups()->result();

        $this->form_validation->set_rules('full_name', "Full name", 'required|alpha_spaces');
        $this->form_validation->set_rules('phone', "Phone", 'required|trim|is_natural');
        $this->form_validation->set_rules('email', "E-mail", 'required|trim|valid_email|callback_cek_domain_email|is_unique[users.email]');
        $this->form_validation->set_rules('groups_select', "Group", 'required');

        $groups = $this->m_manage_groups->get_all();
        $check_grp = $this->input->post('groups_select');

        if ($this->form_validation->run() == true) {
            $email = strtolower($this->input->post('email')); //emsil
            $full_name = $this->input->post('full_name');

            foreach ($groups as $key => $value) {
              if($check_grp==$value->id) {
                  $uniq = $value->code . unique_();
                  $identity = $value->code.$value->id.gen_inisial($full_name)."0";
                  $password = $this->config->item('default_password', 'ion_auth'); // default 12345
              }
            }

            $additional_data = array(
                'full_name' => $full_name,
                'phone' => $this->input->post('phone'),
                'unique_us' => $uniq, // Kode unik Staff
            );

            $users_detail_data = array(
                'alamat' => null,
            );
        }

        if ($this->form_validation->run() == true && $id_user = $this->ion_auth->register($identity, $password, $email,
            $additional_data,
            $users_detail_data)) {

            // Only allow updating groups if user is admin
            if ($this->ion_auth->is_admin()) {
                foreach ($groups as $key => $value) {
                  if($check_grp==$value->id) {
                      $my_username = $value->code.$value->id.gen_inisial($full_name)."0". $id_user;
                      $user_type = "0".$value->id;
                  }
                }

                $data_user_type = array( 'username' => $my_username,'user_type' => $user_type );
                $this->m_manage_users->update($id_user, $data_user_type);
                $this->ion_auth->add_to_group($check_grp, $id_user); // langsung di tambahkan ke group sesuai dengan pilihan
            }
            $this->session->set_flashdata('success', $this->ion_auth->messages());
            redirect("manage/add/users", 'refresh');
        } else {
            $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $data['groups'] = $groups;
            $data['currentGroups'] = $currentGroups;

            $data['full_name'] = array(
                'name' => 'full_name',
                'id' => 'full_name',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('full_name'),
                'placeholder' => lang('manage_add_staff_fullname_placeholder'),
                'required' => 'required',
            );

            $data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'number',
                'class' => 'form-control',
                'required' => 'required',
                'value' => $this->form_validation->set_value('phone'),
                'placeholder' => lang('manage_add_staff_phone_placeholder'),
                'min' => "1",
            );

            $data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'email',
                'class' => 'form-control',
                'required' => 'required',
                'value' => $this->form_validation->set_value('email'),
                'placeholder' => lang('manage_add_staff_email_placeholder'),
                'data-inputmask' => "'mask': 'email'",
                'data-mask' => '',
            );

            renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
        }
    }


    public function edit_user($id = null)
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_users_staff_edit')) {
            redirect('/dashboard');
        }

        $id_decode = decodeID($id);
        $user = $this->ion_auth->user($id_decode)->row();
        $user_detail = $this->m_manage_users->get_by_id($id_decode);

        $data = array(
            'title' => "Edit user",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        if ((!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id_decode))) {
            redirect('dashboard');
        }

        if ($id_decode == null) {
            redirect('dashboard');
        }

        // Cek jika admin bisa edit semua user, Jika bukan admin hanya bisa edit diri sendiri
        $check_num_user = $this->ion_auth->user($id_decode)->num_rows();
        if ($check_num_user != 1 or (!$this->ion_auth->is_admin() and ($this->id_user != $id_decode))) {
            redirect('dashboard');
        }

        //$groups=$this->ion_auth->groups()->result_array();
        //$groups = $this->m_manage_users->get_id_name_group();
        $groups = $this->m_manage_groups->get_all();
        $currentGroups = $this->ion_auth->get_users_groups($id_decode)->row();

        $this->form_validation->set_rules('full_name', "Full name", 'required|alpha_spaces');
        $this->form_validation->set_rules('phone', "Phone", 'required|trim|is_natural');
        $this->form_validation->set_rules('email', "E-mail", 'required|trim|valid_email|callback_cek_domain_email');
        $this->form_validation->set_rules('groups_select', "Group", 'required');

        if (isset($_POST) && !empty($_POST)) {
            // update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('manage_edit_staff_password_validation'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('manage_edit_staff_confirm_password_validation'), 'required');
            }

            if ($this->form_validation->run() === true) {
                $data = array(
                    'full_name' => $this->input->post('full_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                );

                $users_detail_data = array(
                    'alamat' => null,
                );

                // update the password if it was posted
                if ($this->input->post('password')) {
                    $data['password'] = $this->input->post('password');
                }

                // Only allow updating groups if user is admin
                if ($this->ion_auth->is_admin() or ($this->id_user == $id_decode)) {
                    //Update the groups user belongs to
                    $check_grp = $this->input->post('groups_select');

                    if (isset($check_grp) && !empty($check_grp)) {
                        $this->ion_auth->remove_from_group('', $id_decode);

                        $id_user = $id_decode; //get_id_user

                        foreach ($groups as $key => $value) {
                          if($check_grp==$value->id) {
                              $user_type = "0".$value->id;
                          }
                        }

                        $data_user_type = array( 'user_type' => $user_type );
                        $this->m_manage_users->update($id_user, $data_user_type);
                        $this->ion_auth->add_to_group($check_grp, $id_user); // langsung di tambahkan ke group sesuai dengan pilihan
                    }
                }

                // check to see if we are updating the user
                if ($this->ion_auth->update($user->id, $data, $users_detail_data)) {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('success', $this->ion_auth->messages());
                    if ($this->ion_auth->is_admin() or ($this->id_user == $id_decode)) {
                        redirect('manage/edit/users/' . encodeID($id_decode), 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('danger', $this->ion_auth->errors());
                    if ($this->ion_auth->is_admin() or ($this->id_user == $id_decode)) {
                        redirect('manage/edit/users/' . encodeID($id_decode), 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }
                }
            }
        }

        // set the flash data error message if there is one
        $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        //$data['user'] = $user;
        $data['groups'] = $groups;
        $data['currentGroups'] = $currentGroups;

        $data['user_name'] = array(
            'name' => 'identity',
            'id' => 'identity',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('identity', $user->username),
            'disabled' => 'disabled',
        );

        $data['full_name'] = array(
            'name' => 'full_name',
            'id' => 'full_name',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('full_name', $user->full_name),
            'placeholder' => lang('manage_edit_staff_fullname_placeholder'),
            'required' => 'required',
        );

        $data['phone'] = array(
            'name' => 'phone',
            'id' => 'phone',
            'type' => 'text',
            'class' => 'form-control',
            'required' => 'required',
            'value' => $this->form_validation->set_value('phone', $user->phone),
            'placeholder' => lang('manage_edit_staff_phone_placeholder'),
            'required' => 'required',
        );

        $data['email'] = array(
            'name' => 'email',
            'id' => 'email',
            'type' => 'text',
            'class' => 'form-control',
            'required' => 'required',
            'value' => $this->form_validation->set_value('email', $user->email),
            'placeholder' => lang('manage_edit_staff_email_placeholder'),
            'required' => 'required',
        );

        if ($this->id_user != $id or $this->ion_auth->is_admin()) {
            $data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'minlength' => '5',
                'placeholder' => lang('manage_edit_staff_password_placeholder'),
            );
            $data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => lang('manage_edit_staff_confirm_password_placeholder'),
            );
        }

        renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
    }

    /**==================================================*/


    public function list_group()
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_group_view')) {
            redirect('/dashboard');
        }

        $data = array(
            'title' => "List Groups",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
    }

    public function add_group()
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_group_add')) {
            redirect('/dashboard');
        }

        $data = array(
            'title' => "List Groups",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        $this->form_validation->set_rules('group_name', $this->lang->line('manage_add_group_name_validation'), 'required|alpha_dash');
        $this->form_validation->set_rules('group_description', $this->lang->line('manage_add_group_description_validation'), 'required|min_length[10]|max_length[50]');

        if ($this->form_validation->run()) {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('group_description'));
            if ($new_group_id) {
                $this->session->set_flashdata('success', $this->ion_auth->messages());
            } else {
                $this->session->set_flashdata('danger', $this->ion_auth->errors());
            }
            redirect("manage/add/groups");
        }

        $data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'class' => 'form-control',
            'required' => 'required',
            'value' => $this->form_validation->set_value('group_name', $this->input->post('group_name')),
            'placeholder' => lang('manage_add_group_name_placeholder'),
        );
        $data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'class' => 'form-control',
            'required' => 'required',
            'value' => $this->form_validation->set_value('group_description', $this->input->post('group_description')),
            'placeholder' => lang('manage_add_group_description_placeholder'),
            'maxlength' => '50',
            'minlength' => '10',
            'rows' => '2',
            'cols' => '10',
        );
        $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
        renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
    }

    // edit a group
    public function edit_group($id = null)
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_group_edit')) {
            redirect('/dashboard');
        }

        $id_decode = decodeID($id);

        $data = array(
            'title' => "List Groups",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        if (!$id_decode || empty($id_decode)) {redirect('manage/groups', 'refresh');}

        $group = $this->ion_auth->group($id_decode)->row();

        $this->form_validation->set_rules('group_name',
            $this->lang->line('manage_edit_group_name_validation'), 'required|alpha_dash');
        $this->form_validation->set_rules('group_description',
            $this->lang->line('manage_edit_group_description_validation'), 'required|min_length[10]|max_length[50]');

        if ($this->form_validation->run()) {
            $group_update = $this->ion_auth->update_group($id_decode, slugify_under($_POST['group_name']), $_POST['group_description']);
            if ($group_update) {
                $this->session->set_flashdata('success', $this->ion_auth->messages());
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
            }
            redirect("manage/edit/groups/" . encodeID($id_decode));
        }

        $data['group'] = $group;
        $readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';
        $data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'class' => 'form-control',
            'required' => 'required',
            'value' => $this->form_validation->set_value('group_name', $group->name),
            'placeholder' => lang('manage_edit_group_name_placeholder'),
            $readonly => $readonly,
        );
        $data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'class' => 'form-control',
            'required' => 'required',
            'value' => $this->form_validation->set_value('group_description', $group->description),
            'placeholder' => lang('manage_edit_group_description_placeholder'),
            'maxlength' => '50',
            'minlength' => '10',
            'rows' => '2',
            'cols' => '10',
        );

        $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
        renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
    }



    public function group_permissions($id = null)
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_group_permission')) {
            redirect('/dashboard');
        }

        $id_decode = decodeID($id);

        $data = array(
            'title' => "Group Permissions",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        $group_id = $id_decode;
        if (!$group_id) {
            $this->session->set_flashdata('message', "No group ID passed");
            redirect("manage/list/groups", 'refresh');
        }

        if ($this->input->post() && $this->input->post('save')) {
            foreach ($this->input->post() as $k => $v) {
                if (substr($k, 0, 5) == 'perm_') {
                    $permission_id = str_replace("perm_", "", $k);
                    if ($v == "X") {
                        $this->ion_auth_acl->remove_permission_from_group($group_id, $permission_id);
                    } else {
                        $this->ion_auth_acl->add_permission_to_group($group_id, $permission_id, $v);
                    }
                }
            }

            $this->session->set_flashdata('success', "Hak akses berhasil diubah!");
            redirect("manage/permissions/groups/" . $id, "refresh");
        } else {
          //menu_manage_permission_add
          $data['permissions'] = $this->ion_auth_acl->permissions('full', 'perm_key');
          $data['group_permissions'] = $this->ion_auth_acl->get_group_permissions($group_id);
          $data['group'] = $user = $this->ion_auth->group($id_decode)->row();

          renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
        }
    }

    /**==================================================*/


    public function list_permission()
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_permission_view')) {
            redirect('/dashboard');
        }

        $data = array(
            'title' => "List Permissions",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
    }

    /* Permissions */
    public function add_permission()
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_permission_add')) {
            redirect('/dashboard');
        }

        $data = array(
            'title' => "Add Permission",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        /*$data = array(
            'title' => lang('manage_add_permission_title'),
            'id_user' => $this->id_user,
            'username' => $this->username,
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $user,
        );*/

        if ($this->input->post() && $this->input->post('cancel')) {
            redirect('/manage/permissions', 'refresh');
        }

        $this->form_validation->set_rules('perm_key', lang('manage_add_permission_key_validation'), 'required|alpha_dash|is_unique[permissions.perm_key]|xss_clean|trim');
        $this->form_validation->set_rules('perm_name', lang('manage_add_permission_name_validation'), 'required|xss_clean|trim');

        if ($this->form_validation->run() === true) {
            $new_permission_id = $this->ion_auth_acl->create_permission($this->input->post('perm_key'), $this->input->post('perm_name'));
            if ($new_permission_id) {
                $this->session->set_flashdata('success', lang('manage_saved'));
                //$this->session->set_flashdata('success', $this->ion_auth->messages());
                redirect("manage/add/permissions", 'refresh');
            }
        } else {
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->set_flashdata('message'));
        }
        renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
    }

    public function edit_permission($id = null)
    {
        if (!$this->ion_auth_acl->has_permission('menu_manage_permission_edit')) {
            redirect('/dashboard');
        }

        $id_decode = decodeID($id);

        $data = array(
            'title' => "Add Permission",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
            'user_data' => $this->user,
        );

        /*$data = array(
            'title' => lang('manage_edit_permission_title'),
            'id_user' => $this->id_user,
            'username' => $this->username,
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'message' => '',
        );*/

        if ($this->input->post() && $this->input->post('cancel')) {
            redirect('manage/permissions', 'refresh');
        }

        $permission_id = $id_decode;

        if (!$permission_id) {
            $this->session->set_flashdata('message', "No permission ID passed");
            redirect("manage/permissions");
        }

        $permission = $this->ion_auth_acl->permission($permission_id);

        $this->form_validation->set_rules('perm_key', lang('manage_edit_permission_key_validation'), 'required|alpha_dash|xss_clean|trim');
        $this->form_validation->set_rules('perm_name', lang('manage_edit_permission_name_validation'), 'required|xss_clean|trim');

        if ($this->form_validation->run() === false) {
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->set_flashdata('message'));
            //$data['message']    = ($this->ion_auth_acl->errors() ? $this->ion_auth_acl->errors() : $this->session->flashdata('message'));
            $data['permission'] = $permission;

            renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
        } else {
            $additional_data = array(
                'perm_name' => $this->input->post('perm_name'),
            );

            $update_permission = $this->ion_auth_acl->update_permission($permission_id, $this->input->post('perm_key'), $additional_data);
            if ($update_permission) {
                $this->session->set_flashdata('success', lang('manage_saved'));
                redirect("/permission/edit/" . encodeID($permission_id));
            }
        }
    }





    /**==================================================*/
    /**==================================================*/
    /**==================================================*/
    /**==================================================*/
    /**==================================================*/
    /**==================================================*/






    /*
    public function update_profile($id)
    {
        if (!$this->ion_auth->logged_in()) {redirect('/login', 'refresh');
        }

        $id_decode = decodeID($id);
        $user = $this->ion_auth->user($id_decode)->row();
        //$user_detail = $this->m_manage_users_member->get_by_id($id_decode);
        $data = array(
            'title' => "Ubah profil member",
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'get_provinces' => $this->m_general->get_provinces(),
            'get_regencies' => $this->m_general->get_regencies(),
            'get_districts' => $this->m_general->get_districts(),
            'message' => '',
            'user_data' => $this->user,
            'id_decode' => $id_decode,
        );

        //$user = $this->m_manage_users_member->get_by_id($id_decode);
        $data['id_provinces_profile'] = $user->id_provinces;
        $data['id_regencies_profile'] = $user->id_regencies;
        $data['id_districts_profile'] = $user->id_districts;

        if ((!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id_decode))) {
            redirect('dashboard');
            // echo "ini 1";
        }

        if ($id_decode == null) {
            redirect('dashboard');
            // echo "ini 2";
        }

        // Cek jika admin bisa edit semua user, Jika bukan admin hanya bisa edit diri sendiri
        $check_num_user = $this->ion_auth->user($id_decode)->num_rows();
        if ($check_num_user != 1 or (!$this->ion_auth->is_admin() and ($this->id_user != $id_decode))) {
            redirect('dashboard');
            echo "ini 3";
        }

        $this->form_validation->set_rules('full_name', $this->lang->line('manage_edit_staff_fullname_validation'), 'required|alpha_spaces');
        $this->form_validation->set_rules('phone', $this->lang->line('manage_edit_staff_phone_validation'), 'required|trim|is_natural');
        $this->form_validation->set_rules('email', $this->lang->line('manage_edit_staff_email_validation'), 'required|trim|valid_email|callback_cek_domain_email');
        $this->form_validation->set_rules('alamat', $this->lang->line('manage_edit_staff_address_validation'), 'required');
        $this->form_validation->set_rules('id_provinces', "Provinces", 'required');
        $this->form_validation->set_rules('id_regencies', "Regencies", 'required');
        $this->form_validation->set_rules('id_districts', "Districts", 'required');

        if (isset($_POST) && !empty($_POST)) {
            // update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('manage_edit_staff_password_validation'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('manage_edit_staff_confirm_password_validation'), 'required');
            }

            if ($this->form_validation->run() === true) {
                $data = array(
                    'full_name' => $this->input->post('full_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                );
                $users_detail_data = array(
                    'alamat' => $this->input->post('alamat'),
                    'id_provinces' => $this->input->post('id_provinces'),
                    'id_regencies' => $this->input->post('id_regencies'),
                    'id_districts' => $this->input->post('id_districts'),
                );

                // update the password if it was posted
                if ($this->input->post('password')) {
                    $data['password'] = $this->input->post('password');
                }

                // check to see if we are updating the user
                if ($this->ion_auth->update($user->id, $data, $users_detail_data)) {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('success', $this->ion_auth->messages());
                    if ($this->ion_auth->is_admin() or ($this->id_user == $id_decode)) {
                        redirect('update/profile/' . encodeID($id_decode), 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('danger', $this->ion_auth->errors());
                    if ($this->ion_auth->is_admin() or ($this->id_user == $id_decode)) {
                        redirect('update/profile/' . encodeID($id_decode), 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }
                }

            }
        }

        // set the flash data error message if there is one
        $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $data['user'] = $user;

        $data['user_name'] = array(
            'name' => 'identity',
            'id' => 'identity',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('identity', $user->username),
            'disabled' => 'disabled',
        );

        $data['full_name'] = array(
            'name' => 'full_name',
            'id' => 'full_name',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('full_name', $user->full_name),
            'placeholder' => lang('manage_edit_staff_fullname_placeholder'),
            'required' => 'required',
        );

        $data['phone'] = array(
            'name' => 'phone',
            'id' => 'phone',
            'type' => 'text',
            'class' => 'form-control',
            'required' => 'required',
            'value' => $this->form_validation->set_value('phone', $user->phone),
            'placeholder' => lang('manage_edit_staff_phone_placeholder'),
            'required' => 'required',
        );
        $data['email'] = array(
            'name' => 'email',
            'id' => 'email',
            'type' => 'text',
            'class' => 'form-control',
            'required' => 'required',
            'value' => $this->form_validation->set_value('email', $user->email),
            'placeholder' => lang('manage_edit_staff_email_placeholder'),
            'required' => 'required',
        );
        $data['alamat'] = array(
            'name' => 'alamat',
            'id' => 'alamat',
            'type' => 'text',
            'rows' => '2',
            'cols' => '10',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('alamat', $user_detail->alamat),
            'placeholder' => lang('manage_edit_staff_address_placeholder'),
             'required' => 'required',
        );

        $data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'type' => 'password',
            'class' => 'form-control',
            'minlength' => '5',
             'placeholder' => lang('manage_edit_staff_password_placeholder'),
        );
        $data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'type' => 'password',
            'class' => 'form-control',
            'placeholder' => lang('manage_edit_staff_confirm_password_placeholder'),
            'data-match' => "#password",
            'data-match-error' => "Whoops, these don't match",
        );

        renpa('su_manage/content/contents', 'su_manage/component/pages/pages-content/content', $data);
    }*/

    /*Active Inactive*/
    // activate the user or block user
    public function activate($id, $code = false)
    {
        $id_decode = decodeID($id);
        //$id_decode = $id;
        if ($code !== false) {
            $activation = $this->ion_auth->activate($id_decode, $code);
        } elseif ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id_decode);
        }

        if ($activation) {
            // redirect them to the auth page
            $this->session->set_flashdata('success', $this->ion_auth->messages());
            redirect('manage/users', 'refresh');
        } else {
            // redirect them to the forgot password page
            $this->session->set_flashdata('danger', $this->ion_auth->errors());
            redirect('manage/users', 'refresh');
        }
    }

    // deactivate the user or block user
    public function deactivate($id, $code = false)
    {
        $id_decode = decodeID($id);
        //$id_decode = $id;
        if ($code !== false) {
            $activation = $this->ion_auth->deactivate($id_decode, $code);
        } elseif ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->deactivate($id_decode);
        }

        if ($activation) {
            // redirect them to the auth page
            $this->session->set_flashdata('warning', $this->ion_auth->messages());
            redirect('manage/users', 'refresh');
        } else {
            // redirect them to the forgot password page
            $this->session->set_flashdata('danger', $this->ion_auth->errors());
            redirect('manage/users', 'refresh');
        }
    }





    /** callback_cek_domain_email */
    public function cek_domain_email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            list($user, $host) = explode('@', $email);
            if (!checkdnsrr($host, 'MX')) {
                $this->form_validation->set_message('cek_domain_email', 'Domain %s tidak ditemukan.');
                return false;
            } else {
                return true;
            }
        } else {
            $this->form_validation->set_message('cek_domain_email', '%s tidak valid/kosong.');
            return false;
        }
    }

    /* get kota/kabupaten *
    public function get_data_regencies()
    {
        $id_provinces = $this->input->post('id_provinces');
        $data = $this->m_general->get_regencies($id_provinces);
        if ($data) {
            echo '<select required="required" name="id_regencies" id="id_regencies" class="form-control" onchange="get_data_districts();" >';
            echo '<option value=""> -- Kota/Kabupaten -- </option>';
            foreach ($data as $a) {
                echo '<option value="' . $a->id_regencies . '">' . $a->name_regencies . '</option>';
            }
        } else {
            echo '<select required="required" name="id_regencies" id="id_regencies" class="form-control" disabled>';
            echo '<option value=""> -- Kota/Kabupaten -- </option>';
        }
        echo '</select>';
    }

    /* get kota/kabupaten *
    public function get_data_districts()
    {
        $id_regencies = $this->input->post('id_regencies');
        $data = $this->m_general->get_districts($id_regencies);
        if ($data) {
            echo '<select required="required" name="id_districts" id="id_districts" class="form-control" onchange="get_data_villages();" >';
            echo '<option value=""> -- Kecamatan -- </option>';
            foreach ($data as $a) {
                echo '<option value="' . $a->id_districts . '">' . $a->name_districts . '</option>';
            }
        } else {
            echo '<select required="required" name="id_districts" id="id_districts" class="form-control" disabled>';
            echo '<option value=""> -- Kecamatan -- </option>';
        }
        echo '</select>';
    }

    /* get Kecamatan *
    public function get_data_villages()
    {
        $id_districts = $this->input->post('id_districts');
        $data = $this->m_general->get_villages($id_districts);
        if ($data) {
            echo '<select required="required" name="id_villages" id="id_villages" class="form-control" >';
            echo '<option value=""> -- Kelurahan/Desa -- </option>';
            foreach ($data as $a) {
                echo '<option value="' . $a->id_villages . '">' . $a->name_villages . '</option>';
            }
        } else {
            echo '<select required="required" name="id_villages" id="id_villages" class="form-control" disabled>';
            echo '<option value=""> -- Kelurahan/Desa -- </option>';
        }
        echo '</select>';
    }*/
}
