<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

//untuk enkripsi ID
function encodeID($id)
{
    $ci =& get_instance();
    $key = "NbcW10tYnQlKB6Zp1kVs3aqG7zkyXeu0"; //ganti jadi dinamis
    $id_user_encode = $ci->encrypt->encode($id, $key, true);
    return $id_user_encode;
}
function decodeID($id)
{
    $ci =& get_instance();
    $key = "NbcW10tYnQlKB6Zp1kVs3aqG7zkyXeu0"; //ganti jadi dinamis
    $id_user_encode = $ci->encrypt->decode($id, $key, true);
    return $id_user_encode;
}
