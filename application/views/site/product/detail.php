<?php $this->load->view('site/blocks/block_menu'); ?>
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
      <div class="col-lg-5">
        <div class="slide-product">
          <img src="https://f5c.vn/upload/public/cf6c37637273d7f72a94869d29a428f5.JPG">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="desc-product-f5">
          <p>Giá bán: <span><?= ($info->price==0) ? 'Liên hệ' : number_format($info->price).' đ' ?> </span></p>
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
          <ul>
            <li>Hãng sản xuất : <span><?= $this->manufac_model->getManufacName($info->manufac_id) ?></span></li>
            <li>Xuất xứ : <span><?= $info->model; ?></span></li>
            <li>Bảo hành : <span><?= $info->warranty; ?> tháng</span></li>
            <li>Trạng thái : <span>Còn hàng</span></li>
            <li>VAT : <span><?= ($info->vat==0) ? 'Đã bao gồm 10% VAT' : 'Chưa bao gồm VAT' ?></span></li>
          </ul>
        </div>

        <div class="buynow-area">
          <a href="#" class="buy_now twoins">Mua ngay <span class="buy_now_subtext">Giao tận nơi</span></a>
          <a href="" class="buy_ins twoins">Thêm vào giỏ <span class="buy_now_subtext">Mua thêm sản phẩm</span></a>
        </div>

      </div>
      <div class="col-lg-3">
        <div class="support-page">
          <h3>Hỗ trợ mua hàng</h3>
          <?php foreach($GroupSupport as $row): ?>
            <?php 
                $ls['where'] = ['group_id'=>$row->id];
                $ls['order'] = ['sort_order','asc'];
                $ls['limit'] = [3,0];
                $listSP = $this->support_model->get_list($ls);
            ?>
          <div class="support-list">
            <h4><?= $row->name; ?></h4>
            <ul>
              <?php foreach($listSP as $item): ?>
              <li><a href="tel:<?= $item->phone; ?>"><img src="<?= public_url('site/img/phone.png') ?>"> <span><?= $item->phone; ?></span></a> - <a style="font-size: 11px;" href="mailto:<?= $item->gmail; ?>"><?= $item->gmail; ?></a></li>
            <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
 
        </div>
      </div>
      </div>

    </div>
  </div>
</section>