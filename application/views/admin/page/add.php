<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item"><a href="<?= admin_url('page'); ?>">Trang tĩnh</a></li>
		<li class="breadcrumb-item active" aria-current="page">Thêm bài viết </li>
	</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin để thêm bài viết</h4>
					<div class="form-group" style="text-align: right;">
						<a href="<?= admin_url('page') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Tiêu đề bài viết</label>
						<input type="text" name="title" value="<?= set_value('title'); ?>" class="form-control" id="input_name" onkeyup="return ChangeToSlug();" placeholder="Nhập tiêu đề">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('title'); ?></span>
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Slug</label>
						<input type="text" name="friendly_url" value="<?= set_value('friendly_url'); ?>" class="form-control" id="input_slug" placeholder="Đường dẫn tĩnh">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('friendly_url'); ?></span>
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Nội dung</label>	
						<div id="">
							<textarea name="content" class="makeMeRichTextarea" id="editone"><?= set_value('content'); ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="">Meta desc</label>
						<textarea name="meta_desc" rows="4" class="form-control" id=""><?= set_value('meta_desc'); ?></textarea>
					</div>
					<div class="form-group">
						<label for="">Keyword</label>
						<input type="text" name="meta_key" value="<?= set_value('meta_key'); ?>" class="form-control" >
					
					</div>

					<!-- end meta snippet -->
					<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					<a href="<?= admin_url('page') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tùy chọn khác</h4>
				
				</div>
			</div>
		</div>
	</div>
</form>