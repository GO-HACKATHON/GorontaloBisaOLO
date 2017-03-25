<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tukar extends MY_Model {
	
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
		return json_decode($f->get('switch_books'));		
	}
	
	public function byKode($kode){
 		$path	=	"";
		$f		=	firebase($this->urlFirebase,$this->tokenFirebase,$path);
		//echo"<pre>";print_r(json_decode($f->get('books')));echo"</pre>";
		return json_decode($f->get('switch_books/'.$kode));
	}
	
	public function status($status){
		switch($status){
			case"":
				return	"<span class='label label-default'>Sedang diproses</span>";
			break;
			case"0":
				return	"<span class='label label-default'>Sedang diproses</span>";
			break;
			case"1":
				return	"<span class='label label-warning'>Pengiriman ke pihak pertama</span>";
			break;
			case"2":
				return	"<span class='label label-info'>Pengiriman ke pihak kedua</span>";
			break;
			case"3":
				return	"<span class='label label-success'>Selesai ditukar</span>";
			break;
		}
	}
	
}
?>