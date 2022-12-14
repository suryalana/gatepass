<?php
class Mremark extends CI_Model
{

    protected $table = 'tb_berita';

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    function get_employee()
    {
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
}
