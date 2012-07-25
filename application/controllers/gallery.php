<?php 

class gallery extends CI_Controller{
	public function gallery_content(){
		session_start();
		$isi['isi']='gallery';
		$this->load->view('template',$isi);
	}
}
?>