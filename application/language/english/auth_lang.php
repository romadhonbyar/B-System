<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* addd:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login "done"
$lang['login_title']           = 'Login System';
$lang['login_heading']         = 'Login';
$lang['login_subheading']      = 'Please login with your username and password below.';
$lang['login_ending']          = 'System';
$lang['login_identity_label']  = 'Username';
$lang['login_password_label']  = 'Password';
$lang['login_remember_label']  = 'Remember Me';
$lang['login_submit_btn']      = 'Login';
$lang['login_forgot_password'] = 'Forgot your password?';

// Logout "done"
$lang['logout_title']           = 'Logout System';
$lang['logout_submit_btn']      = 'Logout';
$lang['logout_failed']          = 'There was an error logging you out';

// Forgot Password
$lang['forgot_password_title']                   = 'Forgot Password';
$lang['forgot_password_heading']                 = 'Forgot Password';
$lang['forgot_password_subheading']              = 'Please enter your %s so we can send you an email to reset your password.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Submit';
$lang['forgot_password_validation_email_label']  = 'Email Address';
$lang['forgot_password_identity_label']          = 'Email Address';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'No record of that email address.';

// Reset Password
$lang['reset_password_title']                                 = 'Change Password';
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';

//=======================

// Dashboard "done"
$lang['dashboard_title']        = 'Dashboard'; 
$lang['dashboard_heading_content']        = 'Dashboard'; 
$lang['dashboard_heading_content_small']  = 'Summary'; 

//=======================
// Activate User *edit
$lang['activate_heading']                  = 'Activate User'; 
$lang['activate_subheading']               = 'Are you sure you want to activate the user?'; 
$lang['activate_confirmation_heading']     = 'Activate User Confirmation'; 
$lang['activate_confirmation_subheading']  = 'Are you sure you want to activate the user?'; 
//$lang['activate_confirm_y_label']          = 'Yes'; 
//$lang['activate_confirm_n_label']          = 'No'; 
//$lang['activate_submit_btn']               = 'Submit'; 
//$lang['activate_validation_confirm_label'] = 'confirmation'; 
//$lang['activate_validation_user_id_label'] = 'user ID'; 

// Deactivate User
$lang['deactivate_heading']                  = 'Deactivate User';
$lang['deactivate_subheading']               = 'Are you sure you want to deactivate the user?';
$lang['deactivate_confirmation_heading']     = 'Deactivate User Confirmation'; 
$lang['deactivate_confirmation_subheading']  = 'Are you sure you want to deactivate the user?'; 
//$lang['deactivate_confirm_y_label']          = 'Yes';
//$lang['deactivate_confirm_n_label']          = 'No';
//$lang['deactivate_submit_btn']               = 'Submit';
//$lang['deactivate_validation_confirm_label'] = 'confirmation';
//$lang['deactivate_validation_user_id_label'] = 'user ID';

// Manage Heading (Fix)
$lang['manage_saved']                           = 'Successfully saved!'; 
$lang['manage_heading_content']                 = 'Manage'; 
$lang['manage_heading_content_add']             = 'Add'; 
$lang['manage_heading_content_edit']            = 'Edit'; 
$lang['manage_heading_content_permission']      = 'Permission'; 

$lang['manage_user_staff_title']                = 'Manage Staffs'; 
$lang['manage_user_member_title']               = 'Manage Members'; 
$lang['manage_groups_title']                    = 'Manage Groups'; 
$lang['manage_permissions_title']               = 'Manage Permissions'; 
$lang['manage_packet_title']                    = 'Manage Packet'; 
$lang['manage_commission_formula_title']        = 'Manage Commission Formula'; 

$lang['manage_subheading_content_staff']           = 'This is the page for manage Staffs data'; 
$lang['manage_subheading_content_member']          = 'This is the page for manage Members data'; 
$lang['manage_subheading_content_group']           = 'This is the page for manage Groups data'; 
$lang['manage_subheading_content_permission']      = 'This is the page for manage Permissions data'; 

$lang['manage_heading_add_staff']           = 'Add Staff'; 
$lang['manage_heading_add_member']          = 'Add Member'; 
$lang['manage_heading_add_group']           = 'Add Group'; 
$lang['manage_heading_add_permission']      = 'Add Permission'; 

$lang['manage_heading_edit_staff']           = 'Edit Staff'; 
$lang['manage_heading_edit_member']          = 'Edit Member'; 
$lang['manage_heading_edit_group']           = 'Edit Group'; 
$lang['manage_heading_edit_permission']      = 'Edit Permission'; 

