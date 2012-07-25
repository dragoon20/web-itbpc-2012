<?php 

class Seniorpc extends CI_Controller{
	public function spc_deskripsi(){
		session_start();
		$isi['isi']='spc_deskripsi';
		$this->load->view('template',$isi);
	}
	public function spc_peraturan(){
		session_start();
		$isi['isi']='spc_peraturan';
		$this->load->view('template',$isi);
	}
	public function spc_pendaftaran(){
		session_start();
		$isi['isi']='spc_pendaftaran';
		$this->load->view('template',$isi);
	}
}
?>