<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_manage_users extends CI_Model{
	protected $table = "users";
	var $column = array(
						'users.unique_us',
						'users.username',
						'users.full_name', //sesuaikan dengan tabel agar dapat di sort A-Z atau Z-A
						'users.email',
						'users.phone',
						'users.last_login',
						'groups.name',
						);
	var $order = array('users.id' => 'desc');

	function __construct(){
		parent::__construct();
		if ($this->ion_auth->logged_in()){
			$user=$this->ion_auth->user()->row();
			$this->username=$user->username;
		}
	}

	private function _get_datatables_query(){
		$this->db->select('*,users.id as id_staff');
		$this->db->from($this->table);
		$i = 0;

		foreach ($this->column as $item){
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
			//$this->db->not_like($this->table.'.user_type',"01"); // no root view
			//$this->db->not_like($this->table.'.user_type',"03"); // no root view
			$this->db->not_like('users.username',"root"); // no root view
		}

		$this->db->join('users_groups', 'users_groups.user_id = users.id', 'left');
		$this->db->join('groups', 'groups.id = users_groups.group_id', 'left');
		$this->db->join('users_detail', 'users_detail.id_user = users.id', 'left');

		if(isset($_POST['order'])){
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables(){
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);

		//$this->db->join('users_groups', 'users_groups.user_id = users.id', 'left');
		//$this->db->join('groups', 'groups.id = users_groups.group_id', 'left');
		//$this->db->join('users_detail', 'users_detail.id_user = users.id', 'left');
		//$this->db->not_like('users.user_type',"01"); // no root view
		//$this->db->not_like('users.user_type',"03"); // no root view
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->_get_datatables_query();
		//$this->db->not_like('users.user_type',"01"); // no root view
		//$this->db->not_like('users.user_type',"03"); // no root view
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->db->from($this->table);
		//$this->db->not_like('users.user_type',"01"); // no root view
		//$this->db->not_like('users.user_type',"03"); // no root view
		return $this->db->count_all_results();
	}

	public function get_by_id($id_user){
		$this->db->from($this->table);
		$this->db->where('users.id',$id_user);
		$this->db->join('users_detail', 'users.id = users_detail.id_user', 'left');
		//$this->db->join('users_groups', 'users.id = users_groups.user_id', 'left');
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data){
		$this->db->update($this->table, $data, 'id = '.$where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_user){
		$this->db->where('users.unique_us', $id_user);
		$this->db->delete($this->table);
	}

	/* Other */
	public function get_id_name_group(){
		$this->db->not_like('groups.name',"unknown"); // no unknown view
		$this->db->not_like('groups.name',"root"); // no root view
		$query = $this->db->get('groups');
		return $query->result();
	}
}
