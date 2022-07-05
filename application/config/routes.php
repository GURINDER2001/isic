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

$route['admin'] 				= 'admin/login';
$route['admin/users/(:num)'] 	= 'admin/users/index/$1';

$route['admin/programs/category/add'] 			  = 'admin/programs/addcategory';
$route['admin/programs/category/edit/(:num)'] 	  = 'admin/programs/editcategory/$1';
$route['admin/programs/category/status/(:num)']   = 'admin/programs/statuscategory/$1';
$route['admin/programs/category/delete/(:num)']   = 'admin/programs/deletecategory/$1';
$route['admin/programs/category/popular/(:num)']  = 'admin/programs/markpopularcat/$1';
$route['admin/programs/category/status/(:num)']   = 'admin/programs/statuscategory/$1';

$route['admin/top-schools']   					= 'admin/colleges/top_schools';
$route['admin/top-schools/add'] 			  	= 'admin/colleges/add_top_schools';
$route['admin/top-schools/edit/(:num)'] 		= 'admin/colleges/edit_top_schools/$1';
$route['admin/top-schools/status/(:num)']   	= 'admin/colleges/status_top_schools/$1';
$route['admin/top-schools/delete/(:num)']   	= 'admin/colleges/delete_top_schools/$1';

$route['admin/programs/campus']   				= 'admin/programs/campusinfo';
$route['admin/programs/campus/(:num)']   		= 'admin/programs/campusinfo/$1';
$route['admin/programs/campus/add/(:num)']   = 'admin/programs/add_campusinfo/$1';
$route['admin/programs/campus/edit/(:num)/(:num)']   = 'admin/programs/edit_campusinfo/$1/$2';
$route['admin/programs/campus/status/(:num)/(:num)']   = 'admin/programs/status_campusinfo/$1/$2';
$route['admin/programs/campus/delete/(:num)/(:num)']   = 'admin/programs/delete_campusinfo/$1/$2';

$route['admin/questions/category/add'] 			  = 'admin/questions/addcategory';
$route['admin/questions/category/edit/(:num)'] 	  = 'admin/questions/editcategory/$1';
$route['admin/questions/category/status/(:num)']  = 'admin/questions/statuscategory/$1';
$route['admin/questions/category/delete/(:num)']  = 'admin/questions/deletecategory/$1';
$route['admin/questions/category/popular/(:num)'] = 'admin/questions/markpopularcat/$1';

$route['admin/blogs/category/add'] 			  = 'admin/blogs/addcategory';
$route['admin/blogs/category/edit/(:num)'] 	  = 'admin/blogs/editcategory/$1';
$route['admin/blogs/category/status/(:num)']   = 'admin/blogs/statuscategory/$1';
$route['admin/blogs/category/delete/(:num)']   = 'admin/blogs/deletecategory/$1';

$route['admin/news/category/add'] 			= 'admin/news/addcategory';
$route['admin/news/category/edit/(:num)'] 	= 'admin/news/editcategory/$1';
$route['admin/news/category/status/(:num)'] = 'admin/news/statuscategory/$1';
$route['admin/news/category/delete/(:num)'] = 'admin/news/deletecategory/$1';

$route['admin/insurances/features/add'] 			= 'admin/insurances/addfeature';
$route['admin/insurances/features/edit/(:num)'] 	= 'admin/insurances/editfeature/$1';
$route['admin/insurances/features/status/(:num)'] = 'admin/insurances/statusfeature/$1';
$route['admin/insurances/features/delete/(:num)'] = 'admin/insurances/deletefeature/$1';

$route['admin/campus/(:num)'] = 'admin/campus/index/$1';


$route['default_controller'] 	= 'front';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;

$route['users'] 			    = 'users/index';
$route['login'] 			    = 'users/login';
$route['register'] 			    = 'users/register';
$route['otp-verify'] 			= 'users/otpVerify';
$route['forgot-password'] 		= 'users/forgotpassword';
$route['reset-password']		= 'users/resetpassword';
$route['my-account']			= 'users/dashboard';
$route['my-account/dashboard']	= 'users/dashboard';
$route['my-account/purchase-history']		= 'users/purchase_history';
$route['my-account/change-password']		= 'users/changepassword';
$route['my-account/edit-profile']			= 'users/editprofile';
$route['activation']			= 'users/activation';
$route['logout'] 			    = 'users/logout';


