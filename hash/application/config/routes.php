<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*/====Yashwant==/*/

$route[DASHBOARD] = 'Admin_dashboard';
$route[HOME] = 'Admin_dashboard';

/*/====Yashwant==/*/
/*===================For Users Starts==============*/
$route[USERS] = 'Users';
$route[USERSAJAX] = 'Users/ajax_manage_page';
$route[USERSCHANGESTATUS] = 'Users/changeStatus';
$route[USERSDELETE] = 'Users/delete';
$route[USERSADD] = 'Users/create';
$route[USERSADDACTION] = 'Users/create_action';
$route[USERSUPDATE.'/(:any)'] = 'Users/update/$1';
$route[USERSUPDATEACTION]= 'Users/update_action';
/*===================For Users End==================*/


/*===================For Enquiries Starts=============*/
$route[ENQUIRIES] = 'Enquiries';
$route[ENQUIRIESAJAX] = 'Enquiries/ajax_manage_page';
$route[ENQUIRIESSDELETE] = 'Enquiries/delete';
/*===================For Enquiries End================*/


/*===========For Career Starts==========*/
$route[CARRERS] = 'Carrers';
$route[CARRERSAJAX] = 'Carrers/ajax_manage_page';
$route[CARRERSDELETE] = 'Carrers/delete';
/*===========For Career End=============*/

/*===========For Franchise Starts==========*/
$route[FRANCHISEE] = 'Franchise';
$route[FRANCHISEEAJAX] = 'Franchise/ajax_manage_page';
$route[FRANCHISEEDELETE] = 'Franchise/delete';
/*===========For Franchise End=============*/




$route['UserDetails/(:num)'] = 'Mahaconnect/ViewUser/$1';
$route['UserDetail/(:num)']  = 'Connect_users/UserDetails/$1';
$route['UserDelete/(:num)']  = 'Mahaconnect/UserDelete/$1';

