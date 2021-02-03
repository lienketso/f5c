

<div class="breadcrum-f">
	<div class="container">
		<ul class="list-bread">
			<li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
			<li><span> <?= $category->name; ?></span></li>
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
								<a class="list-group-item <?= ($row->id==$category->id) ? 'active' : '' ?>" href="<?= catnews_url(slug($row->name),$row->id); ?>">
									<i class="fa fa-angle-double-right">&nbsp;&nbsp;</i> <?= $row->name; ?> 
								</a>
							<?php endforeach; ?>

						</div>
					</div>

				</div>
			</div>

			<div class="col-md-9 col-sm-9 main-right">
				<section class="sp-da-xem">
					<div class="heading">
						<span><?= $category->name; ?></span>
					</div>
					<div class="clear"></div>
					
					<div class="list_news">
						<?php foreach($list as $row): ?>
						<div class="item_news">
							<div class="item_left">
								<a href="<?= news_url(slug($row->title),$row->id) ?>" title="<?= $row->title; ?>">
									<img class="item_img" src="<?= product_link($row->image_name); ?>" alt="<?= $row->title; ?>" width="140" height="90">
								</a>
							</div>

							<div class="item_name link">
								<a href="<?= news_url(slug($row->title),$row->id) ?>" title="<?= $row->title; ?>">
									<b><?= $row->title; ?></b>
								</a>
							</div>
							<div class="item_content">
								<?= catchuoi($row->intro,200); ?>
							</div>
							<div class="clear"></div>
						</div>
					<?php endforeach; ?>

					</div>				
					<div class="clear"></div>
					<div class="auto_check_pages">
						<?php echo $this->pagination->create_links(); ?>		
					</div>
					<div class="clear"></div>
				</section>
			</div>

		</div>
	</div>
</section>