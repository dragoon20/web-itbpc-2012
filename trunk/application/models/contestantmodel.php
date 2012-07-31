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
		
		function approve($id)
		{
			$data = array(
						'contestant_flag' => 1
					);
			$this->db->where('contestant_id',$id);
			$result = $this->db->update('contestant',$data);
			return $result;
		}
		
		function unapprove($id)
		{
			$data = array(
						'contestant_flag' => 0
					);
			$this->db->where('contestant_id',$id);
			$result = $this->db->update('contestant',$data);
			return $result;
		}
		
		function get_junior()
		{
			$this->db->select('*');
			$this->db->from('contestant_high_school');
			$this->db->join('contestant','contestant.contestant_id=contestant_high_schoold.contestant_id');
			$query = $this->db->get();
			$result = array();
			foreach ($query->result() as $row)
			{
				$temp['id'] = $row->contestant_id;
				$temp['name'] = $row->contestant_name;
				$temp['phone'] = $row->contestant_phone;
				$temp['email'] = $row->contestant_email;
				$temp['class'] = $row->contestant_class;
				$temp['school_name'] = $row->contestant_school_name;
				$temp['flag'] = $row->contestant_flag;
				array_push($result,$temp);
			}
			return $result;				
		}
		
		function get_data_junior($id)
		{
			$this->db->select('contestant_name,contestant_phone, contestant_address, contestant_email, contestant_class,
										contestant_school_name, contestant_school_address, contestant_supervisor');
			$this->db->from('contestant_high_school');
			$this->db->where('contestant_id',$id);
			$query = $this->db->get();
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
		
		function get_senior()
		{
			$this->db->select('*');
			$this->db->from('contestant_university');
			$this->db->join('contestant','contestant.contestant_id=contestant_high_schoold.contestant_id');
			$query = $this->db->get();
			$result = array();
			foreach ($query->result() as $row)
			{
				$temp['id'] = $row->contestant_id;
				$temp['name'] = $row->contestant_team_name;
				$temp['phone'] = $row->contestant_leader_phone;
				$temp['email'] = $row->contestant_leader_email;
				$temp['leader_name'] = $row->contestant_leader_name;
				$temp['university_name'] = $row->contestant_university_name;
				$temp['flag'] = $row->contestant_flag;
				array_push($result,$temp);
			}
			return $result;				
		}
		
		function get_data_senior($id)
		{
			$this->db->select('contestant_team_name,contestant_university_name, contestant_university_address, contestant_leader_name, 
										contestant_leader_phone, contestant_leader_email, contestant_second_name, contestant_third_name, 
										contestant_supervisor_name');
			$this->db->from('contestant_university');
			$this->db->where('contestant_id',$id);
			$query = $this->db->get();
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
			$this->db->select('contestant_id,contestant_type');
			$this->db->from('contestant');
			$this->db->where('contestant_username',$username);
			$this->db->where('contestant_password',$password);
			$query = $this->db->get();
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
			$this->db->select('contestant_id');
			$this->db->from('contestant');
			$this->db->where('contestant_code',$code);
			$query = $this->db->get();
			
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
			
			$data = array(
						'contestant_code' => $code,
						'contestant_password' => md5($password)
					);
			$this->db->where('contestant_id',$id);
			$result = $this->db->update('contestant',$data);
			
			return $result;
		}
		
		function check_password($id,$password)
		{
			$this->db->select('contestant_id');
			$this->db->from('contestant');
			$this->db->where('contestant_id',$id);
			$this->db->where('contestant_password',md5($password));
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		function send_reset_code($email)
		{
			$id = null;
			
			$this->db->select('contestant_id');
			$this->db->from('contestant_high_school');
			$this->db->where('contestant_email',$email);
			$query = $this->db->get();
			
			$this->db->select('contestant_id');
			$this->db->from('contestant_university');
			$this->db->where('contestant_leader_email',$email);
			$query2 = $this->db->get();
			
			foreach ($query->result() as $row)
			{
				$id = $row->contestant_id;
			}
			
			foreach ($query2->result() as $row)
			{
				$id = $row->contestant_id;
			}
			
			$this->db->select('contestant_code');
			$this->db->from('contestant');
			$this->db->where('contestant_id',$id);
			$query = $this->db->get();
			
			foreach ($query->result() as $row)
			{
				$code = $row->contestant_code;
			}
			
			//email
			include("Mail.php");
			
			/* mail setup recipients, subject etc */
			$to = $email;
			$subject = "Permintaan perubahan password";
			$link = base_url("contestant/reset_password?code=".$code);
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
			$this->db->select('contestant_id');
			$this->db->from('contestant_high_school');
			$this->db->where('contestant_email',$email);
			$query = $this->db->get();
			
			$this->db->select('contestant_id');
			$this->db->from('contestant_university');
			$this->db->where('contestant_leader_email',$email);
			$query2 = $this->db->get();

			return ($query->num_rows()+$query2->num_rows());
		}
		
		function check_team($team_name)
		{
			$this->db->select('contestant_id');
			$this->db->from('contestant_university');
			$this->db->where('contestant_team_name',$team_name);
			$query = $this->db->get();
			
			return $query->num_rows();
		}
		
		function add_user_high_school($nama, $ponsel, $alamat, $email, $kelas, $nama_sekolah, $alamat_sekolah, $pembimbing)
		{
			$this->db->select('contestant_id');
			$this->db->from('contestant_high_school');
			$query = $this->db->get();

			$result = $query->num_rows()+1;
			$username = "JPC".$result;
			$temp = mt_rand(100000,999999);
			$password = "JPC".$temp;
			$hashpassword = md5($password);
			
			$temp = mt_rand(100000,999999);
			$code = date("YHsdim").$temp;
			
			$data = array(
				'contestant_username' => $username,
				'contestant_password' => $hashpassword,
				'contestant_type' => '1',
				'contestant_code' => $code
			);			
			$result = $this->db->insert('contestant',$data);

			$this->db->select('contestant_id');
			$this->db->from('contestant');
			$this->db->where('contestant_username',$username);
			$query = $this->db->get();
			
			foreach ($query->result() as $row)
			{
				$id = $row->contestant_id;
			}		
			
			$data = array(
				'contestant_id' => $id,
				'contestant_name' => $nama,
				'contestant_phone' => $ponsel,
				'contestant_address' => $alamat,
				'contestant_email' => $email,
				'contestant_class' => $kelas,
				'contestant_school_name' => $nama_sekolah,
				'contestant_school_address' => $alamat_sekolah,
				'contestant_supervisor' => $pembimbing
			);			
			$this->db->insert('contestant_high_school',$data);
			
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
			$data = array(
						'contestant_name' => $nama,
						'contestant_phone' => $ponsel,
						'contestant_address' => $alamat,
						'contestant_class' => $kelas,
						'contestant_school_name' => $nama_sekolah,
						'contestant_school_address' => $alamat_sekolah,
						'contestant_supervisor' => $pembimbing
					);
			$this->db->where('contestant_id',$id);
			$result = $this->db->update('contestant_high_school',$data);
			
		    return $result;
		}
		
		function add_user_university($nama_tim, $nama_universitas, $alamat_universitas, $nama_anggota_satu, $ponsel_anggota_satu, $email_anggota_satu, $nama_anggota_dua, $nama_anggota_tiga, $nama_pembimbing)
		{
			$this->db->select('contestant_id');
			$this->db->from('contestant_university');
			$query = $this->db->get();
			
			$result = $query->num_rows()+1;
			$username = "SPC".$result;
			$temp = mt_rand(100000,999999);
			$password = "SPC".$temp;
			$hashpassword = md5($password);
			
			$temp = mt_rand(100000,999999);
			$code = date("YHsdim").$temp;
			
			$data = array(
			   'contestant_username' => $username ,
			   'contestant_password' => $hashpassword ,
			   'contestant_type' => '2',
			   'contestant_code' => $code
			);
			$result = $this->db->insert('contestant',$data);
			
			$this->db->select('contestant_id');
			$this->db->from('contestant');
			$this->db->where('contestant_username',$username);
			$query = $this->db->get();
			
			foreach ($query->result() as $row)
			{
				$id = $row->contestant_id;
			}

			$data = array(
			   'contestant_id' => $id ,
			   'contestant_team_name' => $nama_tim ,
			   'contestant_university_name' => $nama_universitas,
			   'contestant_university_address' => $alamat_universitas,
			   'contestant_leader_name' => $nama_anggota_satu ,
			   'contestant_leader_phone' => $ponsel_anggota_satu ,
			   'contestant_leader_email' => $email_anggota_satu,
			   'contestant_second_name' => $nama_anggota_dua,
			   'contestant_third_name' => $nama_anggota_tiga,
			   'contestant_supervisor_name' => $nama_pembimbing
			);
			$this->db->insert('contestant_university',$data);
			
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
			$data = array(
			   'contestant_university_name' => $nama_universitas,
			   'contestant_university_address' => $alamat_universitas,
			   'contestant_leader_name' => $nama_anggota_satu ,
			   'contestant_leader_phone' => $ponsel_anggota_satu ,
			   'contestant_second_name' => $nama_anggota_dua,
			   'contestant_third_name' => $nama_anggota_tiga,
			   'contestant_supervisor_name' => $nama_pembimbing
			);
			$this->db->where('contestant_id',$id);
			$result = $this->db->update('contestant_university',$data);
			 
		    return $result;
		}
		
		function upload($id,$type,$flag,$extension)
		{
			$this->load->helper('url');
			$link = "";
			if ($flag==0)
			{
				if ($type==1)
				{
					$link = base_url("uploads/Kartu Pelajar/KP".$id.".".$extension);
				}
				else if ($type==2)
				{
					$link = base_url("uploads/bukti/Bukti".$id.".".$extension);
				}
			}
			else
			{
				if ($type==1)
				{
					$link = base_url("uploads/KTM/KTM".$id."_".$flag.".".$extension);
				}
				else if ($type==2)
				{
					$link = base_url("uploads/bukti/Bukti".$id.".".$extension);
				}
			}
			
			$query = $this->db->query("SELECT image_id, contestant_image_url FROM contestant_image WHERE contestant_id='".$id."' AND contestant_image_type='".$type."'");
			$i = 0;
			$ids = array();
			$templink = array();
			foreach ($query->result() as $row)
			{
				$ids[$i++] = $row->image_id;
				array_push($templink,end(explode('_',$row->contestant_image_url)));
			}
			if (!empty($templink))
			{
				if ($flag==0)
				{
					$result = $this->db->query("UPDATE contestant_image SET contestant_image_url = '".$link."' WHERE image_id = '".$ids[0]."'");
				}
				else
				{
					if ($query->num_rows()==3)
					{
						$result = $this->db->query("UPDATE contestant_image SET contestant_image_url = '".$link."' WHERE image_id = '".$ids[$flag-1]."'");
					}
					else
					{
						$i = -1;
						$flagtemp = 0;
						foreach ($templink as $temp)
						{
							$i++;
							if ($temp[0]==$flag)
							{
								$flagtemp = $i;
							}
						}
						if ($flagtemp!=-1)
						{
							$result = $this->db->query("UPDATE contestant_image SET contestant_image_url = '".$link."' WHERE image_id = '".$ids[$flagtemp]."'");
						}
						else
						{
							$result = $this->db->query("INSERT INTO contestant_image(contestant_id,contestant_image_url,contestant_image_type) VALUES ('".$id."','".$link."','".$type."')");
						}
					}
				}
			}
			else
			{	
				$result = $this->db->query("INSERT INTO contestant_image(contestant_id,contestant_image_url,contestant_image_type) VALUES ('".$id."','".$link."','".$type."')");
			}
			
			return $result;
		}
		
		function get_image($id,$type)
		{
			$query = $this->db->query("SELECT contestant_image_url FROM contestant_image WHERE contestant_id = '".$id."' AND contestant_image_type = '".$type."'");
			
			return $query->result();
		}
	}

?>