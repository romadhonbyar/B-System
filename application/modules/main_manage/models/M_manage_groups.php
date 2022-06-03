<?php if (!defined('BASEPATH')) {
    exit('Hacking Attempt: Keluar dari sistem...!');
}
class M_manage_groups extends CI_Model
{
    protected $table = "groups";
    public $column = array(
                        'groups.id',
                        'groups.name',
                        'groups.description',
                        );
    public $order = array('groups.id' => 'desc');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column as $item) {
            if ($_POST['search']['value']) {
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            }
            $column[$i] = $item;
            $i++;
        }

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
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function _update($where, $data)
    {
        $this->db->update("users_groups", $data, 'user_id = '.$where);
        return $this->db->affected_rows();
    }

    public function _delete($id)
    {
        $this->db->where($this->table.'.id', $id);
        $this->db->delete($this->table);

        $this->db->where('group_id', $id);
        $this->db->delete('groups_permissions');
    }

    /* Other */
    public function get_all($where = false)
    {
        if($where) {
            $this->db->where($this->table.'.name', $where);
        }
        $query = $this->db->get($this->table);
        return $query;
    }
}
