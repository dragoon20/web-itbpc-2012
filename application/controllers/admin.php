<?php 

class admin extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');
		session_start();
	}
	
	function manage_jpc()
	{
		if (ISSET($_SESSION['contestant_id']))
		{
			if ($_SESSION['contestant_type']==3)
			{
				$this->load->model('contestantmodel','co');
				$isi['isi'] = 'manage_jpc';
				$isi['contestant'] = $this->co->get_junior();
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
	
	function detail_jpc()
	{
		if (ISSET($_SESSION['contestant_id']))
		{
			if ($_SESSION['contestant_type']==3)
			{
				if (ISSET($_GET['id']))
				{
					$this->load->model('contestantmodel','co');
					$isi['isi'] = 'detail_jpc';					
					$isi['kartu']=$this->co->get_image($_GET['id'],1);
					$isi['bukti']=$this->co->get_image($_GET['id'],2);
					$isi['data']=$this->co->get_data_junior($_GET['id']);
					$isi['id']=$_GET['id'];
					$isi['contestant'] = $this->co->get_junior();
					$this->load->view('template',$isi);
				}
				else
				{
					$isi['message']='Maaf, Halaman ini tidak ada.';
					$isi['isi']='error';
					$this->load->view('template',$isi);
				}
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
	
	function manage_spc()
	{
		if (ISSET($_SESSION['contestant_id']))
		{
			if ($_SESSION['contestant_type']==3)
			{
				$this->load->model('contestantmodel','co');
				$isi['isi'] = 'manage_spc';
				$isi['contestant'] = $this->co->get_senior();
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
	
	function detail_spc()
	{
		if (ISSET($_SESSION['contestant_id']))
		{
			if ($_SESSION['contestant_type']==3)
			{
				if (ISSET($_GET['id']))
				{
					$this->load->model('contestantmodel','co');
					$isi['isi']='detail_spc';
					$isi['kartu']=$this->co->get_image($_GET['id'],1);
					$isi['bukti']=$this->co->get_image($_GET['id'],2);
					$isi['data']=$this->co->get_data_senior($_GET['id']);
					$isi['id']=$_GET['id'];
					$this->load->view('template',$isi);
				}
				else
				{
					$isi['message']='Maaf, Halaman ini tidak ada.';
					$isi['isi']='error';
					$this->load->view('template',$isi);
				}
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
	
	function approve()
	{
		if (ISSET($_SESSION['contestant_id']))
		{
			if ($_SESSION['contestant_type']==3)
			{
				if (ISSET($_GET['id']))
				{
					$this->load->model('contestantmodel','co');
					$result = $this->co->approve($_GET['id']);
					if ($result!=0)
						redirect($_SESSION['url'], 'refresh');
					else
					{
						$isi['message']='Maaf, Perubahan data gagal.';
						$isi['isi']='error';
						$this->load->view('template',$isi);
					}
				}
				else
				{
					$isi['message']='Maaf, Halaman ini tidak ada.';
					$isi['isi']='error';
					$this->load->view('template',$isi);
				}
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
	
	function unapprove()
	{
		if (ISSET($_SESSION['contestant_id']))
		{
			if ($_SESSION['contestant_type']==3)
			{
				if (ISSET($_GET['id']))
				{
					$this->load->model('contestantmodel','co');
					$result = $this->co->unapprove($_GET['id']);
					if ($result!=0)
						redirect($_SESSION['url'], 'refresh');
					else
					{
						$isi['message']='Maaf, Perubahan data gagal.';
						$isi['isi']='error';
						$this->load->view('template',$isi);
					}
				}
				else
				{
					$isi['message']='Maaf, Halaman ini tidak ada.';
					$isi['isi']='error';
					$this->load->view('template',$isi);
				}
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
?>