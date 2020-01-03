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
$route['login'] = 'su_auth/login';
$route['login/(:any)'] = 'su_auth/login/$1';
$route['logout'] = 'su_auth/logout';
$route['register'] = 'su_auth/register';
$route['register/ajax'] = 'su_auth/register_ajax';
$route['forgot'] = 'su_auth/forgot_password';
$route['update/profile/(:any)'] = 'su_manage/update_profile/$1';

/* dashboard */
$route['dashboard'] = 'su_copanel/dashboard';
$route['language/(:any)'] = 'su_copanel/language/$1';
$route['language/(:any)/(:any)'] = 'su_copanel/language/$1/$2';

/* su_manage */
$route['manage/list/users'] = 'su_manage/main/list_user';
$route['manage/add/users'] = 'su_manage/main/add_user';
$route['manage/edit/users/(:any)'] = 'su_manage/main/edit_user/$1';

$route['c_data/c_manage_users_staff/(:any)'] = 'su_manage/c_data/c_manage_users_staff/$1';
$route['c_data/c_manage_users_staff/(:any)/(:any)'] = 'su_manage/c_data/c_manage_users_staff/$1/$2';

//=====//
$route['manage/list/groups'] = 'su_manage/main/list_group';
$route['manage/add/groups'] = 'su_manage/main/add_group';
$route['manage/edit/groups/(:any)'] = 'su_manage/main/edit_group/$1';
$route['manage/permissions/groups/(:any)'] = 'su_manage/main/group_permissions/$1';

$route['c_data/c_manage_groups/(:any)'] = 'su_manage/c_data/c_manage_groups/$1';
$route['c_data/c_manage_groups/(:any)/(:any)'] = 'su_manage/c_data/c_manage_groups/$1/$2';


//=====//
$route['manage/list/permissions'] = 'su_manage/main/list_permission';
$route['manage/add/permissions'] = 'su_manage/main/add_permission';
$route['manage/edit/permissions/(:any)'] = 'su_manage/main/edit_permission/$1';

$route['c_data/c_manage_permissions/(:any)'] = 'su_manage/c_data/c_manage_permissions/$1';
$route['c_data/c_manage_permissions/(:any)/(:any)'] = 'su_manage/c_data/c_manage_permissions/$1/$2';


/*
$route['user/act/(:any)'] = 'su_manage/activate/$1';
$route['user/deact/(:any)'] = 'su_manage/deactivate/$1';

$route['user/permissions/(:any)'] = 'su_manage/user_permissions/$1';

$route['c_data/c_manage_users_member/(:any)'] = 'su_manage/c_data/c_manage_users_member/$1';

$route['group/add'] = 'su_manage/add_group';
$route['group/edit/(:any)'] = 'su_manage/update_group/$1';
$route['group/permissions/(:any)'] = 'su_manage/group_permissions/$1';
$route['c_data/c_manage_groups/(:any)'] = 'su_manage/c_data/c_manage_groups/$1';
$route['c_data/c_manage_groups/(:any)/(:any)'] = 'su_manage/c_data/c_manage_groups/$1/$2';

$route['permission/add'] = 'su_manage/add_permission';
$route['permission/edit/(:any)'] = 'su_manage/update_permission/$1';
$route['c_data/c_manage_permissions/(:any)'] = 'su_manage/c_data/c_manage_permissions/$1';
$route['c_data/c_manage_permissions/(:any)/(:any)'] = 'su_manage/c_data/c_manage_permissions/$1/$2';
*/

/* other */
$route['default_controller'] = 'su_auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
