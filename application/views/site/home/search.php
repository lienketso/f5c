

<div class="breadcrum-f">
  <div class="container">
    <ul class="list-bread">
      <li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
      <li><span> Kết quả tìm kiếm</span></li>
    </ul>
  </div>
</div>

<section class="current-cat-pro">
  <div class="container">

      
        <div class="txt_ketqua">
          Kết quả tìm kiếm với từ khóa '<span><?= $text_search; ?></span>' ( <span><?= $numrows; ?></span> sản phẩm )
        </div>
        <div class="row">
          <?php foreach($list as $k=>$p): ?>
            <div class="col-lg-3 col-xs-6">
              <div class="item-sp-cat">
                <a class="img-sp-cat" href="<?= product_url(slug($p->name),$p->id) ?>"><img src="<?= url_tam($p->image_name); ?>" alt="<?= $p->name; ?>"></a>
                <h4><a href="<?= product_url(slug($p->name),$p->id) ?>"><?= $p->name; ?></a></h4>
                <p><span><?= ($p->price==0) ? 'Liên hệ' : number_format($p->price). '₫'; ?> </span></p>
              </div>
            </div>
          <?php endforeach; ?>
         
       </div>
       <div class="pagination-bx clearfix col-md-12 text-center">
           <?= $this->pagination->create_links(); ?>
         </div>
</div>
</section>

