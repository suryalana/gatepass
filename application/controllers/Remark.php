<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Remark extends CI_Controller
{

    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->model('Mremark');
        if (!$this->checkLogin()) {
            redirect('gatepass');
        }
    }

    function index()
    {
        $username = $this->session->userdata('ex_nik');
        $data['nik_session'] = $username;
        $level = $this->session->userdata('ex_level');
        $data['level_session'] = $level;
        if (!empty($username)) {
            $data['list'] = $this->Mremark->get_employee();
            $this->load->view('data/index_header_template', $data);
            $this->load->view('data/remark_edit', $data);
            $this->load->view('data/index_footer_template', $data);
        } else {
            redirect('login');
        }
    }

    function checkLogin()
    {
        switch ($this->session->userdata('ex_level')) {
            case '2':
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

    function remark()
    {
        $username = $this->session->userdata('ex_nik');
        $data['nik_session'] = $username;
        $level = $this->session->userdata('ex_level');
        $data['level_session'] = $level;
        if (!empty($username)) {
            $data['list'] = $this->Mremark->get_employee();
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
        $list = $this->Mremark->getEditemployee($id);
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
