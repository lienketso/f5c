		<section class="banner-real pdt50 pdb50">
			<div class="container">
				<div class="form-search-real">
					<div class="auto-form">
					<form action="<?= base_url('real/search') ?>" method="GET" role="form">
						<legend>Tìm kiếm bất động sản</legend>
					
						<div class="form-group flex">
							<select name="city" class="form-control city-se">
								<option value="">Thành phố</option>
								<?php $this->city_model->optionCity(0,0); ?>
							</select>
							<button type="submit" class="btn-se"><i class="glyphicon glyphicon-search"></i></button>
						</div>
						<div class="form-group select-down">
							<select name="type" class="form-control">
								<option value="">Loại nhà đất</option>
								<option value="sale">Bán</option>
								<option value="buy">Mua</option>
								<option value="chothue">Cho thuê</option>
							</select>
							<select name="price" class="form-control margin-hai">
								<option value="">Khoảng giá</option>
								<option value="1">100 tr - 500 tr</option>
								<option value="2">600tr - 1 tỷ</option>
								<option value="3">Trên 1 tỷ</option>
							</select>
							<select name="dientich" class="form-control">
								<option value="">Diện tích</option>
								<option value="1">30m - 50m</option>
								<option value="2">60m - 100m</option>
								<option value="3">Trên 100m</option>
							</select>
						</div>
					</form>
					</div>
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
								<p class="location-bds"><i class="glyphicon glyphicon-map-marker"></i> <?= $this->city_model->getCity($t->location); ?></p>
							</div>
							<div class="desc-real">
								<div class="price-real">
								<span class="text-left bold-price"><?= read_num_forvietnamese($t->price) ?></span>
								<span class="text-right"><?= showdate_vn($t->created_at); ?> </span>
								</div>
								<div class="dientich-cat">Diện tích : <?= $t->dientich ?> m2</div>
								<p class="mota-real"><?= sub($t->description,80); ?></p>
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