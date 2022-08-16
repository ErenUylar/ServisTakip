<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("login/library/head"); ?>
    <title>Yetkili Giriş Paneli</title>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h1 style="text-align: center">Servis Takip</h1>
                        <br>
                        <h5 class="card-title text-left mb-3"><center>Yetkili Giriş Ekranı</center></h5><br>
                        <form action="<?php echo base_url("login/loginData/") ?>" method="post">
                            <div class="form-group">
                                <label for="grsPosta">E-Posta *</label>
                                <input type="text" class="form-control p_input" style="color: white" id="grsPosta" name="grsPosta"
                                       placeholder="E-Postanız"><?php  echo  form_error ( 'grsPosta');?>
                            </div>
                            <div class="form-group">
                                <label for="grsSifre">Şifre *</label>
                                <input type="password" class="form-control p_input" style="color: white" id="grsSifre" name="grsSifre"
                                       placeholder="Şifreniz"><?php  echo  form_error ( 'grsSifre');?>
                            </div>
                            <br>
                            <div class="template-demo" style="text-align: center">
                                <button type="submit" class="btn btn-inverse-success btn-fw">Giriş Yap</button>
                                <a class="btn btn-inverse-primary btn-fw" href="<?php echo base_url()?>" >Ana Sayfa</a>
                            </div>
                            <p class="sign-up">Afyonkarahisar Belediyesi Bilgi İşlem</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("login/library/script"); ?>
</body>
</html>
