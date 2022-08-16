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
                                <h2 class="card-title">Yönetici Kayıt Et</h2>
                                <br>
                                <form class="forms-sample" action="<?php echo base_url("admin/yoneticisave/") ?>" method="post">
                                    <div class="form-group">
                                        <label for="yisim">Yönetici Adı</label>
                                        <input type="text" class="form-control" style="color: white" id="yisim" name="yisim" placeholder="Yönetici Adı Giriniz!">
                                        <?php echo form_error ('yisim');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="ysisim">Yönetici Soyadı</label>
                                        <input type="text" class="form-control" style="color: white" id="ysisim" name="ysisim" placeholder="Yönetici Soyadı Giriniz!">
                                        <?php echo form_error ('ysisim');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="ymail">Yönetici Mail Adresi</label>
                                        <input type="text" class="form-control" style="color: white" id="ymail" name="ymail" placeholder="Yönetici Mail Adresi Giriniz!">
                                        <?php echo form_error ('ymail');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="ypass">Şifre</label>
                                        <input type="password" class="form-control" style="color: white" id="ypass" name="ypass" placeholder="Şifre Giriniz!">
                                        <?php echo form_error ('ypass');?>
                                    </div>
                                    <div class="form-group">
                                        <label for="ypasst">Şifre Tekrarı</label>
                                        <input type="password" class="form-control" style="color: white" id="ypasst" name="ypasst" placeholder="Şifre Tekrarı Giriniz!">
                                        <?php echo form_error ('ypasst');?>
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