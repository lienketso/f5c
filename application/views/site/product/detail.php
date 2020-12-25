<section class="page-head" <?php if($catInfo->image_1!=''): ?> style="background: url('<?= $catInfo->image_1 ?>')" <?php endif; ?> >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?= base_url() ?>"><?= ($lang=='vn') ? 'Trang chủ' : 'Home' ?></a></li>
              <li><?= $info->name; ?></li>
            </ul>
            <h1><?= ($lang=='vn') ? 'Sản phẩm' : 'Products' ?></h1> 
          </div>
        </div>
      </div>
</section>

<section class="product-single">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="product-image"><img src="<?= $info->image; ?>" alt="<?= $info->name; ?>"></div>
        </div>
        <div class="col-md-7">
          <h3 class="name"><?= $info->name; ?></h3>
          <div class="description"><?= $info->content; ?></div>
          
          <div class="product-info">
            <h3><?= ($lang=='vn') ? 'Đặc điểm hương vị' : 'Taste characteristics' ?></h3>
            <div class="dacdiem">
            <div class="list-dd">
              <div class="title-dd"><?= ($lang=='vn') ? 'Vị đắng' : 'Bitter taste' ?> </div>
              <div class="hat-cf">
                <?php $hatden = tru(5,$info->vidang); ?>
                <?php for($i=0;$i<$info->vidang;$i++): ?>
                <span>hatdo</span>
                <?php endfor; ?>
                <?php for($i=0;$i<$hatden;$i++): ?>
                <span>hatden</span>
              <?php endfor; ?>
                <span class="chia"><?= $info->vidang ?> / 5</span>
              </div>
            </div>
            <div class="list-dd">
              <div class="title-dd"><?= ($lang=='vn') ? 'Tính axit' : 'Acidity' ?>  </div>
              <div class="hat-cf">
                <?php $hatdena = tru(5,$info->axit); ?>
                <?php for($i=0;$i<$info->axit;$i++): ?>
                <span>hatdo</span>
                <?php endfor; ?>
                <?php for($i=0;$i<$hatdena;$i++): ?>
                <span>hatden</span>
              <?php endfor; ?>
                <span class="chia"><?= $info->axit ?> / 5</span>
              </div>
            </div>
            <div class="list-dd">
              <div class="title-dd"><?= ($lang=='vn') ? 'Lưu hương' : 'Save incense' ?>  </div>
              <div class="hat-cf">
                <?php $hatdenb = tru(5,$info->luuhuong); ?>
                <?php for($i=0;$i<$info->luuhuong;$i++): ?>
                <span>hatdo</span>
                <?php endfor; ?>
                <?php for($i=0;$i<$hatdenb;$i++): ?>
                <span>hatden</span>
              <?php endfor; ?>
                <span class="chia"><?= $info->luuhuong ?> / 5</span>
              </div>
            </div>
          </div>
          </div>
        </div>
      
        <div class="col-md-12">
          <h2 class="related-title"><?= ($lang=='vn') ? 'Sản phẩm liên quan' : 'Related Products' ?></h2>
          <div class="row">
            <?php foreach($listRelate as $row): ?>
            <div class="col-md-3">
              <div class="product-item">
                <div class="img-wrap"><a href="<?= product_url($row->slug,$row->id) ?>"><img src="<?= $row->image; ?>" alt="<?= $row->name; ?>"></a></div>
                <a href="<?= product_url($row->slug,$row->id) ?>" class="name"><?= $row->name; ?></a>
                <div class="text"><?= catchuoi($row->description,100); ?></div>
                <a href="<?= product_url($row->slug,$row->id) ?>" class="btn btn-default"><?= ($lang=='vn') ? 'Xem thêm' : 'View more' ?></a>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>