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
                <?php if (!empty($model)) { ?>
                    <div class="row ">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">İlgi Alanı Ekle</h2>
                                    <br>
                                    <?php if (!empty($veri)) { ?>
                                        <form class="forms-sample"
                                              action="<?php echo base_url("personel/ilgialansave/") ?>" method="post">
                                            <div class="form-group">
                                                <label for="ilgialan">İlgi Alanı</label>
                                                <select class="form-control" id="ilgialan" name="ilgialan">
                                                    <?php foreach ($veri as $glnalan) { ?>
                                                        <option value="<?php echo $glnalan->id ?>"><?php echo $glnalan->alan_ad ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="template-demo">
                                                <button type="submit" class="btn btn-success btn-fw">Kayıt Et</button>
                                            </div>
                                        </form>
                                    <?php } else { ?>
                                        <h2 class="card-title" style="text-align: center;color: #00bb00">TÜM ALANLAR
                                            KAYITLI!</h2>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">İlgi Alanı Görüntüle</h2>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="color: white">
                                            <thead>
                                            <tr>
                                                <th>İlgi Alanlarım</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($alanveri as $gelenitems) { ?>
                                                <tr>
                                                    <td><?php echo $gelenitems->alan_ad ?></td>
                                                    <td class="text-center" style="width: 300px"><a
                                                                class="btn btn-danger btn-rounded btn-fw"
                                                                href="<?php echo base_url("personel/ilgialandelete/$gelenitems->id/") ?>">Sil</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row ">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">İlgi Alanı Ekle</h2>
                                    <br>
                                    <form class="forms-sample" action="<?php echo base_url("personel/ilgialansave/") ?>"
                                          method="post">
                                        <div class="form-group">
                                            <label for="ilgialan">İlgi Alanı</label>
                                            <select class="form-control" id="ilgialan" name="ilgialan">
                                                <?php foreach ($alan as $glnalan) { ?>
                                                    <option value="<?php echo $glnalan->id ?>"><?php echo $glnalan->alan_ad ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="template-demo">
                                            <button type="submit" class="btn btn-success btn-fw">Kayıt Et</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">İlgi Alanı Görüntüle</h2>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="color: white">
                                            <h2 class="card-title" style="text-align: center;color: red">İLGİ ALANI
                                                YOK!</h2>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php $this->load->view("personel/library/footer");?>
        </div>
    </div>
</div>
<?php $this->load->view("personel/library/script"); ?>
</body>
</html>