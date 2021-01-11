<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>

<li class="breadcrumb-item"><a href="<?= admin_url('ads_banner?location='.$gid); ?>">Banner</a></li>
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
<a href="<?= admin_url('ads_banner?location='.$gid) ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
</div>


<div class="form-group">
<label for="">Link</label>
<input type="text" name="url" value="<?= $info->url; ?>" class="form-control" placeholder="Nhập link liên kết">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('url'); ?></span>
</div>
<div class="form-group">
<label for="">Thứ tự</label>
<input type="text" name="sort_order" value="<?= $info->sort_order; ?>" class="form-control" placeholder="Thứ tự hiển thị">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('sort_order'); ?></span>
</div>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
<a href="<?= admin_url('ads_banner?location='.$gid) ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Tùy chọn khác</h4>

<div class="form-group">
<label for="exampleFormControlSelect3">Vị trí quảng cáo</label>
<select name="ads_location_id" class="form-control form-control-sm" id="">
	<option value="0">---Chọn vị trí---</option>
	<?php foreach($listLocation as $row): ?>
	<option value="<?= $row->id; ?>" <?= ($row->id==$info->ads_location_id) ? 'selected' : ''; ?> ><?= $row->name; ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label>Hình ảnh</label>
<div class="input-group col-xs-12">
<input type="text" name="image_name" value="<?= $info->image_name; ?>" id="xFilePath" class="form-control file-upload-info" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-primary" id="" onclick="browseServer()" type="button">Chọn ảnh</button>
</span>
</div>
<div class="col-xs-12">
	<img src="<?= product_link($info->image_name) ?>" id="imgreview" style="width: 100%; padding-top: 10px">
</div>
</div>
</div>
</div>
</div>
</div>
</form>