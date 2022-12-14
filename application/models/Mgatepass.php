<?php
class Mgatepass extends CI_Model
{

    protected $table = 'tb_berita';

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    function get_employee()
    {

        $nikuser = $this->session->userdata('ex_nik');
        $leveluser =  $this->session->userdata('ex_level');


        if ($leveluser == '3') {
            $sql = "SELECT * FROM input_gatepass WHERE nik ='" . $nikuser . "' order by id desc";
        } else {
            $sql = "SELECT * FROM input_gatepass order by id desc";
        }

        $sql = "SELECT * FROM input_gatepass order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getEditemployee($id)
    {
        $sql = "SELECT * FROM input_gatepass where id='$id' order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
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
}