$lang['manage_subheading_add_staff']           = 'This is a page to add Staff data'; 
$lang['manage_subheading_add_member']          = 'This is a page to add Member data'; 
$lang['manage_subheading_add_group']           = 'This is a page to add Group data'; 
$lang['manage_subheading_add_permission']      = 'This is a page to add Permission data'; 

$lang['manage_subheading_edit_staff']           = 'This is a page to edit Staff data'; 
$lang['manage_subheading_edit_member']          = 'This is a page to edit Member data'; 
$lang['manage_subheading_edit_group']           = 'This is a page to edit Group data'; 
$lang['manage_subheading_edit_permission']      = 'This is a page to edit Permission data'; 

$lang['manage_heading_permissions_group']       = 'Edit Permission Group'; 
$lang['manage_subheading_permissions_group']    = 'This is a page to Edit Permission Group'; 

$lang['manage_heading_breadcrumb_staff']           = 'Manage Staffs'; 
$lang['manage_heading_breadcrumb_member']          = 'Manage Members'; 
$lang['manage_heading_breadcrumb_group']           = 'Manage Groups'; 
$lang['manage_heading_breadcrumb_permission']      = 'Manage Permissions'; 

//Manage Table  
$lang['manage_table_list_heading_staff']            = 'Table Staffs'; 
$lang['manage_table_list_subheading_staff']         = 'This is the Staffs list.'; 
$lang['manage_table_list_heading_member']            = 'Table Members'; 
$lang['manage_table_list_subheading_member']         = 'This is the Members list.'; 
$lang['manage_table_list_heading_group']            = 'Table Groups'; 
$lang['manage_table_list_subheading_group']         = 'This is the Groups list.'; 
$lang['manage_table_list_heading_permission']            = 'Table Permissions'; 
$lang['manage_table_list_subheading_permission']         = 'This is the Permissions list.'; 


/**##################### ACTION ##################### */
// add User Staff
$lang['manage_add_staff_title']                = 'Manage | Add Staff';
$lang['manage_add_staff_form_heading']         = 'Add Staff';
$lang['manage_add_staff_form_subheading']      = 'Please enter the Staff information below.';
$lang['manage_add_staff_form_explanation']      = 'Explanation of staff added form';

$lang['manage_add_staff_fullname_label']       = 'Full Name'; 
$lang['manage_add_staff_phone_label']          = 'Phone';
$lang['manage_add_staff_email_label']          = 'E-mail';
$lang['manage_add_staff_address_label']        = 'Address';
$lang['manage_add_staff_member_of_group_label']= 'Member of groups';
$lang['manage_add_staff_click_save_label']     = 'Click Save';
$lang['manage_add_staff_button_back_label']     = 'Button back';
$lang['manage_add_staff_view_data_label']     = 'View data';
$lang['manage_add_staff_username_auto_label']     = 'Username Auto';
$lang['manage_add_staff_password_auto_label']     = 'Password Auto';

$lang['manage_add_staff_fullname_validation']       = 'Full Name'; 
$lang['manage_add_staff_phone_validation']          = 'Phone';
$lang['manage_add_staff_email_validation']          = 'E-mail';
$lang['manage_add_staff_address_validation']        = 'Address';
$lang['manage_add_staff_member_of_group_validation']= 'Member of groups';

$lang['manage_add_staff_fullname_placeholder']       = 'Please enter the full name of the staff'; 
$lang['manage_add_staff_phone_placeholder']          = "Please enter the staff active telephone number";
$lang['manage_add_staff_email_placeholder']          = "Please enter an active and unique staff email address";
$lang['manage_add_staff_address_placeholder']        = 'Please enter the full address of the staff';
$lang['manage_add_staff_member_of_group_placeholder']= 'Select group';

$lang['manage_add_staff_fullname_explanation']       = 'Please enter the full name of the staff'; 
$lang['manage_add_staff_phone_explanation']          = "Please enter the staff active telephone number";
$lang['manage_add_staff_email_explanation']          = "Please enter an active and unique staff email address";
$lang['manage_add_staff_address_explanation']        = 'Please enter the full address of the staff';
$lang['manage_add_staff_member_of_group_explanation']= 'Select group';
$lang['manage_add_staff_click_save_explanation']     = 'After all is filled, click save button to save staff data.';
$lang['manage_add_staff_button_back_explanation']    = 'The back button works for the <a href="'.site_url('manage/users/staff').'">staff data</a> page.';
$lang['manage_add_staff_view_data_explanation']      = 'To see the staff data already saved, please go to the <a href="'.site_url('manage/users/staff').'">staff data</a> page.';
$lang['manage_add_staff_username_auto_explanation']  = 'Username created automatically from full name.';
$lang['manage_add_staff_password_auto_explanation']  = 'Passwords are generated automatically. Password in general: <b><i>difa12345</i></b>.';

