
<div class="content">

  <div class="info_in">   
    <div class="maxwidth">
      <div class="title_dt"><h4><?= $category->name; ?></h4></div>    
     <div class="row_15">

      <?php if(!empty($list)): ?>
        <?php foreach($list as $row): ?>
      <div class="box_duan">
        <div class="duan_in">
          <div class="img_duan img_hidden">
            <a href="<?= news_url($row->slug,$row->id) ?>">
              <img class="" src="<?= ($row->image!='') ? $row->image : public_url('site/lib/images/no-image.jpg'); ?>" alt="<?= $row->title; ?>"> 
            </a>
          </div>
          <div class="ds_duan">
            <a href="<?= news_url($row->slug,$row->id) ?>"><h3><?= $row->title; ?></h3></a>
            <p><?= sub($row->description,80); ?></p>
            <p class="ad_da"><?php echo $this->postmeta_model->getSeometa('meta_address',$row->id); ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php else: ?>
      <div class="no-item">
        <img src="<?= public_url('site/lib/images/no-item.png') ?>" class="img-reponsive">
      </div>
  <?php endif; ?>

      <div class="clear"></div>
     <div align="center">
      <div class="paging">
         <?= $this->pagination->create_links(); ?>
      </div>
      </div>
    </div>
  </div>
  <div class="clear"></div> 
</div> 
</div>