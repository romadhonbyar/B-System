<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * @author Ahmad Romadhon <rombyar.blogspot.com>, 2019
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

function formatUang ($nominal)
{
    return 'Rp ' . number_format($nominal, 0, '.', '.');
}

function formatAngka ($angka = '')
{
    $jumlah_desimal = '0';
    $pemisah_desimal = '';
    $pemisah_ribuan = '.';

    $output = number_format(
        $angka,
        $jumlah_desimal,
        $pemisah_desimal,
        $pemisah_ribuan
    );

    return $output; //hasil
}