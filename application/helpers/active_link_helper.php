<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * @param $sum jumlah data url dan name
 * @param $type class
 * @param $url1 url pertama
 * @param $name1 name pertama
 */

function active_($sum, $type, $url1, $name1, $url2=false, $name2=false,
                                             $url3=false, $name3=false,
                                             $url4=false, $name4=false)
{
    $type1 = 'class="active"';
    $type2 = 'active';

    if($sum==1){
        if ($url1 == $name1) {
            if($type==1){
                $output = $type1;
            } else {
                $output = $type2;
            }
        } else {
            $output = '';
        }
    } else if($sum==2){
        if ($url1 == $name1 or $url2 == $name2) {
            if($type==1){
                $output = $type1;
            } else {
                $output = $type2;
            }
        } else {
            $output = '';
        }
    } else if($sum==3){
        if ($url1 == $name1 or $url2 == $name2 or $url3 == $name3) {
            if($type==1){
                $output = $type1;
            } else {
                $output = $type2;
            }
        } else {
            $output = '';
        }
    } else if($sum==4){
        if ($url1 == $name1 or $url2 == $name2 or $url3 == $name3 or $url4 == $name4) {
            if($type==1){
                $output = $type1;
            } else {
                $output = $type2;
            }
        } else {
            $output = '';
        }
    }
    return $output; //hasil
}
