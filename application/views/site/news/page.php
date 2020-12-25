<section class="page-head">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?= base_url() ?>"><?= ($lang=='vn') ? 'Trang chủ' : 'Home'; ?></a></li>
              <li><?= ($lang=='vn') ? 'Về VCCGROUP' : 'About VCCGROUP'; ?></li>
            </ul>
            <h1><?= ($lang=='vn') ? 'Về VCCGROUP' : 'About VCCGROUP'; ?></h1>  
          </div>
        </div>
      </div>
    </section>

<section class="about-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2><?= $arrSetting['gioithieu_bg_2_'.$lang] ?></h2>
          <p class="desc-ty"><?= $arrSetting['gioithieu_content_'.$lang] ?></p>
        </div>
        <?php foreach($pageHome  as $row): ?>
        <div class="col-md-4">
          <div class="item">
            <div class="img-wrap"><img src="<?= $row->image; ?>" width="170" alt="<?= $row->title; ?>"></div>
            <div class="name"><?= $row->title; ?></div>
            <p class="text"><?= catchuoi($row->description,150); ?> </p>
            <a href="<?= news_url('',$row->slug,$row->id) ?>" class="btn btn-default"><?= ($lang=='vn') ? 'Xem thêm' : 'Read more'; ?></a>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="reasons parallax" style="background-image: url(<?= public_url('site/images/parallax.jpg') ?>); background-position: 50% 51px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2><?= $arrSetting['hoivien_title_'.$lang] ?></h2>
        </div>
        <div class="col-md-4">
          <div class="item">
            <div class="count"><?= $arrSetting['box_1_num'] ?></div>
            <div class="title"><?= $arrSetting['box_1_title_'.$lang] ?></div>
            <p class="text"><?= $arrSetting['box_1_intro_'.$lang] ?> </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item">
            <div class="count"><?= $arrSetting['box_2_num'] ?></div>
            <div class="title"><?= $arrSetting['box_2_title_'.$lang] ?></div>
            <p class="text"><?= $arrSetting['box_2_intro_'.$lang] ?> </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item">
            <div class="count"><?= $arrSetting['box_3_num'] ?></div>
            <div class="title"><?= $arrSetting['box_3_title_'.$lang] ?></div>
            <p class="text"><?= $arrSetting['box_3_intro_'.$lang] ?>  </p>
          </div>
        </div>

      </div>
    </div>
  </section>


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

  <?php $this->load->view('site/blocks/block_contact') ?>