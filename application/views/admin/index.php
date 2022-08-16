<?php
date_default_timezone_set('Europe/Istanbul');

if(!empty($veri)){
    $talep = count($veri);
}else{
    $talep = 0;
}

if(!empty($item)){
    $durum = count($item);
}else{
    $durum = 0;
}

if(!empty($items)){
    $sonuc = count($items);
}else{
    $sonuc = 0;
}

if(!empty($pc)){
    $pcsay = count($pc);
}else{
    $pcsay = 0;
}

if(!empty($tel)){
    $telsay = count($tel);
}else{
    $telsay = 0;
}

if(!empty($yazici)){
    $yzcsay = count($yazici);
}else{
    $yzcsay = 0;
}
?>

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
                <div class="row">
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h5 class="mb-0"><?php echo date('d.m.Y'); ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-primary ">
                                            <span class="mdi mdi mdi-clock icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal"><?php echo date('H:i')?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h5 class="mb-0">Gelen Talepler</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-danger">
                                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal"><?php echo $talep?> Talep Alındı</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h5 class="mb-0">Devam Eden İşlemler</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-warning">
                                            <span class="mdi mdi-clock-alert icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal"><?php echo $durum?> İşlem</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h5 class="mb-0">Tamamlanan İşlemler</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success ">
                                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal"><?php echo $sonuc?> İşlem</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>Gelen Bilgisayar Talepleri</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h5 class="mb-0" style="font-size: 60px"><?php echo $pcsay?></h5>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="icon-lg mdi mdi-monitor text-danger ml-auto"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>Gelen Telefon Talepleri</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h5 class="mb-0" style="font-size: 60px"><?php echo $telsay?></h5>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="icon-lg mdi mdi-tablet-android text-danger ml-auto"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>Gelen Yazıcı Talepleri</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h5 class="mb-0" style="font-size: 60px"><?php echo $yzcsay?></h5>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="icon-lg mdi mdi-printer text-danger ml-auto"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive" style="text-align: center; font-family: Verdana">
                                    <img src="<?php echo base_url("assets/images/hosgeldin.png"); ?>" alt="hosgeldin"/>
                                    <p style="font-size: xx-large"><?php echo $this->session->userdata('adi')." ".$this->session->userdata('soyadi')?></p>
                                </div>
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