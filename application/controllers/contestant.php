<?php 

class contestant extends CI_Controller{

	public function login(){
		$this->load->helper('url');
		$this->load->database();		
		
		if ((ISSET($_POST['username']))&&(ISSET($_POST['password'])))
		{
			$this->load->model('contestantmodel','co');
			$result = $this->co->check_user($_POST['username'], $_POST['password']);
			if ($result != null)
			{
				// berhasil login yeah
				session_start();
				$_SESSION['contestant_id'] = $result;
				$_SESSION['contestant_username'] = $_POST['username'];
				redirect('/welcome/index', 'refresh');
			}
			else
			{
				// u know what this mean
				$isi['message']='Maaf, username dan/atau password anda salah atau tidak terdaftar.';
				$this->load->view('error',$isi);
			}
		}
		else
		{
			$isi['isi']='login';
			$this->load->view('template',$isi);
		}
	}
	
	public function register_jpc(){
		$isi['isi']='jpc_register';
		$this->load->view('template',$isi);
	}
	
	public function logout(){
		$this->load->helper('url');
		session_start();
		session_unset();
		redirect('/welcome/index', 'refresh');
	}
}
?>