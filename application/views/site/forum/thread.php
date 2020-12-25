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
<section class="about-page pdt50 pdb50">

<div class="container">
<div class="row pdb20">
<div class="col-lg-12">
<div class="bread-forum">
<a href="<?= base_url('forum') ?>">Diễn đàn</a> 
<span>></span> <a href="<?= base_url('forum/'.$infoTopic->cat_name) ?>"><?= $infoTopic->name ?></a>
<span>></span> <a href="#"><?= $info->title; ?></a>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-md-2">
<div class="info-member">
<div class="avatar-mem">
<?php if(!empty($userInfo)&&$userInfo->image=='') : ?>
	<img src="<?= public_url('site/images/no-image.png') ?>">
	<?php else: ?>
		<img src="<?= base_url('uploads/cfv/'.$userInfo->image); ?>">	
	<?php endif; ?>
</div>
<div class="desc-mem">
	<p><a href="#"><?= $userInfo->name; ?></a></p>
	<p>Tham gia ngày</p>
	<p><span><?= showdate_vn($userInfo->created_at); ?></span></p>
</div>
</div>
</div>
<div class="col-lg-9 col-md-10">
	<div class="phantrangnao">
	<?php echo $this->pagination->create_links(); ?>
	</div>
<div class="detail-blog">
<h1 class="title-about"><?= $info->title; ?></h1>

<div class="content-blog">
	<?= $info->content; ?>

	<div class="commented pdt30">
		<?php foreach($commentList as $row): ?>
			<?php
				$userPost = $this->user_model->get_info($row->member_id);
			 ?>
		<div class="list-cm">
			<div class="cm-left">
				<div class="avatar-mem">
					<?php if(empty($userPost->image)): ?>
					<img src="<?= public_url('site/images/no-image.png') ?>">
					<?php else: ?>
					<img src="<?= base_url('uploads/cfv/'.$userPost->image); ?>">
					<?php endif; ?>
				</div>
				<div class="desc-mem">
					<p><a href="#"><?= $userPost->name; ?></a></p>
					<p>Tham gia ngày</p>
					<p><span><?= showdate_vn($userPost->created_at); ?></span></p>
				</div>
			</div>
			<div class="cm-right">
				<div class="time-post">
					<p><i class="glyphicon glyphicon-time"></i> <?= showdatefull($row->created_at); ?></p>
				</div>
				<div class="reply-post">
					<p><?= $row->content; ?></p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	</div>
	
<?php if(!empty($user_online)) : ?>
	<div class="comment-list pdt30">
		<h3>Bình luận</h3>	
		<form method="post" action="" id="formcomment">
			<textarea name="comment" id="contentC" rows="4" class="frm-comment" placeholder="Bình luận topic..."></textarea>
			<div class="btn-bl">
				<button type="button" onclick="formComment()" class="btnsubmit">Gửi bình luận</button>
			</div>
		</form>

	</div>
	<?php else: ?>
		<p><a class="btn-dangnhap" href="#logincomment">Đăng nhập để bình luận</a></p>
<?php endif; ?>

</div>
</div>

</div>


</div>
</div>
</section>