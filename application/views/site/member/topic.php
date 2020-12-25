<?php $this->load->view('site/blocks/block_menu'); ?>
<section class="cat-forum pdt30 pdb50">
<div class="container">
<div class="row pdb20">
<div class="col-lg-3"></div>
<div class="col-lg-9">
	<div class="bread-forum">
		<a href="<?= base_url(); ?>">Trang chủ</a> <span>></span> 
		<a href="<?= base_url('member/profile'); ?>">Profile</a> <span>></span> 
		<a href="#">Danh sách chủ đề đã đăng</a> 
	</div>
</div>
</div>


<div class="row">
<div class="col-lg-3">
	<div class="sidebar-forum">
		<h3>Thông tin profile</h3>
		<div class="info-user">
			<p>Họ tên : <?= $userLog->name; ?></p>
			<p>Email : <?= $userLog->email; ?></p>
			<p>Số điện thoại : <?= $userLog->phone; ?></p>
			<div class="avatar-no">
				<?php if($userLog->image==''): ?>
					<img src="<?= public_url('site/images/no-image.png'); ?>">
					<?php else: ?>
						<img src="<?= base_url('uploads/cfv/'.$userLog->image); ?>">	
					<?php endif; ?>
				</div>
			</div>
			<ul>
				<li><a style="color: #f99f1c" href="<?= base_url('member/mytopic') ?>">Chủ đề đã đăng</a></li>
				<li><a href="<?= base_url('member/changepass') ?>">Đổi mật khẩu</a></li>
				<li><a href="<?= base_url('member/logout') ?>">Đăng xuất</a></li>
			</ul>
		</div>
	</div>

	<div class="col-lg-9">
		<div class="chude-dadang">
			<?php if(!empty($list)): ?>
				<?php foreach($list as $row): ?>
					<?php 
					$where = "news_id=".$row->id;
					$catcd = $this->news_catnews_model->get_info_rule($where);
					if(!empty($catcd)){
						$catcho = $this->catnews_model->get_info($catcd->cat_id);
						$cat = $catcho->name;
					}else{ $cat = ''; }
					?>
					<div class="list-dadang">
						<h3><a href="<?= base_url('forum/thread?id='.$row->id) ?>" target="_blank" ><?= $row->title; ?></a></h3>
						<p>
							<span class="time-cd"><b>Post on</b> : <?= showdate_vn($row->created_at); ?></span>
							<?php if(!empty($catcd)): ?>
								<span class="cd-post"><b>Chuyên đề :</b> <a target="_blank" href="<?= base_url('forum/'.$catcho->cat_name); ?>"><?= $cat; ?></a></span>
							<?php endif; ?>

							<span class="count-cd"><b>Đọc</b> : <?= $row->view; ?></span>
						</p>
						<p class="btn-e"><a class="btn-edit-cd" href="<?= base_url('forum/thread?id='.$row->id) ?>" target="_blank" ><i class="glyphicon glyphicon-eye-open"></i> Xem chủ đề</a></p>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
					<p>Không có chủ đề nào được đăng trước đó !</p>
				<?php endif; ?>

				<div class="paginate-king">
					<?= $this->pagination->create_links(); ?>
				</div>

			</div>
		</div>
	</div>

</div>


</section>