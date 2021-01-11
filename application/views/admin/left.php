    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      
      <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/home') ?>">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Trang chính</span>
            </a>
          </li>
          <!-- <li class="nav-item <?= ($urlSec=='menu') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo admin_url('menu'); ?>">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Menu</span>
            </a>
          </li> -->
          <li class="nav-item <?= ($urlSec=='news') ? 'active' : '' ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-post" aria-expanded="false" aria-controls="ui-basic-post">
              <i class="ti-rss menu-icon"></i>
              <span class="menu-title">Bài viết</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?= ($urlSec=='news') ? 'show' : '' ?>" id="ui-basic-post">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('news'); ?>" >Danh sách bài viết</a></li>
                <li class="nav-item "> <a class="nav-link" href="<?= admin_url('news/add'); ?>">Thêm mới</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('catnews'); ?>">Danh mục</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item <?= ($urlSec=='product' || $urlSec=='category') ? 'active' : '' ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-product" aria-expanded="false" aria-controls="ui-basic-product">
              <i class="ti-package menu-icon"></i>
              <span class="menu-title">Sản phẩm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?= ($urlSec=='product' || $urlSec=='category') ? 'show' : '' ?>" id="ui-basic-product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('category'); ?>">Danh mục </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('product'); ?>" >Danh sách sản phẩm</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('product/add'); ?>" >Thêm mới</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('manufac'); ?>" >Hãng sản xuất</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('countries'); ?>" >Xuất xứ</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item <?= ($urlSec=='transaction' ) ? 'active' : '' ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-tran" aria-expanded="false" aria-controls="ui-basic-tran">
              <i class="ti-package menu-icon"></i>
              <span class="menu-title">Đơn hàng </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?= ($urlSec=='transaction') ? 'show' : '' ?>" id="ui-basic-tran">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('transaction'); ?>">Đơn hàng sản phẩm </a></li>
              </ul>
            </div>
          </li>

          
          <li class="nav-item <?= ($urlSec=='page') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= admin_url('page') ?>" aria-expanded="false">
              <i class="mdi mdi-comment-alert menu-icon"></i>
              <span class="menu-title">Trang tĩnh</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= admin_url('slide') ?>" aria-expanded="false">
              <i class="mdi mdi-image menu-icon"></i>
              <span class="menu-title">Slide</span>
            </a>
          </li> 

          <li class="nav-item <?= ($urlSec=='ads_banner') ? 'active' : '' ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-banner" aria-expanded="false" aria-controls="ui-basic-banner">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Quảng cáo</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?= ($urlSec=='ads_banner') ? 'show' : '' ?>" id="ui-basic-banner">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('ads_location'); ?>" >Vị trí quảng cáo</a></li>
                 <li class="nav-item"> <a class="nav-link" href="<?= admin_url('ads_banner'); ?>">Banner quảng cáo</a></li> 
              </ul>
            </div>
          </li>
          
          <li class="nav-item <?= ($urlSec=='site_setting') ? 'active' : '' ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-setting" aria-expanded="false" aria-controls="ui-basic-setting">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Cấu hình</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?= ($urlSec=='site_setting') ? 'show' : '' ?>" id="ui-basic-setting">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('site_setting'); ?>" >Cấu hình chung</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('site_setting/mail'); ?>">Email config</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item <?= ($urlSec=='user') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= admin_url('user') ?>" >
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Admin</span>
            </a>
          </li>


      </ul>
      
    </nav>