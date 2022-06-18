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

$route['admin/questions/category/add'] 			  = 'admin/questions/addcategory';
$route['admin/questions/category/edit/(:num)'] 	  = 'admin/questions/editcategory/$1';
$route['admin/questions/category/status/(:num)']  = 'admin/questions/statuscategory/$1';
$route['admin/questions/category/delete/(:num)']  = 'admin/questions/deletecategory/$1';
$route['admin/questions/category/popular/(:num)'] = 'admin/questions/markpopularcat/$1';

$route['admin/articles/category/add'] 			  = 'admin/articles/addcategory';
$route['admin/articles/category/edit/(:num)'] 	  = 'admin/articles/editcategory/$1';
$route['admin/articles/category/status/(:num)']   = 'admin/articles/statuscategory/$1';
$route['admin/articles/category/delete/(:num)']   = 'admin/articles/deletecategory/$1';

$route['admin/news/category/add'] 			= 'admin/news/addcategory';
$route['admin/news/category/edit/(:num)'] 	= 'admin/news/editcategory/$1';
$route['admin/news/category/status/(:num)'] = 'admin/news/statuscategory/$1';
$route['admin/news/category/delete/(:num)'] = 'admin/news/deletecategory/$1';


$brandsArr = array("masterstudies.markupdesigns.in","academiccourses.markupdesigns.in","bachelorstudies.markupdesigns.in","onlinestudies.markupdesigns.in","phpstudies.markupdesigns.in","lawstudies.markupdesigns.in","mbastudies.markupdesigns.in","healthcarestudies.markupdesigns.in");

