<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_member extends MY_Model {
	
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
		//echo"<pre>";print_r(json_decode($f->get('members')));echo"</pre>";
		return json_decode($f->get('members'));		
	}

	public function byId($id){
		$path				=	"";
		$f					=	firebase($this->urlFirebase,$this->tokenFirebase,$path);
		$dataPribadiMember	=	array();
		$dataMember			=	$this->all();
		
		foreach($dataMember as $kode => $member){
			if($kode==$id){
				$dataPribadiMember	=	array("kode" => $kode, "data_member" => $member);
			}
		}
		
		return json_decode(json_encode($dataPribadiMember));
	}
	
}
?>