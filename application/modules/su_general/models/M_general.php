<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class M_general extends CI_Model
{
    protected $_table_1 = "wai_provinces";
    protected $_table_2 = "wai_regencies";
    protected $_table_3 = "wai_districts";

    public function __construct()
    {
        parent::__construct();
        if ($this->ion_auth->logged_in()) {
            $user = $this->ion_auth->user()->row();
            $this->username = $user->username;
        }
    }

    /* Other Combobox */
    public function get_provinces()
    {
        $query = $this->db->get($this->_table_1);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function get_regencies($id_provinces = false)
    {
        if ($id_provinces) {
            $this->db->not_like('wai_regencies.name_regencies', 'KABUPATEN'); // Hanya Kota Saja yang muncul
            $this->db->where('wai_regencies.province_id', $id_provinces);
            $query = $this->db->get($this->_table_2);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        }
    }
    public function get_districts($id_regencies = false)
    {
        if ($id_regencies) {
            $this->db->where('wai_districts.regency_id', $id_regencies);
            $query = $this->db->get($this->_table_3);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        }
    }
}
