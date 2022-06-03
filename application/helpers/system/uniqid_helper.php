<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function unique_($limit)
{
    $unique = substr(uniqid(rand(), true), $limit, $limit);
    return $unique; //hasil
}
