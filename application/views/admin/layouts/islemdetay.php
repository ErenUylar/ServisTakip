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
                                <h2 class="card-title">İşlem Detay</h2>
                                <br>
                                <?php foreach ($veri as $item) { ?>
                                    <form class="forms-sample" action="<?php echo base_url("admin/islemkayit/$item->id/")?>" method="post">
                                        <div class="form-group">
                                            <label for="dtdurum">İşlem Durumu</label>
                                            <input type="text" class="form-control" style="color: white" id="dtdurum" name="dtdurum" placeholder="Yapılmakta Olan İşlemi Giriniz!">
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                if($item->ip_adresi==""){ ?>
                                                    <label for="dtipadres">İP Adresi</label>
                                                    <input type="text" class="form-control" style="color: white" id="dtipadres" name="dtipadres" placeholder="Cihazın İp Adresini Giriniz!" >
                                                <?php } else{ ?>
                                                    <label for="dtipadres">İP Adresi</label>
                                                    <input type="text" class="form-control" style="color: black" id="dtipadres" name="dtipadres" value="<?php echo $item->ip_adresi ?>" disabled>
                                                <?php }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="dtisim">Adı</label>
                                            <input type="text" class="form-control" style="color: black" id="dtisim" name="dtisim" value="<?php echo $item->adi ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dtsisim">Soyadı</label>
                                            <input type="text" class="form-control" style="color: black"  id="dtsisim" name="dtsisim" value="<?php echo $item->soyadi ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dtbirim">Birim</label>
                                            <input type="text" class="form-control" style="color: black" id="dtbirim" name="dtbirim" value="<?php echo $item->birim ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dttarih">Tarih</label>
                                            <input type="text" class="form-control" style="color: black" id="dttarih" name="dttarih" value="<?php echo $item->tarih." ".$item->saat?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dtkaynak">Arıza Kaynağı</label>
                                            <input type="text" class="form-control" style="color: black" id="dtkaynak" name="dtkaynak" value="<?php echo $item->kaynak ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dtadetay">Arıza Detayı</label>
                                            <textarea class="form-control" id="dtadetay" name="dtadetay" style="text-transform:capitalize;color: black" rows="5" disabled><?php echo $item->sebep ?></textarea>
                                        </div>
                                        <div class="template-demo">
                                            <button type="submit" class="btn btn-success btn-fw">Kayıt Et</button>
                                        </div>
                                    </form>
                                <?php } ?>
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