<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_num_ extends CI_Model{
	function __construct(){
		parent::__construct();
		if ($this->ion_auth->logged_in()){
			$user=$this->ion_auth->user()->row();
			$this->username=$user->username;
		}
	}
	
	//Jumlah Member
	public function get_num_member($status_member=false){
		$this->db->join('users_detail', 'users.id = users_detail.id_user', 'left');
		if($status_member=="1"){$this->db->where('users_detail.status_member',$status_member);} // member aktif
		elseif($status_member=="2"){$this->db->where('users_detail.status_member',$status_member);} // member tidak aktif
		$this->db->where('users.user_type',"02");
		$query = $this->db->get('users');
		return $query->num_rows();
	}
}