$route['discounts'] 			= 'discounts/index';


//$route['jetbrains'] 		= 'landings/details/jetbrains';

$route['discounts/india/categories/(:any)'] = 'discounts/india_categories/$1';
$route['discounts/abroad/categories/(:any)'] = 'discounts/abroad_categories/$1';

$route['discounts/india/provider/(:any)'] = 'discounts/india_provider_details/$1';
$route['discounts/abroad/provider/(:any)'] = 'discounts/abroad_provider_details/$1';

$route['events'] 			    = 'events/index';
$route['events/pay'] 			= 'events/join';
$route['events/(:any)'] 		= 'events/detail/$1';

$route['search'] 			    = 'blog/search';
$route['search/(:num)'] 		= 'blog/search';
$route['blog'] 			    	= 'blog/index';
$route['blog/(:num)'] 			= 'blog/index';
$route['blog/category/(:any)'] 	= 'blog/category/$1';
$route['blog/(:any)'] 			= 'blog/detail/$1';

$route['cards'] 				= 'cards/index';
$route['cards/selection'] 		= 'cards/selection';
$route['cards/verification'] 		= 'cards/verification';
$route['cards/order/personal-details/(:any)'] 		= 'cards/order_personal_details/$1';
$route['cards/order/services'] 		= 'cards/order_services';
$route['cards/order/delivery-payment'] 	= 'cards/order_delivery_payment';
$route['cards/order/delivery'] 		= 'cards/order_delivery';
$route['cards/order/payment'] 		= 'cards/order_payment';
$route['cards/paymentResponse'] 	= 'cards/paymentResponse';
$route['cards/order/success'] 		= 'cards/success';
$route['cards/order/cancalled'] 	= 'cards/cancalled';
$route['cards/apply'] 			= 'cards/apply';
$route['cards/getAjaxSummary'] 	= 'cards/getAjaxSummary';
$route['cards/ajaxApplyCoupon'] = 'cards/ajaxApplyCoupon';
$route['cards/(:any)'] 			= 'cards/details/$1';

$route['dv/(:any)'] 			= 'vouchers/details/$1';

$route['news'] 			    	= 'news/index';
$route['news/(:num)'] 			= 'news/index';
$route['news/(:any)'] 			= 'news/detail/$1';

$route['about-us'] 				= 'front/aboutus';
$route['refer-a-friend'] 		= 'front/referFriend';
$route['why-isic'] 				= 'front/whyIsic';
$route['our-endorsements'] 		= 'front/endorsement';
$route['faq'] 					= 'front/faq';
$route['faq/(:num)'] 			= 'front/faq';


$route['insurance/(:any)'] 		= 'insurance/detail/$1';
$route['partners/ajaxContact'] 	= 'partners/ajaxContact';
$route['partners/(:any)'] 		= 'partners/details/$1';
$route['gallery'] 				= 'front/gallery';
$route['going-abroad'] 			= 'front/goingAbroad';

$route['landing/(:any)'] 		= 'landings/details/$1';

$route['privacy-policy'] 			= 'front/termpage/privacy-policy';
$route['terms-of-use'] 			= 'front/termpage/terms-of-use';
$route['security'] 			= 'front/termpage/security';
$route['cancellation-and-shipping-policy'] 			= 'front/termpage/cancellation-and-shipping-policy';

//$route['referral-program'] 		= 'front/referral_program';

$route['contact-us'] 			= 'front/contactus';
$route['student-chatter'] 		= 'front/student_chatter';
$route['student-chatter/(:num)'] = 'front/student_chatter';
$route['ajax-checklist'] 		= 'front/ajax_checklist';
$route['ajax-states'] 			= 'front/ajax_states';
$route['ajax-city'] 			= 'front/ajax_cities';

$route['(:any)'] = 'front/pageDetails/$1';