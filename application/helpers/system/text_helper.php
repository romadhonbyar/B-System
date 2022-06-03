<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * @author Ahmad Romadhon <rombyar.blogspot.com>, 2019
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

function genCodeName($value = '')
{
    $ci = &get_instance();
    $code1 = substr($value, 0, -2);
    $query1 = $ci->db
        ->where('groups.code', $code1)
        ->limit(1)
        ->get('groups');

    $code2 = substr($value, 0, -1);
    $query2 = $ci->db
        ->where('groups.code', $code2)
        ->limit(1)
        ->get('groups');

    $code3 = substr($value, 0);
    $query3 = $ci->db
        ->where('groups.code', $code3)
        ->limit(1)
        ->get('groups');

    if ($query1->num_rows() != 1) {
        $output = $code1;
    } elseif ($query2->num_rows() != 1) {
        $output = $code2; // Jika
    } elseif ($query3->num_rows() != 1) {
        $output = $code3; // Jika
    }

    return strtoupper($output);
}

function genInisial($name)
{
    $arr = explode(' ', $name);
    $singkatan = '';
    foreach ($arr as $kata) {
        $singkatan .= substr($kata, 0, 1);
    }

    return $singkatan;
}

function getExtension($name)
{
    $pi = pathinfo($name);
    return $pi['extension'];
}

function cutText($text, $limit)
{
    $text_potongan = substr($text, 0, $limit);
    return $text_potongan . '...';
}

function remUnderScore($value = '')
{
    return $replace = str_replace('_', ' ', $value);
}

function groupBadge($group_name)
{
    $ci = &get_instance();
    $ci->db->where('groups.name', $group_name);
    $query = $ci->db->get('groups')->result();

    $name = '';
    $output = '';
    foreach ($query as $key => $value) {
        $gid = $value->id;
        $gname = $value->name;

        if ($gid == 1) {
            $output =
                '<span class="badge badge-primary">' .
                remUnderScore($group_name) .
                '</span>';
        } elseif ($gid == 2) {
            $output =
                '<span class="badge badge-warning">' .
                remUnderScore($group_name) .
                '</span>';
        } else {
            $output =
                '<span class="badge badge-secondary">' .
                remUnderScore($group_name) .
                '</span>';
        }
    }

    return $output;
}

function statusBadge($status)
{
    if ($status==1) {
        $output = '<span class="badge badge-success">Active</span>';
    } elseif ($status==0) {
        $output = '<span class="badge badge-danger">Non-active</span>';
    }

    return $output;
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '-');
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // lowercase
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

function slugify_under($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '_');
    // remove duplicate -
    $text = preg_replace('~-+~', '_', $text);
    // lowercase
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

/** Fungsi untuk mengubah nomor handphone */
function genChangePhone($number, $type)
{
    if ($type == "code") {
        return str_replace(" ", "", preg_replace('/^0/', '62', $number));
    } elseif ($type == "normal") {
        return str_replace(" ", "", preg_replace('/^62/', '0', $number));
    } else {
        return "-";
    }
}