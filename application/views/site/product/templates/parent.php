<div class="page-section" id="page-section-content1" data-page-section-id="5">
  <div class="page-element page-element-product-application-detail" data-element-type="product-application-detail" data-page-element-id="7" data-page-content-id="3"></div>
  <div class="page-element-dynamic page-element-product-application-detail-dynamic" data-element-type="product-application-detail" data-page-element-id="7-d" data-page-content-id="3-d"><!-- Product application mantle -->
    <div class="mantle mantle--glow mantle--overlap">
      <div class="mantle__image" style="background-image: url('<?= ($category->image_1!='') ? $category->image_1 : public_url('site/images/banner-product.png') ?>');">
        <div class="mantle__image-inner"></div>
      </div>
      <div class="mantle__content">
        <div class="container">
          <div class="row">
            <div class="col-12 col-xl-10">
              <h1 class="mantle__headline"><?= $category->name; ?></h1>
              <div><div class="datatype-wysiwyg mantle_text">
                <p><?= $category->description; ?></p>

              </div>
            </div>

          </div>
        </div>

        <nav class="mantle__breadcrumbs">
          <a href="#"><?= ($lang=='vn') ? 'Sản phẩm' : 'Product'; ?></a>
          <span><?= $category->name; ?></span>
        </nav>

      </div>
    </div>
  </div>
  <?php 
  $ch['where'] = ['parent'=>$category->id];
  $ch['order'] = ['is_order','asc'];
  $child = $this->category_model->get_list($ch);
  ?>
  <!-- Product application sub-lines -->
  <div class="cards-wrap">
    <div class="container">
      <div class="cards">
        <div class="row justify-content-center justify-content-xl-between">
          <?php foreach($child as $c): ?>
            <!-- Product line 'card' -->
            <div class="card">
              <div class="card__image" style="background-image: url('<?= $c->image; ?>');"></div>
              <div class="card__content">
                <div>
                  <div class="card__heading"><?= $c->name; ?></div>
                  <div class="js-clamp ddd-truncated" data-lines="5" style="overflow-wrap: break-word;"><div class="datatype-wysiwyg teaser_text"><p><?= catchuoi($c->description,200) ?> </p></div></div>
                </div>
                <a href="<?= category_url($c->slug); ?>" class="text-link"><span><?= ($lang=='vn') ? 'Xem sản phẩm' : 'View more'; ?></span></a>
              </div>
            </div>
            <!-- Product line 'card' -->
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>


  <!-- Product application products -->
  <div class="container">
    <div class="row js-slick-cards">
    </div>
    <div class="product-card__nav js-slick-cards__nav"></div>
  </div>

  <!-- Can't find what you're looking for? -->
  <div class="cantuvan d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-10 col-xl-12 mx-auto">
          <h2 class="ask-an-expert-cta__headline"><?= ($lang=='vn') ? 'Bạn cần chúng tôi tư vấn' : 'You need our support'; ?></h2>
          <a href="tel:<?= $arrSetting['site_hotline_'.$lang] ?>" class="button button--orange js-modal__open"><span><?= $arrSetting['site_hotline_'.$lang] ?></span></a>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <h2 class="section-header-lq"><?= ($lang=='vn') ? 'Sản phẩm liên quan' : 'Same product'; ?></h2>
    <div class="row js-slick-cards">
      <?php foreach($list as $row): ?>
        <div class="col-12 col-lg-3">
          <div class="product-card-wrap">
            <a class="product-card" href="<?= product_url($row->slug,$row->id); ?>">
              <div class="product-card__image" style="background-image: url('<?= $row->image ?>')"></div>
              <div class="product-card__header">
                <div class="product-card__number"><?= $row->name; ?></div>
                <div class="product-card__name js-clamp" data-lines="3" style="overflow-wrap: break-word;"><?= catchuoi($row->description,100); ?></div>
              </div>
              <div class="product-card__more">
                <div class="product-card__description js-clamp" style="overflow-wrap: break-word;"><div class="datatype-wysiwyg product_card_description"><p><?= $row->description; ?></p></div></div>
                <div class="text-link"><span><?= ($lang=='vn') ? 'Xem thêm' : 'View more'; ?></span></div>
              </div>
            </a>

          </div>
        </div>
      <?php endforeach; ?>


    </div>
    <nav aria-label="..." class="pt-5 phantrang">
     <?php echo $this->pagination->create_links(); ?>
   </nav>
   <div class="product-card__nav js-slick-cards__nav"></div>

 </div>


 <!-- Related Products -->

 <!-- Learning Center -->

</div>
</div>