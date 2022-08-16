<?php
$glnip = $this->uri->segment(3);

$t_talep = count($toplamtalep);
$t_onay = count($toplamonay);
$t_bitis = count($toplambitis);

$yl_talep = count($ytalep);
$yl_onay = count($yonay);
$yl_bitis = count($ybitis);

$d_talep = count($d_talep);
$d_onay = count($d_onay);
$d_bitis = count($d_bitis);

$g_talep = count($g_talep);
$g_onay = count($g_onay);
$g_bitis = count($g_bitis);

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
                                            <h5 class="mb-0">Günlük İşlem</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-primary ">
                                            <span class="mdi mdi mdi-clock icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal"><?php echo $g_talep ?> Talep Alındı</h6>
                                <h6 class="text-muted font-weight-normal"><?php echo $g_onay ?> Talep Onaylandı</h6>
                                <h6 class="text-muted font-weight-normal"><?php echo $g_bitis ?> İşlem Tamamlandı</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h5 class="mb-0">Aylık İşlem</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-danger">
                                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal"><?php echo $d_talep ?> Talep Alındı</h6>
                                <h6 class="text-muted font-weight-normal"><?php echo $d_onay ?> Talep Onaylandı</h6>
                                <h6 class="text-muted font-weight-normal"><?php echo $d_bitis ?> İşlem Tamamlandı</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h5 class="mb-0">Yıllık İşlem</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-warning">
                                            <span class="mdi mdi-clock-alert icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal"><?php echo $yl_talep ?> Talep Alındı</h6>
                                <h6 class="text-muted font-weight-normal"><?php echo $yl_onay ?> Talep Onaylandı</h6>
                                <h6 class="text-muted font-weight-normal"><?php echo $yl_bitis ?> İşlem Tamamlandı</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h5 class="mb-0">Toplam İşlem</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-danger">
                                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal"><?php echo $t_talep ?> Talep Alındı</h6>
                                <h6 class="text-muted font-weight-normal"><?php echo $t_onay ?> Talep Onaylandı</h6>
                                <h6 class="text-muted font-weight-normal"><?php echo $t_bitis ?> İşlem Tamamlandı</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="card-title"><?php echo $glnip ?> - İşlem
                                    Detayı</h2>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="color: white">
                                        <thead>
                                        <tr>
                                            <th>Tarih</th>
                                            <th>Saat</th>
                                            <th>Detay</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <?php foreach ($veri as $item) { ?>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $item->tarih ?></td>
                                                <td><?php echo $item->saat ?></td>
                                                <td><?php echo $item->durum ?></td>
                                                <td class="text-center" style="width: 110px">
                                                     <a class="btn btn-primary btn-rounded btn-fw" href="<?php echo base_url("admin/arizasebebi/$item->id/")?>">Arıza Detayı</a>                                                    
                                                </td>
                                            </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("admin/library/footer"); ?>
        </div>
    </div>
    <?php $this->load->view("admin/library/script"); ?>
</body>
</html>