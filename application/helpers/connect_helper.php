<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	// cek koneksi internet
    function is_connected(){
        $connected = @fsockopen("www.google.co.id", 80); //website, port  (try 80 or 443)
        if ($connected){
            $is_conn = true; //action when connected
            fclose($connected);
        }else{
            $is_conn = false; //action in connection failure
        }
        return $is_conn;
    }