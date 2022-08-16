<?php

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $tableName = "user";

    public function get($posta)
    {
        $this->db->where('eposta',$posta);
        $query = $this->db->get($this->tableName)->row();
        return $query;
    }

    public function get2($posta,$sifre)
    {
        $this->db->where('eposta',$posta);
        $this->db->where('sifre',$sifre);
        $query1 = $this->db->get($this->tableName)->row();
        return $query1;
    }
}