if($this->uri->segment(1) != 'admin')
{
	if (in_array($_SERVER['HTTP_HOST'], $brandsArr) )
	{
	   	$route['default_controller'] 	= 'brands';
	   	$route['404_override'] 			= '';
		$route['translate_uri_dashes'] 	= FALSE;

		$route['universities'] 				 = 'brand/universities/index';
		$route['universities/(:any)/(:any)'] = 'brand/universities/listbylocation/$1/$2';

		$route['universities/(:any)'] 		 = 'brand/universities/listbycountry/$1';

		$route['university/(:any)'] 		 = 'brand/universities/university_landing/$1';

		$route['news'] 					= 'brand/news/index';
		$route['news/(:any)'] 			= 'brand/news/details/$1';
		$route['news-category/(:any)'] 	= 'brand/news/newscategory/$1';

		$route['articles'] 					= 'brand/articles/index';
		$route['articles/(:any)'] 			= 'brand/articles/details/$1';
		$route['articles-category/(:any)'] 	= 'brand/articles/articlescategory/$1';


		$route['program'] 					= 'brand/program/index';
		$route['program/(:any)'] 			= 'brand/program/details/$1';

		$route['account/process'] 			= 'brand/account/process';

		//$route['(:any)/(:any)'] 		= 'brands/categorylanding/$1/$2';
		$route['(:any)/(:any)'] 		= 'brands/categorylanding/$1/$2';
		$route['(:any)'] 				= 'brands/switchlanding/$1';
	}
	elseif ($_SERVER['HTTP_HOST']=="jobs.markupdesigns.in")
	{
	   	$route['default_controller'] 	= 'jobs';
	   	$route['404_override'] 			= '';
		$route['translate_uri_dashes'] 	= FALSE;
		
		$route['apply-job/(:any)'] 		= 'jobs/applyjob/$1';
		$route['(:any)'] 				= 'jobs/jobdetails/$1';
	}
	elseif ($_SERVER['HTTP_HOST']=="smarthub.markupdesigns.in")
	{
	   	$route['default_controller'] 	= 'smarthub';
	   	$route['404_override'] 			= '';
		$route['translate_uri_dashes'] 	= FALSE;

		$route['login'] 			    = 'smarthub/login';
		$route['forgot-password'] 		= 'smarthub/forgotpassword';
		$route['reset-password'] 		= 'smarthub/resetpassword';
		$route['dashboard'] 			= 'smarthub/dashboard';
		$route['my-profile'] 			= 'smarthub/myprofile';
		$route['change-password'] 		= 'smarthub/changepassword';
		$route['logout'] 				= 'smarthub/logout';

		$route['metrics/performance']   = 'smarthubs/metrics/performance';
		$route['metrics/demographics']   = 'smarthubs/metrics/performance';
		$route['metrics/createreport']   = 'smarthubs/metrics/performance';
		$route['metrics/distributereport']   = 'smarthubs/metrics/performance';

		$route['students/qualified']   = 'smarthubs/metrics/performance';
		$route['communicator']   = 'smarthubs/metrics/performance';
		$route['students/irrelevent']   = 'smarthubs/metrics/performance';

		$route['gdpr']   = 'smarthubs/metrics/performance';
		$route['gdpr/search']   = 'smarthubs/metrics/performance';
		$route['gdpr/delete']   = 'smarthubs/metrics/performance';

		$route['messaging']   = 'smarthubs/metrics/performance';
		$route['messaging/headers']   = 'smarthubs/metrics/performance';
		$route['messaging/templates']   = 'smarthubs/metrics/performance';
		$route['messaging/signatures']   = 'smarthubs/metrics/performance';
		$route['messaging/attachments']   = 'smarthubs/metrics/performance';

		$route['programs']   = 'smarthubs/programs/index';
		$route['programs/overview']   = 'smarthubs/programs/index';
		$route['programs/sort']   = 'smarthubs/programs/sort';
		$route['programs/edit/(:any)']   = 'smarthubs/programs/editprogram/$1';

		$route['schools']   = 'smarthubs/school/profile';
		$route['schools/profile']   = 'smarthubs/school/profile';
		$route['schools/contact']   = 'smarthubs/school/contact';
		$route['schools/users']   = 'smarthubs/school/users';
		$route['schools/roles']   = 'smarthubs/school/roles';

		$route['engage']   = 'smarthubs/metrics/performance';
		$route['engage/buildqa']   = 'smarthubs/metrics/performance';
		$route['engage/checkqa']   = 'smarthubs/metrics/performance';
		$route['engage/topquestions']   = 'smarthubs/metrics/performance';
		$route['engage/settings']   = 'smarthubs/metrics/performance';

		$route['faq']   = 'smarthubs/metrics/performance';
		$route['settings']   = 'smarthubs/metrics/performance';
		$route['myprofile']   = 'smarthubs/metrics/performance';

	}
	elseif ($_SERVER['HTTP_HOST']=="studentshub.markupdesigns.in")
	{
	   	$route['default_controller'] 	= 'studentshub';
	   	$route['404_override'] 			= '';
		$route['translate_uri_dashes'] 	= FALSE;
		
		$route['login'] 			    = 'studentshub/login';
		$route['register'] 			    = 'studentshub/register';
		$route['my-account'] 			= 'studentshub/myaccount';
		$route['forgot-password'] 		= 'studentshub/forgotpassword';
		$route['reset-password'] 		= 'studentshub/resetpassword';
		$route['logout'] 			    = 'studentshub/logout';
		$route['conversations'] 		= 'studentshub/conversations';
		$route['preferences'] 			= 'studentshub/preferences';
		$route['profile'] 			    = 'studentshub/profile';
		$route['report-an-issue'] 		= 'studentshub/reportanissue';
	}
	else
	{
		$route['default_controller'] 	= 'front';
		$route['404_override'] 			= '';
		$route['translate_uri_dashes'] 	= FALSE;
		$route['users'] 			    = 'users/index';
		$route['login'] 			    = 'users/login';
		$route['register'] 			    = 'users/register';
		$route['forgot-password'] 		= 'users/forgotpassword';
		$route['reset-password']		= 'users/resetpassword';
		$route['my-account']			= 'users/dashboard';
		$route['my-account/dashboard']	= 'users/dashboard';
		$route['my-account/purchase-history']		= 'users/purchase_history';
		$route['my-account/change-password']		= 'users/changepassword';
		$route['my-account/edit-profile']			= 'users/editprofile';
		$route['activation']			= 'users/activation';
		$route['logout'] 			    = 'users/logout';
		$route['donation-projects'] 			    = 'projects/index';
		$route['donation-projects/pay'] 			= 'projects/pay';
		$route['donation-projects/success'] 		= 'projects/success';
		$route['donation-projects/cancel'] 			= 'projects/cancel';
		$route['donation-projects/ipn'] 		    = 'projects/ipn';
		$route['donation-projects/(:any)'] 			= 'projects/detail/$1';
		$route['training-and-development'] 				= 'services/index';
		$route['training-and-development/pay'] 			= 'services/pay';
		$route['training-and-development/pay/(:any)'] 	= 'services/pay/$1';
		$route['training-and-development/success'] 		= 'services/success';
		$route['training-and-development/cancel'] 		= 'services/cancel';
		$route['training-and-development/ipn'] 		    = 'services/ipn';
		$route['training-and-development/(:any)'] 		= 'services/detail/$1';
		$route['events'] 			    = 'events/index';
		$route['events/pay'] 			= 'events/join';
		$route['events/(:any)'] 		= 'events/detail/$1';
		$route['blog'] 			    	= 'blog/index';
		$route['blog/(:any)'] 			= 'blog/detail/$1';

		$route['news'] 			    	= 'blog/index';
		$route['news/(:any)'] 			= 'blog/detail/$1';

		$route['donation'] 				= 'donations/index';
		$route['donation/donor'] 		= 'donations/donor';
		$route['donation/payment'] 		= 'donations/payment';
		$route['receipt'] 				= 'donations/receipt';
		$route['about-us'] 				= 'front/aboutus';
		$route['book-a-demo'] 			= 'front/book_demo';
		$route['contact-us'] 			= 'front/contactus';
		$route['testimonials'] 			= 'front/testimonials';
		$route['ajax-checklist'] 		= 'front/ajax_checklist';
		$route['ajax-states'] 			= 'front/ajax_states';
		$route['ajax-city'] 			= 'front/ajax_cities';

		$route['get-involved'] 			= 'involvements/index';
		$route['get-involved/(:any)'] 	= 'involvements/detail/$1';

		$route['jobs'] 					= 'front/jobs';

		//$route['(:any)/(:any)'] 		= 'front/pageDetails/$2';		
		$route['customized-packages'] 		= 'front/package';
		$route['our-brands'] 				= 'front/ourbrands';
		
		$route['student-recruitment/(:any)'] = 'front/pageDetails/$1';
		$route['(:any)'] 			    	= 'front/pageDetails/$1';
	}
}