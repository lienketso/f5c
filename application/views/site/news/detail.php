<?php $this->load->view('site/blocks/block_menu'); ?>
<div class="breadcrum-f">
	<div class="container">
		<ul class="list-bread">
			<li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
			<li><a href="<?= catnews_url(slug($catName->name),$catName->id) ?>"><?= $catName->name; ?> <span>›</span></a></li>
			<li><span> <?= $info->title; ?></span></li>
		</ul>
	</div>
</div>

<section class="sidebar-news">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 sidebar">
				<div class="box-sidebar">
					<div class="panel tu-van-tieu-dung">
						<div class="panel-heading">
							Danh mục bài viết
						</div>
						<div class="list-group">
							<?php foreach($allCatnews as $row): ?>
								<a class="list-group-item <?= ($row->id==$catName->id) ? 'active' : '' ?>" href="<?= catnews_url(slug($row->name),$row->id); ?>">
									<i class="fa fa-angle-double-right">&nbsp;&nbsp;</i> <?= $row->name; ?> 
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-9 col-sm-9 main-right">
				<section class="sp-da-xem">

					<div class="box-itemt">
						<div class="clear"></div>
						<h1 class="left"><?= $info->title; ?></h1>
						<div class="clear"></div>

						<div class="left timestamp">
							<span class="ml5">Lượt xem: <?= $info->count_view; ?></span>
						</div>
						<div class="clear pb10"></div>

						<?= str_replace('{base_url}',base_url(),$info->content); ?>
	
						<div class="clear pb10"></div>

			</div>
			<div class="clear"></div>
			<div class="heading">
				<span>Bài viết liên quan</span>
			</div>
			<ul>
				<?php foreach($relatenews as $row): ?>
				<li style="float:none;padding:10px ;border-bottom:1px solid #f0f0f0">
					<a href="<?= news_url(slug($row->title),$row->id) ?>" title="<?= $row->title; ?>">
						<img src="<?= product_link($row->image_name); ?>" style="width:70px;height:50px;float:left;margin-right:5px;">
						<?= $row->title; ?>					
					</a>
					<div class="clear"></div>
				</li>
				<?php endforeach; ?>
			</ul>

</section>
</div>
</div>
</div>
</section>