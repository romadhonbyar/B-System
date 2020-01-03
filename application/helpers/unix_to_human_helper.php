<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//untuk mengetahui bulan bulan

	function unTohum($unix){
		$uth = unix_to_human($unix);
		$dt = new DateTime($uth);
		$tz = new DateTimeZone('Asia/Jakarta'); // or whatever zone you're after
		$dt->setTimezone($tz);
		return $output = $dt->format('Y-m-d H:i:s');
	}