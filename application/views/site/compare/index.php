

<div class="breadcrum-f">
  <div class="container">
    <ul class="list-bread">
      <li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
      <li><span> So sánh sản phẩm</span></li>
    </ul>
  </div>
</div>

<section class="current-cat-pro">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="txt_ketqua">

        </div>
        <div class="row">
          <?php foreach($arrProduct as $k=>$p): ?>
            <div class="col-lg-6 col-xs-6">
              <div class="item-sp-com">
                <a class="img-sp-cat" href="<?= product_url(slug($p->name),$p->id) ?>"><img src="<?= url_tam($p->image_name); ?>" alt="<?= $p->name; ?>"></a>
                <h4><a href="<?= product_url(slug($p->name),$p->id) ?>"><?= $p->name; ?></a></h4>
                <p><span><?= ($p->price==0) ? 'Liên hệ' : number_format($p->price). '₫'; ?> </span></p>
                <div class="ts_kythuat">
                	<?= $p->options_cat; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
       </div>
     </div>

</div>
</div>
</section>

