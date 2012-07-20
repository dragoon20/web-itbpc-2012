<?php 

class Juniorpc extends CI_Controller{
	public function jpc_deskripsi(){
		$isi['isi']='jpc_deskripsi';
		$this->load->view('template',$isi);
	}
	public function jpc_peraturan(){
		$isi['isi']='jpc_peraturan';
		$this->load->view('template',$isi);
	}
	public function jpc_pendaftaran(){
		$isi['isi']='jpc_pendaftaran';
		$this->load->view('template',$isi);
	}
}
?>