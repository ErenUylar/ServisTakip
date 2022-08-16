<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Servis Takip Yönetim</title>
    <?php $this->load->view("admin/library/style"); ?>
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
                                <h2 class="card-title">Personel Kayıt Et</h2>
                                <br>
                                <form class="forms-sample" action="<?php echo base_url("admin/personelsave/") ?>" method="post">
                                    <div class="form-group">
                                        <label for="pisim">Personel Adı</label>
                                        <input type="text" class="form-control" style="color: white" id="pisim" name="pisim" placeholder="Personel Adı Giriniz!">
                                        <?php echo form_error ('pisim');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="psisim">Personel Soyadı</label>
                                        <input type="text" class="form-control" style="color: white"  id="psisim" name="psisim" placeholder="Personel Soyadı Giriniz!">
                                        <?php echo form_error ('psisim');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="pmail">Personel Mail Adresi</label>
                                        <input type="text" class="form-control" style="color: white" id="pmail" name="pmail" placeholder="Personel Mail Adresi Giriniz!">
                                        <?php echo form_error ('pmail');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="ppass">Şifre</label>
                                        <input type="password" class="form-control" style="color: white" id="ppass" name="ppass" placeholder="Şifre Giriniz!">
                                        <?php echo form_error ('ppass');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="ppasst">Şifre Tekrarı</label>
                                        <input type="password" class="form-control" style="color: white" id="ppasst" name="ppasst" placeholder="Şifre Tekrarı Giriniz!">
                                        <?php echo form_error ('ppasst');?>
                                    </div>
                                    <div class="template-demo">
                                        <button type="submit" class="btn btn-success btn-fw">Kayıt Et</button>
                                        <button type="reset" class="btn btn-danger btn-fw">Formu Temizle</button>
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