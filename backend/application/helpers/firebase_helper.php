<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function firebase($urlFirebase,$tokenFirebase,$path){
	
	date_default_timezone_set("Asia/Jakarta");
	
	require_once "src/firebaseLib.php";
	
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

	$firebase = new \Firebase\FirebaseLib($urlFirebase,$tokenFirebase);
	
	return $firebase;
}
?>