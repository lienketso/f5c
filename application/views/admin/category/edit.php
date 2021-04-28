<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
<li class="breadcrumb-item"><a href="<?= admin_url('category'); ?>">Danh mục</a></li>
<li class="breadcrumb-item active" aria-current="page">Sửa danh mục sản phẩm </li>
</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
<div class="row">
<div class="col-md-8 grid-margin stretch-card">
<div class="card">
<div class="card-body">
	<h4 class="card-title">Nhập thông tin để sửa danh mục</h4>
	<div class="form-group" style="text-align: right;">
		<a href="<?= admin_url('category') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
		<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
	</div>
	<div class="form-group">
		<label for="">Tiêu đề danh mục</label>
		<input type="text" name="name" value="<?= $info->name; ?>" class="form-control" id="input_name" onkeyup="return ChangeToSlug();" placeholder="Nhập tiêu đề">
		<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
	</div>
	<div class="form-group">
		<label for="">Slug</label>
		<input type="text" name="friendly_url" value="<?= $info->friendly_url; ?>" class="form-control" id="input_slug" placeholder="Đường dẫn tĩnh">
		<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('friendly_url'); ?></span>
	</div>
	<div class="form-group">
		<label for="">Mô tả ngắn</label>
		<textarea name="info" class="form-control" id="metadesc" onkeyup="keyupMeta()" rows="4"><?= $info->info; ?></textarea>
	</div>
	<div class="form-group">
		<label for="">Hãng sản xuất</label>
		<select class="js-example-basic-multiple form-control" name="manufac[]" multiple="multiple">
			<?php foreach($list_manufac as $row): ?>
				<option value="<?= $row->id ?>" <?= (in_array($row->id,$curentManu)) ? 'selected' : '' ?> ><?= $row->name; ?></option>
			<?php endforeach; ?>
		</select>
		<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('manufac'); ?></span>
	</div>
	<p class="card-description">
		<code><i class="ti-settings"></i> Cấu hình Seo (Rich Snippet)</code> 
		<button type="button" id="onset" class="btn btn-primary btn-sm"><i class="ti-eye"></i> Hiện cấu hình</button>
		<button type="button" id="offset" class="btn btn-dark btn-sm"><i class="ti-import"></i> Ẩn</button>
	</p>
	<!-- Rich snippet -->
	<div class="form-group opensetting">
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Rich Snippet</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" aria-selected="false">Mạng xã hội</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact-1" aria-selected="false">Nâng cao</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
				<div class="form-group">
					<label for="">Thẻ meta title</label>
					<input type="text" name="site_title" value="<?= $info->site_title; ?>" class="form-control title-change" id=""  placeholder="Thẻ tiêu đề website">
				</div>
				<div class="form-group">
					<label for="">Thẻ meta keyword</label>
					<input type="text" name="meta_key" value="<?= $info->meta_key; ?>" class="form-control" id=""  placeholder="Thẻ từ khóa cách nhau bởi dấu ,">
				</div>
				<div class="form-group">
					<label for="">Thẻ meta description</label>
					<textarea name="meta_desc" placeholder="Thẻ mô tả danh mục" class="form-control meta-desc" id="" rows="4"><?= $info->meta_desc; ?></textarea>
				</div>
			</div>
			<div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
				<div class="form-group">
					<label for="exampleInputUsername1">Facebook title (og:title)</label>
					<input type="text" name="og_title" value="" class="form-control title-change" id=""  placeholder="Thẻ tiêu đề Facebook">
				</div>
				<div class="form-group">
					<label>Facebook image (og:image)</label>
					<div class="input-group col-xs-12">
						<input type="text" name="og_image" id="xFilePathFb" value="" class="form-control file-upload-info" placeholder="Upload Image">
						<span class="input-group-append">
							<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('xFilePathFb')" type="button">Chọn ảnh</button>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputUsername1">Facebook description (og:description)</label>
					<textarea name="og_description" class="form-control meta-desc" id="" placeholder="Thẻ mô tả danh mục trên facebook" rows="4"></textarea>
				</div>
			</div>
			<div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Google index Link</label>
					<div class="col-sm-4">
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="index_link" id="" value="index" >
								Cho phép index
							</label>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="index_link" id="" value="noindex" >
								Không index
							</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Google (Follow)</label>
					<div class="col-sm-4">
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="follow_link" id="" value="dofollow" >
								Link dofollow
							</label>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="follow_link" id="" value="nofollow" >
								Link nofollow
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputUsername1">Tiêu đề breadcrumb</label>
					<input type="text" name="breadcrumb" value="" class="form-control title-change" id=""  placeholder="Hiển thị tên trong breadcrumb">
				</div>
				<div class="form-group">
					<label for="exampleInputUsername1">Canonical Url</label>
					<input type="text" name="canonical" value="" class="form-control" id=""  placeholder="">
				</div>
			</div>
		</div>
	</div>
	<!-- End Rich snippet -->
	<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
	<a href="<?= admin_url('category') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
	<h4 class="card-title">Tùy chọn khác</h4>
	<div class="form-group">
		<label for="">Danh mục cha</label>
		<select name="parent_id" class="form-control form-control-sm" id="">
			<option value="0">--Là danh mục cha--</option>
			<?php $this->category_model->optionCategory(0,1,4,$info->parent_id,$info->id); ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">Thứ tự</label>
		<input type="number" name="sort_order" min="0" value="<?= $info->sort_order; ?>" class="form-control" id="" placeholder="Thứ tự hiển thị">
	</div>
	<div class="form-group">
		<label for="">Hiện trang chủ</label>
		<select name="show_home" class="form-control form-control-sm" id="">
			<option value="0">--không chọn--</option>
			<option value="1" <?= ($info->show_home==1) ? 'selected' : '' ?>>Trang chủ</option>
		</select>
	</div>
	<div class="form-group">
		<label>Icon</label>
		<div class="input-group col-xs-12">
			<input type="text" name="image_name" value="<?= $info->image_name; ?>" id="xFilePath" class="form-control file-upload-info" placeholder="Upload Image">
			<span class="input-group-append">
				<button class="file-upload-browse btn btn-primary" id="" onclick="browseServer()" type="button">Chọn ảnh</button>
			</span>
		</div>
		<div class="col-xs-12">
			<img src="<?= url_tam($info->image_name) ?>" id="imgreview" style="width:100px; padding-top: 10px">
		</div>
	</div>
	<!-- <div class="form-group">
		<label>Ảnh danh mục</label>
		<div class="input-group col-xs-12">
			<input type="text" value="<?= set_value('image_1'); ?>" name="image_1" id="Imagecat" class="form-control file-upload-info" placeholder="Upload Image">
			<span class="input-group-append">
				<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('Imagecat')" type="button">Chọn ảnh</button>
			</span>
		</div>
	</div> -->
	<div class="form-group">
		<label for="exampleFormControlSelect3">Trạng thái</label>
		<select name="status" class="form-control form-control-sm" id="exampleFormControlSelect4">
			<?php echo yes_no($info->status); ?>
		</select>
	</div>
</div>
</div>
</div>
</div>
</form>