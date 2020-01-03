<?php defined('BASEPATH') or exit('No direct script access allowed');
class C_manage_users_staff extends CI_Controller
{
    public function index()
    {
        if ($this->ion_auth->logged_in()) {
            redirect('dashboard', 'refresh');
        } else {redirect('login', 'refresh');}
    }

    public function ajax_list()
    {
        if ($this->ion_auth->logged_in()) {
            $list = $this->m_manage_users->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $users) {
                $no++;
                $row = array();

                $userType = $users->user_type;
                if ($users->last_login) {
                    $last_login = unTohum($users->last_login);
                } else {
                    $last_login = "Belum Login";
                }

                $row[] = "#" . $users->unique_us;

                if ($users->username == true) {$username = $users->username;} else { $username = "-";}

                $row[] = $username;
                $row[] = $users->full_name;
                $row[] = $users->email;
                $row[] = $users->phone;
                $row[] = $last_login;

                $id_encode = encodeID($users->id_staff);

                $row[] = '
                  <div class="buttons">
                    <a href="' . site_url('manage/edit/users/' . $id_encode) . '" class="btn btn-icon btn-warning btn-sm" title="Edit user"><i class="far fa-edit fa-fw"></i> Edit</a>
                    <a href="#" id="btn-delete" class="btn btn-icon btn-danger btn-sm"
                      title="Delete user" onclick="delete_user('."'".$users->unique_us."'".')">
                      <i class="far fa-trash-alt fa-fw"></i> Delete
                    </a>
                  </div>';
                //$row[] = $users->description;// Group
                //$row[] = $users->alamat;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_manage_users->count_all(),
                "recordsFiltered" => $this->m_manage_users->count_filtered(),
                "data" => $data,
            );
            echo json_encode($output);
        }
    }

    public function ajax_edit($id_user)
    {
        if ($this->ion_auth->logged_in()) {
            $data = $this->m_manage_users->get_by_id($id_user);
            echo json_encode($data);
        }
    }

    /*public function ajax_users()
    {
        if ($this->ion_auth->logged_in()) {
            $data = $this->m_get->get_users();
            echo json_encode($data);
        }
    }*/

    public function ajax_delete($id_users)
    {
        if ($this->ion_auth->logged_in()) {
            $this->m_manage_users->delete_by_id($id_users);
            echo json_encode(array("status" => true));
        }
    }
}
