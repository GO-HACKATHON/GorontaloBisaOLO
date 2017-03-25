<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*
CARA MEMBUAT ROUTING DENGAN MX CONTROLLER
==========================================
$route['URL BUATAN']		=	"modules/NAMA FOLDER/NAMA CONTROLLER";
*/

// Admin
$route['administrator']='admin';

