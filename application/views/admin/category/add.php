<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item"><a href="<?= admin_url('category'); ?>">Danh mục</a></li>
		<li class="breadcrumb-item active" aria-current="page">Thêm mới danh mục sản phẩm </li>
	</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin để thêm danh mục</h4>
					<div class="form-group" style="text-align: right;">
						<a href="<?= admin_url('category') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="form-group">
						<label for="">Tiêu đề danh mục</label>
						<input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control" id="input_name" onkeyup="return ChangeToSlug();" placeholder="Nhập tiêu đề">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" name="friendly_url" value="<?= set_value('friendly_url'); ?>" class="form-control" id="input_slug" placeholder="Đường dẫn tĩnh">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('friendly_url'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Mô tả ngắn</label>
						<textarea name="info" class="form-control" id="metadesc" onkeyup="keyupMeta()" rows="4"><?= set_value('info'); ?></textarea>
					</div>
					<div class="form-group">
						<label for="">Hãng sản xuất</label>
						<select class="js-example-basic-multiple form-control" name="manufac[]" multiple="multiple">
							<?php foreach($list_manufac as $row): ?>
								<option value="<?= $row->id ?>" <?= (in_array($row->id,$manuCurrent)) ? 'selected' : '' ?> ><?= $row->name; ?></option>
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
					<?php $this->load->view('admin/category/snippet/meta_add'); ?>
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
							<?php $this->category_model->optionCategory(0,1,4,$cat_parent_id,0); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Thứ tự</label>
						<input type="number" name="sort_order" min="0" value="<?= set_value('sort_order'); ?>" class="form-control" id="" placeholder="Thứ tự hiển thị">
					</div>
					<div class="form-group">
						<label for="">Hiện trang chủ</label>
						<select name="show_home" class="form-control form-control-sm" id="exampleFormControlSelect4">
							<option value="0">--không chọn--</option>
							<option value="1">Trang chủ</option>
						</select>
					</div>
					<div class="form-group">
						<label>Icon</label>
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
							<?php echo yes_no(1); ?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>