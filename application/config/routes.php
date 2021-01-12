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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//$route['([a-zA-Z0-9]+[a-zA-Z\_0-9\.-]*)\/$']
//rewrite danh muc việc làm
// $2 chinh laf bien :num (category_id)
//giỏ hàng
$route['gio-hang.html'] = 'cart/index';
$route['user/login.html'] = 'user/login';
$route['user/register.html'] = 'user/register';
$route['search.html'] = 'home/search';
$route['search.html/(:num)'] = 'home/search/$1';

$route['thong-tin/(:any)/i(:num).html'] = 'page/view/$2';
$route['so-sanh-(:any)/(:num).html'] = 'compare/index/$2';

//tin tức
$route['tin-tuc.html'] = 'news/all';
$route['tin-tuc.html/(:num)'] = 'news/all/$1';
$route['bai-viet-(:any)/cn(:num).html'] = 'news/catnews/$2';
$route['bai-viet-(:any)/cn(:num).html/(:num)'] = 'news/catnews/$2/$3';
$route['tin-tuc/(:any)/i(:num).html'] = 'news/detail/$2';

$route['(:any)-m(:num)-(:num).html'] = 'manufac/index/$2/$3';
$route['(:any)-m(:num)-(:num).html/(:num)'] = 'manufac/index/$2/$3/$4';
//sản phẩm
$route['(:any)-p(:num).html'] = 'product/detail/$2';
$route['(:any)'] = 'product/category/$1';
$route['(:any)/(:num)'] = 'product/category/$1/$2';


