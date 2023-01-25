<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Gatepass extends CI_Controller
{

    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->model('Mgatepass');
        // $this->load->library('PHPMailer');
    }

    function index()
    {
        // $data['input_gatepass']=$this->Mgatepass->get_employee('input_gatepass') ->result();


        $username = $this->session->userdata('ex_nik');
        $data['nik_session'] = $username;
        $level = $this->session->userdata('level_session');
        $data['level_session'] = $level;
        if (!empty($username)) {
            $check = $this->input->post('check');
			if($check==1){
                $check_date = 1;
                $start_date = $this->input->post('start_date');
                $end_date = $this->input->post('end_date');
            }else{
                $check_date = 0;
                $start_date = date('Y-m-01');
                $end_date = date('Y-m-t');
            }
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['list'] = $this->Mgatepass->get_employee($start_date,$end_date,$check_date);
            $data['list_remark'] = $this->Mgatepass->get_remark();
            $this->load->view('data/index_header_template', $data);
            // $this->load->view('data/dashboard', $data);
            $this->load->view('data/gatepass', $data);
            $this->load->view('data/index_footer_template', $data);
        } else {
            redirect('login');
        }
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
        //     // button enableq
        // } else {
        //     // button disable
        // }
    }
    
    function xlsReportExpanse($start_date,$end_date){
		
        $userID = $this->input->post('id', TRUE);
		$data = array( 'title' => 'Gatepass'.$userID );
		$data['list'] = $this->Mgatepass->get_report_expanse($start_date,$end_date); // model  
		$data['start_date'] = $start_date; // model  
		$data['end_date'] = $end_date; // model  
		$this->load->view('data/xls_report_temp',$data); // lokasi view 
	}

    function addEmpGatepass()
    {
        $date           = $this->input->post('date', TRUE);
        $timein         = $this->input->post('timein', TRUE);
        $timeout        = $this->input->post('timeout', TRUE);
        $nik            = $this->input->post('nik', TRUE);
        $name           = $this->input->post('name', TRUE);
        $department     = $this->input->post('department', TRUE);
        $reason         = $this->input->post('reason', TRUE);
        $gpremark       = $this->input->post('gpremark', TRUE);
        $data  = array(
            'date' => $date,
            'timein' => $timein,
            'timeout' => $timeout,
            'nik' => $nik,
            'name' => $name,
            'department' => $department,
            'reason' => $reason,
            'gpremark' => $gpremark,
        );

        $this->db->insert('input_gatepass', $data);
        redirect('gatepass');
    }

    function editEmployee()
    {
        $id             = $this->input->post('id', TRUE);
        $date           = $this->input->post('date', TRUE);
        $timein         = $this->input->post('timein', TRUE);
        $timeout        = $this->input->post('timeout', TRUE);
        $nik            = $this->input->post('nik', TRUE);
        $name           = $this->input->post('name', TRUE);
        $department     = $this->input->post('department', TRUE);
        $reason         = $this->input->post('reason', TRUE);
        $gpremark       = $this->input->post('gpremark', TRUE);
        $data  = array(
            'date' => $date,
            'timein' => $timein,
            'timeout' => $timeout,
            'nik' => $nik,
            'name' => $name,
            'department' => $department,
            'reason' => $reason,
            'gpremark' => $gpremark,
        );

        $this->db->where('id', $id);
        $this->db->update('input_gatepass', $data);
        redirect('gatepass');
    }

    function delEmployee($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('input_gatepass');
        redirect('gatepass');
    }

    function approve()
    {
        $userID = $this->input->post('id', TRUE);
        
        // GEt user berdasarkan ID 
        $dataUser = $this->Mgatepass->getEmployeeID($userID);

        // die(var_dump($dataUser));

        $fromEmail = "alipsayyidah102@gmail.com";
        $isiEmail = "Halo ini adalah isi dari email yang berjudu \"Approve GatePass NIK\"http://localhost/Hola-Project-example-master/gatepass";
        $mail = new PHPMailer();
        
        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;  // SMTP port to connect to GMail
        $mail->Username   = "alipsayyidah102@gmail.com";  // alamat email kamu
        $mail->Password   = "mvevwzpfrxhfbxrx";            // password GMail
        $mail->SetFrom('alipsayyidah102@gmail.com', 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = "Approve GatePass NIK : ".@$dataUser['nik'];
        $mail->Body       = $isiEmail;
        //$toEmail = $dataUser['email']; // siapa yg menerima email ini
        $toEmail = "alipsurya9@gmail.com"; // siapa yg menerima email ini
        $mail->AddAddress($toEmail);

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        if (!$mail->Send()) {
            $msgException = "Eror: " . $mail->ErrorInfo;
        } else {
            $msgException = "Email berhasil dikirim";
            $this->Mgatepass->updateStatusEmployee($userID, 1);
        }
        echo $msgException;
        //echo !extension_loaded('openssl')? $msgException ."//"."Not Available":$msgException ."//"."Available";;
        
    }

    function reject()
    {
        $userID = $this->input->post('id', TRUE);

        //die(var_dump($userID));
        
        // GEt user berdasarkan ID 
        $dataUser = $this->Mgatepass->getEmployeeID($userID);

        //die(var_dump($dataUser));

        $fromEmail = "alipsayyidah102@gmail.com";
        $isiEmail = "Halo permintaan anda ditolak oleh manager\"Approve GatePass NIK\"http://localhost/Hola-Project-example-master/gatepass";
        $mail = new PHPMailer();
        
        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;  // SMTP port to connect to GMail
        $mail->Username   = "alipsayyidah102@gmail.com";  // alamat email kamu
        $mail->Password   = "mvevwzpfrxhfbxrx";            // password GMail
        $mail->SetFrom('alipsayyidah102@gmail.com', 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = "Approve GatePass NIK : ".$dataUser['nik'];
        $mail->Body       = $isiEmail;
        //$toEmail = $dataUser['email']; // siapa yg menerima email ini
        $toEmail = "alipsurya9@gmail.com"; // siapa yg menerima email ini
        $mail->AddAddress($toEmail);

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        if (!$mail->Send()) {
            $msgException = "Eror: " . $mail->ErrorInfo;
        } else {
            $msgException = "Email berhasil dikirim";
            $this->Mgatepass->updateStatusEmployee($userID, 2);
        }
        echo $msgException;

        
        //redirect('gatepass');
    }

    function editEmView()
    {
        $id = $this->input->post('id', TRUE);
        $list = $this->Mgatepass->getEditemployee($id);
?>
        <?php foreach ($list as $value) : ?>
            <form action="<?php echo prefix_url; ?>gatepass/editEmployee" method="POST">
                <input type="hidden" class="form-control" name="id" value="<?php echo $value->id; ?>">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" value="<?php echo $value->date; ?>">
                    <small class="form-text text-danger"><?= form_error('date'); ?></small>
                </div>
                <div class="form-group">
                    <tr>
                        <td colspan="2">Time In</td>
                    </tr>
                    <tr>
                        <td><input type="time" class="form-control" name="timein" value="<?php echo $value->timein; ?>"></td>
                    </tr>
                </div>
                <div class="form-group">

                    <tr>
                        <td colspan="2">Time Out</td>
                    </tr>
                    <tr>
                        <td><input type="time" class="form-control" name="timeout" value="<?php echo $value->timeout; ?>"></td>
                    </tr>
                </div>
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
                    <input type="text" class="form-control" name="department" value="<?php echo $value->department; ?>">
                </div>

                <div class="form-group">
                    <label>Reason:</label>
                    <input type="text" class="form-control" name="reason" value="<?php echo $value->reason; ?>">
                </div>
                <div class="form-group">
                    <label for="purpose">Gate Pass Remark</label>
                    <select class="form-control" id="purpose" name="gpremark" onchange="" disable_enable(this.value)>
                        <option value="Izin pulang Terlebih Dahulu" id="PR">Izin pulang Terlebih Dahulu </option>
                        <option value="Izin Ketika Sedang Jam Kerja">Izin Ketika Sedang Jam Kerja </option>
                        <option value="Izin Terlambat Datang Kerja">Izin Terlambat Datang Kerja </option>

                    </select>
                    <small class="form-text text-danger"><?= form_error('gpremark'); ?></small>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        <?php endforeach; ?>
    <?php
    }

    function remarkhrd()
    {
        $username = $this->session->userdata('ex_nik');
        $data['nik_session'] = $username;
        $level = $this->session->userdata('ex_level');
        $data['level_session'] = $level;
        if (!empty($username)) {
            $data['list'] = $this->Mgatepass->get_employee();
            $data['list_remark'] = $this->Mgatepass->get_remark();
            $this->load->view('data/index_header_template', $data);
            $this->load->view('data/remarkhrd', $data);
            $this->load->view('data/index_footer_template', $data);
        } else {
            redirect('login');
        }
    }

    function remark()
    {
        $username = $this->session->userdata('ex_nik');
        $data['nik_session'] = $username;
        $level = $this->session->userdata('ex_level');
        $data['level_session'] = $level;
        if (!empty($username)) {
            $data['list'] = $this->Mgatepass->get_employee();
            $data['list_remark'] = $this->Mgatepass->get_remark();
            $this->load->view('data/index_header_template', $data);
            $this->load->view('data/remark_edit', $data);
            $this->load->view('data/index_footer_template', $data);
        } else {
            redirect('login');
        }
    }

    function editEmployeeRemark()
    {
        $id             = $this->input->post('id', TRUE);
        $reason         = $this->input->post('reason', TRUE);
        $gpremark       = $this->input->post('gpremark', TRUE);
        $data  = array(
            'reason' => $reason,
            'gpremark' => $gpremark,
        );

        $this->db->where('id', $id);
        $this->db->update('input_gatepass', $data);
        redirect('gatepass');
    }

    function editEmViewRemark()
    {
        $id = $this->input->post('id', TRUE);
        $list = $this->Mgatepass->getEditemployee($id);
    ?>
        <?php foreach ($list as $value) : ?>
            <form action="<?php echo prefix_url; ?>gatepass/editEmployee" method="POST">
                <input type="hidden" class="form-control" name="id" value="<?php echo $value->id; ?>">

                <div class="form-group">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $value->name; ?>">
                </div>
                <div class="form-group">
                    <label for="purpose">Gate Pass Remark</label>
                    <select class="form-control" id="purpose" name="gpremark" onchange="" disable_enable(this.value)>
                        <option value="Izin pulang Terlebih Dahulu" id="PR">Izin pulang Terlebih Dahulu </option>
                        <option value="Izin Ketika Sedang Jam Kerja">Izin Ketika Sedang Jam Kerja </option>
                        <option value="Izin Terlambat Datang Kerja">Izin Terlambat Datang Kerja </option>

                    </select>
                    <small class="form-text text-danger"><?= form_error('gpremark'); ?></small>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        <?php endforeach; ?>
<?php
    }
}
