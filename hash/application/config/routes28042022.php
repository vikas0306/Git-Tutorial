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


$route['Dashboard']             = 'Admin_dashboard';

/* Mahachaha */

$route['MahachahaTeam']             = 'Mahachaha/Team';
$route['MahachahaSlider']             = 'Mahachaha/Slider';
$route['MahachahaGallery']             = 'Mahachaha/Gallery';
$route['MahachahaEnquiry']             = 'Mahachaha/Enquiry';
$route['MahachahaTestimonial']             = 'Mahachaha/Testimonial';
$route['MahachahaCareer']             = 'Mahachaha/Career';
$route['MahachahaFranchise']             = 'Mahachaha/Franchise';
$route['MahachahaOurBranches']             = 'Mahachaha/OurBranches';
$route['MahachahaUpcomingBranches']             = 'Mahachaha/UpcomingBranches';



 /* Mahachai */
$route['MahachaiTeam']             = 'Mahachai/Team';
$route['MahachaiSlider']             = 'Mahachai/Slider';
$route['MahachaiGallery']             = 'Mahachai/Gallery';
$route['MahachaiEnquiry']             = 'Mahachai/Enquiry';
$route['MahachaiTestimonial']             = 'Mahachai/Testimonial';
$route['MahachaiCareer']             = 'Mahachai/Career';
$route['MahachaiFranchise']             = 'Mahachai/Franchise';
$route['MahachaiOurBranches']             = 'Mahachai/OurBranches';
$route['MahachaiUpcomingBranches']             = 'Mahachai/UpcomingBranches';


/* Mahaconnect */

$route['ProductList']       = 'Mahaconnect/Product';
$route['Cart']              = 'Mahaconnect/Cart';
$route['Orders']            = 'Mahaconnect/Orders';
$route['Transaction']       = 'Mahaconnect/Transaction';
$route['User']              = 'Mahaconnect/User';
$route['Video']             = 'Mahaconnect/Video';
$route['Feedback']          = 'Mahaconnect/Feedback';
$route['Admin_feedback']    = 'Mahaconnect/Admin_feedback';
$route['Lead']              = 'Mahaconnect/Lead';
$route['Flexi']              = 'Mahaconnect/Flexi';
$route['Channel_partner']    = 'Mahaconnect/Channel_partner';

$route['UserDetails/(:num)'] = 'Mahaconnect/ViewUser/$1';
$route['UserDetail/(:num)']  = 'Connect_users/UserDetails/$1';
$route['UserDelete/(:num)']  = 'Mahaconnect/UserDelete/$1';