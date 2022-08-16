<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public $tableuser = "user";
    public $tablebirim = "birim";
    public $tablealan = "alan";
    public $tablealankisi = "alan_kisi";
    public $tableariza = "arizakayit";

    public function birim(){
        $this->db->order_by('birim_ad','ASC');
        return $this->db->get($this->tablebirim)->result();
    }

    public function kaynak(){
        $this->db->order_by('alan_ad','ASC');
        return $this->db->get($this->tablealan)->result();
    }

    public function arizasave($data = array()){
        return $this->db->insert($this->tableariza, $data);
    }

    public function alanidgetir($alan_ad){
        return $this->db->where("alan_ad",$alan_ad)->get($this->tablealan)->result();
    }

    public function yoneticigoster(){
        $this->db->where('durum', "Aktif");
        $this->db->where('yetki_id', "1");
        return $this->db->get($this->tableuser)->result();
    }

    public function personelid($alan_id){
        return $this->db->where_in("alan_id",$alan_id)->get($this->tablealankisi)->result();
    }

    public function personelbilgi($user_id){
        return $this->db->where_in("id",$user_id)->where("durum","Aktif")->get($this->tableuser)->result();
    }

    public function tumpersonel(){
        return $this->db->where("yetki_id","2")->get($this->tableuser)->result();
    }

    public function durumsorgula($ad,$soyad,$birim,$kaynak){
        return $this->db->select_max("id")->where("adi",$ad)->where("soyadi",$soyad)->where("birim",$birim)->where("kaynak",$kaynak)->get($this->tableariza)->result();
    }

    public function durumsorgula2($id){
        return $this->db->where_in("id",$id)->get($this->tableariza)->result();
    }
}