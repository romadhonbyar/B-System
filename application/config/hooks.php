<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller_constructor'] = [
    'class' => 'LanguageLoader',
    'function' => 'initialize',
    'filename' => 'LanguageLoader.php',
    'filepath' => 'hooks',
];

/*$hook['display_override'][] = [
    'class' => '',
    'function' => 'compress',
    'filename' => 'compress.php',
    'filepath' => 'hooks',
];*/

$hook['post_controller_constructor'][] = [
    'function' => 'redirect_ssl',
    'filename' => 'ssl.php',
    'filepath' => 'hooks',
];

// Use this code if your .env files on *CodeIgniter ROOT* folder
$hook['pre_system'] = function () {
    $dotenv = Dotenv\Dotenv::create(FCPATH);
    $dotenv->load();
};
