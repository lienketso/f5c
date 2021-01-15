<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
<li class="breadcrumb-item"><a href="<?= admin_url('support'); ?>">Nhân viên hỗ trợ</a></li>
<li class="breadcrumb-item active" aria-current="page">Thêm mới  </li>
</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
<div class="col-md-8 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Nhập thông tin để thêm mới nhân viên hỗ trợ</h4>
<div class="form-group" style="text-align: right;">
<a href="<?= admin_url('support') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
</div>
<div class="form-group">
<label for="">Họ tên </label>
<input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control" placeholder="Nhập tiêu đề">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
</div>

<div class="form-group">
<label for="">Mobile</label>
<input type="text" name="phone" value="<?= set_value('phone'); ?>" class="form-control" placeholder="Số di động">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('phone'); ?></span>
</div>
<div class="form-group">
<label for="">Điện thoại</label>
<input type="text" name="mobile" value="<?= set_value('mobile'); ?>" class="form-control" placeholder="Số máy khác">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('mobile'); ?></span>
</div>
<div class="form-group">
<label for="">Email</label>
<input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Địac chỉ email">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('email'); ?></span>
</div>
<div class="form-group">
<label for="">Số zalo</label>
<input type="text" name="yahoo" value="<?= set_value('yahoo'); ?>" class="form-control" placeholder="Nhập số điện thoại sử dụng zalo">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('yahoo'); ?></span>
</div>
<div class="form-group">
<label for="">Nick facebook</label>
<input type="text" name="skype" value="<?= set_value('skype'); ?>" class="form-control" placeholder="Nhập tên nick facebook">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('skype'); ?></span>
</div>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
<a href="<?= admin_url('support') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
</div>
</div>
</div>
<div class="col-md-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Tùy chọn khác</h4>

<div class="form-group">
<label for="">Thuộc nhóm hỗ trợ</label>
<select name="group_id" class="form-control form-control-sm" id="">
	<?php foreach($listGroup as $row): ?>
	<option value="<?= $row->id ?>"><?= $row->name; ?></option>
	<?php endforeach; ?>

</select>
</div>
<div class="form-group">
<label for="">Thứ tự</label>
<input type="number" min="0" name="sort_order" value="<?= set_value('sort_order'); ?>" class="form-control" placeholder="Thứ tự hiển thị">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('sort_order'); ?></span>
</div>

</div>
</div>
</div>
</div>
</form>