//$lang['manage_add_staff_success'] = 'Successfully added!';
//$lang['manage_add_staff_fail'] = 'Failed to add!';

// Edit User Staff
$lang['manage_edit_staff_title']                = 'Manage | Edit Staff';
$lang['manage_edit_staff_form_heading']         = 'Edit Staff';
$lang['manage_edit_staff_form_subheading']      = 'Please enter the Staff information below.';
$lang['manage_edit_staff_confirmation_heading']   = 'Edit Staff Confirmation'; 
$lang['manage_edit_staff_confirmation_subheading']= 'Are you sure you want to edit the Staff?'; 
$lang['manage_edit_staff_form_explanation']     = 'Explanation form change staff data';

$lang['manage_edit_staff_fullname_label']       = 'Full Name'; 
$lang['manage_edit_staff_username_label']       = 'Username'; 
$lang['manage_edit_staff_phone_label']          = 'Phone';
$lang['manage_edit_staff_email_label']          = 'E-mail';
$lang['manage_edit_staff_address_label']        = 'Address';
$lang['manage_edit_staff_member_of_group_label']= 'Member of groups';
$lang['manage_edit_staff_click_save_label']     = 'Click Save';
$lang['manage_edit_staff_button_back_label']    = 'Button back';
$lang['manage_edit_staff_view_data_label']      = 'View data';
$lang['manage_edit_staff_password_label']       = 'New Password <i>(if changing password)</i>';
$lang['manage_edit_staff_confirm_password_label']= 'Confirm Password <i>(if changing password)</i>';

$lang['manage_edit_staff_fullname_validation']       = 'Full Name'; 
$lang['manage_edit_staff_phone_validation']          = 'Phone';
$lang['manage_edit_staff_email_validation']          = 'E-mail';
$lang['manage_edit_staff_address_validation']        = 'Address';
$lang['manage_edit_staff_member_of_group_validation']= 'Member of groups';
$lang['manage_edit_staff_password_validation']       = 'New Password';
$lang['manage_edit_staff_confirm_password_validation']= 'Confirm Password';

$lang['manage_edit_staff_fullname_placeholder']       = 'Please enter the full name of the staff'; 
$lang['manage_edit_staff_phone_placeholder']          = "Please enter the staff active telephone number";
$lang['manage_edit_staff_email_placeholder']          = "Please enter an active and unique staff email address";
$lang['manage_edit_staff_address_placeholder']        = 'Please enter the full address of the staff';
$lang['manage_edit_staff_member_of_group_placeholder']= 'Select group';
$lang['manage_edit_staff_password_placeholder']        = 'Please enter a new password staff, if you want to change.';
$lang['manage_edit_staff_confirm_password_placeholder']= 'Please enter a confirm password staff, if you want to change.';

$lang['manage_edit_staff_fullname_explanation']       = 'Please enter the full name of the staff'; 
$lang['manage_edit_staff_phone_explanation']          = "Please enter the staff active telephone number";
$lang['manage_edit_staff_email_explanation']          = "Please enter the staff active email address";
$lang['manage_edit_staff_address_explanation']        = 'Please enter the full address of the staff';
$lang['manage_edit_staff_member_of_group_explanation']= 'Select group';
$lang['manage_edit_staff_click_save_explanation']     = 'After all is filled, click save button to save staff data.';
$lang['manage_edit_staff_button_back_explanation']    = 'The back button works for the <a href="'.site_url('manage/users/staff').'">staff data</a> page.';
$lang['manage_edit_staff_view_data_explanation']      = 'To see the staff data already saved, please go to the <a href="'.site_url('manage/users/staff').'">staff data</a> page.';
$lang['manage_edit_staff_password_explanation']        = 'Enter a new password if you want to change the password.';
$lang['manage_edit_staff_confirm_password_explanation']= 'Enter a confirm password if you want to change the password.';

//$lang['manage_edit_staff_success'] = 'Successfully changed!';
//$lang['manage_edit_staff_fail'] = 'Failed to change!';

