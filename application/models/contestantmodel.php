<?php

	class Contestantmodel extends CI_Model
	{
		private $host;
		private $from;
		private $username_mail;
		private $password_mail;
		private $port;
	
		function __construct()
		{
			parent::__construct();
			$this->load->database();
			
			/* SMTP server name, port, user/passwd */
			$this->host = "smtp.gmail.com";
			$this->port = "25";
			$this->username_mail = "itbpc.official@gmail.com";
			$this->password_mail = "sambyabya";
			
			$this->from = "ITBPC Official 2012 <itbpc.official@gmail.com>";
		}
		
		function get_data_junior($id)
		{
			$query = $this->db->query("SELECT contestant_name,contestant_phone, contestant_address, contestant_email, contestant_class,
										contestant_school_name, contestant_school_address, contestant_supervisor FROM contestant_high_school 
										WHERE contestant_id = '".$id."'");
			$result = array();
			foreach ($query->result() as $row)
			{
				$result['name'] = $row->contestant_name;
				$result['phone'] = $row->contestant_phone;
				$result['address'] = $row->contestant_address;
				$result['email'] = $row->contestant_email;
				$result['class'] = $row->contestant_class;
				$result['school_name'] = $row->contestant_school_name;
				$result['school_address'] = $row->contestant_school_address;
				$result['supervisor'] = $row->contestant_supervisor;
			}
			return $result;
		}
		
		function get_data_senior($id)
		{
			$query = $this->db->query("SELECT contestant_team_name,contestant_university_name, contestant_university_address, contestant_leader_name, 
										contestant_leader_phone, contestant_leader_email, contestant_second_name, contestant_third_name, 
										contestant_supervisor_name FROM contestant_university WHERE contestant_id = '".$id."'");
			$result = array();
			foreach ($query->result() as $row)
			{
				$result['team_name'] = $row->contestant_team_name;
				$result['university_name'] = $row->contestant_university_name;
				$result['university_address'] = $row->contestant_university_address;
				$result['leader_name'] = $row->contestant_leader_name;
				$result['leader_phone'] = $row->contestant_leader_phone;
				$result['leader_email'] = $row->contestant_leader_email;
				$result['second_name'] = $row->contestant_second_name;
				$result['third_name'] = $row->contestant_third_name;
				$result['supervisor_name'] = $row->contestant_supervisor_name;
			}
			return $result;
		}
		
		function check_user($username, $password)
		{
			$password = md5($password);
			$query = $this->db->query("SELECT contestant_id,contestant_type FROM contestant WHERE contestant_username = '".$username."' AND contestant_password = '".$password."'");
			$result = array();
			foreach ($query->result() as $row)
			{
				$result['id'] = $row->contestant_id;
				$result['type'] = $row->contestant_type;
			}
			return $result;
		}
		
		function check_code($code)
		{
			$query = $this->db->query("SELECT contestant_id FROM contestant WHERE contestant_code = '".$code."'");
			
			$result = null;
			foreach ($query->result() as $row)
			{
				$result = $row->contestant_id;
			}
			return $result;
		}
		
		function change_password($id,$password)
		{
			$temp = mt_rand(100000,999999);
			$code = date("YHsdim").$temp;
			$result = $this->db->query("UPDATE contestant SET contestant_code = '".$code."', contestant_password = '".md5($password)."' WHERE contestant_id = '".$id."'");
			
			return $result;
		}
		
		function check_password($id,$password)
		{
			$query = $this->db->query("SELECT contestant_id FROM contestant WHERE contestant_id = '".$id."' AND contestant_password = '".md5($password)."'");
			return $query->num_rows();
		}
		
		function send_reset_code($email)
		{
			$id = null;
			$query = $this->db->query("SELECT contestant_id FROM contestant_high_school WHERE contestant_email = '".$email."'");
			$query2 = $this->db->query("SELECT contestant_id FROM contestant_university WHERE contestant_leader_email = '".$email."'");
			
			foreach ($query->result() as $row)
			{
				$id = $row->contestant_id;
			}
			
			foreach ($query2->result() as $row)
			{
				$id = $row->contestant_id;
			}
			
			$query = $this->db->query("SELECT contestant_code FROM contestant WHERE contestant_id = '".$id."'");
			
			foreach ($query->result() as $row)
			{
				$code = $row->contestant_code;
			}
			
			//email
			include("Mail.php");
			
			/* mail setup recipients, subject etc */
			$to = $email;
			$subject = "Permintaan perubahan password";
			$link = "http://localhost/itbpc2012/index.php/contestant/reset_password?code=".$code;
			$body = "Anda telah meminta perubahan password.\nUntuk mengubah password anda silahkan ke link berikut:\n\n".$link;
			
			$headers = array ('From' => $this->from,
			   'To' => $to,
			   'Subject' => $subject);

			$smtp = Mail::factory('smtp', array('host' => $this->host,
                                        'port' => $this->port,
                                        'auth' => true,
                                        'username' => $this->username_mail,
                                        'password' => $this->password_mail));
			$mail = $smtp->send($to, $headers, $body);
			 
			if (PEAR::isError($mail)) {
			   return 0;
			} else {
			   return 1;
			}
		}
		
		function check_email($email)
		{
			$query = $this->db->query("SELECT contestant_id FROM contestant_high_school WHERE contestant_email = '".$email."'");
			$query2 = $this->db->query("SELECT contestant_id FROM contestant_university WHERE contestant_leader_email = '".$email."'");
			return ($query->num_rows()+$query2->num_rows());
		}
		
		function check_team($team_name)
		{
			$query = $this->db->query("SELECT contestant_id FROM contestant_university WHERE contestant_team_name = '".$team_name."'");
			return $query->num_rows();
		}
		
		function add_user_high_school($nama, $ponsel, $alamat, $email, $kelas, $nama_sekolah, $alamat_sekolah, $pembimbing)
		{
			$query = $this->db->query("SELECT contestant_id FROM contestant_high_school");
			$result = $query->num_rows()+1;
			$username = "JPC".$result;
			$temp = mt_rand(100000,999999);
			$password = "JPC".$temp;
			$hashpassword = md5($password);
			
			$temp = mt_rand(100000,999999);
			$code = date("YHsdim").$temp;
			$result = $this->db->query("INSERT INTO contestant(contestant_username,contestant_password,contestant_type,contestant_code) VALUES ('".$username."','".$hashpassword."','1','".$code."')");

			$query = $this->db->query("SELECT contestant_id FROM contestant WHERE contestant_username = '".$username."'");
			
			foreach ($query->result() as $row)
			{
				$id = $row->contestant_id;
			}
			
			
			$this->db->query("INSERT INTO contestant_high_school(contestant_id,contestant_name,contestant_phone,contestant_address,contestant_email,".
							"contestant_class,contestant_school_name,contestant_school_address,contestant_supervisor) VALUES ".
							"('".$id."','".$nama."','".$ponsel."', '".$alamat."','".$email."','".$kelas."','".$nama_sekolah."','".$alamat_sekolah."','".$pembimbing."')");
			
			
			//email
			include("Mail.php");
			
			/* mail setup recipients, subject etc */
			$to = $email;
			$subject = "Pendaftaran JPC";
			$body = "Kepada ".$nama.",\n\nAnda telah berhasil mendaftar sebagai peserta ITB Junior Programming Contest 2012.\nBerikut data username dan password Anda:\n\n".
					"username: ".$username."\npassword: ".$password."\n\nSelamat bertanding dalam ITB Junior Programming Contest 2012.";
			
			$headers = array ('From' => $this->from,
			   'To' => $to,
			   'Subject' => $subject);

			$smtp = Mail::factory('smtp', array('host' => $this->host,
                                        'port' => $this->port,
                                        'auth' => true,
                                        'username' => $this->username_mail,
                                        'password' => $this->password_mail));
			$mail = $smtp->send($to, $headers, $body);
			 
			if (PEAR::isError($mail)) {
			   echo $mail->getMessage();
			} else {
			   return $result;
			}
		}
		
		function update_user_high_school($id, $nama, $ponsel, $alamat, $kelas, $nama_sekolah, $alamat_sekolah, $pembimbing)
		{			
			$result = $this->db->query("UPDATE contestant_high_school SET contestant_name='".$nama."',contestant_phone='".$ponsel."',contestant_address='".$alamat."',
							contestant_class='".$kelas."',contestant_school_name='".$nama_sekolah."',
							contestant_school_address='".$alamat_sekolah."',contestant_supervisor='".$pembimbing."' WHERE contestant_id = '".$id."'");
			 
		    return $result;
		}
		
		function add_user_university($nama_tim, $nama_universitas, $alamat_universitas, $nama_anggota_satu, $ponsel_anggota_satu, $email_anggota_satu, $nama_anggota_dua, $nama_anggota_tiga, $nama_pembimbing)
		{
			$query = $this->db->query("SELECT contestant_id FROM contestant_university");
			$result = $query->num_rows()+1;
			$username = "SPC".$result;
			$temp = mt_rand(100000,999999);
			$password = "SPC".$temp;
			$hashpassword = md5($password);
			
			$temp = mt_rand(100000,999999);
			$code = date("YHsdim").$temp;
			$result = $this->db->query("INSERT INTO contestant(contestant_username,contestant_password,contestant_type,contestant_code) VALUES ('".$username."','".$hashpassword."','2','".$code."')");
			
			$query = $this->db->query("SELECT contestant_id FROM contestant WHERE contestant_username = '".$username."'");
			
			foreach ($query->result() as $row)
			{
				$id = $row->contestant_id;
			}
			
			$this->db->query("INSERT INTO contestant_university(contestant_id,contestant_team_name,contestant_university_name,contestant_university_address,contestant_leader_name,".
							"contestant_leader_phone,contestant_leader_email,contestant_second_name,contestant_third_name,contestant_supervisor_name) VALUES ".
							"('".$id."','".$nama_tim."','".$nama_universitas."', '".$alamat_universitas."','".$nama_anggota_satu."','".$ponsel_anggota_satu."','".$email_anggota_satu."','".$nama_anggota_dua."','".$nama_anggota_tiga."','".$nama_pembimbing."')");
			
			//email
			include("Mail.php");
			
			/* mail setup recipients, subject etc */
			$to = $email_anggota_satu;
			$subject = "Pendaftaran SPC";
			$body = "Kepada ".$nama_tim.",\n\nAnda telah berhasil mendaftar sebagai peserta ITB Junior Programming Contest 2012.\nBerikut data username dan password Anda:\n\n".
					"username: ".$username."\npassword: ".$password."\n\nSelamat bertanding dalam ITB Junior Programming Contest 2012.";
			
			$headers = array ('From' => $this->from,
			   'To' => $to,
			   'Subject' => $subject);

			$smtp = Mail::factory('smtp', array('host' => $this->host,
                                        'port' => $this->port,
                                        'auth' => true,
                                        'username' => $this->username_mail,
                                        'password' => $this->password_mail));
			$mail = $smtp->send($to, $headers, $body);
			 
			if (PEAR::isError($mail)) {
			   echo $mail->getMessage();
			} else {
			   return $result;
			}
		}
		
		function update_user_university($id, $nama_universitas, $alamat_universitas, $nama_anggota_satu, $ponsel_anggota_satu, $nama_anggota_dua, $nama_anggota_tiga, $nama_pembimbing)
		{			
			$result = $this->db->query("UPDATE contestant_university SET contestant_university_name='".$nama_universitas."',
							contestant_university_address='".$alamat_universitas."',contestant_leader_name='".$nama_anggota_satu."',
							contestant_leader_phone='".$ponsel_anggota_satu."',
							contestant_second_name='".$nama_anggota_dua."',contestant_third_name='".$nama_anggota_tiga."',
							contestant_supervisor_name='".$nama_pembimbing."' WHERE contestant_id = '".$id."'");
			 
		    return $result;
		}
		
		function upload($id,$type,$flag)
		{
			$this->load->helper('url');
			$link = "";
			if ($flag==0)
			{
				if ($type==1)
				{
					$link = base_url("uploads/Kartu Pelajar/KP".$id);
				}
				else if ($type==2)
				{
					$link = base_url("uploads/bukti/Bukti".$id);
				}
			}
			else
			{
				if ($type==1)
				{
					$link = base_url("uploads/KTM/KTM".$id."_".$flag);
				}
				else if ($type==2)
				{
					$link = base_url("uploads/bukti/Bukti".$id);
				}
			}
			$result = $this->db->query("INSERT INTO contestant_image(contestant_id,contestant_image_url,contestant_image_type) VALUES ('".$id."','".$link."','".$type."')");
			
			return $result;
		}
	}

?>