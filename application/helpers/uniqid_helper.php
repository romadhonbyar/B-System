<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//untuk mengetahui bulan bulan

	function unique_(){
		$unique = substr(uniqid(rand(), true), 7, 7);
		return $unique; //hasil
	}
