<?php 

class FAQ extends CI_Controller{
	public function faq_content(){
		$isi['isi']='faq';
		$this->load->view('template',$isi);
	}
}
?>