<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

	function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->model('Mdata');
	}


	function index()
	{
		$username = $this->session->userdata('ex_nik');
		$data['nik_session'] = $username;
		$level = $this->session->userdata('ex_level');
		$data['level_session'] = $level;
		if (!empty($username)) {
			$data['list'] = $this->Mdata->get_employee();
			$this->load->view('data/index_header_template', $data);
			$this->load->view('data/home_template', $data);
			$this->load->view('data/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function xlsReportExpanse($start_date,$end_date){
		
        $userID = $this->input->post('id', TRUE);
		$data = array( 'title' => 'Gatepass'.$userID );
		$data['list'] = $this->Mgatepass->get_report_expanse($start_date,$end_date); // model  
		$data['start_date'] = $start_date; // model  
		$data['end_date'] = $end_date; // model  
		$this->load->view('data/xls_report_temp',$data); // lokasi view 
	}


	function checkLogin()
	{
		switch ($this->session->userdata('ex_level')) {
			case '3':
				return TRUE;
				break;

			default:
				return FALSE;
				break;
		}

		// if ($this->session->userdata('ex_level') == '2') {
		//     // button enable
		// } else {
		//     // button disable
		// }
	}



	function addEmployee()
	{
		$nik = $_POST['nik'];
		// $nik = $this->input->post('nik', TRUE);
		$name = $this->input->post('name', TRUE);
		$dept = $this->input->post('dept', TRUE);
		$jab = $this->input->post('jab', TRUE);
		$email = $this->input->post('email', TRUE);
		$data = array(
			'nik' => $nik,
			'name' => $name,
			'dept' => $dept,
			'jab' => $jab,
			'email' => $email,
		);

		$this->db->insert('tb_employee', $data);
		redirect('app');
	}

	function editEmployee()
	{
		$id = $this->input->post('id', TRUE);
		$nik = $this->input->post('nik', TRUE);
		$name = $this->input->post('name', TRUE);
		$dept = $this->input->post('dept', TRUE);
		$jab = $this->input->post('jab', TRUE);
		$email = $this->input->post('email', TRUE);
		$data = array(
			'nik' => $nik,
			'name' => $name,
			'dept' => $dept,
			'jab' => $jab,
			'email' => $email,
		);

		$this->db->where('id', $id);
		$this->db->update('tb_employee', $data);
		redirect('app');
	}



	function delEmployee($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_employee');
		redirect('app');
	}

	function editEmView()
	{
		$id = $this->input->post('id', TRUE);
		$list = $this->Mdata->getEditemployee($id);
?>
		<?php foreach ($list as $value) : ?>
			<form action="<?php echo prefix_url; ?>app/editEmployee" method="POST">
				<input type="hidden" class="form-control" name="id" value="<?php echo $value->id; ?>">
				<div class="form-group">
					<label for="email">NIK:</label>
					<input type="text" class="form-control" name="nik" value="<?php echo $value->nik; ?>">
				</div>

				<div class="form-group">
					<label for="email">Name:</label>
					<input type="text" class="form-control" name="name" value="<?php echo $value->name; ?>">
				</div>

				<div class="form-group">
					<label for="email">Dept:</label>
					<input type="text" class="form-control" name="dept" value="<?php echo $value->dept; ?>">
				</div>

				<div class="form-group">
					<label for="email">Position:</label>
					<input type="text" class="form-control" name="jab" value="<?php echo $value->jab; ?>">
				</div>

				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" class="form-control" name="email" value="<?php echo $value->email; ?>">
				</div>

				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		<?php endforeach; ?>
<?php
	}




	// function createCode(){
	// 	$hash = "";
	// 	$date = date('Ymdhis');
	// 	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
	// 	for($i = 0; $i < 20; $i++)
	// 	{
	// 		$hash .= $chars[mt_rand(0, 61)];
	// 		$tokenid =($hash);
	// 	}
	// 	// return $tokenid;
	// 	echo $tokenid;
	// }

	// action scan
	// const qr_read
	// const NIK (save to cache app)
	// url : {'127.1.1.1/example/app/qrAction', qr_read.NIK}

	// function qrAction($qrScan){
	// 	$check_qr =  $this->Mdata->check_qr($qrScan);
	// 	if($check_qr==1){
	// 		// save to db 
	// 		$data = array(
	// 			'nik' => $nik,
	// 			'date' => date('Y-m-d'),
	// 			'time' => date('H:i:s'),
	// 			'status' => $status, // 1 = in , 2 = out 
	// 		);
	// 		$this->db->insert('hola.tbAttendance', $data);
	// 		echo 'success';
	// 	}else{
	// 		echo 'failed';
	// 	}

	// }

	//  wait response (success) 

	// table || qr_token || COST CENTER ||
	//       || hdfusdhf || P000124 ||


}
