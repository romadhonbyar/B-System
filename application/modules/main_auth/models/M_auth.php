<?php if (!defined('BASEPATH')) {
    exit('Hacking Attempt: Keluar dari sistem...!');
}
class M_auth extends CI_Model
{
    protected $table = "users_detail";

    public function __construct()
    {
        parent::__construct();
    }

    public function _insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
