

<div class="breadcrum-f">
  <div class="container">
    <ul class="list-bread">
      <li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
      <li><span> <?= $category->name; ?></span></li>
    </ul>
  </div>
</div>

<section class="list-parent">
  <div class="container">
    <div class="row">
      <?php 
          $input['where']= ['parent_id'=>$category->id];
          $input['order'] = ['sort_order','asc'];
          $listChild = $this->category_model->get_list($input);
      ?>
      <?php if(!empty($listChild)): ?>
        <?php foreach($listChild as $c): ?>
      <div class="col-lg-2 col-xs-4">
        <div class="item-parent">
          <a href="<?= category_url($c->friendly_url) ?>">
            <img src="<?= ($c->image_name!=NULL || !empty($c->image_name)) ? url_tam($c->image_name) : public_url('site/images/no_image.png')  ?>" alt="<?= $c->name; ?>">
            <h3><?= $c->name; ?></h3>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
    </div>
  </div>
</section>

 <?php if(!empty($listChild)): ?>
<?php foreach($listChild as $c): ?>
  <?php 
      $cba['where'] = ['parent_id'=>$c->id];
      $cba['order'] = ['sort_order','asc'];
      $cba['limit'] = [5,0];
      $listCapba = $this->category_model->get_list($cba);
      $conId = [$c->id];
  ?>
<section class="cat-page-list">
  <div class="container">
    <div class="pls-menu">
        <p class="pls-menu-head">
            <a href="<?= category_url($c->friendly_url) ?>" title="<?= $c->name ?>"><?= $c->name ?></a>
        </p>
        <?php if(!empty($listCapba)): ?>
        <ul class="lon">
          <?php foreach($listCapba as $cc): ?>
            <?php
            array_push($conId,$cc->id);
            ?>
          <li><a href="<?= category_url($cc->friendly_url) ?>"><?= $cc->name; ?></a></li>
        <?php endforeach; ?>
        </ul>
      <?php endif; ?>

    </div>

    <div class="list-product-page">
      <div class="rowss">
      <?php 
          

          $pr['where'] = ['hide'=>'0','tieubieu'=>1];
          $pr['where_in'] = ['cat_id',$conId];
          
          $pr['limit'] = [8,0];
          $productP = $this->product_model->get_list($pr);
      ?>
      <?php foreach($productP as $k=>$p): ?>
      <div class="col-lg-3 col-xs-6 borderlr_<?= $k ?>">
            <div class="item-sp-cat">
              <a class="img-sp-cat" href="<?= product_url(slug($p->name),$p->id) ?>"><img src="<?= url_tam($p->image_name) ?>"></a>
              <h4><a href="<?= product_url(slug($p->name),$p->id) ?>"><?= catchuoi($p->name,60); ?></a></h4>
              <p><span><?= ($p->price==0) ? 'Liên hệ' : number_format($p->price). '₫'; ?> </span></p>
            </div>
      </div>
    <?php endforeach; ?>

    </div>
  </div>

  </div>
</section>
<?php endforeach; ?>
<?php endif; ?>