<section class="breadcrum">
	<div class="head-breadcrumb">
		<div class="container">
			<a href="<?= base_url(); ?>">Trang chủ </a> 
			<span>/</span> 
			<a href="<?= base_url('van-tai') ?>">Vận tải</a>
			<span>/</span>
			<a href="#"><?= $info->title; ?></a>
		</div>
	</div>
</section>

<section class="factory-sx pdt30">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="img-factory">
					<?php if($info->image==''): ?>
						<a class="fancybox" href="<?= public_url('site'); ?>/images/no-image.png" data-fancybox-group="gallery" >
							<img src="<?= public_url('site'); ?>/images/no-image.png" alt="<?= $info->title; ?>">
						</a>
						<?php else: ?>
							<a class="fancybox" href="<?= $info->image; ?>" data-fancybox-group="gallery" >
								<img src="<?= $info->image; ?>" alt="<?= $info->title; ?>">
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-6">
					<h3 class="title-s-real"><?= $info->title; ?></h3>
					<div class="desc-nm-real">
						<ul class="list-desc-real">
							<li>Hãng sản xuất : <?= $this->postmeta_model->getSeometa('meta_factory',$info->id) ?></li>
							<li>Nhãn hiệu : <?= $this->postmeta_model->getSeometa('meta_nhanhieu',$info->id) ?></li>
							<li>Đời xe : <?= $this->postmeta_model->getSeometa('meta_doixe',$info->id) ?></li>
							<li>Kiểu xe : <?= $this->postmeta_model->getSeometa('meta_kieuxe',$info->id) ?></li>
							<li>Mầu xe : <?= $this->postmeta_model->getSeometa('meta_mauxe',$info->id) ?></li>

						</ul>
					</div>
					<div class="hlht">
						Hotline hỗ trợ: <?= $arrSetting['site_hotline_'.$lang]; ?>
					</div>
					<div class="list-thumb-real">
						<?php if(!empty($info->image_list)): ?>
							<?php 
							$imgList = json_decode( $info->image_list );
							?>
							<?php foreach($imgList as $img): ?>
								<a class="fancybox no-padding-left" data-fancybox-group="gallery" href="<?= $img; ?>"><img src="<?= $img; ?>" alt="Ảnh slider bất động sản"></a>
							<?php endforeach; ?>
						<?php endif; ?>

					</div>

				</div>
			</div>
			<div class="content-sanxuat pdt50">
				<div class="row">
					<div class=col-lg-6>
						<h5 class="title-sx-page">Chi tiết</h5>
						<div class="detail-sx">
							<?= $info->content; ?>
						</div>
					</div>
					<div class=col-lg-6>
						<h5 class="title-sx-page">Đăng ký</h5>
						<div class="detail-sx">
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
				</div>

			</div>
		</div>
	</section>

	<section class="category-sx pdt50">
		<div class="container">
			<div class="heading-page">
				<h4>Tin liên quan</h4>
			</div>
			<div class="dm-content pdb30">
				<div class="row">
					<?php foreach($relatenews as $t): ?>
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

					</div>
				</div>
			</div>
		</section>

