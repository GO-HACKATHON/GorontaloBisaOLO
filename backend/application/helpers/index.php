<?php 

date_default_timezone_set("Asia/Makassar");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

 
require_once "src/firebaseLib.php";
   
const DEFAULT_URL 		= 'https://ebentor-a82be.firebas­eio.com/';
const DEFAULT_TOKEN 	= 'RClkLV3veuMqkz6TkcdztcxbT31Fo5MUls6me6jF'; 
const DEFAULT_PATH 		= '';


$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);


// $q = $firebase->get(DEFAULT_PATH);
// $q = json_decode($q);

// print_r($q);

function insert($f){
	$arr = array(
		'nama'=>'sigit'
	);
	$q = $f->set(DEFAULT_PATH.'/mahasiswa/531413078',$arr);
}

function push(){
	$arr = array(
		'nama'=>'sigit'
	);
	$q = $f->set(DEFAULT_PATH.'/mahasiswa/531413078',$arr);
}

function update($f){
	$arr = array(
		'nama'=>'sigit iswanto abubakar'
	);
	$q = $f->update(DEFAULT_PATH.'/mahasiswa/531413078',$arr);
}

function hapus($f,$param){

	$q = $f->delete(DEFAULT_PATH.'/'.$param);
	
	return $q;
}

function get($f,$namaTabel){
	$q = $f->get(DEFAULT_PATH."/".$namaTabel);
	return $q;
}

function getAll($f){
	$q = $f->get(DEFAULT_PATH);
	return json_decode($q);
}

function buatDb($f,$namaTabel){
	$mhs	=	array(
					array("nama"=>"sigit","alamat"=>"Alamat 1","pass"=>sha1(md5("123456"))),
					array("nama"=>"iswanto","alamat"=>"Alamat 2","pass"=>sha1(md5("123456"))),
					array("nama"=>"abubakar","alamat"=>"Alamat 3","pass"=>sha1(md5("123456")))
				);
				
	$tabel	=	array($namaTabel);

		$q2 	= $f->set(DEFAULT_PATH."/".$namaTabel,$mhs);
	
	
	return $q2;
}

function cekTabel($f,$namaTabel){
	$cek	=	get($f,$namaTabel);
	return $cek;
}

//print_r(buatDb($firebase));

function v($array){
	return print_r(json_decode($array));
}

//echo count(json_decode(cekTabel($firebase,"mahasiswa")));
//echo"<pre>";print_r(getAll($firebase)->driver);echo"</pre>";

$dataDriver	=	getAll($firebase)->driver;

//	Konvert 1
foreach($dataDriver as $dr){
	$allDriver[]	=	$dr;
}

//	Konvert 2
error_reporting(0);
foreach($allDriver as $d){
	echo $d->nama." | ".$d->email."<br>";
}

	

//buatDb($firebase,"mahasiswa");
/* echo"<pre>";v(cekTabel($firebase,"mahasiswa"));echo"</pre>"; */
/* echo"<pre>";v(hapus($firebase,"dosen"));echo"</pre>";
echo"<pre>";v(hapus($firebase,"mahasiswa"));echo"</pre>";
echo"<pre>";v(hapus($firebase,"matakuliah"));echo"</pre>"; */












	