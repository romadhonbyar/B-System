<?php if (!defined('BASEPATH')) {
    exit('Hacking Attempt: Keluar dari sistem...!');
}
class M_manage_users extends CI_Model
{
    protected $table = "users";
    public $column = array(
        'users.unique_id',
        'users.username',
        'users.full_name', //sesuaikan dengan tabel agar dapat di sort A-Z atau Z-A
        'users.email',
        'users.phone',
        'users.last_login',
        'groups.name',
    );
    public $order = array('users.id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        if ($this->ion_auth->logged_in()) {
            $user = $this->ion_auth->user()->row();
            $this->username = $user->username;
        }
    }

    private function _get_datatables_query()
    {
        $this->db->select('* , users.id as idUser , groups.name as group_name');
        $this->db->from($this->table);

        if ($this->username) {
            $this->db->not_like('users.username', "admin_super"); // no root view
            $this->db->not_like('users.username', $this->username);
        }
        $i = 0;

        foreach ($this->column as $item) {
            if ($_POST['search']['value']) {
                ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            }
            $column[$i] = $item;
            $i++;

            if ($this->username) {
                $this->db->not_like('users.username', "admin_super"); // no root view
                $this->db->not_like('users.username', $this->username);
            }
        }

        $this->db->join('users_groups', 'users_groups.user_id = users.id', 'left');
        $this->db->join('groups', 'groups.id = users_groups.group_id', 'left');
        $this->db->join('users_detail', 'users_detail.user_id = users.id', 'left');

        if (isset($_POST['order'])) {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } elseif (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        //$this->db->join('users_groups', 'users_groups.user_id = users.id', 'left');
        //$this->db->join('groups', 'groups.id = users_groups.group_id', 'left');
        //$this->db->join('users_detail', 'users_detail.user_id = users.id', 'left');

        /*if ($this->username) {
            $this->db->not_like('users.username', "admin_super"); // no root view
            $this->db->not_like('users.username', $this->username);
        }*/
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();

        /*if ($this->username) {
            $this->db->not_like('users.username', "admin_super"); // no root view
            $this->db->not_like('users.username', $this->username);
        }*/
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->_get_datatables_query();

        /*if ($this->username) {
            $this->db->not_like('users.username', "admin_super"); // no root view
            $this->db->not_like('users.username', $this->username);
        }*/
        return $this->db->count_all_results();
    }

    public function get_by_id($id_user)
    {
        $this->db->from($this->table);
        $this->db->where('users.id', $id_user);
        $this->db->join('users_detail', 'users.id = users_detail.user_id', 'left');
        //$this->db->join('users_groups', 'users.id = users_groups.user_id', 'left');
        $query = $this->db->get();
        return $query->row();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function _update($where, $data)
    {
        $this->db->update($this->table, $data, 'id = ' . $where);
        return $this->db->affected_rows();
    }

    public function _delete($where)
    {
        #Create where clause
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where($this->table . '.id', $where);
        $query = $this->db->get();
        $res = $query->row_array();
        $user_id = $res['id'];

        #Delete Table users
        $this->db->where($this->table . '.id', $user_id);
        $this->db->delete($this->table);

        #Delete Table users_detail
        $this->db->where('user_id', $user_id);
        $this->db->delete('users_detail');

        #Delete Table users_groups
        $this->db->where('user_id', $user_id);
        $this->db->delete('users_groups');

        #Delete Table users_permissions
        $this->db->where('user_id', $user_id);
        $this->db->delete('users_permissions');
    }

    /* Other */
    public function get_id_name_group()
    {
        $this->db->not_like('groups.name', "unknown"); // no unknown view
        $this->db->not_like('groups.name', "root"); // no root view
        $query = $this->db->get('groups');
        return $query->result();
    }
}
