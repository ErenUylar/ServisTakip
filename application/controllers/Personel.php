<?php

class Personel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Europe/Istanbul');
        $this->load->model("admin_model");
        $this->load->library("email");

        if (!$this->session->userdata('oturum')) {
            redirect(base_url());
        } else {
            if ($this->session->userdata('yetki_id') != 2) {
                if ($this->session->userdata('yetki_id') == 1) {
                    redirect(base_url("admin/"));
                } else {
                    redirect(base_url("user/"));
                }
            }
        }
    }

    public function index()
    {
        $items = $this->admin_model->talepgetirgrup();
        if (!empty($items)) {
            $glnid = array();
            foreach ($items as $item) {
                array_push($glnid, $item->id);
                $items2 = $this->admin_model->talepgetir($glnid);
                if (!empty($items2)) {
                    $sonuc = ["veri" => $items2];
                } else {
                    $sonuc = ["veri" => ""];
                }
            }
        } else {
            $sonuc = ["veri" => ""];
        }

        $items3 = $this->admin_model->islemdurumgrup();
        if (!empty($items3)) {
            $glnid2 = array();
            foreach ($items3 as $item) {
                array_push($glnid2, $item->id);
                $items4 = $this->admin_model->islemdurum($glnid2);
                if (!empty($items4)) {
                    $sonuc2 = ["item" => $items4];
                } else {
                    $sonuc2 = ["item" => ""];
                }
            }
        } else {
            $sonuc2 = ["item" => ""];
        }

        $items5 = $this->admin_model->arizakayitgrup();
        if (!empty($items5)) {
            $glnid3 = array();
            foreach ($items5 as $item) {
                array_push($glnid3, $item->id);
                $items6 = $this->admin_model->arizakayitsay($glnid3);
                if (!empty($items6)) {
                    $sonuc3 = ["items" => $items6];
                } else {
                    $sonuc3 = ["items" => ""];
                }
            }
        } else {
            $sonuc3 = ["items" => ""];
        }

        $items7 = $this->admin_model->pcsaygrup();
        if (!empty($items7)) {
            $glnid4 = array();
            foreach ($items7 as $item) {
                array_push($glnid4, $item->id);
                $items8 = $this->admin_model->pcsay($glnid4);
                if (!empty($items8)) {
                    $sonuc4 = ["pc" => $items8];
                } else {
                    $sonuc4 = ["pc" => ""];
                }
            }
        } else {
            $sonuc4 = ["pc" => ""];
        }

        $items9 = $this->admin_model->telsaygrup();
        if (!empty($items9)) {
            $glnid5 = array();
            foreach ($items9 as $item) {
                array_push($glnid5, $item->id);
                $items10 = $this->admin_model->telsay($glnid5);
                if (!empty($items10)) {
                    $sonuc5 = ["tel" => $items10];
                } else {
                    $sonuc5 = ["tel" => ""];
                }
            }
        } else {
            $sonuc5 = ["tel" => ""];
        }

        $items11 = $this->admin_model->yazicisaygrup();
        if (!empty($items11)) {
            $glnid6 = array();
            foreach ($items11 as $item) {
                array_push($glnid6, $item->id);
                $items12 = $this->admin_model->yazicisay($glnid6);
                if (!empty($items12)) {
                    $sonuc6 = ["yazici" => $items12];
                } else {
                    $sonuc6 = ["yazici" => ""];
                }
            }
        } else {
            $sonuc6 = ["yazici" => ""];
        }

        $this->load->view("personel/index", $sonuc + $sonuc2 + $sonuc3 + $sonuc4 + $sonuc5 + $sonuc6);
    }

    public function bilgilerim()
    {
        $this->load->view("personel/layouts/bilgilerim");
    }

    public function myupdate()
    {
        if ($this->input->method() == "post"){
            $sifre = $this->input->post('mypass');
            $id = $this->session->userdata('id');

            if($this->session->userdata('eposta')==$this->input->post('mymail')){
                if (isset($sifre)&&!empty($sifre)){
                    $update = $this->admin_model->myupdate($id,
                        $degerler = array(
                            'adi'=>$this->input->post('myisim'),
                            'soyadi'=>$this->input->post('mysisim'),
                            'eposta'=>$this->input->post('mymail'),
                            'sifre'=>sha1(md5(strip_tags($sifre))),
                            'durum'=>"Aktif"
                        )
                    );
                }else{
                    $update = $this->admin_model->myupdate($id,
                        $degerler = array(
                            'adi'=>$this->input->post('myisim'),
                            'soyadi'=>$this->input->post('mysisim'),
                            'eposta'=>$this->input->post('mymail'),
                            'durum'=>"Aktif"

                        )
                    );
                }
            }else{
                $this->form_validation->set_rules("mymail", "E-Posta", "required|trim|valid_email|is_unique[user.eposta]");
                if ($this->form_validation->run() == false){
                    $this->load->view("admin/layouts/bilgilerim", validation_errors());
                }
                else{
                    if (isset($sifre)&&!empty($sifre)){
                        $update = $this->admin_model->myupdate($id,
                            $degerler = array(
                                'adi'=>$this->input->post('myisim'),
                                'soyadi'=>$this->input->post('mysisim'),
                                'eposta'=>$this->input->post('mymail'),
                                'sifre'=>sha1(md5(strip_tags($sifre))),
                                'durum'=>"Aktif"
                            )
                        );
                    }else{
                        $update = $this->admin_model->myupdate($id,
                            $degerler = array(
                                'adi'=>$this->input->post('myisim'),
                                'soyadi'=>$this->input->post('mysisim'),
                                'eposta'=>$this->input->post('mymail'),
                                'durum'=>"Aktif"
                            )
                        );
                    }
                }
            }
        }
    }

    public function ilgialan()
    {
        $alan = $this->admin_model->alangrup($this->session->userdata('id'));
        if (!empty($alan)) {
            $kontrol = array("model" => "dolu");
            $glnid = array();
            foreach ($alan as $g_id) {
                array_push($glnid, $g_id->alan_id);
                $items2 = $this->admin_model->alangetir($glnid);
                if (empty($items2)) {
                    $sonuc = ["veri" => ""];
                } else {
                    $sonuc = ["veri" => $items2];
                }
                $items3 = $this->admin_model->kayıtalangetir($glnid);
                $sonuc2 = ["alanveri" => $items3];
            }
            $this->load->view("personel/layouts/ilgialan", $sonuc + $sonuc2 + $kontrol);
        } else {
            $kontrol = array("model" => "");
            $alan2 = $this->admin_model->tumalan();
            $gelenalan = array(
                "alan" => $alan2
            );
            $this->load->view("personel/layouts/ilgialan", $gelenalan + $kontrol);
        }
    }

    public function ilgialansave()
    {
        if ($this->input->method() == "post"){
            $user_id = $this->session->userdata('id');
            $alan_id = $this->input->post('ilgialan');

            $update = $this->admin_model->ilgialansave(
                $degerler = array(
                    'user_id'=>$user_id,
                    'alan_id'=>$alan_id
                )
            );
            if ($update){
                redirect(base_url("personel/ilgialan/"));
            }
        }
    }

    public function ilgialandelete($id)
    {
        $user_id = $this->session->userdata('id');
        $delete = $this->admin_model->ilgialandelete($user_id,$id);
        if ($delete){
            redirect(base_url("personel/ilgialan/"));
        }
    }

    public function talepler()
    {
        $items = $this->admin_model->talepgetirgrup();
        $kontrol = array();
        if (!empty($items)) {
            $glnid = array();
            foreach ($items as $item) {
                array_push($glnid, $item->id);
                $items2 = $this->admin_model->talepgetir($glnid);
                if (!empty($items2)) {
                    $kontrol = array("model" => "dolu");
                }
                $sonuc = ["veri" => $items2];
            }
            $this->load->view("personel/layouts/talepler", $sonuc + $kontrol);
        } else {
            $kontrol = array("model" => "");
            $this->load->view("personel/layouts/talepler", $kontrol);
        }
    }

    public function talepdetay($id)
    {
        $items = $this->admin_model->talepdetay($id);
        $gelenveri = array(
            "veri" => $items
        );
        $this->load->view("personel/layouts/talepdetay", $gelenveri);
    }

    public function taleponay($id)
    {
        $items = $this->admin_model->islemdetay($id);

        foreach ($items as $item) {
            $gln_ad = $item->adi;
            $gln_soyad = $item->soyadi;            
            $gln_birim = $item->birim;
            $gln_kaynak = $item->kaynak;
            $gln_sebep = $item->sebep;
            $gln_kod = $item->takip_kod;
        }

        $durum = "Talep Onaylandı";

        $onay = $this->admin_model->taleponay(array(
            'adi' => $gln_ad,
            'soyadi' => $gln_soyad,            
            'birim' => $gln_birim,
            'kaynak' => $gln_kaynak,
            'sebep' => $gln_sebep,
            'tarih' => date('Y-m-d'),
            'saat' => date('H:i'),
            'durum' => $durum,
            'takip_kod' => $gln_kod
        ));
        redirect(base_url("personel/talepler/"));
    }

    public function islemdurumu()
    {

        $items = $this->admin_model->islemdurumgrup();
        $kontrol = array();
        if (!empty($items)) {
            $kontrol = array("model" => "dolu");
            $glnid = array();
            foreach ($items as $item) {
                array_push($glnid, $item->id);
                $items2 = $this->admin_model->islemdurum($glnid);
                $sonuc = ["items" => $items2];
            }
            $this->load->view("personel/layouts/islemdurumu", $sonuc + $kontrol);
        } else {
            $kontrol = array("model" => "");
            $this->load->view("personel/layouts/islemdurumu", $kontrol);
        }
    }

    public function islemdetay($id)
    {
        $items = $this->admin_model->islemdetay($id);
        $gelenveri = array(
            "veri" => $items
        );
        $this->load->view("personel/layouts/islemdetay", $gelenveri);
    }

    public function islemtamamla($id, $kod)
    {
        $items = $this->admin_model->islemdetay($id);

        foreach ($items as $item) {
            $gln_ip = $item->ip_adresi;
            $gln_ad = $item->adi;
            $gln_soyad = $item->soyadi;            
            $gln_birim = $item->birim;
            $gln_kaynak = $item->kaynak;
            $gln_sebep = $item->sebep;
            $gln_kod = $item->takip_kod;
        }

        $sonuc = "İşlem Tamamlandı";
        $sifre = "";

        $insert = $this->admin_model->islemkayit(
            array(
                'ip_adresi' => $gln_ip,
                'adi' => $gln_ad,
                'soyadi' => $gln_soyad,                
                'birim' => $gln_birim,
                'kaynak' => $gln_kaynak,
                'sebep' => $gln_sebep,
                'tarih' => date('Y-m-d'),
                'saat' => date('H:i'),
                'durum' => $sonuc,
                'takip_kod' => $sifre
            )
        );
        $this->admin_model->kodsil($kod, array(
            "takip_kod" => $sifre,
        ));

        if ($insert) {
            redirect(base_url("personel/islemdurumu/"));
        }
    }

    public function islemkayit($id)
    {
        $items = $this->admin_model->islemdetay($id);

        foreach ($items as $item) {
            $gln_ip = $item->ip_adresi;
            $gln_ad = $item->adi;
            $gln_soyad = $item->soyadi;            
            $gln_birim = $item->birim;
            $gln_kaynak = $item->kaynak;
            $gln_sebep = $item->sebep;
            $gln_kod = $item->takip_kod;
        }


        if (!empty($gln_ip)) {
            if ($this->input->method() == "post") {
                if (empty($this->input->post("dtdurum"))) {
                    $this->durumboserror();
                } else {
                    $insert = $this->admin_model->islemkayit(
                        array(
                            'ip_adresi' => $gln_ip,
                            'adi' => $gln_ad,
                            'soyadi' => $gln_soyad,                            
                            'birim' => $gln_birim,
                            'kaynak' => $gln_kaynak,
                            'sebep' => $gln_sebep,
                            'tarih' => date('Y-m-d'),
                            'saat' => date('H:i'),
                            'durum' => $this->input->post("dtdurum"),
                            'takip_kod' => $gln_kod
                        )
                    );
                    if ($insert) {
                        redirect(base_url("personel/islemdurumu/"));
                    }
                }
            }
        } else {
            if ($this->input->method() == "post") {
                if (empty($this->input->post("dtipadres"))) {
                    $this->ipboserror();
                } else {
                    if (empty($this->input->post("dtdurum"))) {
                        $this->durumboserror();
                    } else {
                        $ip1 = $this->input->post("dtipadres");
                        $this->admin_model->ipupdate($gln_kod, array(
                            "ip_adresi" => $ip1
                        ));
                        $insert = $this->admin_model->islemkayit(
                            array(
                                'ip_adresi' => $this->input->post("dtipadres"),
                                'adi' => $gln_ad,
                                'soyadi' => $gln_soyad,                                
                                'birim' => $gln_birim,
                                'kaynak' => $gln_kaynak,
                                'sebep' => $gln_sebep,
                                'tarih' => date('Y-m-d'),
                                'saat' => date('H:i'),
                                'durum' => $this->input->post("dtdurum"),
                                'takip_kod' => $gln_kod
                            )
                        );
                        if ($insert) {
                            redirect(base_url("personel/islemdurumu/"));
                        }
                    }
                }
            }
        }
    }

    public function arizakayit()
    {
        $items = $this->admin_model->arizakayit();
        $kontrol = array();
        if (!empty($items)) {
            $kontrol = array("model" => "dolu");
            $gelenveri = array(
                "veri" => $items
            );
            $this->load->view("personel/layouts/arizakayit", $gelenveri + $kontrol);
        } else {
            $kontrol = array("model" => "");
            $this->load->view("personel/layouts/arizakayit", $kontrol);
        }
    }

    public function arizadetay($ip)
    {
        $items = $this->admin_model->arizadetay($ip);
        $gelenveri = array(
            "veri" => $items
        );

        $toplamtalep = $this->admin_model->toplamtalep($ip);
        $toplamtalep1 = array(
            "toplamtalep" => $toplamtalep
        );
        $toplamonay = $this->admin_model->toplamonay($ip);
        $toplamonay1 = array(
            "toplamonay" => $toplamonay
        );
        $toplambitis = $this->admin_model->toplambitis($ip);
        $toplambitis1 = array(
            "toplambitis" => $toplambitis
        );

        $ytalep = $this->admin_model->yıltalep($ip, $yıl = date("Y-01-01"));
        $ytalep1 = array(
            "ytalep" => $ytalep
        );
        $yonay = $this->admin_model->yılonay($ip, $yıl = date("Y-01-01"));
        $yonay1 = array(
            "yonay" => $yonay
        );
        $ybitis = $this->admin_model->yılbitis($ip, $yıl = date("Y-01-01"));
        $ybitis1 = array(
            "ybitis" => $ybitis
        );

        $d_talep = $this->admin_model->aytalep($ip, $ay = date("Y-m-01"));
        $d_talep1 = array(
            "d_talep" => $d_talep
        );

        $d_onay = $this->admin_model->ayonay($ip, $ay = date("Y-m-01"));
        $d_onay1 = array(
            "d_onay" => $d_onay
        );
        $d_bitis = $this->admin_model->aybitis($ip, $ay = date("Y-m-01"));
        $d_bitis1 = array(
            "d_bitis" => $d_bitis
        );

        $g_talep = $this->admin_model->guntalep($ip, $gun = date("Y-m-d"));
        $g_talep1 = array(
            "g_talep" => $g_talep
        );
        $g_onay = $this->admin_model->gunonay($ip, $gun = date("Y-m-d"));
        $g_onay1 = array(
            "g_onay" => $g_onay
        );
        $g_bitis = $this->admin_model->gunbitis($ip, $gun = date("Y-m-d"));
        $g_bitis1 = array(
            "g_bitis" => $g_bitis
        );

        $this->load->view("personel/layouts/arizadetay", $gelenveri + $toplamtalep1 + $toplamonay1 +
            $toplambitis1 + $ybitis1 + $yonay1 + $ytalep1 + $d_bitis1 + $d_onay1 + $d_talep1 + $g_bitis1 + $g_onay1 + $g_talep1);
    }

    public function arizasebebi($id){

        $items2 = $this->admin_model->arizadetay2($id);
        $gelenveri2 = array(
            "veri2" => $items2
        );

        $this->load->view("errors/personel/arizasebep2",$gelenveri2);
    }


    public function ipboserror()
    {
        $this->load->view("errors/personel/ipboserror");
    }

    public function durumboserror()
    {
        $this->load->view("errors/personel/durumboserror");
    }
}