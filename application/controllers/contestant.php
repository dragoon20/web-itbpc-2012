<?php 

class contestant extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');
		session_start();
	}

	public function login(){
		
		if ((ISSET($_POST['username']))&&(ISSET($_POST['password'])))
		{
			$this->load->model('contestantmodel','co');
			$result = $this->co->check_user($_POST['username'], $_POST['password']);
			if ($result != null)
			{
				// berhasil login yeah
				
				$_SESSION['contestant_id'] = $result['id'];
				$_SESSION['contestant_type'] = $result['type'];
				$_SESSION['contestant_username'] = $_POST['username'];
				redirect($_SESSION['url'], 'refresh');
			}
			else
			{
				// u know what this mean
				$isi['message']='Maaf, username dan/atau password anda salah atau tidak terdaftar.';
				$isi['isi']='error';
				$this->load->view('template',$isi);
			}
		}
		else
		{
			$isi['isi']='login';
			$this->load->view('template',$isi);
		}
	}
	
	public function halaman_jpc()
	{
		if (ISSET($_SESSION['contestant_id']))
		{
			if ($_SESSION['contestant_type']==1)
			{
				$this->load->model('contestantmodel','co');
				$isi['isi']='jpc_halaman';
				$isi['data']=$this->co->get_data_junior($_SESSION['contestant_id']);
				$this->load->view('template',$isi);
			}
			else
			{
				$isi['message']='Maaf, Anda tidak bisa mengakses halaman ini.';
				$isi['isi']='error';
				$this->load->view('template',$isi);
			}
		}
		else
		{
			$isi['message']='Maaf, Anda harus login terlebih dahulu.';
			$isi['isi']='error';
			$this->load->view('template',$isi);
		}
	}
	
	public function halaman_spc()
	{
		if (ISSET($_SESSION['contestant_id']))
		{
			if ($_SESSION['contestant_type']==2)
			{
				$this->load->model('contestantmodel','co');
				$isi['isi']='spc_halaman';
				$isi['data']=$this->co->get_data_senior($_SESSION['contestant_id']);
				$this->load->view('template',$isi);
			}
			else
			{
				$isi['message']='Maaf, Anda tidak bisa mengakses halaman ini.';
				$isi['isi']='error';
				$this->load->view('template',$isi);
			}
		}
		else
		{
			$isi['message']='Maaf, Anda harus login terlebih dahulu.';
			$isi['isi']='error';
			$this->load->view('template',$isi);
		}
	}
	
	public function edit_data_jpc(){
	
		$error = array();
		
		if ((ISSET($_POST['nama_lengkap']))&&(ISSET($_POST['nomor_ponsel']))&&(ISSET($_POST['alamat']))&&
			(ISSET($_POST['kelas']))&&(ISSET($_POST['nama_sekolah']))&&
			(ISSET($_POST['alamat_sekolah'])))
		{
			$this->load->model('contestantmodel','co');
			if (($_POST['nama_lengkap']=="")||($_POST['nama_lengkap']==null))
				array_push($error,"Nama harus diisi.");
			if (($_POST['kelas']=="")||($_POST['kelas']==null))
				array_push($error,"Kelas harus diisi.");
			if (($_POST['nama_sekolah']=="")||($_POST['nama_sekolah']==null))
				array_push($error,"Nama Sekolah harus diisi.");
				
			if (!empty($error))
			{
				$isi['error']=$error;
				$isi['isi']='jpc_edit_data';
				$isi['data']=$this->co->get_data_junior($_SESSION['contestant_id']);
				$this->load->view('template',$isi);
			}
			else
			{		
				$nama_pembimbing = (ISSET($_POST['nama_pembimbing'])) ? $_POST['nama_pembimbing'] : "";
				if (ISSET($_SESSION['contestant_id']))
				{
					$result = $this->co->update_user_high_school($_SESSION['contestant_id'],$_POST['nama_lengkap'], $_POST['nomor_ponsel'], $_POST['alamat'], 
																 $_POST['kelas'], $_POST['nama_sekolah'], $_POST['alamat_sekolah'], $nama_pembimbing);														
					if ($result != 0)
					{
						redirect(base_url('contestant/halaman_jpc'), 'refresh');
					}
				}
				else
				{
					$isi['message']='Maaf, Anda harus login terlebih dahulu.';
					$isi['isi']='error';
					$this->load->view('template',$isi);
				}
			}
		}
		else
		{
			if (ISSET($_SESSION['contestant_id']))
			{
				if ($_SESSION['contestant_type']==1)
				{
					$this->load->model('contestantmodel','co');
					$isi['isi']='jpc_edit_data';
					$isi['data']=$this->co->get_data_junior($_SESSION['contestant_id']);
					$this->load->view('template',$isi);
				}
				else
				{
					$isi['message']='Maaf, Anda tidak bisa mengakses halaman ini.';
					$isi['isi']='error';
					$this->load->view('template',$isi);
				}
			}
			else
			{
				$isi['message']='Maaf, Anda harus login terlebih dahulu.';
				$isi['isi']='error';
				$this->load->view('template',$isi);
			}
		}
	}
	
	public function edit_data_spc(){

		$error = array();
		
		if ((ISSET($_POST['nama_universitas']))&&(ISSET($_POST['alamat_universitas']))&&
			(ISSET($_POST['nama_anggota_satu']))&&(ISSET($_POST['ponsel_anggota_satu'])))
		{
			$this->load->model('contestantmodel','co');
			if (($_POST['nama_universitas']=="")||($_POST['nama_universitas']==null))
				array_push($error,"Nama Universitas harus diisi.");
			if (($_POST['nama_anggota_satu']=="")||($_POST['nama_anggota_satu']==null))
				array_push($error,"Nama Lengkap Anggota Tim #1 (Ketua) harus diisi.");
				
			if (!empty($error))
			{
				$isi['error']=$error;
				$isi['isi']='spc_edit_data';
				$isi['data']=$this->co->get_data_senior($_SESSION['contestant_id']);
				$this->load->view('template',$isi);
			}
			else
			{
				$nama_anggota_2 = (ISSET($_POST['nama_anggota_dua'])) ? $_POST['nama_anggota_dua'] : "";
				$nama_anggota_3 = (ISSET($_POST['nama_anggota_tiga'])) ? $_POST['nama_anggota_tiga'] : "";
				$nama_pembimbing = (ISSET($_POST['nama_pembimbing'])) ? $_POST['nama_pembimbing'] : "";
				
				if (ISSET($_SESSION['contestant_id']))
				{
					$this->load->model('contestantmodel','co');
					$result = $this->co->update_user_university($_SESSION['contestant_id'], $_POST['nama_universitas'], $_POST['alamat_universitas'], $_POST['nama_anggota_satu'], 
																$_POST['ponsel_anggota_satu'], $nama_anggota_2, $nama_anggota_3, $nama_pembimbing);
																
					if ($result != 0)
					{
						redirect(base_url('contestant/halaman_spc'), 'refresh');
					}
				}
				else
				{
					$isi['message']='Maaf, Anda harus login terlebih dahulu.';
					$isi['isi']='error';
					$this->load->view('template',$isi);
				}
			}
		}
		else
		{
			if (ISSET($_SESSION['contestant_id']))
			{
				if ($_SESSION['contestant_type']==2)
				{
					$this->load->model('contestantmodel','co');
					$isi['isi']='spc_edit_data';
					$isi['data']=$this->co->get_data_senior($_SESSION['contestant_id']);
					$this->load->view('template',$isi);
				}
				else
				{
					$isi['message']='Maaf, Anda tidak bisa mengakses halaman ini.';
					$isi['isi']='error';
					$this->load->view('template',$isi);
				}
			}
			else
			{
				$isi['message']='Maaf, Anda harus login terlebih dahulu.';
				$isi['isi']='error';
				$this->load->view('template',$isi);
			}
		}
	}
	
	public function upload_data_sma(){
		$isi['isi']='upload_data_sma';
		$this->load->view('template',$isi);
	}
	
	public function upload_data_universitas(){
		$isi['isi']='upload_data_universitas';
		$this->load->view('template',$isi);
	}
	
	public function upload_kartu_pelajar_sma(){
		
		if (ISSET($_SESSION['contestant_id']))
		{
			$this->load->model('contestantmodel','co');
			$this->co->upload($_SESSION['contestant_id'],1,0);
			
			$config['upload_path'] = './uploads/Kartu Pelajar/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = 'KP'.$_SESSION['contestant_id'];
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
		else
		{
			echo "fail";
		}
	}
	
	public function upload_kartu_pelajar_universitas(){
		
		if (ISSET($_SESSION['contestant_id']))
		{
			if (ISSET($_GET['flag']))
			{
				$this->load->model('contestantmodel','co');
				$this->co->upload($_SESSION['contestant_id'],1,$_GET['flag']);
				
				$config['upload_path'] = './uploads/KTM/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = 'KTM'.$_SESSION['contestant_id'].'_'.$_GET['flag'];
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
			else
			{
				echo "fail";
			}
		}
		else
		{
			echo "fail";
		}
	}
	
	public function upload_bukti_pembayaran(){
	
		
		if (ISSET($_SESSION['contestant_id']))
		{
			$this->load->model('contestantmodel','co');
			$this->co->upload($_SESSION['contestant_id'],2,0);
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
		else
		{
			echo "fail";
		}
	}
	
	public function change_password(){
		if (ISSET($_SESSION['contestant_id']))
		{
			$error = array();
			if ((ISSET($_POST['password_lama']))&&(ISSET($_POST['password_baru'])))
			{
				$this->load->model('contestantmodel','co');
				if (($_POST['password_baru'])!=($_POST['konfirmasi_password_baru']))
					array_push($error,"Password yang dimasukkan tidak sama.");
				$result = $this->co->check_password($_SESSION['contestant_id'],$_POST['password_lama']);
				if ($result==0)
					array_push($error,"Password lama yang dimasukkan salah.");
				if (!empty($error))
				{
					$isi['error']=$error;
					$isi['isi']='change_password';
					$this->load->view('template',$isi);
				}
				else
				{
					$result = $this->co->change_password($_SESSION['contestant_id'],$_POST['password_baru']);
					
					if ($result != null)
					{
						if ($_SESSION['contestant_type']==1)
							redirect(base_url('contestant/halaman_jpc'), 'refresh');
						else
							redirect(base_url('contestant/halaman_spc'), 'refresh');
					}
					else
					{
						$isi['message']='Maaf, password anda tidak dapat diganti. Silahkan hubungi panitia.';
						$isi['isi']='error';
						$this->load->view('template',$isi);
					}
				}
			}
			else
			{
				$isi['isi']='change_password';
				$this->load->view('template',$isi);
			}
		}
		else
		{
			$isi['message']='Maaf, Anda harus login terlebih dahulu.';
			$isi['isi']='error';
			$this->load->view('template',$isi);
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
					$isi['isi']='pesan';
					$isi['message']='Sebuah pesan telah dikirim ke alamat email anda untuk prosedur reset password.';
					$this->load->view('template',$isi);
				}
			}
			else
			{
				$isi['message']='Maaf, email yang anda masukkan tidak terdaftar.';
				$isi['isi']='error';
				$this->load->view('template',$isi);
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
				$isi['id']=$result;
				$isi['isi']='reset_password';
				$this->load->view('template',$isi);
			}
			else
			{
				$isi['message']='Maaf, link yang anda masukkan tidak terdaftar.';
				$isi['isi']='error';
				$this->load->view('template',$isi);
			}
		}
		else
		{
			$isi['message']='Maaf, link yang anda masukkan tidak terdaftar.';
			$isi['isi']='error';
			$this->load->view('template',$isi);
		}
	}
	
	public function reseted_password()
	{
		$error = array();
		if ((ISSET($_POST['id']))&&(ISSET($_POST['password_baru'])))
		{
			if (($_POST['password_baru'])!=($_POST['konfirmasi_password_baru']))
				array_push($error,"Password yang dimasukkan tidak sama.");
			if (!empty($error))
			{
				$isi['error']=$error;
				$isi['isi']='reset_password';
				$isi['id']=$_POST['id'];
				$this->load->view('template',$isi);
			}
			else
			{
				$this->load->model('contestantmodel','co');
				$result = $this->co->change_password($_POST['id'],$_POST['password_baru']);
				
				if ($result != null)
				{
					redirect('/welcome/index', 'refresh');
				}
				else
				{
					$isi['message']='Maaf, password anda tidak dapat diganti. Silahkan hubungi panitia.';
					$isi['isi']='error';
					$this->load->view('template',$isi);
				}
			}
		}
		else
		{
			$isi['message']='Maaf, password anda tidak dapat diganti. Silahkan hubungi panitia.';
			$isi['isi']='error';
			$this->load->view('template',$isi);
		}
	}
	
	public function register_jpc(){
	
		$error = array();
	
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
				array_push($error,"CAPTCHA yang dimasukkan tidak benar.");
				$isi['error']=$error;
				$isi['isi']='jpc_register';
				$this->load->view('template',$isi);
			} else {
				// Your code here to handle a successful verification
				if ((ISSET($_POST['nama_lengkap']))&&(ISSET($_POST['nomor_ponsel']))&&(ISSET($_POST['alamat']))&&
					(ISSET($_POST['email']))&&(ISSET($_POST['kelas']))&&(ISSET($_POST['nama_sekolah']))&&
					(ISSET($_POST['alamat_sekolah']))&&(ISSET($_POST['nama_pembimbing'])))
				{
					$this->load->model('contestantmodel','co');
					if (($_POST['nama_lengkap']=="")||($_POST['nama_lengkap']==null))
						array_push($error,"Nama harus diisi.");
					if (($_POST['email']=="")||($_POST['email']==null))
						array_push($error,"Email harus diisi.");
					else
					{
						if (!((strpos($_POST['email'],'@'))&&(strpos($_POST['email'],'.'))))
						{
							array_push($error,"Email harus diisi dengan format yang benar.");
						}
						else
						{
							$result = $this->co->check_email($_POST['email']);
							if ($result!=0)
								array_push($error,"Email yang dimasukkan sudah terdaftar.");
						}
					}
					if (($_POST['kelas']=="")||($_POST['kelas']==null))
						array_push($error,"Kelas harus diisi.");
					if (($_POST['nama_sekolah']=="")||($_POST['nama_sekolah']==null))
						array_push($error,"Nama Sekolah harus diisi.");
						
					if (!empty($error))
					{
						$isi['error']=$error;
						$isi['isi']='jpc_register';
						$this->load->view('template',$isi);
					}
					else
					{			
						$result = $this->co->add_user_high_school($_POST['nama_lengkap'], $_POST['nomor_ponsel'], $_POST['alamat'], $_POST['email'], 
																	$_POST['kelas'], $_POST['nama_sekolah'], $_POST['alamat_sekolah'], $_POST['nama_pembimbing']);
																	
						if ($result != 0)
						{
							$isi['isi']='pesan';
							$isi['message']='Selamat anda telah berhasil registrasi ITB Junior Programming Contest.<br />'.
											'Sebuah pesan telah dikirimkan ke email anda. Silahkan cek email anda.';
							$this->load->view('template',$isi);
						}
						else
						{
							echo $result;
						}
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
		
		$error = array();
		
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
				array_push($error,"CAPTCHA yang dimasukkan tidak benar.");
				$isi['error']=$error;
				$isi['isi']='jpc_register';
				$this->load->view('template',$isi);
			} else {
				// Your code here to handle a successful verification
				if ((ISSET($_POST['nama_tim']))&&(ISSET($_POST['nama_universitas']))&&(ISSET($_POST['alamat_universitas']))&&
				(ISSET($_POST['nama_anggota_satu']))&&(ISSET($_POST['ponsel_anggota_satu']))&&(ISSET($_POST['email_anggota_satu'])))
				{
					$this->load->model('contestantmodel','co');
					if (($_POST['nama_tim']=="")||($_POST['nama_tim']==null))
						array_push($error,"Nama Tim harus diisi.");
					else
					{
						$result = $this->co->check_team($_POST['nama_tim']);
						if ($result!=0)
							array_push($error,"Nama Tim yang dimasukkan sudah terdaftar.");
					}
					if (($_POST['nama_universitas']=="")||($_POST['nama_universitas']==null))
						array_push($error,"Nama Universitas harus diisi.");
					if (($_POST['nama_anggota_satu']=="")||($_POST['nama_anggota_satu']==null))
						array_push($error,"Nama Lengkap Anggota Tim #1 (Ketua) harus diisi.");
					if (($_POST['email_anggota_satu']=="")||($_POST['email_anggota_satu']==null))
						array_push($error,"Email Anggota Tim #1 harus diisi.");
					else
					{
						if (!((strpos($_POST['email_anggota_satu'],'@'))&&(strpos($_POST['email_anggota_satu'],'.'))))
						{
							array_push($error,"Email Anggota Tim #1 harus diisi dengan format yang benar.");
						}
						else
						{
							$result = $this->co->check_email($_POST['email_anggota_satu']);
							if ($result!=0)
								array_push($error,"Email yang dimasukkan sudah terdaftar.");
						}
					}
						
					if (!empty($error))
					{
						$isi['error']=$error;
						$isi['isi']='spc_register';
						$this->load->view('template',$isi);
					}
					else
					{			
						$nama_anggota_2 = (ISSET($_POST['nama_anggota_dua'])) ? $_POST['nama_anggota_dua'] : "";
						$nama_anggota_3 = (ISSET($_POST['nama_anggota_tiga'])) ? $_POST['nama_anggota_tiga'] : "";
						$nama_pembimbing = (ISSET($_POST['nama_pembimbing'])) ? $_POST['nama_pembimbing'] : "";
						
						$this->load->model('contestantmodel','co');
						$result = $this->co->add_user_university($_POST['nama_tim'], $_POST['nama_universitas'], $_POST['alamat_universitas'], $_POST['nama_anggota_satu'], 
																	$_POST['ponsel_anggota_satu'], $_POST['email_anggota_satu'], $nama_anggota_2, $nama_anggota_3, $nama_pembimbing);
																
						if ($result != 0)
						{
							$isi['isi']='pesan';
							$isi['message']='Selamat anda telah berhasil registrasi ITB Senior Programming Contest.<br />'.
											'Sebuah pesan telah dikirimkan ke email anda. Silahkan cek email anda.';
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
		}
		else
		{
			$isi['isi']='spc_register';
			$this->load->view('template',$isi); 
		}
	}
	
	public function logout(){
		
		session_unset();
		redirect('/welcome/index', 'refresh');
	}
}
?>