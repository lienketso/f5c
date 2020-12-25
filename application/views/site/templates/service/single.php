<section class="slider-king">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php foreach($aboutSlider as $key=>$val): ?>
				<li data-target="#carousel-id" data-slide-to="<?= $key ?>" class="<?= ($key==0) ? 'active' : ''; ?>"></li>
			<?php endforeach; ?>
		</ol>
		<div class="carousel-inner">
			<?php if(!empty($aboutSlider)): ?>
				<?php foreach($aboutSlider as $key=>$val): ?>
					<div class="item <?= ($key==0) ? 'active' : ''; ?>">
						<a href="<?= $val->link ?>" target="_blank"><img data-src="<?= $val->image; ?>" alt="<?= $val->name; ?>" src="<?= $val->image; ?>"></a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php $this->load->view('site/blocks/block_menu'); ?>
<section class="factory-sx pdt30">
	<div class="container">
		<div class="title-page">
			<h2 class="title-static-page"><?= $info->title; ?></h2>
			<span class="line-title"></span>
		</div>
		<div class="img-page">
		<div class="tron-page" style="background-image: url(<?= $info->image; ?>);">
			
		</div>
		<div class="bg-page">
			<div class="baocaosu">
			<img src="<?= ($info->image_single!='') ? $info->image_single : public_url('site/images/about.jpg'); ?>">
			</div>
		</div>
	</div>
	</div>
	
	<div class="container">
		<div class="content-sanxuat pdt50">
			<div class="detail-sx">
				<?= $info->content; ?>
			</div>
		</div>
	</div>
</section>
<?php $this->load->view('site/blocks/block_news'); ?>