// staff table
$lang['manage_table_staff_title_id']            = '#StaffCode'; 
$lang['manage_table_staff_title_username']      = 'Username'; 
$lang['manage_table_staff_title_full_name']     = 'Full name'; 
$lang['manage_table_staff_title_email']         = 'E-mail'; 
$lang['manage_table_staff_title_phone']         = 'Phone'; 
$lang['manage_table_staff_title_last_login']    = 'Last login'; 
$lang['manage_table_staff_title_action']        = 'Action'; 
$lang['manage_table_staff_title_group']         = 'Group'; 
$lang['manage_table_staff_title_address']       = 'Address'; 

/** zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz */

// add Group
$lang['manage_add_group_title']                = 'Manage | Add Group';
$lang['manage_add_group_form_heading']         = 'Add Group';
$lang['manage_add_group_form_subheading']      = 'Please enter the Group information below.';
$lang['manage_add_group_form_explanation']     = 'Explanation of Group added form';

$lang['manage_add_group_name_label']           = 'Group Name'; 
$lang['manage_add_group_description_label']    = 'Group Description';
$lang['manage_add_group_click_save_label']     = 'Click Save';
$lang['manage_add_group_button_back_label']    = 'Button back';
$lang['manage_add_group_view_data_label']      = 'View data';

$lang['manage_add_group_name_validation']       = 'Group Name'; 
$lang['manage_add_group_description_validation']= 'Group Description';

$lang['manage_add_group_name_placeholder']       = 'Please enter the name of the group'; 
$lang['manage_add_group_description_placeholder']= "Please enter the description of the group";

$lang['manage_add_group_name_explanation']       = 'Please enter the name of the group'; 
$lang['manage_add_group_description_explanation']= "Please enter the description of the group";
$lang['manage_add_group_click_save_explanation']     = 'After all is filled, click save button to save group data.';
$lang['manage_add_group_button_back_explanation']    = 'The back button works for the <a href="'.site_url('manage/groups').'">group data</a> page.';
$lang['manage_add_group_view_data_explanation']      = 'To see the group data already saved, please go to the <a href="'.site_url('manage/groups').'">group data</a> page.';

// edit Group
$lang['manage_edit_group_title']                = 'Manage | Edit Group';
$lang['manage_edit_group_form_heading']         = 'Edit Group';
$lang['manage_edit_group_form_subheading']      = 'Please enter the Group information below.';
$lang['manage_edit_group_confirmation_heading']   = 'Edit Group Confirmation'; 
$lang['manage_edit_group_confirmation_subheading']= 'Are you sure you want to edit the Group?'; 
$lang['manage_edit_group_form_explanation']     = 'Explanation form change group data';

$lang['manage_edit_group_name_label']           = 'Group Name'; 
$lang['manage_edit_group_description_label']    = 'Group Description';
$lang['manage_edit_group_click_save_label']     = 'Click Save';
$lang['manage_edit_group_button_back_label']    = 'Button back';
$lang['manage_edit_group_view_data_label']      = 'View data';

$lang['manage_edit_group_name_validation']       = 'Group Name'; 
$lang['manage_edit_group_description_validation']= 'Group Description';

$lang['manage_edit_group_name_placeholder']       = 'Please enter the name of the group'; 
$lang['manage_edit_group_description_placeholder']= "Please enter the description of the group";

$lang['manage_edit_group_name_explanation']       = 'Please enter the name of the group'; 
$lang['manage_edit_group_description_explanation']= "Please enter the description of the group";
$lang['manage_edit_group_click_save_explanation']     = 'After all is filled, click save button to save group data.';
$lang['manage_edit_group_button_back_explanation']    = 'The back button works for the <a href="'.site_url('manage/groups').'">group data</a> page.';
$lang['manage_edit_group_view_data_explanation']      = 'To see the group data already saved, please go to the <a href="'.site_url('manage/groups').'">group data</a> page.';

// edit premissions
$lang['manage_premissions_group_title']                = 'Manage | Group permissions';
$lang['manage_premissions_group_form_heading']         = 'Edit Group permissions';
$lang['manage_premissions_group_form_subheading']      = 'Grant permissions on group';
$lang['manage_premissions_group_form_table_permission']= 'Permission';
$lang['manage_premissions_group_form_table_allow']     = 'Allow';
$lang['manage_premissions_group_form_table_deny']      = 'Deny';
$lang['manage_premissions_group_form_table_ignore']    = 'Ignore';
$lang['manage_premissions_group_form_explanation']     = 'Explanation form edit group permission';

