<div class="navboot">
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse js-navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <div class="line"><i></i><i></i><i></i></div>
               Danh mục <span class="caret"></span></a>        
            <ul class="dropdown-menu mega-dropdown-menu">
              <?php if($allCategory && !empty($allCategory)): ?>
                <?php foreach($allCategory as $k=>$row): ?>
              <li class="col-sm-3">
                <ul class="parem-ul" id="u<?= $row['id']; ?>">
                  <li class="dropdown-header"><a href="<?= $row['link'] ?>"><?= $row['name'] ?></a></li>
                  
                <a id="xemthem" class="xemthem" data-uid="u<?= $row['id'] ?>">Xem thêm</a>
                  

                  <?php if(!empty($row['subcat'])): ?>
                  <?php foreach($row['subcat'] as $sub):  ?>
                  <li><a href="<?= $sub['link'] ?>"><?= $sub['name']; ?></a></li>
                  <?php endforeach; ?>
                  <?php endif; ?>

                  <li class="divider"></li>

                </ul>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
          
            </ul>       
          </li>

          <li><a href="#">Store locator</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My account <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
          <li><a href="#">My cart (0) items</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </nav>
  </div>
</div>

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
      <div class="col-lg-2 col-xs-3">
        <div class="item-parent">
          <a href="<?= category_url($c->friendly_url) ?>">
            <img src="https://cdn.tgdd.vn/Category/5205/Binh,-ly-giu-nhiet-l-13-02-2020.png" alt="">
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
      <div class="col-lg-3 borderlr_<?= $k ?>">
            <div class="item-sp-cat">
              <a class="img-sp-cat" href="<?= product_url(slug($p->name),$p->id) ?>"><img src="https://f5c.vn/upload/public/6112478aa70a4a8830d5180c15e55592_thumb.png"></a>
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
<?php endif; ?>