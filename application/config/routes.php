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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// 2. DAFTARKAN CONTROLLER ASLI DI SINI (PENTING)
// Agar kata 'admin', 'auth', dll tidak dianggap sebagai shortcode
$route['admin/toggle_status/(:num)'] = 'admin/toggle_status/$1';
$route['admin'] = 'admin'; 
$route['admin/(.+)'] = 'admin/$1'; // Menangkap method di dalam controller admin
$route['auth/(.+)'] = 'auth/$1';
$route['link/(.+)'] = 'link/$1';

// 3. ROUTE SHORTLINK HARUS PALING BAWAH
// Menangkap 6 karakter alfanumerik sebagai shortcode
$route['([a-zA-Z0-9]{6})'] = 'link/go/$1';

// Atau jika shortcode kamu panjangnya bebas, gunakan ini tapi pastikan controller asli sudah di-exclude di atas:
// $route['([a-zA-Z0-9_-]+)'] = 'link/go/$1';
