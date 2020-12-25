<nav aria-label="breadcrumb">

<ol class="breadcrumb">

<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>

<li class="breadcrumb-item"><a href="<?= admin_url('user'); ?>">Tài khoản</a></li>

<li class="breadcrumb-item active" aria-current="page">Thêm mới tài khoản </li>

</ol>

</nav>

<form class="forms-sample" method="post" action="" enctype="multipart/form-data">

	<div class="row">

<div class="col-md-8 grid-margin stretch-card">

<div class="card">

<div class="card-body">

<h4 class="card-title">Nhập thông tin để thêm tài khoản</h4>

<div class="form-group" style="text-align: right;">

<a href="<?= admin_url('user') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>

</div>

<div class="form-group">

<label for="exampleInputUsername1">Họ tên</label>

<input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control" placeholder="Nhập họ và tên">

<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>

</div>

<div class="form-group">

<label for="exampleInputUsername1">Tên tài khoản</label>

<input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Nhập tên tài khoản">

<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('username'); ?></span>

</div>

<div class="form-group">

<label for="exampleInputUsername1">Mật khẩu</label>

<input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control" placeholder="Nhập mật khẩu">

<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('password'); ?></span>

</div>

<div class="form-group">

<label for="exampleInputUsername1">Nhập lại mật khẩu</label>

<input type="password" name="repassword" value="<?= set_value('repassword'); ?>" class="form-control" placeholder="Nhập lại mật khẩu">

<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('repassword'); ?></span>

</div>

<div class="form-group">

<label for="exampleInputUsername1">Email</label>

<input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Nhập địa chỉ email">

<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('email'); ?></span>

</div>

<div class="form-group">

<label for="exampleInputUsername1">Số điện thoại</label>

<input type="text" name="phone" value="<?= set_value('phone'); ?>" class="form-control" placeholder="Nhập địa chỉ email">

<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('phone'); ?></span>

</div>

<div class="form-group">

<label for="exampleInputUsername1">Địa chỉ</label>

<input type="text" name="address" value="<?= set_value('address'); ?>" class="form-control" placeholder="Nhập địa chỉ email">

<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('address'); ?></span>

</div>



<?php $admin_main = $this->config->item('root_admin'); ?>  

<?php if($admin_main == 6): ?>

<div class="form-group">

	<label for="">Phân quyền tài khoản</label>

	<select class="form-control" name="type">
		<option value="admin">Admin</option>
		<option value="blog">Bài viết</option>
		<option value="product">Bất động sản</option>
	</select>

</div>



<div class="control-group">

<label class="control-label" >Phân quyền</label>

<div class="row">

<?php foreach($config_permission as $controller=>$action) : ?>

<div class="col-md-3">	

<b><?php echo $controller; ?></b>

<?php foreach($action as $actions) : ?>

	<div class="form-check">

		<label class='form-check-label'>

<input type="checkbox" class="form-check-input" name="permission[<?php echo $controller; ?>][]" value="<?php echo $actions; ?>"> <?php echo $actions; ?>

</label>

</div>

<?php endforeach; ?>

</div>

<?php endforeach; ?>

</div>

</div>      

<?php endif; ?>

<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>

<a href="<?= admin_url('user') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>

</div>

</div>

</div>

<div class="col-md-4 grid-margin stretch-card">

<div class="card">

<div class="card-body">

<h4 class="card-title">Tùy chọn khác</h4>

<div class="form-group">

<label for="exampleFormControlSelect3">Trạng thái</label>

<select name="status" class="form-control form-control-sm" id="exampleFormControlSelect4">

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