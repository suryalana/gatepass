<?php
class Mdata extends CI_Model
{

	protected $table = 'tb_berita';

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	function get_employee()
	{
		$sql = "SELECT * FROM tb_employee order by id desc";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function getEditemployee($id)
	{
		$sql = "SELECT * FROM tb_employee where id='$id' order by id desc";
		$query = $this->db->query($sql);
		return $query->result();
	}


	// function check_qr($qrScan){


	// 	$query = $this->db->query("SELECT * FROM hola.tb_qr where qr='$nqrScanik'");
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return 1;
	// 	}else{
	// 		return 2;
	// 	}
	// }







}
