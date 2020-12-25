<section class="breadcrum">
<div class="head-breadcrumb">
<div class="container">
<a href="<?= base_url(); ?>">Trang chủ </a> 
<span>/</span> 
<a href="<?= base_url('bat-dong-san') ?>">Bất động sản</a>
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
			<li><span class="spleft"><img src="<?= public_url('site') ?>/images/dien-tich.png"></span><span class="spright">Diện tích : <?= $this->postmeta_model->getSeometa('meta_dientich',$info->id); ?></span></li>
			<li><span class="spleft"><img src="<?= public_url('site') ?>/images/local.png"></span> <span class="spright">Địa chỉ: <?= $this->postmeta_model->getSeometa('meta_address',$info->id); ?></span></li>
			<li><span class="spleft"><img src="<?= public_url('site') ?>/images/calenda.png"></span> <span class="spright">Ngày đăng : <?= showdate_vn($info->created_at); ?></span></li>
			<li><span class="spleft"><img src="<?= public_url('site') ?>/images/price.png"></span> <span style="font-weight: bold; font-size: 17px;">Giá : <?= read_num_forvietnamese($info->price); ?></span></li>

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
		<h5 class="title-sx-page">Đặc điểm</h5>
		<div class="detail-sx">
			<?= $this->postmeta_model->getSeometa('meta_contentf',$info->id); ?>
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
					
				</div>
			</div>
		</div>
	</section>

		<section class="form-ntt pdt50 pdb50">
		<div class="container">
			<h3 class="title-form">Nhận thông tin sản phẩm</h3>
			<form action="" method="POST" class="form-sp form-inline" role="form">
				<div class="row">
					<div class="form-group col-lg-3">
						<label class="sr-only" for="">label</label>
						<input type="text" class="form-control" id="" placeholder="Họ và tên">
					</div>
					<div class="form-group col-lg-3">
						<label class="sr-only" for="">label</label>
						<input type="text" class="form-control" id="" placeholder="Email">
					</div>
					<div class="form-group col-lg-3">
						<label class="sr-only" for="">label</label>
						<input type="text" class="form-control" id="" placeholder="Số điện thoại">
					</div>
					<div class="form-group col-lg-3">
						<button type="submit" class="btn btn-primary">Nhận tin miễn phí</button>
					</div>
				</div>
			</form>

			<p class="mess-free text-center">Nhận tin miễn phí là bạn sẽ nhận được email của chúng tôi mỗi ngày</p>
		</div>
	</section>