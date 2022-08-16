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
                                <h2 class="card-title">Talep Detay</h2>
                                <br>
                                <form class="forms-sample">
                                    <?php foreach ($veri as $item) { ?>
                                        <div class="form-group">
                                            <label for="dtisim">Adı</label>
                                            <input type="text" class="form-control" style="text-transform:capitalize;color: black" id="dtisim" name="dtisim" value="<?php echo $item->adi ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dtsisim">Soyadı</label>
                                            <input type="text" class="form-control" style="text-transform:capitalize;color: black"  id="dtsisim" name="dtsisim" value="<?php echo $item->soyadi ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dtbirim">Birim</label>
                                            <input type="text" class="form-control" style="text-transform:capitalize;color: black" id="dtbirim" name="dtbirim" value="<?php echo $item->birim ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dttarih">Tarih</label>
                                            <input type="text" class="form-control" style="text-transform:capitalize;color: black" id="dttarih" name="dttarih" value="<?php echo $item->tarih." ".$item->saat ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dtkaynak">Arıza Kaynağı</label>
                                            <input type="text" class="form-control" style="text-transform:capitalize;color: black" id="dtkaynak" name="dtkaynak" value="<?php echo $item->kaynak ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dtadetay">Arıza Detayı</label>
                                            <textarea class="form-control" id="dtadetay" name="dtadetay" style="text-transform:capitalize;color: black" rows="5" disabled><?php echo $item->sebep ?></textarea>
                                        </div>
                                        <div class="template-demo">
                                            <a class="btn btn-success btn-fw" href="<?php echo base_url("admin/taleponay/$item->id/")?>">Talep Onayla</a>
                                        </div>
                                    <?php } ?>
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