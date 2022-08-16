<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Europe/Istanbul');
        $this->load->model("login_model");

        if ($this->session->userdata('oturum')) {
            if ($this->session->userdata('yetki_id') == 1) {
                redirect(base_url("admin/"));
            }else{
                redirect(base_url("personel/"));
            }
        }
    }

    public function index(){
        $this->load->view("login/login");
    }

    public function loginData()
    {
        if ($this->input->method() == "post") {

            $this->form_validation->set_rules("grsPosta", "E-posta", "required|trim|valid_email");
            $this->form_validation->set_rules("grsSifre", "Şifre", "required|trim");
            $password = $this->input->post('grsSifre');
            $password = sha1(md5(strip_tags($password)));

            if ($this->form_validation->run() == false) {
                $this->load->view("login/login", validation_errors());
            } else {
                $query = $this->login_model->get(
                    $posta = $this->input->post('grsPosta')
                );
                if ($query) {
                    $query1 = $this->login_model->get2(
                        $posta = $this->input->post('grsPosta'),
                        $sifre = $password
                    );
                    if ($query1) {
                        $this->session->set_userdata([
                            'durum' => $query1->durum
                        ]);
                        if ($this->session->userdata('durum') == "Aktif"){
                            $this->session->set_userdata([
                                'oturum' => true,
                                'id' => $query1->id,
                                'yetki_id' => $query1->yetki_id,
                                'adi' => $query1->adi,
                                'soyadi' => $query1->soyadi,
                                'eposta' => $query1->eposta,
                            ]);
                            if ($this->session->userdata('yetki_id') == 1) {
                                redirect(base_url("admin/"));
                            }else{
                                redirect(base_url("personel/"));
                            }
                        }else{
                            $this->load->view("errors/login/kullaniciSilindi");
                        }
                    } else {
                        $this->load->view("errors/login/sifreYanlis");
                    }
                } else {
                    $this->load->view("errors/login/kullaniciYok");
                }
            }
        }
    }
}