<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//untuk mengetahui full_name dengan id_user

	function whereIs_pro($id = FALSE){ //Provinsi
		$ci =& get_instance();
		
		$ci->db->select('name_provinces');
		$ci->db->where('wai_provinces.id_provinces', $id);
		$ci->db->limit(1);
		$query = $ci->db->get('wai_provinces');
	    if ($query->num_rows() > 0){
	        foreach($query->result_array() as $row){
				return $row['name_provinces']; //hasil
	        }
	    }else{
			return '-';
		}
	}
	function whereIs_reg($id = FALSE){ // Kota/Kabupaten
		$ci =& get_instance();
		
		$ci->db->select('name_regencies');
		$ci->db->where('wai_regencies.id_regencies', $id);
		$ci->db->limit(1);
		$query = $ci->db->get('wai_regencies');
	    if ($query->num_rows() > 0){
	        foreach($query->result_array() as $row){
				return $row['name_regencies']; //hasil
	        }
	    }else{
			return '-';
		}
	}
	function whereIs_dis($id = FALSE){ // Kecamatan
		$ci =& get_instance();
		
		$ci->db->select('name_districts');
		$ci->db->where('wai_districts.id_districts', $id);
		$ci->db->limit(1);
		$query = $ci->db->get('wai_districts');
	    if ($query->num_rows() > 0){
	        foreach($query->result_array() as $row){
				return $row['name_districts']; //hasil
	        }
	    }else{
			return '-';
		}
	}
	function whereIs_comArea($id = FALSE){ // Komisi Area		
	    if($id==1){
			return 'JADEBEK (Jakarta-Depok-Bekasi)';
	    }else{
			return 'Luar Kota';
		}
	}