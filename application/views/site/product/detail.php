
<section class="breadcrum-f5">
  <div class="container">
    <div class="w-path">
      <div class="w-path-l">
        <ul class="l">
          <li><a href="<?= base_url() ?>" rel="nofollow">Trang chủ</a></li>
          <li><i>&gt;</i></li>
          <li><a href="<?= category_url($categoryName->friendly_url) ?>" title="<?= $categoryName->name; ?>"><?= $categoryName->name; ?></a></li>
          <li><i>&gt;</i></li>
          <li><a href="#" title="<?= $info->name; ?>"><?= $info->name; ?></a></li>
        </ul>
      </div>

    </div>
  </div>
</section>

<section class="content-product-f5">
  <div class="container">
    <h1 class="title-detail-p"><?= $info->name ?></h1>
    <div class="row">
      <div class="info-pro">
        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-6">
              <div class="slide-product">
                <!-- Place somewhere in the <body> of your page -->
                  <div id="slider" class="flexslider">
                    <ul class="slides">
                      <li class="ex1">
                        <img src="<?= url_tam($info->image_name); ?>" alt="<?= $info->name; ?>" />
                      </li>
                      <?php if(!empty($listAttach)): ?>
                        <?php foreach($listAttach as $a): ?>
                      <li class="ex1">
                        <img src="<?= url_tam($a->file_name); ?>" alt="<?= $info->name; ?>" />
                      </li>
                    <?php endforeach; ?>
                  <?php endif; ?>

                      <!-- items mirrored twice, total of 12 -->
                    </ul>
                  </div>
                  <div id="carouselh" class="flexslider noborder">
                    <ul class="slides sl-thumb">
                      <li>
                        <img src="<?= url_tam($info->image_name); ?>" alt="thumbnail <?= $info->name; ?>" />
                      </li>

                      <?php if(!empty($listAttach)): ?>
                        <?php foreach($listAttach as $a): ?>
                      <li>
                        <img src="<?= url_tam($a->file_name); ?>" alt="<?= $info->name; ?>" />
                      </li>
                    <?php endforeach; ?>
                  <?php endif; ?>
                      <!-- items mirrored twice, total of 12 -->
                    </ul>
                  </div>

                </div>
              </div>
              <div class="col-lg-6">
                <div class="desc-product-f5">
                  <p>Giá bán: <span><?= ($info->price==0) ? 'Liên hệ' : number_format($info->price).' đ' ?> </span></p>
                  <?php if(!empty($info->options)): ?>
                  <div class="thongtin-them">
                    <?php 
                    $them = unserialize($info->options);
                    ?>
                    <ul>
                      <?php foreach($them as $k=>$v): ?>
                        <li><?=$k ?> : <span><?= $v ?></span></li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>

                  <ul>
                    <li>Hãng sản xuất : <span><?= $this->manufac_model->getManufacName($info->manufac_id) ?></span></li>
                    <?php if($info->model!=''): ?>
                    <li>Xuất xứ : <span><?= $info->model; ?></span></li>
                    <?php endif; ?>
                    <li>Bảo hành : <span><?= $info->warranty; ?> tháng</span></li>
                    <li>Trạng thái : <span>Còn hàng</span></li>
                    <li>VAT : <span><?= ($info->vat==0) ? 'Đã bao gồm 10% VAT' : 'Chưa bao gồm VAT' ?></span></li>
                  </ul>
                </div>

                <div class="buynow-area">
                  <a href="<?= base_url('cart/add/'.$info->id) ?>" class="buy_now">Mua ngay <span class="buy_now_subtext">Giao tận nơi, không mua không sao</span></a>
                </div>

              </div>

              <div class="col-lg-12">
                
            <div class="row">
              <div class="col-lg-12" style="padding-bottom: 20px;clear:both">
                <div class="box_sosanh" >
                <h4 class="title_sosanh">So sánh với các sản phẩm tương tự</h4>
                <div class="row-ss">
                  <?php foreach($listSosanh as $index => $row): ?>
                  
                  <div class="col-lg-3 border_ok <?= ($index+1)%4==0 ? 'border_left':'' ?>"> 
                    <div class="list_sp_tuong_tu">
                      <div class="img_tuong_tu">
                        <a href="<?= product_url(slug($row->name),$row->id) ?>" target="_blank"><img src="<?= url_tam($row->image_name); ?>"></a>                        
                      </div>

                      <div class="info_tuong_tu">
                        <!-- <div class="tooltiptext">
                        <?= $row->options_cat; ?>
                        </div> -->
                        <h3><a href="<?= product_url(slug($row->name),$row->id) ?>" target="_blank"><?= catchuoi($row->name,43); ?></a></h3>
                        <ul class="list_option">
                          <li>Hãng sản xuất : <span><?= $this->manufac_model->getManufacName($row->manufac_id) ?></span></li>
                          <li>Xuất xứ : <span><?= $row->model; ?></span></li>

                          <li>Bảo hành : <span><?= $row->warranty ?> tháng</span></li>
                        </ul>
                        <p class="price_tuong_tu"><?= ($row->price==0) ? 'Liên hệ' : number_format($row->price).' đ' ?></p>
                        <div class="nut_ss"><a class="sosanh_home" href="<?= base_url('compare/index?product='.$info->id.','.$row->id) ?>">So sánh</a></div>
                      </div>
                      
                    </div>

                  </div>
                <?php endforeach; ?>

                </div>
              </div>
              </div>

            </div>
              </div>

              <div class="col-lg-12 margin-mb">
                <div role="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                      <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin sản phẩm</a>
                    </li>
                    <li role="presentation">
                      <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Thông số kỹ thuật</a>
                    </li>
                    <li role="presentation">
                      <a href="#phukien" aria-controls="phukien" role="tab" data-toggle="tab">Phụ kiện</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                      <div class="thong-tin-sp">
                        <?= str_replace('{base_url}','https://f5c.vn/',$info->content); ?>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab">
                      <div class="thong-tin-sp">
                        <?= $info->options_cat; ?>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="phukien">
                      <div class="thong-tin-sp">
                       
                        <?php if(!empty($info->products)): ?>
                           <?php 
                              $phukien = unserialize($info->products);
                            ?>
                        <div class="phukien_dikem">
                          <div class="col-lg-12">
                            <div class="alert_add">Đã thêm phụ kiện vào giỏ hàng !</div>
                          </div>
                          <?php foreach($phukien as $val): ?>
                            <?php 
                              $prophukien = $this->product_model->get_info($val);
                            ?>
                          <div class="col-lg-3">
                            <div class="list_dikem">
                              <div class="img_dikem">
                                <a href="<?= product_url(slug($prophukien->name),$prophukien->id) ?>"><img src="<?= url_tam($prophukien->image_name) ?>" alt="<?= $prophukien->name; ?>"></a>
                              </div>
                              <div class="intro_dikem">
                                <h4><a href="<?= product_url(slug($prophukien->name),$prophukien->id) ?>"><?= $prophukien->name; ?></a></h4>
                                <button type="button" data-id="<?= $prophukien->id ?>" data-url="<?= base_url('cart/addpk') ?>" class="addpk">Thêm phụ kiện</button>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>

                        </div>
                        <?php else: ?>
                           <p>Chưa có phụ kiện...</p>
                      <?php endif; ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>


          </div>

          <div class="col-lg-3">
            <div class="support-page">
              <h3>Hỗ trợ mua hàng</h3>
              <?php foreach($GroupSupport as $row): ?>
                <?php 
                $ls['where'] = ['group_id'=>$row->id];
                $ls['order'] = ['sort_order','asc'];
                $ls['limit'] = [1,0];
                $listSP = $this->support_model->get_list($ls);
                ?>
                <div class="support-list">
                  <h4><?= $row->name; ?></h4>
                  <ul>
                    <?php foreach($listSP as $item): ?>
                      <li><a href="tel:<?= $item->phone; ?>">
                        <img src="<?= public_url('site/img/phone.png') ?>"> <span><?= $item->phone; ?></span></a> - <a style="font-size: 11px;" href="mailto:info@f5pro.vn">info@f5pro.vn</a>
                        <div class="chat_support">
                          <a target="_blank" href="https://zalo.me/<?= trim($item->yahoo) ?>" title="Click để chat với zalo"><img src="<?= public_url('site/img/logo-zalo.jpg') ?>"></a>
                          <a href="http://m.me/<?= $item->skype; ?>" target="_blank" title="Click để chat với messenger"><img src="<?= public_url('site/img/fbicon.png') ?>"></a>
                        </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endforeach; ?>

            </div>

            <div class="sidebar-pro">
              <div class="widget-cunghang">
                <h4>Sản phẩm cùng hãng</h4>
                <?php foreach($listCH as $row): ?>
                  <div class="list-cunghang">
                    <div class="img-cunghang">
                      <a href="<?= product_url(slug($row->name),$row->id) ?>"><img src="<?= url_tam($row->image_name); ?>" align="<?= $row->name; ?>"></a>
                    </div>
                    <div class="info-cunghang">
                      <p class="title-cunghang"><a href="<?= product_url(slug($row->name),$row->id) ?>"><?= $row->name; ?></a></p>
                      <p class="price-cunghang"><?= ($row->price==0) ? 'Liên hệ' : number_format($row->price).' đ' ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>


              </div>
            </div>

          </div>

        </div>

      </div>
    </div>
  </section>
