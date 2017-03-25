<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proses extends MX_Controller {

    public function __construct(){
        parent::__construct();
		//	Load Model
		$this->load->model('master_model/m_web');
		$this->load->model('master_model/m_buku');
		$this->load->model('master_model/m_member');
		//----------------------------------------------
		//	Load Helper
			$this->load->helper("firebase");
		//----------------------------------------------
	}
	
	public function update_buku(){
		$dataBuku	=	$this->m_buku->byKode($this->input->post("kode"));
		$arr 		= array(
						'book_title'	=>	$this->input->post("nama")
					);
		 
		$update		=	$this->m_buku->update_buku($this->input->post("kode"),$arr);
		if($update){
			redirect('admin/list_buku_member/'.$dataBuku->memberid);
		}else{
			redirect('admin/list_buku_member/'.$dataBuku->memberid);
		}
	}
	
	public function hapus_buku(){
		$kode		=	$this->input->post("kode");
		$idMember	=	$this->input->post("idMember");
		$delete		=	$this->m_buku->hapus_buku($kode);
		$update		=	$this->m_buku->hapus_buku($kode);
		if($update){
			redirect('admin/list_buku_member/'.$idMember);
		}else{
			redirect('admin/list_buku_member/'.$idMember);
		}
	}

}  