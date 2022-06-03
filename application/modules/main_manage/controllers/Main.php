<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * application\modules\main_manage\controllers\Main.php
 *
 * @author      Ahmad Romadhon
 * @copyright   2020
 */

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
                  'system/active_link_helper',
                  'system/uniqid_helper',
                  'system/text_helper')
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
        $this->load->model(
            array('main_manage/m_manage_users',
                  'main_manage/m_manage_permissions',
                  'main_manage/m_manage_groups')
        );
    }

    public function index()
    {
        redirectDashboard();
    }

    /**==================================================*/

    public function list_user()
    {
        if (!$this->ion_auth_acl->has_permission('manage_user_view_table')) {
            redirectDashboard();
        }

        $data = [
            'title' => myTitle($this->url2, $this->url3),
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'user_data' => $this->user,
        ];

        $groups = $this->m_manage_users->get_id_name_group();
        $currentGroups = $this->ion_auth->get_users_groups()->result();

        $data['groups'] = $groups;
        $data['currentGroups'] = $currentGroups;

        renPa(
            'main_manage/content/contents',
            'main_manage/component/pages/pages-content/content',
            $data
        );
    }

    public function user_add()
    {
        if (!$this->ion_auth_acl->has_permission('manage_user_add')) {
            $reponse = [
                'message' => "Anda tidak mempunyai hak akses!",
                'status' => false,
                'type' => "danger",
            ];
        }

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');

        $this->form_validation->set_rules(
            'inputUserFullName',
            'Nama lengkap',
            'required|alpha_spaces|regex_match[/^[a-zA-Z ]*$/]'
        );

        if ($identity_column == 'email') {
            $this->form_validation->set_rules(
                'inputUserEmail',
                'E-mail',
                'required|valid_email|is_unique[' .
                    $tables['users'] .
                    '.email]|regex_match[/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/]'
            );
        } else {
            $this->form_validation->set_rules(
                'inputUserName',
                'Username',
                'required|is_unique[' .
                    $tables['users'] .
                    '.' .
                    $identity_column .
                    ']|regex_match[/^[a-zA-Z0-9_.-]*$/]'
            );
            $this->form_validation->set_rules(
                'inputUserEmail',
                'E-mail',
                'required|valid_email|is_unique[' .
                    $tables['users'] .
                    '.email]|regex_match[/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/]'
            );
        }

        $this->form_validation->set_rules(
            'inputUserPhone',
            'Phone',
            'required|is_unique[' . $tables['users'] . '.phone]|min_length[11]|regex_match[/^08[0-9 ]{9,}$/]'
        );

        if ($this->ion_auth->is_admin()) {
            $this->form_validation->set_rules(
                'inputUserGroupsSelect',
                'Group',
                'required'
            );
        }

        $this->form_validation->set_rules(
            'inputUserPassword',
            'Kata sandi',
            'required|min_length[' .
                $this->config->item('min_password_length', 'ion_auth') .
                ']|max_length[' .
                $this->config->item('max_password_length', 'ion_auth') .
                ']|matches[inputUserPasswordConfirm]'
        );

        $this->form_validation->set_rules(
            'inputUserPasswordConfirm',
            'Konfirmasi kata sandi',
            'required|min_length[8]|max_length[30]|matches[inputUserPassword]'
        );

        $groups = $this->m_manage_groups->get_all('')->result();
        $check_grp = $this->input->post('inputUserGroupsSelect');

        if ($this->form_validation->run() == true) {
            $email = strtolower($this->input->post('inputUserEmail'));
            $full_name = strtolower($this->input->post('inputUserFullName'));

            foreach ($groups as $key => $value) {
                if ($check_grp == $value->id) {
                    $uniq = $value->code . unique_(3);
                    $identity = $this->input->post('inputUserName');
                    $password = $this->input->post('inputUserPassword');
                }
            }

            $additional_data = [
                'full_name' => ucwords($full_name),
                'phone' => $this->input->post('inputUserPhone'),
                'unique_id' => $uniq, // Kode unik user
            ];
        }

        if ($this->form_validation->run() == true  &&
            ($id_user = $this->ion_auth->register(
                $identity,
                $password,
                $email,
                $additional_data
            ))
        ) {
            
            /* TODO LIST save with JSON */
            // Only allow updating groups if user is admin
            if ($this->ion_auth->is_admin() or
                $this->ion_auth_acl->has_permission('manage_user_add')) {
                foreach ($groups as $key => $value) {
                    if ($check_grp == $value->id) {
                        $user_type = '0' . $value->id;
                    }
                }

                $data_user_type = [
                    'username' => strtolower($identity),
                    'user_type' => $user_type,
                ];
                $this->m_manage_users->_update($id_user, $data_user_type);

                $users_detail_data = ['user_id' => $id_user];
                $this->m_manage_users->insert(
                    'users_detail',
                    $users_detail_data
                );

                $users_groups_data = ['group_id' => $check_grp];
                $this->m_manage_groups->_update($id_user, $users_groups_data);
            }

            $message = $this->ion_auth->messages();
            $reponse = [
                'message' => $message,
                'status' => true,
                'type' => "success",
            ];
        } else {
            $message = validation_errors() 
                ? validation_errors() 
                : ($this->ion_auth->errors() 
                    ? $this->ion_auth->errors()
                    : $this->session->flashdata('message'));
            $reponse = [
                'message' => $message,
                'status' => false,
                'type' => "danger",
            ];
        }

        echo json_encode($reponse);
    }

    public function user_edit($id = null)
    {
        $id_decode = decrypt_code($id);
        $user = $this->ion_auth->user($id_decode)->row();
        $user_detail = $this->m_manage_users->get_by_id($id_decode);

        $user_id = $user->id;
        $user_type = $user->user_type;

        if ($user_id == $id_decode && $this->ion_auth->is_admin() or
            $this->ion_auth_acl->has_permission('manage_users_edit')) {
            $this->edit_user_load(
                $id,
                $id_decode,
                $user,
                $user_detail,
                $user_type
            );
        } else {
            redirectDashboard();
        }
    }

    public function edit_user_load(
        $id,
        $id_decode,
        $user,
        $user_detail,
        $user_type
    ) {
        $id_encode = $id;

        if (!$this->ion_auth->is_admin()  &&
            !($this->ion_auth->user()->row()->id == $id_decode)) {
            if (!$this->ion_auth_acl->has_permission('manage_user_edit')) {
                $reponse = [
                    'message' => "Anda tidak mempunyai hak akses!",
                    'status' => false,
                    'type' => "danger",
                ];
            }
        }

        if ($id_decode == null) {
            $reponse = [
                'message' => "Tidak ada ID yang dapat digunakan!",
                'status' => false,
                'type' => "warning",
            ];
        }

        // Cek jika admin bisa edit semua user, Jika bukan admin hanya bisa edit diri sendiri
        $check_num_user = $this->ion_auth->user($id_decode)->num_rows();
        if (
            $check_num_user != 1 or
            !$this->ion_auth->is_admin() && $this->id_user != $id_decode
        ) {
            if (!$this->ion_auth_acl->has_permission('manage_user_edit')) {
                $reponse = [
                    'message' => "Anda tidak mempunyai hak akses!",
                    'status' => false,
                    'type' => "danger",
                ];
            }
        }

        $groups = $this->m_manage_groups->get_all('')->result();
        /*$currentGroups = $this->ion_auth->get_users_groups($id_decode)->row();*/

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $data['identity_column'] = $identity_column;

        $this->form_validation->set_rules(
            'inputUserFullName-'. $id_encode,
            'Nama lengkap',
            'required|alpha_spaces|regex_match[/^[a-zA-Z ]*$/]'
        );

        if ($identity_column == 'email') {
            $this->form_validation->set_rules(
                'inputUserEmail-'. $id_encode,
                'E-mail',
                'required|valid_email|edit_unique[' .
                    $tables['users'] .
                    '.email.' .
                    $id_decode .
                    ']|regex_match[/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/]'
            );
        } else {
            $this->form_validation->set_rules(
                'inputUserName-'. $id_encode,
                'Username',
                'required|edit_unique[' .
                    $tables['users'] .
                    '.' .
                    $identity_column .
                    '.' .
                    $id_decode .
                    ']|regex_match[/^[a-zA-Z0-9_.-]*$/]'
            );
            $this->form_validation->set_rules(
                'inputUserEmail-'. $id_encode,
                'E-mail',
                'required|valid_email|edit_unique[' . $tables['users'] . '.email.' . $id_decode .']|regex_match[/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/]'
            );
        }

        $this->form_validation->set_rules(
            'inputUserPhone-'. $id_encode,
            'Phone',
            'required|edit_unique[' . $tables['users'] . '.phone.' . $id_decode . ']|min_length[11]|regex_match[/^08[0-9 ]{9,}$/]'
        );

        if ($this->ion_auth->is_admin()) {
            $this->form_validation->set_rules(
                'inputUserGroupsSelect-'. $id_encode,
                'Group',
                'required'
            );
        }

        if (isset($_POST) && !empty($_POST)) {
            // update the password if it was posted
            if ($this->input->post('inputUserPassword-'. $id_encode)) {
                $this->form_validation->set_rules(
                    'inputUserPassword-'. $id_encode,
                    'Kata sandi',
                    'required|min_length[' .
                        $this->config->item('min_password_length', 'ion_auth') .
                        ']|max_length[' .
                        $this->config->item('max_password_length', 'ion_auth') .
                        ']|matches[inputUserPasswordConfirm-'. $id_encode. ']'
                );
                $this->form_validation->set_rules(
                    'inputUserPasswordConfirm-'. $id_encode,
                    'Konfirmasi kata sandi',
                    'required|min_length[8]|max_length[30]|matches[inputUserPassword-'. $id_encode. ']'
                );
            }

            if ($this->form_validation->run() === true) {
                $users_data = array(
                    'username' => strtolower($this->input->post('inputUserName-'. $id_encode)),
                    'full_name' => strtolower($this->input->post('inputUserFullName-'. $id_encode)),
                    'phone' => $this->input->post('inputUserPhone-'. $id_encode),
                    'email' => $this->input->post('inputUserEmail-'. $id_encode),
                );

                $users_detail_data = [];

                // update the password if it was posted
                if ($this->input->post('inputUserPassword-'. $id_encode)) {
                    $users_data['password'] = $this->input->post('inputUserPassword-'. $id_encode);
                }

                // Only allow updating groups if user is admin
                if (
                    $this->ion_auth->is_admin() or
                    $this->id_user == $id_decode or
                    $this->ion_auth_acl->has_permission('manage_user_edit')
                ) {
                    //Update the groups user belongs to
                    if ($this->ion_auth->is_admin() or
                        $this->ion_auth_acl->has_permission('manage_user_edit')) {
                        $check_grp = $this->input->post('inputUserGroupsSelect-'. $id_encode);
                    } else {
                        $check_grp = $user_type;
                    }

                    if (isset($check_grp) && !empty($check_grp)) {
                        $this->ion_auth->remove_from_group('', $id_decode);

                        $id_user = $id_decode; //get_id_user

                        foreach ($groups as $key => $value) {
                            if ($check_grp == $value->id) {
                                $identity = $this->input->post('inputUserName-'. $id_encode);
                                $user_type = '0' . $value->id;
                            }
                        }

                        $data_user_type = [
                            'username' => strtolower($identity),
                            'user_type' => $user_type,
                        ];

                        $this->m_manage_users->_update(
                            $id_user,
                            $data_user_type
                        );

                        $this->ion_auth->add_to_group($check_grp, $id_user); // langsung di tambahkan ke group sesuai dengan pilihan
                    }
                }

                // check to see if we are updating the user
                if ($this->ion_auth->update(
                    $user->id,
                    $users_data
                )) {
                    $reponse = [
                        'message' => $this->ion_auth->messages(),
                        'status' => true,
                        'type' => "success",
                    ];
                } else {
                    $reponse = [
                        'message' => "Gagal melakukan pembaharuan data pengguna!",
                        'status' => false,
                        'type' => "danger",
                    ];
                }
            } else {
                $message = validation_errors()
                    ? validation_errors()
                    : ($this->ion_auth->errors()
                        ? $this->ion_auth->errors()
                        : $this->session->flashdata('message'));
                $reponse = [
                    'message' => $message,
                    'status' => false,
                    'type' => "danger",
                ];
            }
        } else {
            $reponse = [
                'message' => 'Form Kosong!',
                'status' => false,
                'type' => "danger",
            ];
        }

        echo json_encode($reponse);
    }

    /**==================================================*/

    public function list_group()
    {
        if (!$this->ion_auth_acl->has_permission('manage_group_view_table')) {
            redirectDashboard();
        }

        $data = [
            'title' => myTitle($this->url2, $this->url3),
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'user_data' => $this->user,
        ];

        renPa(
            'main_manage/content/contents',
            'main_manage/component/pages/pages-content/content',
            $data
        );
    }

    public function add_group()
    {
        if (!$this->ion_auth_acl->has_permission('manage_group_add')) {
            $reponse = [
                'message' => "Anda tidak mempunyai hak akses!",
                'status' => false,
                'type' => "danger",
            ];
        }

        $this->form_validation->set_rules(
            'inputGroupName',
            'Nama Grup',
            'required|alpha_dash|regex_match[/^[a-zA-Z0-9-_]+$/]'
        );
        $this->form_validation->set_rules(
            'inputGroupDescription',
            'Deskripsi Grup',
            'required|min_length[5]|max_length[255]'
        );

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run()) {
                $additional_data = [
                    'code' => genCodeName($this->input->post('inputGroupName')),
                ];

                $new_group_id = $this->ion_auth->create_group(
                    strtolower($this->input->post('inputGroupName')),
                    $this->input->post('inputGroupDescription'),
                    $additional_data
                );
                
                if ($new_group_id) {
                    $reponse = [
                        'message' => $this->ion_auth->messages(),
                        'status' => true,
                        'type' => "success",
                    ];
                } else {
                    $reponse = [
                        'message' => $this->ion_auth->errors(),
                        'status' => false,
                        'type' => "danger",
                    ];
                }
            } else {
                $message = validation_errors()
                    ? validation_errors()
                    : ($this->ion_auth->errors()
                        ? $this->ion_auth->errors()
                        : $this->session->flashdata('message'));
                $reponse = [
                    'message' => $message,
                    'status' => false,
                    'type' => "danger",
                ];
            }
        } else {
            $reponse = [
                'message' => 'Form Kosong!',
                'status' => false,
                'type' => "danger",
            ];
        }

        echo json_encode($reponse);
    }

    public function edit_group($id)
    {
        if (!$this->ion_auth_acl->has_permission('manage_group_edit')) {
            $reponse = [
                'message' => "Anda tidak mempunyai hak akses!",
                'status' => false,
                'type' => "danger",
            ];
        }

        $id_encode = $id;
        $id_decode = decrypt_code($id);

        if (!$id_decode || empty($id_decode)) {
            $reponse = [
                'message' => "Anda tidak mempunyai hak akses!",
                'status' => false,
                'type' => "danger",
            ];
        }

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            $reponse = [
                'message' => "Anda tidak mempunyai hak akses!",
                'status' => false,
                'type' => "danger",
            ];
        }

        /*$group = $this->ion_auth->group($id_decode)->row();*/
        // validate form input
        $this->form_validation->set_rules(
            'inputGroupName-'. $id_encode,
            'Nama Grup',
            'required|alpha_dash|regex_match[/^[a-zA-Z0-9-_]+$/]'
        );
        $this->form_validation->set_rules(
            'inputGroupDescription-'. $id_encode,
            'Deskripsi Grup',
            'required|min_length[5]|max_length[255]'
        );

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === true) {
                $group_update = $this->ion_auth->update_group($id_decode, $_POST['inputGroupName-'. $id_encode], array(
                    'description' => $_POST['inputGroupDescription-'. $id_encode]
                ));

                if ($group_update) {
                    $reponse = [
                        'message' => $this->ion_auth->messages(),
                        'status' => true,
                        'type' => "success",
                    ];
                } else {
                    $reponse = [
                        'message' => $this->ion_auth->errors(),
                        'status' => false,
                        'type' => "danger",
                    ];
                }
            } else {
                $message = validation_errors()
                    ? validation_errors()
                    : ($this->ion_auth->errors()
                        ? $this->ion_auth->errors()
                        : $this->session->flashdata('message'));
                $reponse = [
                    'message' => $message,
                    'status' => false,
                    'type' => "danger",
                ];
            }
        } else {
            $reponse = [
                'message' => 'Form Kosong!',
                'status' => false,
                'type' => "danger",
            ];
        }

        echo json_encode($reponse);
    }

    public function group_permission($id = null)
    {
        if (!$this->ion_auth_acl->has_permission('manage_group_permission')) {
            redirectDashboard();
        }

        $id_decode = decrypt_code($id);

        $data = [
            'title' => myTitle($this->url2, $this->url3),
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'user_data' => $this->user,
        ];

        $group_id = $id_decode;
        if (!$group_id) {
            $this->session->set_flashdata('message', 'No group ID passed');
            redirect('manage/group/list', 'refresh');
        }

        if ($this->input->post() && $this->input->post('save')) {
            foreach ($this->input->post() as $k => $v) {
                if (substr($k, 0, 5) == 'perm_') {
                    $permission_id = str_replace('perm_', '', $k);
                    if ($v == 'X') {
                        $this->ion_auth_acl->remove_permission_from_group(
                            $group_id,
                            $permission_id
                        );
                    } else {
                        $this->ion_auth_acl->add_permission_to_group(
                            $group_id,
                            $permission_id,
                            $v
                        );
                    }
                }
            }

            $this->session->set_flashdata(
                'success',
                'Hak akses berhasil diubah!'
            );

            redirect('manage/group/permission/' . $id, 'refresh');
        } else {
            $data['permissions'] = $this->ion_auth_acl->permissions('full', 'perm_key');
            $data['group_permissions'] = $this->ion_auth_acl->get_group_permissions($group_id);
            $data['group'] = $this->ion_auth->group($group_id)->row();

            renPa(
                'main_manage/content/contents',
                'main_manage/component/pages/pages-content/content',
                $data
            );
        }
    }


    /** ============================================ */
    /** ============================================ */
    /** ============================================ */
    /** ============================================ */
    /** ============================================ */
    /**==================================================*/

    public function list_permission()
    {
        if (!$this->ion_auth_acl->has_permission('manage_permission_view_table')) {
            redirectDashboard();
        }

        $data = [
            'title' => myTitle($this->url2, $this->url3),
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'user_data' => $this->user,
        ];

        renPa(
            'main_manage/content/contents',
            'main_manage/component/pages/pages-content/content',
            $data
        );
    }

    public function add_permission()
    {
        if (!$this->ion_auth_acl->has_permission('manage_permission_add')) {
            $reponse = [
                'message' => "Anda tidak mempunyai hak akses!",
                'status' => false,
                'type' => "danger",
            ];
        }

        $this->form_validation->set_rules(
            'inputPermKey',
            "Kunci Hak Akses",
            'required|alpha_dash|regex_match[/^[a-zA-Z0-9-_]+$/]|is_unique[permissions.perm_key]'
        );

        $this->form_validation->set_rules(
            'inputPermName',
            "Nama Hak Akses",
            'required|alpha_spaces|regex_match[/^[a-zA-Z ]*$/]'
        );

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === true) {
                $new_permission_id = $this->ion_auth_acl->create_permission(
                    $this->input->post('inputPermKey'),
                    rtrim($this->input->post('inputPermName'), " ")
                );

                /* TODO LIST save with JSON */
                if ($new_permission_id) {
                    $reponse = [
                    'message' => lang('manage_saved'),
                    'status' => true,
                    'type' => "success",
                ];
                }
            } else {
                $message = validation_errors()
                ? validation_errors()
                : ($this->ion_auth->errors()
                    ? $this->ion_auth->errors()
                    : $this->session->flashdata('message'));
                $reponse = [
                'message' => $message,
                'status' => false,
                'type' => "danger",
            ];
            }
        } else {
            $reponse = [
            'message' => 'Form Kosong!',
            'status' => false,
            'type' => "danger",
        ];
        }

        echo json_encode($reponse);
    }

    public function edit_permission($id = null)
    {
        if (!$this->ion_auth_acl->has_permission('manage_permission_edit')) {
            $reponse = [
                'message' => "Anda tidak mempunyai hak akses!",
                'status' => false,
                'type' => "danger",
            ];
        }

        $id_encode = $id;
        $id_decode = decrypt_code($id);

        if ($this->input->post() && $this->input->post('cancel')) {
            $reponse = [
                'message' => "Batal melakukan perubahan!",
                'status' => false,
                'type' => "warning",
            ];
        }

        $permission_id = $id_decode;

        if (!$permission_id) {
            $reponse = [
                'message' => "No permission ID passed!",
                'status' => false,
                'type' => "danger",
            ];
        }

        $permission = $this->ion_auth_acl->permission($permission_id);

        $this->form_validation->set_rules(
            'inputPermKey-'. $id_encode,
            "Kunci Hak Akses",
            'required|alpha_dash|edit_unique[permissions.perm_key.' . $permission_id .']|regex_match[/^[a-zA-Z0-9-_]+$/]'
        );
        $this->form_validation->set_rules(
            'inputPermName-'. $id_encode,
            "Nama Hak Akses",
            'required|alpha_spaces|regex_match[/^[a-zA-Z ]*$/]'
        );

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === true) {
                $additional_data = ['perm_name' => rtrim($this->input->post('inputPermName-'. $id_encode,), " ") ];

                $update_permission = $this->ion_auth_acl->update_permission(
                    $permission_id,
                    $this->input->post('inputPermKey-'. $id_encode,),
                    $additional_data
                );

                if ($update_permission) {
                    $reponse = [
                        'message' => "Berhasil melakukan pembaharuan!",
                        'status' => true,
                        'type' => "success",
                    ];
                } else {
                    $reponse = [
                        'message' => "Gagal melakukan pembaharuan!",
                        'status' => true,
                        'type' => "danger",
                    ];
                }
            } else {
                $message = validation_errors()
                    ? validation_errors()
                    : ($this->ion_auth->errors()
                        ? $this->ion_auth->errors()
                        : $this->session->flashdata('message'));
                $reponse = [
                    'message' => $message,
                    'status' => false,
                    'type' => "danger",
                ];
            }
        } else {
            $reponse = [
                'message' => 'Form Kosong!',
                'status' => false,
                'type' => "danger",
            ];
        }

        echo json_encode($reponse);
    }
}
