<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';


// Authentication
$route[LOGIN_URL]				= 'users/login';
$route[REGISTER_URL]            = 'users/register';
$route['profile']            	= 'users/profile/index';
$route['profile/(:any)']        = 'users/profile/$1';
$route['users/login']           = '';
$route['users/register']        = '';
$route['logout']				= 'users/logout';
$route['forgot_password']		= 'users/forgot_password';

/* User Image */
$route['images/(:any)/(:any)']		        = 'images/$1/$2';
$route['reset_password/(:any)/(:any)']	= "users/reset_password/$1/$2";

// API
$route['api/([a-z_0-9]+)/([a-z_]+)/(:any)'] 	 = "$2/api_$1/$3";

// Contexts
$route['([a-z_]+)/(:any)/(:any)/(:any)/(:any)/(:any)']		= "$2/$1/$3/$4/$5/$6";
$route['([a-z_]+)/(:any)/(:any)/(:any)/(:any)']		= "$2/$1/$3/$4/$5";
$route['([a-z_]+)/(:any)/(:any)/(:any)']		= "$2/$1/$3/$4";
$route['([a-z_]+)/(:any)/(:any)'] 		= "$2/$1/$3";
$route['([a-z_]+)/(:any)']				= "$2/$1/index";

// Activation
$route['activate']		        = 'users/activate';
$route['activate/(:any)']		= 'users/activate/$1';
$route['resend_activation']		= 'users/resend_activation';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
