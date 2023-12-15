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
$route['default_controller'] = 'main';

// 라우트 설정
// 로그인
$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';
// 마켓
$route['market/marketlist'] = 'market/marketlist';
$route['market/marketpush']['post'] = 'market/marketpush';
$route['market/marketpush?(:num)']['post'] = 'market/marketpush/$1';
$route['market/add/(:num)'] = 'market/add/$1';
$route['market/marketdetail'] = 'market/marketdetail';
$route['market/marketdetail?(:num)'] = 'market/marketdetail/$1';
// 보드
$route['board/boardlist'] = 'board/boardlist';
$route['board/boarddetail'] = 'board/boarddetail';
$route['board/boardcreate']['post'] = 'board/boardcreate';
$route['board/boardadd'] = 'board/boardadd';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
