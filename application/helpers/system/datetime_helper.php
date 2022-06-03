<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

//untuk setting datetime

function split_date ($date, $type)
{
    $time = strtotime($date);
    if ($type == 'd') {
        $output = date('d', $time); //day
    } elseif ($type == 'm') {
        $output = date('m', $time); //month
    } elseif ($type == 'Y') {
        $output = date('Y', $time); //year
    }
    return $output;
}

function diffDate ($start, $end, $type)
{
    $startOut = new DateTime($start);
    if ($end) {
        $endOut = new DateTime($end);
    } else {
        $endOut = new DateTime();
    }
    
    $dateInterval = $endOut->diff($startOut);
    
    if ($type == "tahun") {
        $output = $dateInterval->y;
    } elseif ($type == "bulan") {
        $output = $totalMonths = 12 * $dateInterval->y + $dateInterval->m;
    } elseif ($type == "hari") {
        $output = $dateInterval->days;
    }
    
    return $output;
}

function date_time()
{
    $output = gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);
    return $output; //hasil
}
function date_($format = "Y-m-d")
{
    $output = gmdate($format, time() + 60 * 60 * 7);
    return $output; //hasil
}
function time_()
{
    $output = gmdate('H:i:s', time() + 60 * 60 * 7);
    return $output; //hasil
}

function date_plus($sd, $format, $day, $time = false)
{
    if ($time) {
        $output = date($format, strtotime('' . $day . ' days', strtotime($sd)));
    } else {
        $output = date(
            $format,
            strtotime(
                '' . $day . ' days',
                strtotime(str_replace('/', '-', $sd))
            )
        );
    }
    return $output; //hasil
}

function date_indo($date, $type)
{
    $day_name = date('D', strtotime($date));
    $day = date('d', strtotime($date));
    $month_name = date('M', strtotime($date));
    $year = date('Y', strtotime($date));

    $dayList = [
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu',
    ];
    $day_ID = $dayList[$day_name];

    $monthList = [
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
    ];

    $monthListLong = [
        'Jan' => 'Januari',
        'Feb' => 'Februari',
        'Mar' => 'Maret',
        'Apr' => 'April',
        'May' => 'Mei',
        'Jun' => 'Juni',
        'Jul' => 'Juli',
        'Aug' => 'Agustus',
        'Sep' => 'September',
        'Oct' => 'Oktober',
        'Nov' => 'November',
        'Dec' => 'Desember',
    ];

    $month_ID = $monthListLong[$month_name];
    
    if ($type == 'hari') {
        return $day_ID . ', ' . $day . ' ' . $month_ID . ' ' . $year; //hasil
    } elseif ($type == 'no_hari') {
        return $day . ' ' . $month_ID . ' ' . $year; //hasil
    }
}

function dateNameMonth($number_month)
{
    $monthList = [
        '1' => 'Jan',
        '2' => 'Feb',
        '3' => 'Mar',
        '4' => 'Apr',
        '5' => 'Mei',
        '6' => 'Jun',
        '7' => 'Jul',
        '8' => 'Ags',
        '9' => 'Sep',
        '10' => 'Okt',
        '11' => 'Nov',
        '12' => 'Des',
    ];

    return $monthList[$number_month];
}

function dateFormat($originalDate, $format)
{
    $newDate = date($format, strtotime($originalDate));
    return $newDate;
}
