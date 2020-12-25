<section class="slider-king">
  <div id="carousel-id" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php foreach($forumSlider as $key=>$val): ?>
        <li data-target="#carousel-id" data-slide-to="<?= $key ?>" class="<?= ($key==0) ? 'active' : ''; ?>"></li>
      <?php endforeach; ?>
    </ol>
    <div class="carousel-inner">
      <?php if(!empty($forumSlider)): ?>
        <?php foreach($forumSlider as $key=>$val): ?>
          <div class="item <?= ($key==0) ? 'active' : ''; ?>">
            <a href="<?= $val->link ?>" target="_blank"><img data-src="<?= $val->image; ?>" alt="<?= $val->name; ?>" src="<?= $val->image; ?>"></a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php $this->load->view('site/blocks/block_menu'); ?>
<section class="cat-forum pdt30 pdb50">
	<div class="container">
			<div class="row pdb20">
				<div class="col-lg-3"></div>
			<div class="col-lg-9">
				<div class="bread-forum">
					<a href="#">Diễn đàn</a> 
					<?php if(isset($catcha) && !empty($catcha)): ?>
					<span>></span> <a href="<?= base_url('forum/'.$catcha->cat_name) ?>"><?= $catcha->name; ?></a>
					<?php endif; ?>
					<span>></span> <a href="#"><?= $infoCat->name; ?></a>
				</div>
			</div>
			</div>

		<div class="row">
			<div class="col-lg-3">
				<div class="sidebar-forum">
					<h3>Chuyên đề</h3>
					<ul>
						<?php foreach($chuyende as $row): ?>
						<li><a href="<?= base_url('forum/'.$row->cat_name) ?>"><?= $row->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="content-forum">
					<div class="top-forum">
					<div class="phantrangnao">
					<?php echo $this->pagination->create_links(); ?>
					</div>
					<div class="add-topic">
						<a href="<?= base_url('forum/create-thread?topic='.$infoCat->id) ?>" class="btn-add-topic"><i class="glyphicon glyphicon-edit"></i> Tạo chủ đề</a>
					</div>
					</div>

					<div class="list-fm">
						<table class="tblist-frm table-responsive">
							<tr class="head-v">
								<td>Tiêu đề</td>
								<td>Đọc / trả lời</td>
								<td width="100"></td>
							</tr>
							<?php foreach($list as $row): ?>
								<?php $member = $this->user_model->get_info($row->member_id); ?>
								<?php 
								$input['where'] = ['post_id'=>$row->id];
								$cm = $this->comment_model->get_total($input); 
								?>
							<tr>
								<td>
									<div class="info-fr">
								<?php if(!empty($member->image)): ?>
								<a href="#" class="img-ava" style="background-image: url('<?= base_url('uploads/cfv/'.$member->image); ?>');"></a>
								<?php else: ?>
								<a href="#" class="img-ava" style="background-image: url('<?= public_url('site/images/logo.png') ?>');"></a>	
								<?php endif; ?>
								<div class="title-fr">
									<a href="<?= base_url('forum/thread?id='.$row->id) ?>"><?= $row->title; ?></a>
									<p><span>Phản hồi : <?= showdate_vn($row->created_at) ?></span></p>
								</div>
									</div>
								</td>
								<td><?= $row->view; ?> / <?= $cm ?></td>
								<td>
									<div class="info-fr">
									<div class="title-fr-right">
									<a href="#"><?= showdate_vn($member->created_at); ?></a>
									<p><span><?= $member->name; ?>, </span></p>
									</div>
									<div class="info-fr">
								<?php if(!empty($member->image)): ?>
								<a href="#" class="img-ava" style="background-image: url('<?= base_url('uploads/cfv/'.$member->image); ?>');"></a>
								<?php else: ?>
								<a href="#" class="img-ava" style="background-image: url('<?= public_url('site/images/logo.png') ?>');"></a>	
								<?php endif; ?>

									</div>
									</div>
								</td>
							</tr>
							<?php endforeach; ?>
							
						</table>
					</div>

				</div>
			</div>
		</div>

	</div>
</section>

<?php $this->load->view('site/blocks/block_news'); ?>