<div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <ul class="top-bar-contacts">
            <li><i class="fa fa-phone" aria-hidden="true"></i> <?= $arrSetting['site_hotline_vn'] ?></li>
            <li class="mail"><i class="fa fa-envelope-o" aria-hidden="true"></i><?= $arrSetting['site_email_vn'] ?></li>
            <li class="skype"><i class="fa fa-map-marker" aria-hidden="true"></i><?= $arrSetting['site_address_'.$lang] ?></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 top-social-wrap">
          <ul class="top-social">
            <li><a href="<?= $arrSetting['site_fanpage']; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="<?= $arrSetting['site_twitter'] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="header-wrap">
    <header class="top-nav inner-page affix-top" data-spy="affix" data-offset-top="34">
      <div class="container">
        <div class="row position-relative">
          <div class="col-lg-2 col-md-2">
            <a href="<?= base_url(); ?>" class="small-logo alt"><img src="<?= $arrSetting['logo_header'] ?>" alt="Logo hoàng hà coffee"></a>  
          </div>
          <div class="col-lg-10 col-md-10">
            <nav class="navbar collapse navbar-collapse" id="coffee-menu">
              <div class="col-lg-10 col-md-10">
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
          
            </nav>
          </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#coffee-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
      </div>
    </header>
  </div>