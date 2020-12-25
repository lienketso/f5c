<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item"><a href="<?= admin_url('city'); ?>">Danh mục</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sửa thành phố</li>
	</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin để sửa</h4>
					<div class="form-group" style="text-align: right;">
						<a href="<?= admin_url('city') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="form-group">
						<label for="">Tên thành phố</label>
						<input type="text" name="name" value="<?= $info->name; ?>" class="form-control" id="" placeholder="Nhập tên thành phố">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
					</div>

					<div class="form-group">
						<label for="">Kinh độ ( Latitude )</label>
						<input type="text" name="latitude" value="<?= $info->latitude; ?>" class="form-control" id="">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('latitude'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Vĩ độ ( Longitude )</label>
						<input type="text" name="longitude" value="<?= $info->longitude; ?>" class="form-control" id="">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('longitude'); ?></span>
					</div>
				
					<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					<a href="<?= admin_url('city') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tùy chọn khác</h4>
					
					<div class="form-group">
						<label for="">Thứ tự</label>
						<input type="number" name="is_order" value="<?= $info->is_order; ?>" class="form-control" id="" placeholder="Thứ tự hiển thị">
					</div>
				
					<div class="form-group">
						<label for="">Trạng thái</label>
						<select name="status" class="form-control form-control-sm" id="exampleFormControlSelect4">
							<?php echo yes_no($info->status); ?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>