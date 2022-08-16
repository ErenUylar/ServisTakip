<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Servis Takip Personel</title>
    <?php $this->load->view("personel/library/style"); ?>
</head>
<body>
<div class="container-scroller">
    <?php $this->load->view("personel/library/leftbar"); ?>
    <div class="container-fluid page-body-wrapper">
        <?php $this->load->view("personel/library/topbar"); ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row ">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Gelen Talepler</h2>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="color: white">
                                        <?php if (empty($model)) { ?>
                                            <h2 class="card-title" style="text-align: center">BEKLEMEDE OLAN TALEP YOK!</h2>
                                        <?php } else{ ?>
                                            <thead>
                                            <tr>
                                                <th>İsim</th>
                                                <th>Soyisim</th>
                                                <th>Birim</th>
                                                <th>Tarih</th>
                                                <th>Arıza Kaynağı</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($veri as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item->adi ?></td>
                                                    <td><?php echo $item->soyadi ?></td>
                                                    <td><?php echo $item->birim ?></td>
                                                    <td><?php echo $item->tarih ?> <?php echo $item->saat ?></td>
                                                    <td><?php echo $item->kaynak ?></td>
                                                    <td class="text-center"style="width: 200px"><a class="btn btn-primary btn-rounded btn-fw" href="<?php echo base_url("personel/talepdetay/$item->id/")?>">Detay</a></td>
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
            <?php $this->load->view("personel/library/footer"); ?>
        </div>
    </div>
</div>
<?php $this->load->view("personel/library/script"); ?>
</body>
</html>