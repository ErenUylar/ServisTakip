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
                                <h2 class="card-title">Birim Ekle</h2>
                                <br>
                                <form class="forms-sample" action="<?php echo base_url("admin/birimsave/") ?>" method="post">
                                    <div class="form-group">
                                        <label for="brm">Birim Adı</label>
                                        <input type="text" class="form-control" style="color: white" id="brm" name="brm" placeholder="Birim Adı Giriniz!">
                                        <?php echo form_error ('brm');?>
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
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Birim Sil</h2>
                                <br>
                                <form class="forms-sample" action="<?php echo base_url("admin/birimdelete/") ?>"
                                      method="post">
                                    <div class="form-group">
                                        <label for="brmalan">Birim Adı</label>
                                        <select class="form-control" id="brmalan" name="brmalan">
                                            <?php foreach ($alan as $glnalan) { ?>
                                                <option value="<?php echo $glnalan->id ?>"><?php echo $glnalan->birim_ad ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="template-demo">
                                        <button type="submit" class="btn btn-danger btn-fw">Sil</button>
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