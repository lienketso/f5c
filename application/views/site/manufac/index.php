

<div class="breadcrum-f">
  <div class="container">
    <ul class="list-bread">
      <li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
      <li><span> <?= $InfoCat->name; ?></span></li>
      <li><span> Hãng sản xuất : <strong style="color: red"><?= $infoFac->name; ?></span></strong></li>
    </ul>
  </div>
</div>

    <section class="current-cat-pro">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="row">
              <?php foreach($list as $k=>$p): ?>
                <div class="col-lg-3 col-xs-6">
                  <div class="item-sp-cat">
                    <a class="img-sp-cat-page" href="<?= product_url(slug($p->name),$p->id) ?>">
                      <img src="<?= url_tam($p->image_name) ?>" alt="<?= $p->name; ?>"></a>
                    <h4><a href="<?= product_url(slug($p->name),$p->id) ?>"><?= $p->name; ?></a></h4>
                    <p><span><?= ($p->price==0) ? 'Liên hệ' : number_format($p->price). '₫'; ?> </span></p>
                  </div>
                </div>
              <?php endforeach; ?>
              <div class="pagination-bx clearfix col-md-12 text-center">
             <?= $this->pagination->create_links(); ?>
          </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="filter-right">
              <div class="filter-fac">
                <h3 class="title-filter">Hãng sản xuất</h3>
                <div class="list-fac">
                  <?php if(!empty($listHang)): ?>
                    <?php foreach($listHang as $hang): ?>               
                  <a <?= ($infoFac->id==$hang->id) ? 'class="chinhno"' : ''; ?> href="<?= manufac_url(slug($hang->name),$hang->id,$InfoCat->id) ?>"><?php if($hang->image_name!=''): ?><img src="<?= url_tam($hang->image_name); ?>" alt="<?= $hang->name ?>"><?php else: ?>
                  <?= $hang->name; ?><?php endif; ?>
                </a>
                <?php endforeach; ?>
              <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>