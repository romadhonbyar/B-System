<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//untuk mengetahui bulan bulan

	function humToun(){
		$human = date('Y-m-d H:i:s');
		$uth = human_to_unix($human);
		//$dt = new DateTime($uth);
		//$tz = new DateTimeZone('Asia/Jakarta'); // or whatever zone you're after
		//$dt->setTimezone($tz);
		return $output = $uth;
	}