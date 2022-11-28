<?php
class Madminuser extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}


	function check_user()
	{
		$nik = $this->input->post('username', TRUE);
		$password = $this->input->post('pwd', TRUE);

		$query = $this->db->query("SELECT * FROM tb_login where nik='$nik' AND password='$password'");
		if ($query->num_rows() > 0) {
			return 1;
		} else {
			return 2;
		}
	}

	function getUser($username)
	{
		$sql = "SELECT * FROM tb_login where nik='$username'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function get_employee($nik)
	{
		$sql = "SELECT * FROM tb_employee where nik='$nik'";
		$query = $this->db->query($sql);
		return $query->result();
	}
}
