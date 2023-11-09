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
$route['default_controller'] = 'c_beranda';
$route['beranda'] = 'c_beranda';
$route['tentang_kami'] = 'c_tentang';
$route['materi'] = 'c_materi';
$route['materi/'] = 'c_materi';
$route['materi_cari'] = 'c_materi/hasil';
$route['tag_cari'] = 'c_materi/tag';
$route['kategori/(:any)'] = 'c_materi/kategori/$1';
// $route['importir'] = 'c_importir';
$route['importir/(:any)'] = 'c_importir2/detail/$1';
$route['detailkategori'] = 'c_materi/detail/$1'; 
$route['detail/(:any)/(:any)'] = 'c_materi/detail/$1/$1';
$route['register']['GET'] = 'c_register/index';
$route['register']['POST'] = 'c_register/register';
$route['login']['GET'] = 'c_login/index';
$route['login']['POST'] = 'c_login/aksi_login';
$route['member'] = 'c_member/index';

$route['Dashboard'] = 'Dashboard/index';
$route['penulis/(:any)'] = 'c_materi/penulis/$1';
// $route['importir/(:any)'] = 'c_importir/detail/$1';
// $route['importir_detail/(:any)'] = 'c_importir/detail_data/$1';
// $route['importir_cari'] = 'c_importir/cari_data';
$route['importir/(:any)'] = 'c_importir2/detail/$1';
$route['importir_detail/(:any)'] = 'c_importir2/detail_data/$1';
$route['importir_cari'] = 'c_importir2/cari_data';
$route['(:any)/importir_cari_page'] = 'c_importir2/cari_data_page/$1';

$route['translate_uri_dashes'] = FALSE;
$route['materiterkait_join/(:any)'] = 'materiterkait_c/index/$1';
$route['videoterkait_join/(:any)'] = 'videoterkait_c/index/$1';
