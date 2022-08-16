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
                                <h2 class="card-title">2022 - Arıza Kayıtları</h2>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="color: white">
                                        <?php if (empty($model)) { ?>
                                            <h2 class="card-title" style="text-align: center">KAYIT GİRİŞİ YOK!</h2>
                                        <?php } else{ ?>
                                            <thead>
                                            <tr>
                                                <th>İP Adresi</th>
                                                <th>Aygıt</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($veri as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item->ip_adresi?></td>
                                                    <td><?php echo $item->kaynak?></td>
                                                    <td class="text-center" style="width: 400px"><a class="btn btn-primary btn-rounded btn-fw" href="<?php echo base_url("admin/arizadetay/$item->ip_adresi/")?>" >Tüm Kayıtlar</a></td>
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