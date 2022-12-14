<?php
class Muser extends CI_Model
{

    protected $table = 'tb_berita';

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    function get_employee_user()
    {
        $sql = "SELECT * FROM tb_user order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getEditemployeeUser($id)
    {
        $sql = "SELECT * FROM tb_user where id='$id' order by id desc";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
