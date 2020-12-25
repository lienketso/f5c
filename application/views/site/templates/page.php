
<div class="single-wrapper pd50">
    <div class="container">
        <div class="single-breadcrumb">
            <ul>
                <li><a href="<?= base_url(); ?>"><?= $arrSetting['key_home_'.$lang] ?> /</a></li>
                <li><span> Hội viên</span></li>
            </ul>
        </div>
        <div class="bread-hv">
            <h3><?= $arrSetting['key_memberchinh_'.$lang] ?></h3>
            <p>Các tập đoàn, tổng công ty, doanh nghiệp lớn của Việt Nam và các doanh nghiệp nước ngoài, doanh nghiệp đa quốc gia</p>
        </div>
        <div class="row">
            <div class="danhsach-hoivien">
                <?php if(!empty($hoivienCT)): ?>
                    <?php $mang = [0,5,10,15,20,25,30,35,40]; ?>
                    <?php foreach($hoivienCT as $key=>$row): ?>
                        <div class="col-lg-2 col-xs-6 <?= in_array($key, $mang) ? '' : 'col-half-offset'; ?> " id="h1">
                          <div class="list-hv-item">
                            <div class="img-hv">
                              <a href="<?= $row->link ?>" target="_blank"><img src="<?= $row->image; ?>" class="img-full"></a>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          <?php endif; ?>

      </div>
  </div>

  <div class="bread-hv">
    <h3><?= $arrSetting['key_memberlk_'.$lang] ?></h3>
    <p>Bao gồm các hiệp hội doanh nghiệp, viện nghiên cứu, tổ chức phi chính phủ trong nước và quốc tế tại Việt Nam</p>
</div>

 <div class="row">
            <div class="danhsach-hoivien">
                <?php if(!empty($hoivienLK)): ?>
                    <?php $mangs = [0,5,10,15,20,25,30,35,40]; ?>
                    <?php foreach($hoivienLK as $key=>$row): ?>
                        <div class="col-lg-2 col-xs-6 <?= in_array($key, $mangs) ? '' : 'col-half-offset'; ?> " id="h1">
                          <div class="list-hv-item">
                            <div class="img-hv">
                              <a href="<?= $row->link ?>" target="_blank"><img src="<?= $row->image; ?>" class="img-full"></a>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          <?php endif; ?>

      </div>
  </div>

</div>
</div>
