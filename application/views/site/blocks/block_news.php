<section class="blog-last pdb50">
  <div class="container">
     <h2 class="title-home">Liên hệ</h2>
      <span class="line-title"></span>
    <div class="row">
      <div class="col-lg-6">
     <div class="list-contact-home">
        <div class="ds-con">
          <i class="glyphicon glyphicon-earphone"></i>
          <h4>Hotline</h4>
          <p><?= $arrSetting['site_hotline_'.$lang] ?></p>
        </div>
        <div class="ds-con">
          <i class="glyphicon glyphicon-envelope"></i>
          <h4>Email</h4>
          <p><?= $arrSetting['site_email_'.$lang] ?></p>
        </div>
        <div class="ds-con">
          <i class="glyphicon glyphicon-map-marker"></i>
          <h4>Địa chỉ</h4>
          <p><?= $arrSetting['site_address_'.$lang] ?></p>
        </div>
     </div>
      </div>

      <div class="col-lg-6">
        <div class="banner-contact-home">
          <a href="#"><img src="<?= public_url('site/images/thong-tin-sx.jpg'); ?>"></a>
        </div>
      </div>

    </div>
  </div>
</section>