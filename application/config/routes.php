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

//Admin : user management
$route['users/myprofile'] = 'users/myprofile';
$route['users/pdf_myprofile'] = 'users/pdf_myprofile';
$route['users/employees'] = 'users/employees';
$route['users/export'] = 'users/export';
$route['users/import'] = 'users/import';
$route['users/reset/(:num)'] = 'users/reset/$1';
$route['users/create'] = 'users/create';
$route['users/edit/(:num)'] = 'users/edit/$1';
$route['users/delete/(:num)'] = 'users/delete/$1';
$route['users/(:num)'] = 'users/view/$1';
$route['users/check/login'] = 'users/check_login';
$route['users'] = 'users';

//Human Resources Management
$route['hr/index'] = 'hr/index';
$route['hr/employees'] = 'hr/employees';
$route['hr/employees/entity/(:num)/(:any)'] = 'hr/employees_entity/$1/$2';
$route['hr/employees/export'] = 'hr/export_employees';
$route['hr/leaves/(:num)'] = 'hr/leaves/$1';
$route['hr/leaves/export/(:num)'] = 'hr/export_leaves/$1';
$route['hr/counters/(:num)'] = 'hr/counters/$1';
$route['hr'] = 'hr';

//HR edit leave types
$route['leavetypes/delete/(:num)'] = 'leavetypes/delete/$1';
$route['leavetypes/edit/(:num)'] = 'leavetypes/edit/$1';
$route['leavetypes/index'] = 'leavetypes/index';
$route['leavetypes/create'] = 'leavetypes/create';
$route['leavetypes/export'] = 'leavetypes/export';
$route['leavetypes'] = 'leavetypes';

//HR edit positions
$route['positions/delete/(:num)'] = 'positions/delete/$1';
$route['positions/edit/(:num)'] = 'positions/edit/$1';
$route['positions/index'] = 'positions/index';
$route['positions/select'] = 'positions/select';
$route['positions/create'] = 'positions/create';
$route['positions/export'] = 'positions/export';
$route['positions'] = 'positions';

//Calendars
$route['calendar/workmates'] = 'calendar/workmates';
$route['leaves/workmates'] = 'leaves/workmates';

//My leave requests
$route['leaves/counters'] = 'leaves/counters';
$route['leaves/export'] = 'leaves/export';
$route['leaves/create'] = 'leaves/create';
$route['leaves/credit'] = 'leaves/credit';
$route['leaves/edit/(:num)'] = 'leaves/edit/$1';
$route['leaves/update'] = 'leaves/update';
$route['leaves/delete/(:num)'] = 'leaves/delete/$1';
$route['leaves/(:num)'] = 'leaves/view/$1';
$route['leaves/length'] = 'leaves/length';
$route['leaves'] = 'leaves';

//leave requests
$route['requests/collaborators'] = 'requests/collaborators';
$route['requests/counters/(:num)'] = 'requests/counters/$1';
$route['requests/export/(:any)'] = 'requests/export/$1';
$route['requests/accept/(:num)'] = 'requests/accept/$1';
$route['requests/reject/(:num)'] = 'requests/reject/$1';
$route['requests/(:any)'] = 'requests/index/$1';
$route['requests'] = 'requests/index/requested';

//Session management
$route['session/login'] = 'session/login';
$route['session/logout'] = 'session/logout';
$route['session/language'] = 'session/language';
$route['session/forgetpassword'] = 'session/forgetpassword';

$route['default_controller'] = 'leaves';
$route['(:any)'] = 'pages/view/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
