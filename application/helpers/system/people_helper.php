<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Fungsi Tambahan Untuk Aplikasi
 * @author Ahmad Romadhon
 */
function whoIs($id = false, $type = false)
{
    $ci = &get_instance();

    $ci->db->select('full_name, email, username');
    $ci->db->where('users.id', $id);
    $ci->db->limit(1);
    $query = $ci->db->get('users');
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            if ($type == 'full_name') {
                $output = $row->full_name;
            } elseif ($type == 'email') {
                $output = $row->email;
            } elseif ($type == 'username') {
                $output = $row->username;
            } else {
                $output = '?';
            }
            return $output; //hasil
        }
    } else {
        return '-';
    }
}

function whoIsUn($id = false)
{
    $ci = &get_instance();

    $ci->db->select('unique_id');
    $ci->db->where('users.id', $id);
    $ci->db->limit(1);
    $query = $ci->db->get('users');
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $output = $row->unique_id;
            return $output; //hasil
        }
    } else {
        return '-';
    }
}

function whatIsThis($table, $id, $attribute_id, $attribute_select)
{
    $ci = &get_instance();

    $ci->db->select($attribute_select);
    $ci->db->where($table . '.' . $attribute_id, $id);
    $ci->db->limit(1);
    $query = $ci->db->get($table);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $output = $row->$attribute_select;
            return $output; //hasil
        }
    } else {
        return '-';
    }
}