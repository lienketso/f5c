<section class="breadcrum">
<div class="head-breadcrumb-img">
<img src="<?= public_url('site') ?>/images/san-xuat.png">
</div>
</section>

<?php foreach($catdanhmuc as $dm): ?>
<section class="category-sx pdt50">
<?php 
$input['where'] = ['type'=>'service','cat_id'=>$dm->id];
$input['order'] = ['created_at'=>'desc'];
$input['limit'] = [8,0];
$realList = $this->news_catnews_model->get_list($input);
$list = $this->catnews_model->getNews($realList);
?>
<div class="container">
<div class="heading-page">
	<h4><?= $dm->name; ?></h4>
</div>
<div class="dm-content pdt30 pdb30">
	<div class="row">
		<?php if(!empty($list)): ?>
			<?php foreach($list as $row): ?>
				<div class="col-lg-3">
					<div class="list-dm">
						<div class="img-dm">
							<a href="<?= news_url($row->slug,$row->id) ?>">
								<?php if($row->image==''): ?>
									<img src="<?= public_url('site') ?>/images/no-image.png" alt="<?= $row->title; ?>">
									<?php else: ?>
										<img src="<?= $row->image; ?>" alt="<?= $row->title; ?>">
									<?php endif; ?>
								</a>
							</div>
							<div class="desc-dm">
								<h4><a href="<?= news_url($row->slug,$row->id) ?>"><?= $row->title; ?></a></h4>
								<p><?= sub($row->description,80) ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
</section>
<?php endforeach; ?>

<section class="factory-sx pdt30">
<div class="container">
<div class="row">
	<div class="col-lg-6">
		<div class="img-factory">
			<a class="fancybox" href="<?= $arrSetting['service_page_image_vn'] ?>" data-fancybox-group="gallery">
				<img src="<?= $arrSetting['service_page_image_vn'] ?>" alt="Ảnh nhà máy sen đất việt">
			</a>
		</div>
	</div>
	<div class="col-lg-6">
		<h3 class="title-nm"><?= $arrSetting['service_page_title_'.$lang] ?></h3>
		<div class="desc-nm">
			<?= $arrSetting['service_page_desc_'.$lang] ?>
		</div>
		<div class="list-thumb-fac">
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<a class="fancybox" href="<?= $arrSetting['service_page_image_1'] ?>" data-fancybox-group="gallery"><img src="<?= $arrSetting['service_page_image_1'] ?>" alt=""></a>
				</div>
				<div class="col-lg-3 col-xs-6">
					<a class="fancybox" href="<?= $arrSetting['service_page_image_2'] ?>" data-fancybox-group="gallery"><img src="<?= $arrSetting['service_page_image_2'] ?>" alt=""></a>
				</div>
				<div class="col-lg-3 col-xs-6">
					<a class="fancybox" href="<?= $arrSetting['service_page_image_3'] ?>" data-fancybox-group="gallery"><img src="<?= $arrSetting['service_page_image_3'] ?>" alt=""></a>
				</div>
				<div class="col-lg-3 col-xs-6">
					<a class="fancybox" href="<?= $arrSetting['service_page_image_4'] ?>" data-fancybox-group="gallery"><img src="<?= $arrSetting['service_page_image_4'] ?>" alt=""></a>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
</section>

<?php foreach($catsanpham as $dm): ?>
<section class="category-sx pdt50">
<?php 
$input2['where'] = ['type'=>'service','cat_id'=>$dm->id];
$input2['order'] = ['created_at'=>'desc'];
$input2['limit'] = [8,0];
$realList2 = $this->news_catnews_model->get_list($input2);
$list2 = $this->catnews_model->getNews($realList2);
?>
<div class="container">
	<div class="heading-page">
		<h4><?= $dm->name; ?></h4>
	</div>
	<div class="dm-content pdt30 pdb30">
		<div class="row">
			<?php if(!empty($list2)): ?>
				<?php foreach($list2 as $row): ?>
					<div class="col-lg-3">
						<div class="list-dm">
							<div class="img-dm">
								<a href="<?= news_url($row->slug,$row->id) ?>">
									<?php if($row->image==''): ?>
										<img src="<?= public_url('site') ?>/images/no-image.png" alt="<?= $row->title; ?>">
										<?php else: ?>
											<img src="<?= $row->image; ?>" alt="<?= $row->title; ?>">
										<?php endif; ?>
									</a>
								</div>
								<div class="desc-dm">
									<h4><a href="<?= news_url($row->slug,$row->id) ?>"><?= $row->title; ?></a></h4>
									<p><?= sub($row->description,80) ?></p>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endforeach; ?>

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