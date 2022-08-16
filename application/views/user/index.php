<?php
date_default_timezone_set('Europe/Istanbul');
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Arıza Kayıt Takip Sistemi</title>
    <?php $this->load->view("user/library/style"); ?>
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
                                <h4 class="card-title">Arıza Kayıt Formu</h4>
                                <form class="forms-sample" action="<?php echo base_url("user/talepkayit/")?>" method="post">
                                    <div class="form-group">
                                        <label for="isim">Adınız</label>
                                        <input type="text" class="form-control" style="color: white" id="isim" name="isim" placeholder="Adınızı Giriniz!">
                                        <?php echo form_error("isim")?>
                                    </div>
                                    <div class="form-group">
                                        <label for="syisim">Soyadınız</label>
                                        <input type="text" class="form-control" style="color: white" id="syisim" name="syisim" placeholder="Soyadınızı Giriniz!">
                                        <?php echo form_error("syisim")?>
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
                                    <div class="form-group">
                                        <label for="arızaform">Arıza Sebebi</label>
                                        <textarea class="form-control" id="arızaform" style="color: white" name="arızaform" rows="4" placeholder="Arıza Sebebini Açıklayınız!"></textarea>
                                        <?php echo form_error("arızaform")?>
                                    </div>
                                    <div class="template-demo">
                                        <button class="btn btn-success" type="submit">Arıza Bildir</button>
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