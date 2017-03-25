<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {

    public function __construct(){
        parent::__construct();
		//	Load Model
		$this->load->model('master_model/m_web');
		$this->load->model('master_model/m_buku');
		$this->load->model('master_model/m_member');
		$this->load->model('master_model/m_tukar');
		//----------------------------------------------
		//	Load Helper
			$this->load->helper("firebase");
		//----------------------------------------------
	}
	
	public function index(){
		
		$folder				=	"admin";
		$data['title']		=	$this->m_web->brand();	
		$data['shorttext']	=	"Hello, selamat datang :)";
		$data['brand']		=	$this->m_web->title();

		//	Fitur alert
		$data['alert']			=	"off";
		$data['alert_msg']		=	"Alert untuk aksi";
		$data['alert_class']	=	"success";
		//-----------------------------------------------
		
		$data['content']		=	$folder."/v_beranda";	
		$this->load->view("master/index",$data);
	
	}
	
	public function member(){
		$folder				=	"admin";
		$data['title']		=	$this->m_web->brand();	
		$data['shorttext']	=	"Member";
		$data['brand']		=	$this->m_web->title();
		
		//	Data set
		$data['members']	=	$this->m_member->all();
		
		//	Fitur alert
		$data['alert']			=	"off";
		$data['alert_msg']		=	"Alert untuk aksi";
		$data['alert_class']	=	"success";
		//-----------------------------------------------
		
		$data['content']		=	$folder."/v_pengguna";	
		$this->load->view("master/index",$data);
	}
	
	public function list_buku_member($id){
		$folder				=	"admin";
		$data['title']		=	$this->m_web->brand();	
		$data['shorttext']	=	"Daftar Buku Member";
		$data['brand']		=	$this->m_web->title();
		
		//	Data set
		$data['members']	=	$this->m_member->byId($id);
		
		//	Fitur alert
		$data['alert']			=	"off";
		$data['alert_msg']		=	"Alert untuk aksi";
		$data['alert_class']	=	"success";
		//-----------------------------------------------
		
		$data['content']		=	$folder."/v_list_buku_member";	
		$this->load->view("master/index",$data);
	}
	
	public function buku(){
		$folder				=	"admin";
		$data['title']		=	$this->m_web->brand();	
		$data['shorttext']	=	"Buku";
		$data['brand']		=	$this->m_web->title();
		
		//	Data Set
		$data['members']		=	$this->m_member->all();
		
		//	Fitur alert
		$data['alert']			=	"off";
		$data['alert_msg']		=	"Alert untuk aksi";
		$data['alert_class']	=	"success";
		//-----------------------------------------------
		
		//	Data Set
		$data['dataBuku']	=	$this->m_buku->all();
		
		$data['content']		=	$folder."/v_buku";	
		$this->load->view("master/index",$data);
	}

	public function transaksi_tukar(){
		$folder				=	"admin";
		$data['title']		=	$this->m_web->brand();	
		$data['shorttext']	=	"Tukar Buku";
		$data['brand']		=	$this->m_web->title();
		
		//	Data Set
		$data['daftarTukar']	=	$this->m_tukar->all();
		
		//	Fitur alert
		$data['alert']			=	"off";
		$data['alert_msg']		=	"Alert untuk aksi";
		$data['alert_class']	=	"success";
		//-----------------------------------------------
		
		$data['content']		=	$folder."/v_tukar_buku";	
		$this->load->view("master/index",$data);
	}
	
	public function firebase(){
		$url	=	"https://tukarbuku-92a26.firebas­eio.com/";
		$token	=	"6BhMIDRhR3nzw9vk1s5iuVisoavyL8AKPZ6LpPEe";
		$path	=	"";
		$f	=	firebase($url,$token,$path);
		echo"<pre>";print_r(json_decode($f->get('books/001')));echo"</pre>";
	}
	
	public function tesModFirebase(){
		echo"<pre>";print_r($this->m_buku->byMember("axamaskak31312"));echo"</pre>";
	}

}  