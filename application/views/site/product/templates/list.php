<section class="page-head" <?php if($category->image_1!=''): ?> style="background-image: url('<?= $category->image_1 ?>') " <?php endif; ?> >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?= base_url() ?>"><?= ($lang=='vn') ? 'Trang chủ' : 'Home' ?></a></li>
              <li><?= $category->name; ?></li>
            </ul>
            <h1><?= $category->name; ?></h1> 
          </div>
        </div>
      </div>
    </section>
    <div class="shop-wrap">
    <div class="container">
      <div class="row">
            
            <?php foreach($list as $row): ?>
          
              <div class="col-md-4">
                <div class="product-item">
                  <div class="img-wrap"><a href="<?= product_url($row->slug,$row->id) ?>"><img src="<?= $row->image ?>" alt="<?= $row->name; ?>"></a></div>
                  <a href="<?= product_url($row->slug,$row->id) ?>" class="name"><?= $row->name; ?></a>
                  <div class="text"><?= catchuoi($row->description,100); ?></div>
                  <a href="<?= product_url($row->slug,$row->id) ?>" class="btn btn-default">Xem thêm</a>
                </div>
              </div>
            <?php endforeach; ?>
              <div class="col-md-12">
                <div class="paging-navigation">
                    <hr>
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div>
        
          </div>
        </div>
      </div>
    </div>
  </div>