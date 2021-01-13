<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
<li class="breadcrumb-item"><a href="<?= admin_url('support_group'); ?>">nhóm hỗ trợ</a></li>
<li class="breadcrumb-item active" aria-current="page">Sửa nhóm hỗ trợ </li>
</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Nhập thông tin để thêm nhóm</h4>
<div class="form-group" style="text-align: right;">
<a href="<?= admin_url('support_group') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
</div>
<div class="form-group">
<label for="exampleInputUsername1">Tiêu đề </label>
<input type="text" name="name" value="<?= $info->name; ?>" class="form-control" placeholder="Nhập tiêu đề">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
</div>


<div class="form-group">
<label for="exampleInputUsername1">Thứ tự</label>
<input type="number" min="0" name="sort_order" value="<?= $info->sort_order; ?>" class="form-control" placeholder="Thứ tự hiển thị">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('sort_order'); ?></span>
</div>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
<a href="<?= admin_url('support_group') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
</div>
</div>
</div>

</div>
</form>