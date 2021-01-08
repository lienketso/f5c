<?php $this->load->view('site/blocks/block_menu') ?>

<div class="breadcrum-f">
  <div class="container">
    <ul class="list-bread">
      <li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
      <?php 
      $catcha = $this->category_model->get_info($category->parent_id);
      if(!empty($catcha)):
       ?>
       <li><a href="<?= category_url($catcha->friendly_url) ?>"><?= $catcha->name; ?> <span>›</span></a></li>
     <?php endif; ?>

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
          <div class="col-lg-2 col-xs-3">
            <div class="item-parent">
              <a href="<?= category_url($c->friendly_url) ?>">
                <img src="<?= url_tam($c->image_name) ?>" alt="<?= $c->name; ?>">
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
    $conId = [];
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

            if(!empty($conId)){
              $pr['where'] = ['hide'=>'0'];
              $pr['where_in'] = ['cat_id',$conId];
            }else{
              $pr['where'] = ['hide'=>'0','cat_id'=>$c->id];
            }

            $pr['limit'] = [8,0];
            $productP = $this->product_model->get_list($pr);
            ?>
            <?php foreach($productP as $k=>$p): ?>
              <div class="col-lg-3 col-xs-6 borderlr_<?= $k ?>">
                <div class="item-sp-cat">
                  <a class="img-sp-cat" href="<?= product_url(slug($p->name),$p->id) ?>"><img src="<?= url_tam($p->image_name); ?>" alt="<?= $p->name ?>"></a>
                  <h4><a href="<?= product_url(slug($p->name),$p->id) ?>"><?= $p->name; ?></a></h4>
                  <p><span><?= ($p->price==0) ? 'Liên hệ' : number_format($p->price). '₫'; ?> </span></p>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>

      </div>
    </section>
  <?php endforeach; ?>

  <?php else: ?>

    <section class="current-cat-pro">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="result clearfix">
              <div class="orderby pull-right">
                Xếp theo
                <select class="orderby fillter_checkbox sort_order" name="sort_order">
                  <option value="7"> Giá từ thấp tới cao</option>
                  <option value="8"> Giá từ cao tới thấp</option>
                </select>
              </div>

            </div>
            <div class="row">
              <?php foreach($list as $k=>$p): ?>
                <div class="col-lg-3 col-xs-6">
                  <div class="item-sp-cat">
                    <a class="img-sp-cat-page" href="<?= product_url(slug($p->name),$p->id) ?>"><img src="<?= url_tam($p->image_name); ?>" alt="<?= $p->name; ?>"></a>
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
                    <a href="<?= manufac_url(slug($hang->name),$hang->id,$category->id) ?>"><?php if($hang->image_name!=''): ?><img src="<?= url_tam($hang->image_name); ?>"><?php else: ?>
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

<?php endif; ?>