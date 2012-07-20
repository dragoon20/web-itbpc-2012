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
			return $query->result();
		}
	}

?>