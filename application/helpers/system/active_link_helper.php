<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * @param $sum jumlah data url dan name
 * @param $type class
 * @param $url1 url pertama
 * @param $name1 name pertama
 * @author Ahmad Romadhon <rombyar.blogspot.com>, 2020
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

function active_(
    $sum,
    $type,
    $operator,

    $url1,
    $name1,
    $url2 = false,
    $name2 = false,
    $url3 = false,
    $name3 = false,
    $url4 = false,
    $name4 = false
) {
    $type1 = 'class="active"';
    $type2 = 'active';

    if ($sum == 1) {
        if ($url1 == $name1) {
            if ($type == 1) {
                $output = $type1;
            } else {
                $output = $type2;
            }
        } else {
            $output = '';
        }
    } elseif ($sum == 2) {
        if($operator == "or") {
            if ($url1 == $name1 or 
                $url2 == $name2) {
                if ($type == 1) {
                    $output = $type1;
                } else {
                    $output = $type2;
                }
            } else {
                $output = '';
            }
        } else {
            if ($url1 == $name1 and 
                $url2 == $name2) {
                if ($type == 1) {
                    $output = $type1;
                } else {
                    $output = $type2;
                }
            } else {
                $output = '';
            }
        }
    } elseif ($sum == 3) {
        if ($operator == "or") {
            if ($url1 == $name1 or
                $url2 == $name2 or
                $url3 == $name3) {
                if ($type == 1) {
                    $output = $type1;
                } else {
                    $output = $type2;
                }
            } else {
                $output = '';
            }
        } else {
            if ($url1 == $name1 and
                $url2 == $name2 and
                $url3 == $name3) {
                if ($type == 1) {
                    $output = $type1;
                } else {
                    $output = $type2;
                }
            } else {
                $output = '';
            }
        }
    } elseif ($sum == 4) {
        if ($operator == "or") {
            if ($url1 == $name1 or
                $url2 == $name2 or
                $url3 == $name3 or
                $url4 == $name4) {
                if ($type == 1) {
                    $output = $type1;
                } else {
                    $output = $type2;
                }
            } else {
                $output = '';
            }
        } else {
            if ($url1 == $name1 and
                $url2 == $name2 and
                $url3 == $name3 and
                $url4 == $name4) {
                if ($type == 1) {
                    $output = $type1;
                } else {
                    $output = $type2;
                }
            } else {
                $output = '';
            }
        }
    }
    return $output; //hasil
}
