  <!-- MAIN SLIDER -->
  <?php $this->load->view('site/blocks/slide'); ?>

  <!-- MAIN SLIDER END -->
  <!-- MAIN TOP PRODUCT -->
  <section class="top-prod-wrap">
    <div class="top-prod-types">
      <div class="container">
        <div class="row no-gutter">
          <?php foreach($pageHome as $key=>$row): ?>
            <?php 
            if($key==0){
              $bg = 'first';
            }else if($key==1){
              $bg = 'second';
            }
            else if($key==2){
              $bg = 'third';
            }
            ?>
            <div class="col-md-4">
              <div class="item <?php echo $bg; ?>">
                <a href="<?= news_url('',$row->slug,$row->id) ?>"><img src="<?= $row->image; ?>" width="150" height="150" alt="<?= $row->title; ?>"></a>
                <div class="name dark"><span><?= $row->title; ?></span></div>
                <div class="intro-page"><?= catchuoi($row->description,120); ?></div>
              </div>
            </div>
          <?php endforeach; ?>


        </div>
      </div>
    </div>
  </section>
  <!-- MAIN TOP PRODUCT END -->
  
  <!-- MAIN ABOUT -->

  <section class="about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="about-text">
            <h2><?= $arrSetting['gioithieu_title_1_'.$lang]; ?></h2>
            <p><?= $arrSetting['about_file_'.$lang]; ?> </p>
            
            <ul>
              <?php foreach($pageAbout as $row): ?>
              <li>
                <div class="icon"><a href="<?= news_url('',$row->slug,$row->id) ?>"><img alt="<?= $row->title; ?>" src="<?= $row->image; ?>" style="height:50px; width:50px" /></a></div>
                <div class="text">
                  <div class="title-ab"><a href="<?= news_url('',$row->slug,$row->id) ?>"><strong><?= $row->title; ?></strong></a></div>
                  <p><?= catchuoi($row->description,200); ?></p>
                </div>
              </li>
            <?php endforeach; ?>

            </ul>

            </div>
          </div>
          <div class="col-md-6">
            <div class="about-img"><img src="<?= $arrSetting['banner_bg_vn'] ?>" alt="Về VCC Group"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- MAIN ABOUT END -->


    <!-- MAIN SHOP -->
    <section class="popular-item">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title-sp-home"><?= ($lang=='vn') ? 'Sản phẩm' : 'Products'; ?></h2>
            <div class="intro-cat">
              <p class="desc-category">VCCGROUP sản xuất và cung cấp cafe phù hợp với các nhu cầu của khách hàng. Từ cafe cho chuỗi, coffee shop độc lập, hay cafe văn phòng... với cafe dạng hạt, phin truyền thống hoặc cafe hòa tan.</p>
            </div>
          </div>

          <div class="col-md-12">
            <div class="row owl-carousel shop-slider">
              <?php foreach($listProductSlider as $row): ?>
                <div class="item">
                  <div class="img-wrap"><a href="<?= product_url($row->slug,$row->id); ?>"><img src="<?= $row->image ?>" alt="<?= $row->name; ?>"></a></div>
                  <a href="<?= product_url($row->slug,$row->id); ?>" class="name"><?= $row->name; ?></a>
                  <div class="text"><?= catchuoi($row->description,80); ?></div>
                  <a href="<?= product_url($row->slug,$row->id); ?>" class="btn btn-default"> Xem thêm</a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- MAIN SHOP END -->

    <!-- MAIN BLOG -->
    <section class="main-blog">
      <div class="container">
        <div class="row">
          <div class="col-md-12"><h2 class="title-sp-home"><?= ($lang=='vn') ? 'Tin tức mới' : 'Latest news'; ?></h2></div>
          <?php foreach($newsHome as $row): ?>
            <div class="col-md-3">
              <div class="main-blog-item">
                <div class="img-wrap"><a href="<?= news_url('',$row->slug,$row->id); ?>"><img class="img-responsive" src="<?= $row->image; ?>" alt="<?= $row->title; ?>"></a></div>
                <div class="info">
                  <a href="<?= news_url('',$row->slug,$row->id); ?>" class="name"><?= $row->title; ?></a>
                  <p class="text"><?= catchuoi($row->description,100); ?> </p>
                </div>

              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </section>
    <!-- MAIN BLOG END -->

    <!-- SUBSCRIBE FORM -->

  <?php $this->load->view('site/blocks/block_contact') ?>

  <!-- SUBSCRIBE FORM END -->