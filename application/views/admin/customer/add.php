<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
<li class="breadcrumb-item"><a href="<?= admin_url('customer'); ?>">Khách hàng</a></li>
<li class="breadcrumb-item active" aria-current="page">Thêm mới khách hàng </li>
</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
<div class="col-md-8 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Nhập thông tin để thêm tài khoản</h4>
<div class="form-group" style="text-align: right;">
<a href="<?= admin_url('customer') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
</div>
<div class="form-group">
<label for="">Họ tên</label>
<input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control" placeholder="Nhập họ và tên">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
</div>
<div class="form-group">
<label for="">Tên tài khoản (Email)</label>
<input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Nhập tên tài khoản">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('email'); ?></span>
</div>
<div class="form-group">
<label for="">Mật khẩu</label>
<input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control" placeholder="Nhập mật khẩu">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('password'); ?></span>
</div>
<div class="form-group">
<label for="">Nhập lại mật khẩu</label>
<input type="password" name="repassword" value="<?= set_value('repassword'); ?>" class="form-control" placeholder="Nhập lại mật khẩu">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('repassword'); ?></span>
</div>
<div class="form-group">
<label for="">Số điện thoại</label>
<input type="text" name="phone" value="<?= set_value('phone'); ?>" class="form-control" placeholder="Nhập số điện thoại">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('phone'); ?></span>
</div>
<div class="form-group">
<label for="">Địa chỉ</label>
<input type="text" name="address" value="<?= set_value('address'); ?>" class="form-control" placeholder="Nhập địa chỉ">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('address'); ?></span>
</div>

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
<label for="">Giới tính</label>
<select name="sex" class="form-control">
	<option value="0">Nam</option>
	<option value="1">Nữ</option>
</select>
</div>

<div class="form-group">
<label for="">Ngày sinh</label>
<input type="text" name="birthday" value="<?= set_value('birthday'); ?>" class="form-control" placeholder="15/07/1989">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('birthday'); ?></span>
</div>

<div class="form-group">
<label>Ảnh đại diện</label>
<div class="input-group col-xs-12">
<input type="text" name="image_name" value="<?= set_value('image_name') ?>" id="xFilePath" class="form-control file-upload-info" placeholder="Upload Image">
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