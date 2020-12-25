<section class="slider-king">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php foreach($slider_tour as $key=>$val): ?>
				<li data-target="#carousel-id" data-slide-to="<?= $key ?>" class="<?= ($key==0) ? 'active' : ''; ?>"></li>
			<?php endforeach; ?>
		</ol>
		<div class="carousel-inner">
			<?php if(!empty($slider_tour)): ?>
				<?php foreach($slider_tour as $key=>$val): ?>
					<div class="item <?= ($key==0) ? 'active' : ''; ?>">
						<a href="<?= $val->link ?>" target="_blank"><img data-src="<?= $val->image; ?>" alt="<?= $val->name; ?>" src="<?= $val->image; ?>"></a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php $this->load->view('site/blocks/block_menu'); ?>
<section class="cat-forum pdt50 pdb50">

	<div class="container">
		<div class="bread-dean">
			<a href="<?= base_url() ?>">Trang chủ</a> 
			<span>></span> <a href="#"><?= $category->name; ?></a>
		</div>
		
		<div class="content-forum">
			<div class="top-forum">
				<div class="phantrangnao">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>

			<div class="list-fm">
				<table class="tblist-frm table-responsive">
					<tr class="head-v">
						<td>Tiêu đề</td>
						<td>Đọc</td>
						<td width="100"></td>
					</tr>
					<?php foreach($list as $row): ?>
						<tr>
							<td>
								<div class="info-fr">
									<?php if(!empty($row->image)): ?>
										<a href="<?= news_url($catname,$row->slug,$row->id) ?>" class="img-ava" style="background-image: url('<?= $row->image; ?>');"></a>
										<?php else: ?>
											<a href="<?= news_url($catname,$row->slug,$row->id) ?>" class="img-ava" style="background-image: url('<?= public_url('site/images/logo.png') ?>');"></a>	
										<?php endif; ?>
										<div class="title-fr">
											<a href="<?= news_url($catname,$row->slug,$row->id) ?>"><?= $row->title; ?></a>
											<p><span>Update : <?= showdate_vn($row->created_at) ?></span></p>
										</div>
									</div>
								</td>
								<td><?= $row->view; ?> </td>
								
							</tr>
						<?php endforeach; ?>

					</table>
				</div>

			</div>

		</div>
	</section>
	<?php $this->load->view('site/blocks/block_news'); ?>