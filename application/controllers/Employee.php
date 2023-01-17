<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
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
            $data['list'] = $this->Mdata->get_employee1();
            $this->load->view('data/index_header_template', $data);
            $this->load->view('data/employee', $data);
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
        $data = array(
            'nik' => $nik,
            'name' => $name,
            'dept' => $dept,
            'jab' => $jab,
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
}
