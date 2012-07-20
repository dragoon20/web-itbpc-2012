<?php 

class Seniorpc extends CI_Controller{
	public function spc_deskripsi(){
		$isi['isi']='spc_deskripsi';
		$this->load->view('template',$isi);
	}
	public function spc_peraturan(){
		$isi['isi']='spc_peraturan';
		$this->load->view('template',$isi);
	}
	public function spc_pendaftaran(){
		$isi['isi']='spc_pendaftaran';
		$this->load->view('template',$isi);
	}
}
?>