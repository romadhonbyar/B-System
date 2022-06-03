<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Ivan Tcholakov <ivantcholakov@gmail.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

if (!function_exists('gravatar')) {
    // This helper function has been added here for compatibility with PyroCMS.
    function my_gravatar(
        $email = '',
        $size = 50,
        $rating = 'g',
        $url_only = false,
        $default = false,
        $class,
        $for
    ) {
        $ci = &get_instance();
        $ci->load->library('gravatar');
        if (@(string) $default == '') {
            $default = null;
        }
        $gravatar_url = $ci->gravatar->get(
            $email,
            $size,
            $default,
            null,
            $rating
        );
        if ($url_only) {
            return $gravatar_url;
        }
        //return '<img src="'.$gravatar_url.'" alt="Gravatar" class="gravatar" />';
        if ($for == 'profile') {
            return '<img alt="image" src="' .
                $gravatar_url .
                '" class="' .
                $class .
                '">';
        } elseif ($for == 'comment') {
            return '<img alt="image" src="' .
                $gravatar_url .
                '" class="' .
                $class .
                '" width="60">';
        }
    }
}
