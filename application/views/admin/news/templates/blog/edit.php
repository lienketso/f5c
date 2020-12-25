<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
<li class="breadcrumb-item"><a href="<?= admin_url('news'); ?>">Bài viết</a></li>
<li class="breadcrumb-item active" aria-current="page">Sửa bài viết </li>
</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
<div class="col-md-8 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Nhập thông tin để sửa bài viết</h4>
<div class="form-group" style="text-align: right;">
<a href="<?= admin_url('news') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
</div>
<div class="form-group">
<label for="">Tiêu đề bài viết</label>
<input type="text" name="title" value="<?= $info->title; ?>" class="form-control" id="input_name" onkeyup="return ChangeToSlug();" placeholder="Nhập tiêu đề">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('title'); ?></span>
</div>
<div class="form-group">
<label for="">Slug</label>
<input type="text" name="friendly_url" value="<?= $info->friendly_url; ?>" class="form-control" id="input_slug" placeholder="Đường dẫn tĩnh">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('friendly_url'); ?></span>
</div>

<div class="form-group">
<label for="">Mô tả ngắn</label>
<textarea name="intro" class="form-control" id="metadesc" placeholder="Mô tả ngắn gọn bài viết" onkeyup="keyupMeta()" rows="8"><?= $info->intro; ?></textarea>
</div>
<div class="form-group">
<label for="">Nội dung</label>	
<div id="">
<textarea name="content" class="makeMeRichTextarea" id="edtone"><?= $info->content; ?></textarea>
 </div>
</div>

<p class="card-description">
    <code><i class="ti-settings"></i> Cấu hình Seo (Rich Snippet)</code> 
    <button type="button" id="onset" class="btn btn-primary btn-sm"><i class="ti-eye"></i> Hiện cấu hình</button>
    <button type="button" id="offset" class="btn btn-dark btn-sm"><i class="ti-import"></i> Ẩn</button>
</p> 
<!-- meta snippet -->
<div class="form-group opensetting">
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Rich Snippet</a>
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
				<textarea name="meta_desc" placeholder="Thẻ mô tả danh mục" class="form-control meta-desc" id="" rows="4"><?= $info->meta_desc ?></textarea>
			</div>
		</div>
	</div>
</div>
<!-- end meta snippet -->
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
<a href="<?= admin_url('news') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Tùy chọn khác</h4>

<div class="form-group">
<label for="">Danh mục bài viết</label>
<select name="cat_id" class="form-control">
<option value="0">--Chọn danh mục--</option>
<?php $this->catnews_model->optionCatnews(0,1,4,$info->cat_id,0); ?>
</select>
</div>

<div class="form-group">
<label>Hình ảnh</label>
<div class="input-group col-xs-12">
<input type="text" name="image_name" id="xFilePath" class="form-control file-upload-info" placeholder="Upload Image" value="<?= $info->image_name; ?>">
<span class="input-group-append">
<button class="file-upload-browse btn btn-primary" id="" onclick="browseServer()" type="button">Chọn ảnh</button>
</span>
</div>
<div class="col-xs-12">
	<img src="<?= $info->image_name; ?>" id="imgreview" style="width: 100%; padding-top: 10px">
</div>
</div>
</div>
</div>
</div>
</div>
</form>