<?php $this->load->view('site/blocks/block_menu') ?>

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
    <div class="row">
      <div class="col-lg-9">
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
          <div class="pagination-bx clearfix col-md-12 text-center">
           <?= $this->pagination->create_links(); ?>
         </div>
       </div>
     </div>
     <div class="col-lg-3">

      <div class="box-sidebar">
       <div class="panel sp-xem-nhieu">
        <div class="panel-heading">
          Sản phẩm nhiều lượt xem
        </div>
        <ul class="list-group">
          <?php foreach($listXN as $row): ?>
          <li class="list-group-item">
            <div class="item-product">
              <div class="product-img">
                <a href="<?= product_url(slug($row->name),$row->id) ?>" title="<?= $row->name; ?>">
                 <img src="<?= url_tam($row->image_name); ?>" alt="<?= $row->name; ?>">
               </a>
             </div>
             <div class="caption">
              <a class="name-product" href="<?= product_url(slug($row->name),$row->id) ?>" title="<?= $row->name; ?>"><?= $row->name; ?></a>
              <div class="price">
                <span class="amount"><?= ($row->price==0) ? 'Liên hệ' : number_format($row->price).'đ'; ?> </span>
              </div>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
</ul>
</div>

</div>

</div>
</div>
</div>
</section>

