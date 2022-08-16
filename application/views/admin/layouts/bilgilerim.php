<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Servis Takip Yönetim</title>
    <?php $this->load->view("admin/library/style"); ?>
    <script type="text/javascript">
        window.alert('ŞİFRENİZİ DEĞİŞTİRMEK İSTEMİYORSANIZ BOŞ BIRAKINIZ!');
    </script>
</head>
<body>
<div class="container-scroller">
    <?php $this->load->view("admin/library/leftbar"); ?>
    <div class="container-fluid page-body-wrapper">
        <?php $this->load->view("admin/library/topbar"); ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row ">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Bilgilerim</h2>
                                <br>
                                <form class="forms-sample" action="<?php echo base_url("admin/myupdate/")?>" method="post">
                                    <div class="form-group">
                                        <label for="myisim">Adınız</label>
                                        <input type="text" class="form-control" style="color: white" id="myisim" name="myisim" placeholder="Adınızı Giriniz!" value="<?php echo $this->session->userdata('adi')?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="mysisim">Soyadınız</label>
                                        <input type="text" class="form-control" style="color: white" id="mysisim" name="mysisim" placeholder="Soyadınızı Giriniz!" value="<?php echo $this->session->userdata('soyadi')?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="mymail">Mail Adresiniz</label>
                                        <input type="text" class="form-control" style="color: white" id="mymail" name="mymail" placeholder="Mail Adresinizi Giriniz!" value="<?php echo $this->session->userdata('eposta')?>">
                                        <?php echo form_error("mymail")?>
                                    </div>
                                    <div class="form-group">
                                        <label for="mypass">Şifre</label>
                                        <input type="password" class="form-control" style="color: white" id="mypass" name="mypass" placeholder="Şifrenizi Giriniz!">
                                    </div>
                                    <div class="template-demo">
                                        <button type="submit" class="btn btn-success btn-fw">Bilgilerimi Kayıt Et</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("admin/library/footer"); ?>
        </div>
    </div>
</div>
<?php $this->load->view("admin/library/script"); ?>
</body>
</html>