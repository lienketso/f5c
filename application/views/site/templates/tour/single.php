<?php $this->load->view('site/blocks/slide'); ?>
<?php $this->load->view('site/blocks/block_menu'); ?>
<section class="factory-sx pdt30">
	<div class="container">
		<div class="title-page">
			<h2 class="title-static-page"><?= $info->title; ?></h2>
			<span class="line-title"></span>
		</div>
		<?php if(!empty($info->image)): ?>
		<div class="img-page">
		<div class="tron-page" style="background-image: url(<?= $info->image; ?>);">
			
		</div>
		<div class="bg-page">
			<div class="baocaosu">
			<img src="<?= $info->image_single; ?>">
			</div>
		</div>
		</div>
	<?php endif; ?>

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