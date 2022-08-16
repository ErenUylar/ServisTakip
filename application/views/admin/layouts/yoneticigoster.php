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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Yönetici Görüntüle</h2>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="color: white">
                                        <?php if (empty($model)) { ?>
                                            <h1 class="card-title" style="text-align: center">KAYITLI YÖNETİCİ YOK!</h1>
                                        <?php } else{ ?>
                                            <thead>
                                                <tr>
                                                    <th>İsim</th>
                                                    <th>Soyisim</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($veri as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item->adi ?></td>
                                                    <td><?php echo $item->soyadi ?></td>
                                                    <td class="text-center" style="width: 300px"><a class="btn btn-danger btn-rounded btn-fw" href="<?php echo base_url("admin/yoneticisil/$item->id/")?>" >Yönetici Sil</a></td>
                                                </tr>
                                                <?php } ?>
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
</div>
<?php $this->load->view("admin/library/script"); ?>
</body>
</html>