<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public $tableName = "user";
    public $tableariza = "arizakayit";
    public $tablekaynak = "alan";
    public $tablealan = "alan_kisi";
    public $tablebirim = "birim";

    public function insert($data = array()){
        return $this->db->insert($this->tableName, $data);
    }

    public function myupdate($id,$data){
        $this->db->where('id',$id)->update($this->tableName, $data);
        if ($data){
            redirect(base_url("logout/"));
        }
    }

    public function yoneticigoster(){
        $this->db->where('durum', "Aktif");
        $this->db->where('yetki_id', "1");
        return $this->db->get($this->tableName)->result();
    }
    
    public function arizakaynaksave($data = array()){
        return $this->db->insert($this->tablekaynak, $data);
    }

    public function arizagetir(){
        $this->db->order_by('alan_ad','ASC');
        return $this->db->get($this->tablekaynak)->result();
    }

    public function arizadelete($id){
        $this->db->where('alan_id',$id)->delete($this->tablealan);
        return $this->db->where('id',$id)->delete($this->tablekaynak);
    }

    public function birimsave($data = array()){
        return $this->db->insert($this->tablebirim, $data);
    }

    public function birimgetir(){
        $this->db->order_by('birim_ad','ASC');
        return $this->db->get($this->tablebirim)->result();
    }

    public function birimdelete($id){
        return $this->db->where('id',$id)->delete($this->tablebirim);
    }

    public function personelgoster(){
        $this->db->where('durum', "Aktif");
        $this->db->where('yetki_id', "2");
        $this->db->order_by('id','DESC');
        return $this->db->get($this->tableName)->result();
    }

    public function personelalansil($id){
        return $this->db->where('user_id',$id)->delete($this->tablealan);
    }

    public function talepgetir($maxid){
        $this->db->where_in('id', $maxid);
        $this->db->where('durum ', "Talep Alındı");
        $this->db->order_by('tarih','ASC');
        return $this->db->get($this->tableariza)->result();
    }

    public function talepgetirgrup(){
        $this->db->select_max('id');
        $this->db->where('takip_kod !=', "");
        $this->db->group_by('takip_kod');
        return $this->db->get($this->tableariza)->result();
    }

    public function talepdetay($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tableariza)->result();
    }

    public function taleponay($data){
        return $this->db->insert($this->tableariza, $data);
    }

    public function islemdurum($maxid){
        $this->db->where_in('id', $maxid);
        $this->db->order_by('id','DESC');
        return $this->db->get($this->tableariza)->result();
    }

    public function islemdurumgrup(){
        $this->db->select_max('id');
        $this->db->where('durum !=', "Talep Alındı");
        $this->db->where('durum !=', "İşlem Tamamlandı");
        $this->db->where('takip_kod !=', "");
        $this->db->group_by('takip_kod');
        return $this->db->get($this->tableariza)->result();
    }

    public function islemdetay($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tableariza)->result();
    }

    public function islemkayit($data = array()){
        return $this->db->insert($this->tableariza, $data);
    }

    public function ipupdate($kod,$data){
        return $this->db->where('takip_kod',$kod)->update($this->tableariza, $data);
    }

    public function kodsil($kod,$data){
        return $this->db->where('takip_kod',$kod)->update($this->tableariza, $data);
    }

    public function arizakayit(){
        $this->db->select('ip_adresi');
        $this->db->select('kaynak');
        $this->db->where('ip_adresi !=', "");
        $this->db->group_by('ip_adresi');
        return $this->db->get($this->tableariza)->result();
    }

    public function arizadetay($ip){
        $this->db->where('ip_adresi', $ip);
        $this->db->order_by('id','DESC');
        return $this->db->get($this->tableariza)->result();
    }

    public function arizadetay2($id){
        $this->db->where('id', $id);
        $this->db->order_by('id','DESC');
        return $this->db->get($this->tableariza)->result();
    }

    public function arizakayitgrup(){
        $this->db->select('id');
        $this->db->where('durum', "İşlem Tamamlandı");
        $this->db->where('tarih >=', date("Y-m-01"));
        return $this->db->get($this->tableariza)->result();
    }

    public function arizakayitsay($id){
        $this->db->where_in('id', $id);
        return $this->db->get($this->tableariza)->result();
    }

    public function toplamtalep($ip){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('durum', "Talep Alındı");
        return $this->db->get($this->tableariza)->result();
    }

    public function toplamonay($ip){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('durum', "Talep Onaylandı");
        return $this->db->get($this->tableariza)->result();
    }

    public function toplambitis($ip){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('durum', "İşlem Tamamlandı");
        return $this->db->get($this->tableariza)->result();
    }

    public function yıltalep($ip,$yıl){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('tarih >=', $yıl);
        $this->db->where('durum', "Talep Alındı");
        return $this->db->get($this->tableariza)->result();
    }

    public function yılonay($ip,$yıl){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('tarih >=', $yıl);
        $this->db->where('durum', "Talep Onaylandı");
        return $this->db->get($this->tableariza)->result();
    }

    public function yılbitis($ip,$yıl){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('tarih >=', $yıl);
        $this->db->where('durum', "İşlem Tamamlandı");
        return $this->db->get($this->tableariza)->result();
    }

    public function aytalep($ip,$ay){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('tarih >=', $ay);
        $this->db->where('durum', "Talep Alındı");
        return $this->db->get($this->tableariza)->result();
    }

    public function ayonay($ip,$ay){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('tarih >=', $ay);
        $this->db->where('durum', "Talep Onaylandı");
        return $this->db->get($this->tableariza)->result();
    }

    public function aybitis($ip,$ay){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('tarih >=', $ay);
        $this->db->where('durum', "İşlem Tamamlandı");
        return $this->db->get($this->tableariza)->result();
    }

    public function guntalep($ip,$gun){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('tarih', $gun);
        $this->db->where('durum', "Talep Alındı");
        return $this->db->get($this->tableariza)->result();
    }

    public function gunonay($ip,$gun){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('tarih', $gun);
        $this->db->where('durum', "Talep Onaylandı");
        return $this->db->get($this->tableariza)->result();
    }

    public function gunbitis($ip,$gun){
        $this->db->where('ip_adresi', $ip);
        $this->db->where('tarih', $gun);
        $this->db->where('durum', "İşlem Tamamlandı");
        return $this->db->get($this->tableariza)->result();
    }

    public function pcsay($maxid){
        $this->db->where_in('id', $maxid);
        $this->db->where('durum ', "Talep Alındı");
        $this->db->where('kaynak ', "Bilgisayar");
        $this->db->order_by('tarih','ASC');
        return $this->db->get($this->tableariza)->result();
    }

    public function pcsaygrup(){
        $this->db->select_max('id');
        $this->db->where('takip_kod !=', "");
        $this->db->group_by('takip_kod');
        return $this->db->get($this->tableariza)->result();
    }

    public function telsay($maxid){
        $this->db->where_in('id', $maxid);
        $this->db->where('durum ', "Talep Alındı");
        $this->db->where('kaynak ', "Telefon");
        $this->db->order_by('tarih','ASC');
        return $this->db->get($this->tableariza)->result();
    }

    public function telsaygrup(){
        $this->db->select_max('id');
        $this->db->where('takip_kod !=', "");
        $this->db->group_by('takip_kod');
        return $this->db->get($this->tableariza)->result();
    }

    public function yazicisay($maxid){
        $this->db->where_in('id', $maxid);
        $this->db->where('durum ', "Talep Alındı");
        $this->db->where('kaynak ', "Yazıcı");
        $this->db->order_by('tarih','ASC');
        return $this->db->get($this->tableariza)->result();
    }

    public function yazicisaygrup(){
        $this->db->select_max('id');
        $this->db->where('takip_kod !=', "");
        $this->db->group_by('takip_kod');
        return $this->db->get($this->tableariza)->result();
    }

    public function tumalan(){
        $this->db->order_by('alan_ad','ASC');
        return $this->db->get($this->tablekaynak)->result();
    }

    public function alangrup($id){
        $this->db->where('user_id',$id);
        return $this->db->get($this->tablealan)->result();
    }

    public function alangetir($id){
        $this->db->order_by('alan_ad','ASC');
        $this->db->where_not_in('id',$id);
        return $this->db->get($this->tablekaynak)->result();
    }

    public function kayıtalangetir($id){
        $this->db->order_by('alan_ad','ASC');
        $this->db->where_in('id',$id);
        return $this->db->get($this->tablekaynak)->result();
    }

    public function ilgialansave($data = array()){
        return $this->db->insert($this->tablealan, $data);
    }

    public function ilgialandelete($userid,$alanid){
        return $this->db->where('user_id',$userid)->where('alan_id',$alanid)->delete($this->tablealan);
    }

    public function delete($id,$data){
        return $this->db->where('id',$id)->update($this->tableName, $data);
    }
}