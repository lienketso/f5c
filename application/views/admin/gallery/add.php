<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
<li class="breadcrumb-item"><a href="<?= admin_url('gallery?group='.$gid); ?>">Thư viện</a></li>
<li class="breadcrumb-item active" aria-current="page">Thêm mới hình ảnh </li>
</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
<div class="col-md-8 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Nhập thông tin để thêm hình ảnh</h4>
<div class="form-group" style="text-align: right;">
<a href="<?= admin_url('gallery?group='.$gid) ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
</div>
<div class="form-group">
<label for="exampleInputUsername1">Tiêu đề </label>
<input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control" placeholder="Nhập tiêu đề">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
</div>
<div class="form-group">
<label for="exampleTextarea1">Mô tả ngắn</label>
<textarea name="description" class="form-control" placeholder="Mô tả ngắn gọn" rows="4"><?= set_value('description'); ?></textarea>
</div>
<div class="form-group">
<label for="exampleInputUsername1">Link</label>
<input type="text" name="link" value="<?= set_value('link'); ?>" class="form-control" placeholder="Nhập link liên kết">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('link'); ?></span>
</div>
<div class="form-group">
<label for="exampleInputUsername1">Thứ tự</label>
<input type="text" name="is_order" value="<?= set_value('is_order'); ?>" class="form-control" placeholder="Thứ tự hiển thị">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('is_order'); ?></span>
</div>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
<a href="<?= admin_url('gallery?group='.$gid) ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Tùy chọn khác</h4>

<div class="form-group">
<label for="exampleFormControlSelect3">Trạng thái</label>
<select name="status" class="form-control form-control-sm" id="">
<?php echo yes_no(1); ?>
</select>
</div>
<div class="form-group">
<label>Hình ảnh</label>
<div class="input-group col-xs-12">
<input type="text" name="image" id="xFilePath" class="form-control file-upload-info" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-primary" id="" onclick="browseServer()" type="button">Chọn ảnh</button>
</span>
</div>
<div class="col-xs-12">
	<img src="" id="imgreview" style="width: 100%; padding-top: 10px">
</div>
</div>
</div>
</div>
</div>
</div>
</form>