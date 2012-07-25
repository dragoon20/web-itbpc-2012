<?php 

class Juniorpc extends CI_Controller{
	public function jpc_deskripsi(){
		session_start();
		$isi['isi']='jpc_deskripsi';
		$this->load->view('template',$isi);
	}
	public function jpc_peraturan(){
		session_start();
		$isi['isi']='jpc_peraturan';
		$this->load->view('template',$isi);
	}
	public function jpc_pendaftaran(){
		session_start();
		$isi['isi']='jpc_pendaftaran';
		$this->load->view('template',$isi);
	}
}
?>