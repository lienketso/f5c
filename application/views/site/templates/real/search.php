<section class="breadcrum">
	<div class="head-breadcrumb">
		<div class="container">
			<a href="<?= base_url(); ?>">Trang chủ </a> 
			<span>/</span> 
			<a href="<?= base_url('bat-dong-san') ?>">Bất động sản</a>
			<span>/</span>
			<a href="#">Kết quả tìm kiếm</a>
		</div>
	</div>
</section>

<section class="factory-sx pdt30">
	<div class="container">
		<h3>Kết quả tìm kiếm</h3>
		<p>Có (<?= $countList; ?>) kết quả được tìm thấy trên hệ thống ! </p>
		<div class="row">
			<?php if(!empty($list)): ?>
			<?php foreach($list as $t): ?>
				<div class="col-lg-3">
					<div class="list-real-cat">
						<div class="img-real">
							<a href="<?= news_url($t->slug,$t->id) ?>">
								<?php if($t->image==''): ?>
									<img src="<?= public_url('site') ?>/images/no-image.png" alt="<?= $t->title; ?>">
									<?php else: ?>
										<img src="<?= $t->image; ?>" alt="<?= $t->title; ?>">
									<?php endif; ?>
								</a>
								<p class="location-bds"><i class="glyphicon glyphicon-map-marker"></i> <?= $this->city_model->getCity($t->location); ?></p>
							</div>
							<div class="desc-real">
								<div class="price-real">
									<span class="text-left bold-price"><?= read_num_forvietnamese($t->price) ?></span>
									<span class="text-right"><?= showdate_vn($t->created_at); ?> </span>
								</div>
								<div class="dientich-cat">Diện tích : <?= $this->postmeta_model->getSeometa('meta_dientich',$t->id) ?></div>
								<p class="mota-real"><?= sub($t->description,80); ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
			</div>
		</div>
	</section>