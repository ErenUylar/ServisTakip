<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Arıza Sorgula</title>
    <?php $this->load->view("user/library/style"); ?>
</head>
<body>
<div>
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                            <div class="form-group" style="text-align: center">
                                <h1><u>SORGU BAŞARILI</u></h1>
                            </div>
                            <?php foreach ($sorgu2 as $sorgula) {
                                $originalDate = $sorgula->tarih;
                                $newDate = date("d.m.Y", strtotime($originalDate));
                                ?>
                            <div class="form-group" style="text-align: center">
                                <h3><?php echo $sorgula->saat." - ".$newDate?></h3>
                            </div>
                            <div class="form-group" style="text-align: center">
                                <h3 style="color: red"><?php echo $sorgula->durum?></h3>
                            </div>
                            <br>
                            <?php } ?>
                            <div class="template-demo" style="text-align: center">
                                <a href="<?php echo base_url("user/")?>" class="btn btn-inverse-primary btn-fw">Ana Sayfa</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("user/library/script"); ?>
</body>
</html>