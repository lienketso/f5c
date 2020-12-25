    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#coffee-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav id="coffee-menu" class="navbar collapse navbar-collapse">
          
            <div class="row">
            <div class="col-lg-2 col-md-12">
                  <a href="<?= base_url() ?>" class="main-logo"><img src="<?= $arrSetting['logo_header'] ?>" alt="Logo Cafe hoàng Hà"></a>
                  <a href="<?= base_url() ?>" class="small-logo"><img src="<?= $arrSetting['logo_header'] ?>" alt="Logo Cafe hoàng Hà"></a>
            </div>
            <div class="col-lg-8 col-md-12">
              <ul class="main-menu nav">

              <?php foreach($menunew as $row): ?>
                <?php if(!empty($row['subcat'])): ?>
                <li class="parent">
                  <a href="<?= $row['href'] ?>"><?= $row['title']; ?></a>
                  <ul class="sub-menu">
                    <?php foreach($row['subcat'] as $sub): ?>
                    <li><a href="<?= $sub['href'] ?>"><?= $sub['title']; ?></a></li>
                    <?php endforeach; ?>

                  </ul>
                </li>
                <?php else: ?>
                  <li><a href="<?= $row['href'] ?>"><?= $row['title']; ?></a></li>
                <?php endif; ?>
              <?php endforeach; ?>
                
              </ul>
            </div>
            <div class="col-lg-2 col-md-12">
              <div class="top-right">
                <a href="<?= base_url('home/lang/vn') ?>" class="cart">
                  <img src="<?= public_url('site/images/') ?>vn.png">
                </a>
                <a href="<?= base_url('home/lang/en') ?>" class="cart">
                  <img src="<?= public_url('site/images/') ?>en.png">
                </a>
              
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>