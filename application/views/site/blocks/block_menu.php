<div class="navboot no-mobile">
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse js-navbar-collapse">
        <ul class="nav navbar-nav">
   
         <!--  <li><a href="<?= base_url() ?>thong-tin/ve-cong-ty-f5/i5.html">Giới thiệu về doanh nghiệp</a></li>
          <li><a href="<?= base_url() ?>bai-viet-huong-dan-mua-hang/cn4.html">Hướng dẫn mua hàng</a></li> -->

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if(empty($userLogin)): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tài khoản <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?= base_url('user/register.html') ?>">Đăng ký</a></li>
              <li><a href="<?= base_url('user/login.html') ?>">Đăng nhập</a></li>
            </ul>
          </li>
          <?php else: ?>
            <li><a href="<?= base_url('user/index') ?>"><i class="fa fa-user"></i> <?= $userLogin->name; ?></a></li>
            <li><a href="<?= base_url('user/logout') ?>"><i class="fa fa-user"></i> Đăng xuất</a></li>
          <?php endif; ?>

         <!--  <li><a href="<?= base_url('gio-hang.html') ?>"><i class="fa fa-shopping-cart"></i> Giỏ hàng (<span id="countCart"><?= $cart_items; ?></span>) </a></li> -->
        </ul>
      </div><!-- /.nav-collapse -->
    </nav>
  </div>
</div>