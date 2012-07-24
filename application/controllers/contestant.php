<?php 

class contestant extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');
	}

	public function login(){
		
		if ((ISSET($_POST['username']))&&(ISSET($_POST['password'])))
		{
			$this->load->model('contestantmodel','co');
			$result = $this->co->check_user($_POST['username'], $_POST['password']);
			if ($result != null)
			{
				// berhasil login yeah
				session_start();
				$_SESSION['contestant_id'] = $result['id'];
				$_SESSION['contestant_type'] = $result['type'];
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
	
	public function edit_data_jpc(){
		
		$this->load->model('contestantmodel','co');
		$isi['isi']='jpc_edit_data';
		$this->load->view('template',$isi);
	}
	
	public function upload_data_sma(){
		$isi['isi']='upload_data_sma';
		$this->load->view('template',$isi);
	}
	
	public function upload_data_universitas(){
		$isi['isi']='upload_data_universitas';
		$this->load->view('template',$isi);
	}
	
	public function upload_kartu_pelajar(){
	
		session_start();
		
		$config['upload_path'] = './uploads/KTM/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = 'KTM'.$_SESSION['contestant_id'];
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			//$error = array('error' => $this->upload->display_errors());
			//echo $error['error'];
			echo "fail";
		}
		else
		{
			echo "success";
		}
	}
	
	public function upload_bukti_pembayaran(){
	
		session_start();
		
		$config['upload_path'] = './uploads/bukti/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = 'Bukti'.$_SESSION['contestant_id'];
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo "fail";
		}
		else
		{
			echo "success";
		}
	}
	
	public function forgot_password(){
		
		if (ISSET($_POST['email']))
		{
			$this->load->model('contestantmodel','co');
			$result = $this->co->check_email($_POST['email']);
			if ($result>0)
			{
				$result = $this->co->send_reset_code($_POST['email']);
				if ($result>0)
				{
					$isi['message']='Sebuah pesan telah dikirim ke alamat email anda untuk prosedur reset password.';
					$this->load->view('pesan',$isi);
				}
			}
			else
			{
				$isi['message']='Maaf, email yang anda masukkan tidak terdaftar.';
				$this->load->view('error',$isi);
			}
		}
		else
		{
			$isi['isi']='reset_pass';
			$this->load->view('template',$isi);
		}
	}
	
	public function reset_password(){
	
		if (ISSET($_GET['code']))
		{
			$this->load->model('contestantmodel','co');
			$result = $this->co->check_code($_GET['code']);
			
			if ($result != null)
			{
				$isi['message']='Password anda telah berhasil direset.';
				$this->load->view('pesan',$isi);
			}
			else
			{
				$isi['message']='Maaf, link yang anda masukkan tidak terdaftar.';
				$this->load->view('error',$isi);
			}
		}
		else
		{
			$isi['message']='Maaf, link yang anda masukkan tidak terdaftar.';
			$this->load->view('error',$isi);
		}
	}
	
	public function reseted_password()
	{
		if ((ISSET($_POST['id']))&&(ISSET($_POST['password_baru'])))
		{
			$this->load->model('contestantmodel','co');
			$result = $this->co->change_password($_POST['id'],$_POST['password_baru']);
			
			if ($result != null)
			{
				redirect('/contestant/login', 'refresh');
			}
			else
			{
				$isi['message']='Maaf, password anda tidak dapat diganti. Silahkan hubungi panitia.';
				$this->load->view('error',$isi);
			}
		}
		else
		{
			$isi['message']='Maaf, password anda tidak dapat diganti. Silahkan hubungi panitia.';
			$this->load->view('error',$isi);
		}
	}
	
	public function register_jpc(){
	
		require_once($_SERVER['DOCUMENT_ROOT'].'/itbpc2012/application/libraries/recaptchalib.php');
		
		$privatekey = "6LcNUdQSAAAAAPZc3bFtC6huj-nfs1lGvJSBuRs1";
		
		if ((ISSET($_POST["recaptcha_challenge_field"]))&&(ISSET($_POST["recaptcha_response_field"])))
		{
			$resp = recaptcha_check_answer ($privatekey,
									$_SERVER["REMOTE_ADDR"],
									$_POST["recaptcha_challenge_field"],
									$_POST["recaptcha_response_field"]);

			if (!$resp->is_valid) {
				// What happens when the CAPTCHA was entered incorrectly
				die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
						"(reCAPTCHA said: " . $resp->error . ")");
			} else {
				// Your code here to handle a successful verification
				if ((ISSET($_POST['nama_lengkap']))&&(ISSET($_POST['nomor_ponsel']))&&(ISSET($_POST['alamat']))&&
					(ISSET($_POST['email']))&&(ISSET($_POST['kelas']))&&(ISSET($_POST['nama_sekolah']))&&
					(ISSET($_POST['alamat_sekolah']))&&(ISSET($_POST['nama_pembimbing'])))
				{
					$this->load->model('contestantmodel','co');
					$result = $this->co->add_user_high_school($_POST['nama_lengkap'], $_POST['nomor_ponsel'], $_POST['alamat'], $_POST['email'], 
																$_POST['kelas'], $_POST['nama_sekolah'], $_POST['alamat_sekolah'], $_POST['nama_pembimbing']);
																
					if ($result != 0)
					{
						redirect('/welcome/index', 'refresh');
					}
					else
					{
						echo $result;
					}
				}
				else
				{
					$isi['isi']='jpc_register';
					$this->load->view('template',$isi);
				}
			}
		}
		else
		{
			$isi['isi']='jpc_register';
			$this->load->view('template',$isi);
		}
	}
	
	public function register_spc() {
		
		require_once($_SERVER['DOCUMENT_ROOT'].'/itbpc2012/application/libraries/recaptchalib.php');
		
		$privatekey = "6LcNUdQSAAAAAPZc3bFtC6huj-nfs1lGvJSBuRs1";
		
		if ((ISSET($_POST["recaptcha_challenge_field"]))&&(ISSET($_POST["recaptcha_response_field"])))
		{
			$resp = recaptcha_check_answer ($privatekey,
									$_SERVER["REMOTE_ADDR"],
									$_POST["recaptcha_challenge_field"],
									$_POST["recaptcha_response_field"]);

			if (!$resp->is_valid) {
				// What happens when the CAPTCHA was entered incorrectly
				die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
						"(reCAPTCHA said: " . $resp->error . ")");
			} else {
				// Your code here to handle a successful verification
				if ((ISSET($_POST['nama_tim']))&&(ISSET($_POST['nama_universitas']))&&(ISSET($_POST['alamat_universitas']))&&
				(ISSET($_POST['nama_anggota_satu']))&&(ISSET($_POST['ponsel_anggota_satu']))&&(ISSET($_POST['email_anggota_satu'])))
				{
					
					$nama_anggota_2 = (ISSET($_POST['nama_anggota_dua'])) ? $_POST['nama_anggota_dua'] : "";
					$nama_anggota_3 = (ISSET($_POST['nama_anggota_tiga'])) ? $_POST['nama_anggota_tiga'] : "";
					$nama_pembimbing = (ISSET($_POST['nama_pembimbing'])) ? $_POST['nama_pembimbing'] : "";
					
					$this->load->model('contestantmodel','co');
					$result = $this->co->add_user_university($_POST['nama_tim'], $_POST['nama_universitas'], $_POST['alamat_universitas'], $_POST['nama_anggota_satu'], 
																$_POST['ponsel_anggota_satu'], $_POST['email_anggota_satu'], $nama_anggota_2, $nama_anggota_3, $nama_pembimbing);
																
					if ($result != 0)
					{
						redirect('/welcome/index', 'refresh');
					}
				}
				else
				{
					$isi['isi']='spc_register';
					$this->load->view('template',$isi); 
				}
			}	
		}
		else
		{
			$isi['isi']='spc_register';
			$this->load->view('template',$isi); 
		}
	}
	
	public function logout(){
		session_start();
		session_unset();
		redirect('/welcome/index', 'refresh');
	}
}
?>