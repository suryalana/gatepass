<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->model('Muser');
    }

    function index()
    {
        $username = $this->session->userdata('ex_nik');
        $data['nik_session'] = $username;
        $level = $this->session->userdata('ex_level');
        $data['level_session'] = $level;
        if (!empty($username)) {
            $data['list'] = $this->Muser->get_employee_user();
            $this->load->view('data/index_header_template', $data);
            $this->load->view('data/user', $data);
            $this->load->view('data/index_footer_template', $data);
        } else {
            redirect('login');
        }
    }

    function addEmployeeUser()
    {
        $nik = $this->input->post('nikuser', TRUE);
        $name = $this->input->post('nameuser', TRUE);
        $dept = $this->input->post('deptuser', TRUE);
        $jab = $this->input->post('jabuser', TRUE);
        $data = array(
            'nikuser' => $nik,
            'nameuser' => $name,
            'deptuser' => $dept,
            'jabuser' => $jab,
        );

        $this->db->insert('tb_user', $data);
        redirect('user');
    }

    function editEmployeeUser()
    {
        $id = $this->input->post('iduser', TRUE);
        $nik = $this->input->post('nikuser', TRUE);
        $name = $this->input->post('nameuser', TRUE);
        $dept = $this->input->post('deptuser', TRUE);
        $jab = $this->input->post('jabuser', TRUE);
        $data = array(
            'nik' => $nik,
            'name' => $name,
            'dept' => $dept,
            'jab' => $jab,
        );

        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
        redirect('user');
    }

    function delEmployeeUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user');
        redirect('user');
    }

    function editEmViewUser()
    {
        $id = $this->input->post('id', TRUE);
        $list = $this->Muser->getEditemployeeUser($id);
?>
        <?php foreach ($list as $value) : ?>
            <form action="<?php echo prefix_url; ?>user/editEmployeeUser" method="POST">
                <input type="hidden" class="form-control" name="iduser" value="<?php echo $value->id; ?>">
                <div class="form-group">
                    <label for="email">NIK:</label>
                    <input type="text" class="form-control" name="nikuser" value="<?php echo $value->nik; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control" name="nameuser" value="<?php echo $value->name; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Dept:</label>
                    <input type="text" class="form-control" name="deptuser" value="<?php echo $value->dept; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Position:</label>
                    <input type="text" class="form-control" name="jabuser" value="<?php echo $value->jab; ?>">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        <?php endforeach; ?>
<?php
    }
}