$lang['manage_permissions_group_permission_label']     = 'Permission'; 
$lang['manage_permissions_group_allow_label']          = 'Allow'; 
$lang['manage_permissions_group_deny_label']           = 'Deny'; 
$lang['manage_permissions_group_ignore_label']         = 'Ignore'; 
$lang['manage_permissions_group_click_save_label']     = 'Click Save';
$lang['manage_permissions_group_button_back_label']    = 'Button back';

$lang['manage_permissions_group_permission_explanation']   = 'Name of the permissions that exist in the system.'; 
$lang['manage_permissions_group_allow_explanation']        = "Grant permission to access the menu in the system.";
$lang['manage_permissions_group_deny_explanation']         = "Reject permission to access the menu that is in the system.";
$lang['manage_permissions_group_ignore_explanation']       = "Ignores permissions to access the menu that is on the system.";
$lang['manage_permissions_group_click_save_explanation']   = 'After all is filled, click save button to save premissions group.';
$lang['manage_permissions_group_button_back_explanation']  = 'The back button works for the <a href="'.site_url('manage/groups').'">group data</a> page.';

// Delete Group
$lang['manage_delete_group_confirmation_heading']    = 'Delete Group Confirmation'; 
$lang['manage_delete_group_confirmation_subheading'] = 'Are you sure you want to delete the group?'; 

// group table
$lang['manage_table_group_title_name']            = 'Name'; 
$lang['manage_table_group_title_description']     = 'Description'; 
$lang['manage_table_group_title_permission']     = 'Permission'; 
$lang['manage_table_group_title_action']     = 'Action'; 

/** zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz */

// add permission
$lang['manage_add_permission_title']                = 'Manage | Add Permission';
$lang['manage_add_permission_form_heading']         = 'Add Permission';
$lang['manage_add_permission_form_subheading']      = 'Please enter the Permission information below.';
$lang['manage_add_permission_form_explanation']     = 'Explanation of Permission added form';

$lang['manage_add_permission_key_label']            = 'Permission Key'; 
$lang['manage_add_permission_name_label']           = 'Permission Name';
$lang['manage_add_permission_click_save_label']     = 'Click Save';
$lang['manage_add_permission_button_back_label']    = 'Button back';
$lang['manage_add_permission_view_data_label']      = 'View data';

$lang['manage_add_permission_key_validation']       = 'Permission Key'; 
$lang['manage_add_permission_name_validation']      = 'Permission Name';

$lang['manage_add_permission_key_placeholder']      = 'Please enter the key of the Permission'; 
$lang['manage_add_permission_name_placeholder']     = "Please enter the name of the Permission";

$lang['manage_add_permission_key_explanation']        = 'Please enter the key of the Permission'; 
$lang['manage_add_permission_name_explanation']       = "Please enter the name of the Permission";
$lang['manage_add_permission_click_save_explanation'] = 'After all is filled, click save button to save Permission data.';
$lang['manage_add_permission_button_back_explanation']= 'The back button works for the <a href="'.site_url('manage/permissions').'">permission data</a> page.';
$lang['manage_add_permission_view_data_explanation']  = 'To see the group data already saved, please go to the <a href="'.site_url('manage/permissions').'">permission data</a> page.';

// edit permission
$lang['manage_edit_permission_title']                = 'Manage | Edit Permission';
$lang['manage_edit_permission_form_heading']         = 'Edit Permission';
$lang['manage_edit_permission_form_subheading']      = 'Please enter the Permission information below.';
$lang['manage_edit_permission_confirmation_heading']   = 'Edit Permission Confirmation'; 
$lang['manage_edit_permission_confirmation_subheading']= 'Are you sure you want to edit the Permission?'; 
$lang['manage_edit_permission_form_explanation']     = 'Explanation form change Permission data';

$lang['manage_edit_permission_key_label']            = 'Permission Key'; 
$lang['manage_edit_permission_name_label']           = 'Permission Name';
$lang['manage_edit_permission_click_save_label']     = 'Click Save';
$lang['manage_edit_permission_button_back_label']    = 'Button back';
$lang['manage_edit_permission_view_data_label']      = 'View data';

$lang['manage_edit_permission_key_validation']       = 'Permission Key'; 
$lang['manage_edit_permission_name_validation']      = 'Permission Name';

$lang['manage_edit_permission_key_placeholder']      = 'Please enter the key of the Permission'; 
$lang['manage_edit_permission_name_placeholder']     = "Please enter the name of the Permission";

