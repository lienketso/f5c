<div class="page-section" id="page-section-content1" data-page-section-id="5">
  <div class="page-element page-element-product-application-detail" data-element-type="product-application-detail" data-page-element-id="7" data-page-content-id="3"></div>
  <div class="page-element-dynamic page-element-product-application-detail-dynamic" data-element-type="product-application-detail" data-page-element-id="7-d" data-page-content-id="3-d"><!-- Product application mantle -->
    <div class="mantle mantle--glow mantle--overlap">
      <div class="mantle__image" style="background-image: url('<?= public_url('site/images/banner-product.png') ?>');">
        <div class="mantle__image-inner"></div>
      </div>
      <div class="mantle__content">
        <div class="container">
          <div class="row">
            <div class="col-12 col-xl-10">
              <h1 class="mantle__headline"><?= ($lang=='vn') ? 'Tìm kiếm' : 'Search'; ?></h1>
              <div><div class="datatype-wysiwyg mantle_text">
                <p><?= ($lang=='vn') ? 'Kết quả tìm kiếm cho từ khóa' : 'Search results for keywords'; ?> "<strong><?= $q ?></strong>"</p>

              </div>
            </div>

          </div>
        </div>

        <nav class="mantle__breadcrumbs">
          <a href="<?= base_url() ?>"><?= ($lang=='vn') ? 'Trang chủ' : 'Home'; ?></a>
          <span><?= ($lang=='vn') ? 'Tìm kiếm' : 'Search'; ?></span>
        </nav>

      </div>
    </div>
  </div>


  <div class="container">
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