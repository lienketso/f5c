<section class="page-head">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?= base_url() ?>"><?= ($lang=='vn') ? 'Trang chủ' : 'Home' ?></a></li>
              <li><?= ($lang=='vn') ? 'Sản phẩm' : 'Products' ?></li>
            </ul>
            <h1><?= ($lang=='vn') ? 'Sản phẩm' : 'Products' ?></h1>  
          </div>
        </div>
      </div>
</section>

<section class="product-list">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <h2 class="title-sp-home">Sản phẩm của chúng tôi</h2>
            <div class="intro-cat">
              <p class="desc-category">VCCGROUP sản xuất và cung cấp cafe phù hợp với các nhu cầu của khách hàng. Từ cafe cho chuỗi, coffee shop độc lập, hay cafe văn phòng... với cafe dạng hạt, phin truyền thống hoặc cafe hòa tan.</p>
            </div>
          </div>
    </div>
  </div>

  <?php foreach($categoryParent as $cat): ?>
        <?php 
          $pr['where'] = ['category_id'=>$cat->id];
          $listPro = $this->product_model->get_list($pr);
        ?>
      <div class="category-item">
        <div class="container">
      
      <div class="list-all-cat">
      <div class="col-lg-12">
        <h2 class="category_title"><?= $cat->name; ?></h2>
      </div>
      <div class="col-md-12">
            <div class="row owl-carousel shop-slider">
              <?php foreach($listPro as $row): ?>
                <div class="item catname">
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
    </div>
    <?php endforeach; ?>

</section>