$lang['manage_edit_permission_key_explanation']        = 'Please enter the key of the Permission'; 
$lang['manage_edit_permission_name_explanation']       = "Please enter the name of the Permission";
$lang['manage_edit_permission_click_save_explanation'] = 'After all is filled, click save button to save Permission data.';
$lang['manage_edit_permission_button_back_explanation']= 'The back button works for the <a href="'.site_url('manage/permissions').'">permission data</a> page.';
$lang['manage_edit_permission_view_data_explanation']  = 'To see the group data already saved, please go to the <a href="'.site_url('manage/permissions').'">permission data</a> page.';

// Delete Permission
$lang['manage_delete_permission_confirmation_heading']    = 'Delete Permission Confirmation'; 
$lang['manage_delete_permission_confirmation_subheading'] = 'Are you sure you want to delete the permission?'; 

/** zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz */

//=======================

// Setting  
$lang['setting_saved']                       = 'Successfully made setting changes!'; 
$lang['setting_heading_content']             = 'Setting'; 
//$lang['setting_subheading_content']          = 'Lists'; 

// Setting General  "Done"
$lang['setting_general_title']                  = 'General';  /* tag title */
//$lang['setting_general_saved']                = 'Successfully made setting changes!'; 
$lang['setting_general_heading_content']        = 'General'; 
$lang['setting_general_subheading_content']     = 'General'; 
$lang['setting_general_heading']                = 'General Form'; 
$lang['setting_general_subheading']             = 'Please enter the general information below.';

$lang['setting_general_maintenance_label']      = 'Maintenance'; 
$lang['setting_general_auto_refresh_label']     = 'Auto Refresh'; 
$lang['setting_general_office_address_label']   = 'Office Address'; 
$lang['setting_general_office_phone_label']     = 'Office Phone';
$lang['setting_general_operational_hour_label'] = 'Operational Hour';
//$lang['setting_general_operational_start_label']= 'Opening hours'; 
//$lang['setting_general_operational_end_label']  = 'Hours of closing'; 
$lang['setting_general_cs_phone_label']         = 'CS Phone';
$lang['setting_general_wa_phone_label']         = 'WA Phone';

$lang['setting_general_validation_maintenance_label']  = 'Maintenance'; 
$lang['setting_general_validation_auto_refresh_label']  = 'Auto Refresh'; 
$lang['setting_general_validation_office_address_label']  = 'Office Address'; 
$lang['setting_general_validation_office_phone_label']  = 'Office Phone'; 
$lang['setting_general_validation_operational_start_label']  = 'Open operational'; 
$lang['setting_general_validation_operational_end_label']  = 'Close operational'; 
$lang['setting_general_validation_cs_phone_label']    = 'CS Phone';
$lang['setting_general_validation_wa_phone_label']    = 'WA Phone';

$lang['setting_general_auto_refresh_placeholder']     = 'Please enter the time value to refresh the page'; 
$lang['setting_general_office_address_placeholder']   = 'Please enter the office address'; 
$lang['setting_general_office_phone_placeholder']     = 'Please enter the number office phone'; 
$lang['setting_general_operational_start_placeholder']= 'Please enter the start-time'; 
$lang['setting_general_operational_end_placeholder']  = 'Please enter the end-time'; 
$lang['setting_general_cs_phone_placeholder']         = 'Please enter the number CS Phone';
$lang['setting_general_wa_phone_placeholder']         = 'Please enter the number WA Phone';

$lang['setting_general_auto_refresh_info']            = 'Minimal auto refresh page 5 second'; 
$lang['setting_general_office_address_info']          = 'Minimal length 25 characters'; 

// Setting General 
$lang['setting_seo_title']                      = 'SEO (Search Engine Optimization)';  /* tag title */
//$lang['setting_seo_saved']                      = 'Successfully made setting changes!'; 
$lang['setting_seo_heading_content']            = 'SEO'; 
$lang['setting_seo_subheading_content']         = 'SEO (Search Engine Optimization)'; 
$lang['setting_seo_heading']                    = 'SEO Form'; 
$lang['setting_seo_subheading']                 = 'Please enter the SEO information below.'; 
$lang['setting_seo_name_label']                 = 'Site Name'; 
$lang['setting_seo_slogan_label']               = 'Site Slogan'; 
$lang['setting_seo_validation_name_label']      = 'Site Name'; 
$lang['setting_seo_validation_slogan_label']    = 'Site Slogan'; 
$lang['setting_seo_meta_description_info']      = 'Maximum length of 156 characters'; 

//=======================

// All 
$lang['all_save_btn']               = 'Save'; 