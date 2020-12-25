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


<section class="tour-list pdt50 pdb50">

	<div class="container">
		
			<div class="col-lg-9">
			<?php foreach($allCat as $row): ?>
			<?php 
			$input['where'] = ['type'=>'car','cat_id'=>$row->id];
			$input['order'] = ['created_at'=>'desc'];
			$input['limit'] = [8,0];
			$realList = $this->news_catnews_model->get_list($input);
			$list = $this->catnews_model->getNews($realList);
			?>
				<div class="title-tour">
					<h3><span><?= $row->name; ?></span><a href="<?= catnews_url($row->cat_name); ?>">Xem thêm <i class="glyphicon glyphicon-menu-right"></i></a></h3>
				</div>
				<div class="row">
					<?php if(!empty($list)): ?>
						<?php foreach($list as $t): ?>
							<div class="col-lg-4">
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
						</div>
						<?php endforeach; ?>
					</div>
				


				<div class="col-lg-3">
					<div class="trans-bar">
						<h3>Hotline hỗ trợ : 0979 823 452</h3>
						<p>Thông tin dịch vụ</p>
						<div class="form-tt-dv">

							<div class="alert-car" id="alert-car"></div>

							<form action="" method="POST" role="form">
								<div class="form-group">
									<input type="text" name="cname" class="form-control" id="" placeholder="Họ tên *" required="required">
								</div>
								<div class="form-group">
									<input type="text" name="cphone" class="form-control" id="" placeholder="Điện thoại *" required="required">
								</div>
								<div class="form-group">
									<input type="text" name="cemail" class="form-control" id="" placeholder="Email">
								</div>
								<div class="form-group">
									<select name="ctitle" id="" class="form-control" >
										<option value="">Dịch vụ</option>
										<option value="Mua">Mua</option>
										<option value="Bán">Bán</option>
										<option value="Cho thuê">Cho thuê</option>
										<option value="Cho thuê lại">Cho thuê lại</option>
									</select>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="ccontent" rows="4" placeholder="Nội dung"></textarea>
								</div>
								<button type="button" id="clickCar" data-url="<?= base_url('car/dangky') ?>" class="btn btn-bookcar">Đặt xe</button>
							</form>
							<div class="successCar" id="successCar">Đăng ký thành công !</div>
						</div>
					</div>
				</div>

			</div>
		</section>