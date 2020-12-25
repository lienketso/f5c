<section class="slider-king">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php foreach($slider_car as $key=>$val): ?>
				<li data-target="#carousel-id" data-slide-to="<?= $key ?>" class="<?= ($key==0) ? 'active' : ''; ?>"></li>
			<?php endforeach; ?>
		</ol>
		<div class="carousel-inner">
			<?php if(!empty($slider_car)): ?>
				<?php foreach($slider_car as $key=>$val): ?>
					<div class="item <?= ($key==0) ? 'active' : ''; ?>">
						<img data-src="<?= $val->image; ?>" alt="<?= $val->name; ?>" src="<?= $val->image; ?>">
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>

	</div>
</section>

<section class="tour-list pdt50">
	<div class="container">
		<div class="title-tour">
			<h3><span><?= $category->name; ?></span></h3>
		</div>
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
									<p class="location-bds"><?= $t->title; ?></p>
								</div>
								<div class="desc-real">
									<div class="dientich-cat"><b>Hãng</b> : <?= $this->postmeta_model->getSeometa('meta_factory',$t->id); ?></div>
									<div class="price-bus">
										<span class="text-left"><b>Đời xe</b> : <?= $this->postmeta_model->getSeometa('meta_doixe',$t->id); ?></span>
										<span class="text-right"><b>Mầu xe</b> : <?= $this->postmeta_model->getSeometa('meta_mauxe',$t->id); ?></span>
									</div>

									<p class="mota-real"><?= sub($t->description,80) ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<?php else: ?>
						<div class="col-lg-12 no-data">
							<p>Bài viết đang cập nhật, vui lòng quay lại sau !</p>
						</div>
					<?php endif; ?>

					<div class="paginate-king">
						<?= $this->pagination->create_links(); ?>
					</div>

				</div>
			</div>
		</section>