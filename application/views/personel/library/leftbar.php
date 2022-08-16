<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo"></a>
        <a class="sidebar-brand brand-logo-mini"></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="profile-name">
                        <h4 class="mb-0 font-weight-normal"><?php echo $this->session->userdata('adi')." ".$this->session->userdata('soyadi')?></h4>
                        <span>Personel</span>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Anasayfa</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo base_url("personel/")?>">
              <span class="menu-icon">
                <i class="mdi mdi-home"></i>
              </span>
                <span class="menu-title">Genel Bakış</span>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Arıza Takip</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo base_url("personel/talepler/")?>">
              <span class="menu-icon">
                <i class="mdi mdi-clipboard-arrow-down"></i>
              </span>
                <span class="menu-title">Gelen Talepler</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo base_url("personel/islemdurumu/")?>">
              <span class="menu-icon">
                <i class="mdi mdi-clock-alert"></i>
              </span>
                <span class="menu-title">İşlem Durumu</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo base_url("personel/arizakayit/")?>">
              <span class="menu-icon">
                <i class="mdi mdi-book-multiple"></i>
              </span>
                <span class="menu-title">2022-Arıza Kayıtları</span>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Ayarlar</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo base_url("personel/ilgialan/")?>">
              <span class="menu-icon">
                <i class="mdi mdi-alert"></i>
              </span>
                <span class="menu-title">Arıza İlgi Alanı</span>
            </a>
        </li>
    </ul>
</nav>