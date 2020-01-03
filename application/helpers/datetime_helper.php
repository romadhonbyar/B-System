<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

//untuk setting datetime

function date_time()
{
    $output = gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);
    return $output; //hasil
}
function date_()
{
    $output = gmdate('m/d/Y', time() + 60 * 60 * 7);
    return $output; //hasil
}
function time_()
{
    $output = gmdate('H:i:s', time() + 60 * 60 * 7);
    return $output; //hasil
}

function date_plus($sd, $day)
{
    $output = date('d/m/Y', strtotime('+' . $day . ' days', strtotime(str_replace('/', '-', $sd))));
    return $output; //hasil
}

function date_indo($date, $s)
{

    $day_name = date('D', strtotime($date));
    $day = date('d', strtotime($date));
    $month_name = date('M', strtotime($date));
    $year = date('Y', strtotime($date));

    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu',
    );
    $day_ID = $dayList[$day_name];

    $monthList = array(
        'Jan' => 'Jan',
        'Feb' => 'Feb',
        'Mar' => 'Mar',
        'Apr' => 'Apr',
        'May' => 'Mei',
        'Jun' => 'Jun',
        'Jul' => 'Jul',
        'Aug' => 'Ags',
        'Sep' => 'Sep',
        'Oct' => 'Okt',
        'Nov' => 'Nov',
        'Dec' => 'Des',
    );
    $month_ID = $monthList[$month_name];
    if ($s == "1") {
        return $day_ID . ', ' . $day . ' ' . $month_ID . ' ' . $year; //hasil
    } elseif ($s == "2") {
        return $day . ' ' . $month_ID . ' ' . $year; //hasil
    }
}

function dateFormat($originalDate, $format){
	$newDate = date($format, strtotime($originalDate));
	return $newDate;
}
