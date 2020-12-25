    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      
      <ul class="nav">
        <?php if($accoutname->id==6 || $accoutname->type=='admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/home') ?>">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Trang chính</span>
            </a>
          </li>
          <li class="nav-item <?= ($urlSec=='menu') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo admin_url('menu'); ?>">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Menu</span>
            </a>
          </li>
          <li class="nav-item <?= ($type=='news') ? 'active' : '' ?>">
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

          
          <li class="nav-item <?= ($urlSec=='page') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= admin_url('page') ?>" aria-expanded="false">
              <i class="mdi mdi-comment-alert menu-icon"></i>
              <span class="menu-title">Trang tĩnh</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= admin_url('gallery_group') ?>" aria-expanded="false">
              <i class="mdi mdi-image menu-icon"></i>
              <span class="menu-title">Thư viện ảnh</span>
            </a>
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
                 <li class="nav-item"> <a class="nav-link" href="<?= admin_url('site_setting/home'); ?>">Giới thiệu trang chủ</a></li> 
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
        <?php endif; ?>

        <?php if($accoutname->type=='blog'): ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-post" aria-expanded="false" aria-controls="ui-basic-post">
              <i class="ti-rss menu-icon"></i>
              <span class="menu-title">Bài viết</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-post">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('news?type=news'); ?>" >Danh sách bài viết</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('news/add?type=news'); ?>">Thêm mới</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= admin_url('catnews?cat_type=news'); ?>">Danh mục</a></li>
              </ul>
            </div>
          </li>
        <?php endif; ?>
        <?php if($accoutname->type=='product'): ?>
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
              </ul>
            </div>
          </li>
        <?php endif; ?>

      </ul>
      
    </nav>