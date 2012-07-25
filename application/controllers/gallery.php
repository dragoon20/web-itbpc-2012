<?php 

class gallery extends CI_Controller{
	public function gallery_content(){
		$isi['isi']='gallery';
		$this->load->view('template',$isi);
	}
}
?>