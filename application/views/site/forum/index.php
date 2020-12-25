<section class="slider-king">
  <div id="carousel-id" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php foreach($forumSlider as $key=>$val): ?>
        <li data-target="#carousel-id" data-slide-to="<?= $key ?>" class="<?= ($key==0) ? 'active' : ''; ?>"></li>
      <?php endforeach; ?>
    </ol>
    <div class="carousel-inner">
      <?php if(!empty($forumSlider)): ?>
        <?php foreach($forumSlider as $key=>$val): ?>
          <div class="item <?= ($key==0) ? 'active' : ''; ?>">
            <a href="<?= $val->link ?>" target="_blank"><img data-src="<?= $val->image; ?>" alt="<?= $val->name; ?>" src="<?= $val->image; ?>"></a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php $this->load->view('site/blocks/block_menu'); ?>
<section class="tour-list pdt50 pdb50">
  <div class="container">
    <div class="title-page">
      <h2 class="title-static-page">Diễn đàn</h2>
      <span class="line-title"></span>
    </div>
    
  </div>
  <div class="category-project">
    <?php foreach($listForum as $row): ?>
    <div class="list-project ls">
      <div class="anh-tron-xoe">
      <a href="<?= base_url('forum/'.$row->cat_name); ?>"><div class="img-dean-tron" style="background-image: url(<?= $row->image; ?>);">
      </div></a>
    </div>

      <div class="desc-dean-tron">
        <h3 class="title-dean"><?= $row->name; ?></h3>
        <span class="line-title"></span>
        <div class="desc-dean">
          <?= $row->description; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>  

  </div>    
</section>
<?php $this->load->view('site/blocks/block_news'); ?>
