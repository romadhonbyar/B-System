<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */

/* Auth */
$route['login'] = 'main_auth/main/login';
$route['logout'] = 'main_auth/main/logout';
$route['register'] = 'main_auth/main/register';
$route['forgot-password'] = 'main_auth/main/forgot_password';
$route['reset-password/(:any)'] = 'main_auth/main/reset_password/$1';
$route['update/profile/(:any)'] = 'main_manage/update_profile/$1';

/* dashboard */
$route['dashboard'] = 'main_dashboard/main/dashboard';
$route['detail/(:any)/(:any)'] = 'main_dashboard/main/detail//$1/$2'; //detail for all

/* =========== main_manage ============ */
/* ==================================== */
/* USERS */
$route['manage/user/list'] = 'main_manage/main/list_user';
$route['manage/user/add'] = 'main_manage/main/user_add';
$route['manage/user/edit/(:any)'] = 'main_manage/main/user_edit/$1';

$route['c_data/c_manage_user/(:any)'] = 'main_manage/c_data/c_manage_user/$1';
$route['c_data/c_manage_user/(:any)/(:any)'] = 'main_manage/c_data/c_manage_user/$1/$2';

/* GROUPS */
$route['manage/group/list'] = 'main_manage/main/list_group';
$route['manage/group/add'] = 'main_manage/main/add_group';
$route['manage/group/edit/(:any)'] = 'main_manage/main/edit_group/$1';
$route['manage/group/permission/(:any)'] = 'main_manage/main/group_permission/$1';

$route['c_data/c_manage_group/(:any)'] = 'main_manage/c_data/c_manage_group/$1';
$route['c_data/c_manage_group/(:any)/(:any)'] = 'main_manage/c_data/c_manage_group/$1/$2';

$route['c_data/c_manage_group_permission/(:any)'] = 'main_manage/c_data/c_manage_group_permission/$1';
$route['c_data/c_manage_group_permission/(:any)/(:any)'] = 'main_manage/c_data/c_manage_group_permission/$1/$2';

/* PERMISSIONS  */
$route['manage/permission/list'] = 'main_manage/main/list_permission';
$route['manage/permission/add'] = 'main_manage/main/add_permission';
$route['manage/permission/edit/(:any)'] = 'main_manage/main/edit_permission/$1';

$route['c_data/c_manage_permission/(:any)'] = 'main_manage/c_data/c_manage_permission/$1';
$route['c_data/c_manage_permission/(:any)/(:any)'] = 'main_manage/c_data/c_manage_permission/$1/$2';


/* other */
$route['default_controller'] = 'main_auth/main/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;
