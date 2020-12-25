<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item"><a href="<?= admin_url('manufac'); ?>">Hãng sản xuất</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sửa hãng sản xuất </li>
	</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin để thêm hãng</h4>
					<div class="form-group" style="text-align: right;">
						<a href="<?= admin_url('manufac') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="form-group">
						<label for="">Tên hãng</label>
						<input type="text" name="name" value="<?= $info->name; ?>" class="form-control" placeholder="Nhập tên hãng sản xuất">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Thông tin</label>
						<textarea name="info" class="form-control" placeholder="Thông tin hãng" rows="4"><?= $info->info; ?></textarea>
					</div>

					
					<div class="form-group">
						<label for="">Meta title</label>
						<input type="text" name="site_title" value="<?= $info->site_title; ?>" class="form-control" placeholder="Thẻ meta title">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('site_title'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Meta description</label>
						<textarea name="meta_desc" class="form-control" placeholder="Thẻ meta description" rows="4"><?= $info->meta_desc; ?></textarea>
					</div>
					<div class="form-group">
						<label for="">Meta keyword</label>
						<input type="text" name="meta_key" value="<?= $info->meta_key; ?>" class="form-control" placeholder="Thẻ meta keyword">
					</div>
					<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					<a href="<?= admin_url('manufac') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body" >
					<h4 class="card-title">Tùy chọn khác</h4>

					<div class="form-group">
						<label for="">Thuộc tính danh mục</label>
						<div style="height: 300px; overflow: scroll;">
						<?php foreach($allcategory as $cha): ?>
						<div class='form-check'>
							<label class='form-check-label'>
								<input type='checkbox' class='form-check-input' 
								name='cat_id[]' 
								value='<?= $cha->id; ?>'
								<?= (in_array($cha->id, $arrCheck)) ? 'checked' : ''; ?>
								><?= $cha->name; ?>
							</label>
						</div>
						<!-- con 2 -->
						<?php 
							$c['where'] = ['parent_id'=>$cha->id];
							$c['order'] = ['name','asc'];
							$listCon = $this->category_model->get_list($c);
						 ?>
						 <?php if(!empty($listCon)): ?>
						 	<?php foreach($listCon as $con): ?>
						 		<div class='form-check mgleft'>
								<label class='form-check-label'>
								<input type='checkbox' class='form-check-input' 
								name='cat_id[]' 
								value='<?= $con->id; ?>'
								<?= (in_array($con->id, $arrCheck)) ? 'checked' : ''; ?>
								><?= $con->name; ?>
							</label>
						</div>
						<!-- con 3 -->
						<?php 
							$cc['where'] = ['parent_id'=>$con->id];
							$cc['order'] = ['name','asc'];
							$listConCon = $this->category_model->get_list($cc);
						 ?>
						 <?php if(!empty($listConCon)): ?>
						 	<?php foreach($listConCon as $concon): ?>
						 		<div class='form-check mgleft-left'>
								<label class='form-check-label'>
								<input type='checkbox' class='form-check-input' 
								name='cat_id[]' 
								value='<?= $concon->id; ?>'
								<?= (in_array($concon->id, $arrCheck)) ? 'checked' : ''; ?>
								><?= $concon->name; ?>
							</label>
						</div>
						 	<?php endforeach; ?>
						 	<?php endif; ?>
						 	<!-- end con 3 -->

						 	<?php endforeach; ?>
						 	<?php endif; ?>
						 	<!-- end con 2 -->

					<?php endforeach; ?>
				</div>
			</div>
	

			<div class="form-group">
				<label for="">Thứ tự</label>
				<input type="number" min="0" name="sort_order" value="<?= $info->sort_order; ?>" class="form-control" placeholder="Thứ tự hiển thị">
				<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('sort_order'); ?></span>
			</div>
			<div class="form-group">
				<label for="">Hiển thị menu</label>
				<select name="is_menu" class="form-control form-control-sm" id="">
					<?php echo yes_no($info->is_menu); ?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Hiển thị trang chủ</label>
				<select name="show_home" class="form-control form-control-sm" id="">
					<?php echo yes_no($info->show_home); ?>
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
					<img src="" id="imgreview" style="width: 100%; padding-top: 10px">
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</form>