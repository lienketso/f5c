

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
      <div class="col-lg-12" id="CompareID">

          <?php foreach($arrProduct as $k=>$p): ?>
            <div class="col-lg-4 col-xs-6 bao_border" id="com<?= $p->id; ?>">
              <div class="item-sp-com">
                <a class="img-sp-cat" href="<?= product_url(slug($p->name),$p->id) ?>"><img src="<?= url_tam($p->image_name); ?>" alt="<?= $p->name; ?>"></a>
                <?php if($k!=0): ?>
                <span class="remove_com" data-id="<?= $p->id; ?>"><img title="Xóa sản phẩm" src="<?= public_url('site/img/remove_btn.png') ?>"></span>
              <?php endif; ?>
                <h4><a href="<?= product_url(slug($p->name),$p->id) ?>"><?= $p->name; ?></a></h4>
                <p><span class="price_com"><?= ($p->price==0) ? 'Liên hệ' : number_format($p->price). '₫'; ?> </span></p>
                <div class="ts_kythuat">
                  <?php 
                    $input['where'] = ['product_id'=>$p->id];
                    $input['order'] = ['option_id','asc'];
                    $listOps = $this->product_option_model->get_list($input);
                   ?>
                   <ul class="list_ss">
                    <li><span>Bảo hành :</span> <?= $p->warranty ?> tháng</li>
                   <?php foreach($listOps as $row): ?>
                    <li><span><?= $this->product_option_model->getOption($row->option_id) ?> :</span> <?= $row->value; ?></li>
                  <?php endforeach; ?>
                  </ul>
                </div>
                <div class="btn_comp"><a class="" href="<?= base_url('cart/add/'.$p->id); ?>">Mua sản phẩm</a></div>
              </div>
            </div>
          <?php endforeach; ?>
          <?php if(count($arrProduct)<=3): ?>
           <div class="col-lg-4 col-xs-6" id="themCom">
             <div class="bao_ajax">
               <a data-toggle="modal" href="#modal-id"><img src="<?= public_url('site/img/plus.png') ?>"></a>
               <h4>Thêm sản phẩm để so sánh</h4>
             </div>
           </div>
         <?php endif; ?>
     </div>

</div>
</div>
</section>


<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Chọn sản phẩm để thêm vào so sánh</h4>
      </div>
      <div class="modal-body">
        <div class="list_more_com">
          <?php foreach($productMore as $m): ?>
          <div class="list_m">
            <a href="javascript:void" class="addmorecom" data-id="<?= $m->id ?>" data-href="<?= base_url('compare/addmore') ?>"><img src="<?= url_tam($m->image_name) ?>"></a>
            <p><?= $m->name; ?></p>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
      </div>
    </div>
  </div>
</div>

