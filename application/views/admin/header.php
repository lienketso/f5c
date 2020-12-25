 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          <li class="nav-item nav-search d-none d-lg-flex">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="" href="#" ><img src="<?= public_url();?>/admin/images/logo7.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="<?= public_url();?>/admin/images/logo-mini.svg" alt="logo"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item" href="<?= admin_url('contact') ?>">
                <p class="mb-0 font-weight-normal float-left">Bạn có <span style="color:red; font-weight: bold;"><?= $total_contact; ?></span> liên hệ chưa xem
                </p>
                <span class="badge badge-pill badge-warning float-right">Xem tất cả</span>
              </a>
              <div class="dropdown-divider"></div>
              <?php foreach($listContact as $c): ?>
              <a class="dropdown-item preview-item" href="<?= admin_url('contact/view/'.$c->id); ?>">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium"><?= $c->title; ?></h6>
                  <p class="font-weight-light small-text mb-0">
                    <?= showdate_vn($c->created_at); ?>
                  </p>
                </div>
              </a>
            <?php endforeach; ?>
            </div>
          </li>
          <li class="nav-item nav-lang dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="langDropdown">
              <span class="nav-lang-name"> <?= ($lang=='vn') ? 'Tiếng Việt' : 'English'; ?> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="langDropdown">
              <a href="<?= admin_url('home/lang/vn'); ?>" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Tiếng việt
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo admin_url('home/lang/en'); ?>" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                English
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?= public_url();?>/admin/images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name"><?php echo $accoutname->name; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="<?= admin_url('user/edit/'.$accoutname->id); ?>" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Sửa thông tin
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo admin_url('home/logout') ?>" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Thoát 
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="mdi mdi-dots-horizontal"></i>
            </a>
          </li>
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>