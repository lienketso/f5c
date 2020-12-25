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
					<span>></span> <a href="<?= base_url('forum/'.$infoTopic->cat_name) ?>"><?= $infoTopic->name ?></a>
					<span>></span> <a href="#">Tạo chủ đề mới</a>
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
					<h2>Tạo chủ đề mới</h2>
					<div class="form-add">
						<form action="" method="POST" role="form">
							<div class="form-group">
								<input type="text" name="title" class="form-control" id="" placeholder="Tên chủ đề...">
							</div>
							<div class="form-group">
								<textarea id="editor" name="content" placeholder="" autofocus></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Tạo chủ đề mới</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

<link rel="stylesheet" type="text/css" href="<?= public_url('site/libs/editor/css') ?>/simditor.css" />
<script type="text/javascript" src="<?= public_url('site/libs/editor/js') ?>/module.js"></script>
<script type="text/javascript" src="<?= public_url('site/libs/editor/js') ?>/uploader.js"></script>
<script type="text/javascript" src="<?= public_url('site/libs/editor/js') ?>/hotkeys.js"></script>
<script type="text/javascript" src="<?= public_url('site/libs/editor/js') ?>/dompurify.js"></script>
<script type="text/javascript" src="<?= public_url('site/libs/editor/js') ?>/simditor.js"></script>
<script type="text/javascript">
	var editor = new Simditor({
		textarea: $('#editor')
  //optional options
});
</script>