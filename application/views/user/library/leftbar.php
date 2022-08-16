<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo"></a>
        <a class="sidebar-brand brand-logo-mini"></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">Anasayfa</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo base_url()?>">
              <span class="menu-icon">
                <i class="mdi mdi-bookmark-plus"></i>
              </span>
                <span class="menu-title">Arıza Bildir</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo base_url("user/sorgu/")?>">
              <span class="menu-icon">
                <i class="mdi mdi-clock-alert"></i>
              </span>
                <span class="menu-title">İşlem Durumu</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo base_url("login/")?>">
              <span class="menu-icon">
                <i class="mdi mdi-account-card-details"></i>
              </span>
                <span class="menu-title">Yetkili Girişi</span>
            </a>
        </li>
    </ul>
</nav>