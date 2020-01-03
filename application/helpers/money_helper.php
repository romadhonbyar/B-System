<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//untuk mengubah string jadi bentuk duit
	function duit($angka = "", $size, $tag=FALSE){
		$jumlah_desimal ="0";
		$pemisah_desimal ="";
		$pemisah_ribuan =".";

		if($tag=="y"){
			$output = "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
		}else{
			$output = "<span style='font-size:".$size."px;'>Rp</span> ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
		}
		return $output; //hasil
	}