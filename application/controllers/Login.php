<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Login extends CI_Controller
{


	public function index()
	{
		$username = $this->session->userdata('ex_nik');
		$level = $this->session->userdata('ex_level');
		$data['level_session'] = $level;
		if (!empty($username)) {
			redirect('dashboard');
		} else {
			$this->load->view('data/login_template');
		}
	}


	// function checkLogin()
	// {
	// 	$username = $this->input->post('username', TRUE);
	// 	$check_user = $this->Madminuser->check_user();

	// 	if ($check_user == 1) {
	// 		$get_employee = $this->Madminuser->get_employee($username);
	// 		// print_r($get_employee);
	// 		exit;
	// 		foreach ($get_employee as $dt) {
	// 			$nik 	= $dt->nik;
	// 			$name 	= $dt->name;
	// 			$dept 	= $dt->dept;
	// 			$level_data = $dt->level;
	// 		}
	// 		$usersession = array(
	// 			'ex_nik'  	=> $nik,
	// 			'ex_name'  	=> $name,
	// 			'ex_dept'  	=> $dept,
	// 			'ex_level'  => $level_data,
	// 		);
	// 		$level_session = null;
	// 		$get_user = $this->Madminuser->getUser($username);
	// 		foreach ($get_user as $dt) {
	// 			$nik 		= $dt->nik;
	// 			$level 		= $dt->level_session;
	// 			$iduser 	= $dt->iduser;
	// 		}
	// 		if ($level == null) {
	// 			$level = '0';
	// 		} else {
	// 			$level = $level_session;
	// 		}

	// 		$usersession = array(
	// 			'ex_nik'  			=> $nik,
	// 			'ex_level'  		=> $level,
	// 			'ex_id'  			=> $iduser,
	// 		);
	// 		$this->session->set_userdata($usersession);
	// 		redirect('app');
	// 	} else {
	// 		echo 'Username 0r password Error';
	// 	}
	// }

	function checkLogin()
	{
		
		$username = $this->input->post('username', TRUE);
		$check_user = $this->Madminuser->check_user();
		if ($check_user == 1) {
			$get_user = $this->Madminuser->getUser($username);
			foreach ($get_user as $dt) {
				$nik = $dt->nik;
				$level = $dt->level_session;
				$iduser = $dt->id;
			}
			$usersession = array(
				'ex_nik'  => $nik,
				'ex_level'  => $level,
				'ex_id'  => $iduser,
			);
			$this->session->set_userdata($usersession);


			switch ($this->session->userdata('ex_level')) {
				case '1':
					redirect('gatepass');
					break;

				case '2':
					redirect('gatepass');
					break;

				case '3':
					redirect('app');
					break;

				case '4':
					redirect('gatepass');
					break;
			}
		} else {
			echo 'Username 0r password Error';
		}
	}

	

	function logout()
	{
		$this->session->unset_userdata('ex_nik');
		$this->session->unset_userdata('ex_level');
		$this->session->unset_userdata('ex_id');
		redirect('/');
	}
}
