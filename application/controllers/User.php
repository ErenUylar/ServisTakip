<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Europe/Istanbul');
        $this->load->model("user_model");
        $this->load->library("email");

        if ($this->session->userdata('oturum')) {
            if ($this->session->userdata('yetki_id') == 1) {
                redirect(base_url("admin/"));
            } else {
                redirect(base_url("personel/"));
            }
        }
    }

    public function index()
    {
        $birim = $this->user_model->birim();
        $gelenbirim = array(
            "birim" => $birim
        );

        $kaynak = $this->user_model->kaynak();
        $gelenkaynak = array(
            "kaynak" => $kaynak
        );
        $this->load->view("user/index", $gelenbirim + $gelenkaynak);
    }

    public function talepkayit()
    {
        $birim = $this->user_model->birim();
        $gelenbirim = array(
            "birim" => $birim
        );
        $kaynak = $this->user_model->kaynak();
        $gelenkaynak = array(
            "kaynak" => $kaynak
        );

        if ($this->input->method() == "post") {

            $this->form_validation->set_rules("isim", "İsim", "required|trim");
            $this->form_validation->set_rules("syisim", "Soyisim", "required|trim");
            $this->form_validation->set_rules("arızaform", "Arıza Sebebi", "required|trim");
            if ($this->form_validation->run() == false) {
                $this->load->view("user/index", $gelenbirim + $gelenkaynak);
            } else {
                $code = $this->sifreolustur();

                $talep = $this->user_model->arizasave(array(
                    'adi' => $this->input->post("isim"),
                    'soyadi' => $this->input->post("syisim"),
                    'birim' => $this->input->post("birim"),
                    'kaynak' => $this->input->post("kaynak"),
                    'sebep' => $this->input->post("arızaform"),
                    'tarih' => date('Y-m-d'),
                    'saat' => date('H:i'),
                    'durum' => "Talep Alındı",
                    'takip_kod' => $code
                ));
                if ($talep) {
                    $gunceltarih = date('d-m-Y');
                    $userisim = $this->input->post("isim");
                    $usersoyisim = $this->input->post("syisim");
                    $userbirim = $this->input->post("birim");
                    $userkaynak = $this->input->post("kaynak");
                    $usersebep = $this->input->post("arızaform");

                    $y_bilgi = $this->user_model->yoneticigoster();
                    foreach ($y_bilgi as $item2) {
                        $yonetici_mail = $item2->eposta;
                    }

                    //personel mail
                    $alan = $this->input->post("kaynak"); //arıza kaynağını belirle
                    $glnid = $this->user_model->alanidgetir($alan);
                    $userid = array();
                    foreach ($glnid as $items) {
                        array_push($userid, $items->id);
                        $personelid = $this->user_model->personelid($userid);
                        if (!empty($personelid)) {
//                            foreach ($personelid as $deger){
//                                $idveri = $this->user_model->personelbilgi($deger->user_id); // Arızayla ilgilenen personele mail gönder
//                                foreach ($idveri as $mail){
//                                    $personelmaili = $mail->eposta;
//                                    $this->email->from("gönderilecek posta adresi", "Bilgi İşlem Birimi");
//                                    $this->email->to($personelmaili);
//                                    $this->email->bcc($yonetici_mail);
//                                    $this->email->subject("PERSONEL ARIZA TALEBİ");
//                                    $this->email->message("
//                                      <br>
//                                      <br>
//                                      <img src='https://www.afyon.bel.tr/upload/tr/banner/364/31072019110037.jpg' style='width: 16.42cm' alt='afyonbld'/>
//                                      <h1 style='font-family: Verdana;font-size: 38px;color: #695d46'>Bilgi İşlem Birimi</h1>
//                                      <p style='font-family: Verdana;font-size: 14px;color: #695d46'>$gunceltarih</p>
//                                      <hr align='left' width='15%'>
//                                      <br>
//                                      <br>
//                                      <br>
//                                      <br>
//                                      <br>
//                                      <h3 style='font-family: Verdana;font-size: 22px;color: #008575'>$userisim $usersoyisim</h3>
//                                      <p style='font-family: Verdana;font-size: 18px;color: #695d46'>$userbirim</p>
//                                      <p style='font-family: Verdana;font-size: 18px;color: #695d46'>$userkaynak Arızası</p>
//                                      <p style='font-family: Verdana;font-size: 18px;color: #695d46'>$usersebep</p>
//                                      <br>
//                                      <br>
//                                      <br>
//                                      ");
//                                    $send1 = $this->email->send();
//                                }
//                            }
                        } else {
//                            $tumpersonel = $this->user_model->tumpersonel(); // Arızayla ilgilenen personel yoksa tüm personele mail gönder
//                            foreach ($tumpersonel as $mail2){
//                                $personelmaili2 = $mail2->eposta;
//                                $this->email->from("gönderilecek posta adresi", "Bilgi İşlem Birimi");
//                                $this->email->to($personelmaili2);
//                                $this->email->bcc($yonetici_mail);
//                                $this->email->subject("PERSONEL ARIZA TALEBİ");
//                                $this->email->message("
//                                  <br>
//                                  <br>
//                                  <img src='https://www.afyon.bel.tr/upload/tr/banner/364/31072019110037.jpg' style='width: 16.42cm' alt='afyonbld'/>
//                                  <h1 style='font-family: Verdana;font-size: 38px;color: #695d46'>Bilgi İşlem Birimi</h1>
//                                  <p style='font-family: Verdana;font-size: 14px;color: #695d46'>$gunceltarih</p>
//                                  <hr align='left' width='15%'>
//                                  <br>
//                                  <br>
//                                  <br>
//                                  <br>
//                                  <br>
//                                  <h3 style='font-family: Verdana;font-size: 22px;color: #008575'>$userisim $usersoyisim</h3>
//                                  <p style='font-family: Verdana;font-size: 18px;color: #695d46'>$userbirim</p>
//                                  <p style='font-family: Verdana;font-size: 18px;color: #695d46'>$userkaynak Arızası</p>
//                                  <p style='font-family: Verdana;font-size: 18px;color: #695d46'>$usersebep</p>
//                                  <br>
//                                  <br>
//                                  <br>
//                                  ");
//                                $send2 = $this->email->send();
                        }
                    }
                }
                redirect(base_url("user/talepkayiterror/"));
            }
        }
    }


    public function sorgu()
    {
        $birim = $this->user_model->birim();
        $gelenbirim = array(
            "birim" => $birim
        );

        $kaynak = $this->user_model->kaynak();
        $gelenkaynak = array(
            "kaynak" => $kaynak
        );
        $this->load->view("user/layouts/sorgu", $gelenbirim + $gelenkaynak);
    }

    public function sorgula()
    {
        $birim = $this->user_model->birim();
        $gelenbirim = array(
            "birim" => $birim
        );

        $kaynak = $this->user_model->kaynak();
        $gelenkaynak = array(
            "kaynak" => $kaynak
        );
        if ($this->input->method() == "post") {
            $this->form_validation->set_rules("adi", "İsim", "required|trim");
            $this->form_validation->set_rules("soyadi", "Soyisim", "required|trim");
            if ($this->form_validation->run() == false) {
                $this->load->view("user/layouts/sorgu", $gelenbirim + $gelenkaynak);
            } else {
                $sorgu = $this->user_model->durumsorgula(
                    $ad = $this->input->post("adi"),
                    $soyad = $this->input->post("soyadi"),
                    $birim = $this->input->post("birim"),
                    $kaynak = $this->input->post("kaynak")
                );
                foreach ($sorgu as $sorguid0) {
                    $iddurum = $sorguid0->id;
                }
                if (!empty($iddurum)) {
                    $sorgugln = array();
                    foreach ($sorgu as $sorguid) {
                        array_push($sorgugln, $sorguid->id);
                        $sorgu2 = $this->user_model->durumsorgula2($sorgugln);
                    }
                    $gelensorgu2 = array(
                        "sorgu2" => $sorgu2
                    );
                    $this->load->view("user/layouts/sorgula", $gelensorgu2);
                } else {
                    $this->sorguerror();
                }
            }
        } else {
            redirect(base_url("user/sorgu/"));
        }
    }


    public function sifreolustur()
    {
        $code = "0123456789QWERTYUOPASDFGHJKLZXCVBNMqwertyuopasdfghjklzxcvbnm";
        return substr(str_shuffle($code), 0, 8);
    }

    public function talepkayiterror()
    {
        $this->load->view("errors/talepKayit/talepkayiterror");
    }

    public function sorguerror()
    {
        $this->load->view("errors/talepKayit/sorguerror");
    }
}