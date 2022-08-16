<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Arıza Sorgula</title>
    <?php $this->load->view("user/library/style");?>
</head>
<body>
<div class="container-scroller">
    <?php $this->load->view("user/library/leftbar"); ?>
    <div class="container-fluid page-body-wrapper">
        <?php $this->load->view("user/library/topbar"); ?>
        <div class="main-panel" >
            <div class="content-wrapper">
                <div class="row ">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Arıza Durum Sorgulama</h4>
                                <form class="forms-sample" action="<?php echo base_url("user/sorgula/")?>" method="post">
                                    <div class="form-group">
                                        <label for="adi">Adınız</label>
                                        <input type="text" class="form-control" style="color: white" id="adi" name="adi" placeholder="Adınızı Giriniz!">
                                        <?php echo form_error("adi")?>
                                    </div>
                                    <div class="form-group">
                                        <label for="soyadi">Soyadınız</label>
                                        <input type="text" class="form-control" style="color: white" id="soyadi" name="soyadi" placeholder="Soyadınızı Giriniz!">
                                        <?php echo form_error("soyadi")?>
                                    </div>
                                    <div class="form-group">
                                        <label for="birim">Müdürlük/Birim</label>
                                        <select class="form-control" id="birim" style="color: white" name="birim">
                                            <?php foreach ($birim as $glnbirim) { ?>
                                                <option><?php echo $glnbirim->birim_ad ?></option>
                                            <?php } ?>
                                        </select>                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="kaynak">Arıza Kaynağı</label>
                                        <select class="form-control" id="kaynak" style="color: white" name="kaynak">
                                            <?php foreach ($kaynak as $glnkynk) { ?>
                                                <option><?php echo $glnkynk->alan_ad ?></option>
                                            <?php } ?>
                                        </select>                                        
                                    </div>
                                    <div class="template-demo">
                                        <button class="btn btn-primary btn-fw" type="submit">Sorgula</button>
                                        <button class="btn btn-danger" type="reset">Formu Temizle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("user/library/footer"); ?>
        </div>
    </div>
</div>
<?php $this->load->view("user/library/script"); ?>
</body>
</html>