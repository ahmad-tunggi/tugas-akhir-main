<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Url default*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Url Login*/
$route['silahkan'] = 'login/login/prosesmasuk';
$route['keluar'] = 'login/login/proseskeluar';

/*Url Browser*/
$route['profile'] 							  = 'biodata_karyawan';
$route['profile-mahasiswa'] 				  = 'biodata_mahasiswa';
$route['id=6256eea72e69a0ab25d9ec25124a1c4b'] = 'pengajuan';
$route['pengaturan']                          = 'pengaturan';


/*Url dispose Browser*/
$route['login'] 			  = '404_override';
$route['logout'] 			  = '404_override';
$route['biodata_karyawan']	  = '404_override';
//$route['pengajuan'] 				  = '404_override';

