    <div class="top-footer">
      <div class="container">
        <div class="row">

          <div class="col-md-4 col-sm-6">
            <div class="footer-about">
              <div class="title-foot"><?= ($lang=='vn') ? 'Cafe Việt Nam' : 'Viet Nam Coffee'; ?></div>
              <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $arrSetting['site_address_'.$lang] ?> </p>
              <p><i class="fa fa-phone" aria-hidden="true"></i> <?= $arrSetting['site_hotline_vn']; ?> </p>
              <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <?= $arrSetting['site_email_vn']; ?> </p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="title-foot"><?= ($lang=='vn') ? 'Về VCCGROUP' : 'About VCCGROUP'; ?></div>
            <ul class="footer-contacts">
              <?php foreach($pageAbout as $row): ?>
            <li><a href="<?= news_url('',$row->slug,$row->id); ?>"><?= $row->title; ?></a></li>
          <?php endforeach; ?>

            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footer-social">
              <div class="title-foot"><?= ($lang=='vn') ? 'Sản phẩm' : 'Products'; ?></div>
             <ul class="footer-contacts">
              <?php foreach($listCatHot as $row): ?>
              <li><a href="<?= category_url($row->slug); ?>"><?= $row->name; ?></a></li>
            <?php endforeach; ?>
            </ul> 
            </div>
          </div>
          <div class="col-md-2 col-sm-6">
            <div class="footer-social">
              <div class="title-foot"><?= ($lang=='vn') ? 'Kết nối' : 'Follow Us'; ?></div>
              <ul class="social">
                <li><a href="<?= $arrSetting['site_fanpage']; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="<?= $arrSetting['site_twitter'] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                
              </ul> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="copyrights"><a href="<?= base_url() ?>">VCCGROUP</a> 2020 &copy; All Rights reserved <a href="http://lienketso.vn">Design by Liên Kết Số</a></div>
          </div>
        </div>
      </div>
    </div>