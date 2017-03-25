<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_buku extends MY_Model {
	
	private $urlFirebase;
	private $tokenFirebase;
	
	public function __construct(){
        parent::__construct();
		//	Load Helper
			$this->load->helper("firebase");
		//----------------------------------------------

		$this->urlFirebase		=	"https://tukarbuku-92a26.firebas­eio.com/";
		$this->tokenFirebase	=	"6BhMIDRhR3nzw9vk1s5iuVisoavyL8AKPZ6LpPEe";
    }
	
	public function all(){
 		$path	=	"";
		$f		=	firebase($this->urlFirebase,$this->tokenFirebase,$path);
		//echo"<pre>";print_r(json_decode($f->get('books')));echo"</pre>";
		return json_decode($f->get('books'));		
	}
	
	public function byPath($path){
		$f		=	firebase($this->urlFirebase,$this->tokenFirebase,$path);
		return json_decode($f->get($path)); 
	}
	
	public function byKode($kode){
		$path	=	"";
		$f		=	firebase($this->urlFirebase,$this->tokenFirebase,$path);
		//echo"<pre>";print_r(json_decode($f->get('books/'.$no)));echo"</pre>";
		return json_decode($f->get('books/'.$no));		
	}
	
	public function byMember($id){
		$path			=	"";
		$f				=	firebase($this->urlFirebase,$this->tokenFirebase,$path);
		$dataBukuMember	=	array();
		$dataBuku		=	$this->all();
		
		foreach($dataBuku as $kode => $buku){
			if($buku->memberid==$id){
				$dataBukuMember[]	=	array("kode" => $kode, "data_buku" => $buku);
			}
		}
		
		return json_decode(json_encode($dataBukuMember));
	}
	
}
?>