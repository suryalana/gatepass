<?php
class Mgatepass extends CI_Model
{

    protected $table = 'tb_berita';

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    function get_employee($start_date,$end_date,$check)
    {

        $nikuser = $this->session->userdata('ex_nik');
        $leveluser =  $this->session->userdata('ex_level');

        if($check==1){
            if ($leveluser == '3') {
                $sql = "SELECT * FROM input_gatepass WHERE nik ='" . $nikuser . "' 
                AND date between '$start_date' AND '$end_date' order by id desc";
            } else {
                $sql = "SELECT * FROM input_gatepass where date between '$start_date' AND '$end_date'  order by id desc";
            }
        }else{
            if ($leveluser == '3') {
                $sql = "SELECT * FROM input_gatepass WHERE nik ='" . $nikuser . "' order by id desc";
            } else {
                $sql = "SELECT * FROM input_gatepass order by id desc";
            }
        }
        

        // $sql = "SELECT * FROM input_gatepass order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getEditemployee($id)
    {
        $sql = "SELECT * FROM input_gatepass where id='$id' order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getEmployeeID($id = null)
    {
        $sql = "SELECT * FROM public.input_gatepass a JOIN public.tb_employee b on a.nik = b.nik WHERE a.id = '$id'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function get_remark()
    {
        $sql = "SELECT * FROM gatepass_remark order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getEditemployeeRemark($id)
    {
        $sql = "SELECT * FROM input_gatepass where id='$id' order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updateStatusEmployee($id = null, $type = null)
    {
        switch ($type) {
            case 1: //Approve
                    $sql = "UPDATE input_gatepass SET status = 1 WHERE id='$id'";
                break;

            case 2: //Reject
                    $sql = "UPDATE input_gatepass SET status = 2 WHERE id='$id'";
                break;
            
            default:
                die("Error Call your IT Technician.");
                break;
        }

        return $this->db->query($sql);     
    }

    function get_report_expanse($start_date,$end_date){

        $nikuser = $this->session->userdata('ex_nik');
        $sql = "SELECT * FROM input_gatepass where date between '$start_date' AND '$end_date' order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
