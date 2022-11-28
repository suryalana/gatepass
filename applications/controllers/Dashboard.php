<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        // $this->load->view('data/dashboard');
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
            $this->load->view('data/dashboard', $data);
            $this->load->view('data/index_footer_template', $data);
        } else {
            redirect('login');
        }
    }
}
