<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gatepass extends CI_Controller
{

    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->model('Mgatepass');
    }

    function index()
    {
        $username = $this->session->userdata('ex_nik');
        $data['nik_session'] = $username;
        $level = $this->session->userdata('level_session');
        $data['level_session'] = $level;
        if (!empty($username)) {
            $data['list'] = $this->Mgatepass->get_employee();
            $data['list_remark'] = $this->Mgatepass->get_remark();
            $this->load->view('data/index_header_template', $data);
            $this->load->view('data/dashboard', $data);
            $this->load->view('data/gatepass', $data);
            $this->load->view('data/index_footer_template', $data);
        } else {
            redirect('login');
        }
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
