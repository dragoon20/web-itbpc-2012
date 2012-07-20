<?php

	class Contestantmodel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function check_user($username, $password)
		{
			$password = md5($password);
			$query = $this->db->query("SELECT contestant_id FROM contestant WHERE contestant_username = '".$username."' AND contestant_password = '".$password."'");
			$result = null;
			foreach ($query->result() as $row)
			{
				$result = $row->contestant_id;
			}
			return $result;
		}
		
		function add_user_high_school($nama, $ponsel, $email, $kelas, $nama_sekolah, $alamat_sekolah, $pembimbing)
		{
			$query = $this->db->query("SELECT contestant_id AS temp FROM contestant");
			$result = $query->num_rows()+1;
			$username = "JPC".$result;
			$temp = mt_rand(100000,999999);
			$password = "JPC".$temp;
			$hashpassword = md5($password);
			
			//email
			$subject = "Registrasi JPC";
			$message = "Kepada ".$nama.",\nSelamat anda telah berhasil melakukan registrasi ITB Junior Programming Contest 2011\n\n".
						"Berikut username dan password anda:\nusername: ".$username."\npassword: ".$password."\n\n".
						"Dimohon agar username dan password ini dicatat agar tidak lupa.\n\n Terima kasih.\nwww.itbpc.org";
			$from = "itbpc@tes.com";
			$headers = "From:" . $from;
			mail($email,$subject,$message,$headers);

			$result = $this->db->query("INSERT into contestant(contestant_username,contestant_password) VALUES ('.$username.','.$hashpassword.')");
			return $result;
		}
	}

?>