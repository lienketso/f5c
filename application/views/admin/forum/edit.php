<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item"><a href="<?= admin_url('forum?type='.$type); ?>">Chủ đề</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sửa chủ đề</li>
	</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin để sửa</h4>
					<div class="form-group" style="text-align: right;">
						<a href="<?= admin_url('forum?type='.$type) ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Tên chủ đề</label>
						<input type="text" name="title" value="<?= $info->title; ?>" class="form-control" id="input_name" onkeyup="return ChangeToSlug();" placeholder="Nhập tiêu đề">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('title'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" name="slug" value="<?=$info->slug; ?>" class="form-control" id="input_slug" placeholder="Đường dẫn tĩnh">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('slug'); ?></span>
					</div>

					<div class="form-group">
						<label for="exampleTextarea1">Mô tả ngắn</label>
						<textarea name="description" class="form-control" id="metadesc" placeholder="Mô tả ngắn gọn bài viết" onkeyup="keyupMeta()" rows="8"><?= $info->description; ?></textarea>
					</div>
					<div class="form-group">
						<label for="">Nội dung chủ đề </label>	
						<div id="">
							<textarea name="content" class="makeMeRichTextarea" id="editone"><?= $info->content; ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="">Tags</label>
						<input type="text" name="tags" value="<?= $info->tags; ?>" class="form-control" placeholder="Nhập từ khóa cách nhau bởi dấu ,">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('tags'); ?></span>
					</div>
					<p class="card-description">
						<code><i class="ti-settings"></i> Cấu hình Seo (Rich Snippet)</code> 
						<button type="button" id="onset" class="btn btn-primary btn-sm"><i class="ti-eye"></i> Hiện cấu hình</button>
						<button type="button" id="offset" class="btn btn-dark btn-sm"><i class="ti-import"></i> Ẩn</button>
					</p> 
					<!-- meta snippet -->
					<?php $this->load->view('admin/news/snipet/meta_edit'); ?>
					<!-- end meta snippet -->
					<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					<a href="<?= admin_url('forum?type='.$type) ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tùy chọn khác</h4>
					<div class="form-group">
						<label for="exampleFormControlSelect3">Danh mục </label>
						<?php foreach($allcategory as $cate): ?>
							<div class='form-check'>
								<label class='form-check-label'>
									<input type='checkbox' class='form-check-input' 
									name='category[]' 
									value='<?= $cate->id; ?>'
									<?= (in_array($cate->id, $arrCheck)) ? 'checked' : ''; ?>
									><?= $cate->name; ?>
								</label>
							</div>
						<?php endforeach; ?>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Ngày post</label>
						<div id="datepicker-popup" class="input-group date datepicker-popup">
							<input type="text" name="created_at" value="<?= datenow(); ?>" class="form-control">
							<span class="input-group-addon input-group-append border-left">
								<span class="mdi mdi-calendar input-group-text"></span>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect3">Vị trí hiển thị</label>
						<select name="display" class="form-control form-control-sm" id="exampleFormControlSelect4">
							<option value="0">--không chọn--</option>
							<option value="1" <?= ($info->display==1) ? 'selected' : '' ?>>Nổi bật</option>
							<option value="2" <?= ($info->display==2) ? 'selected' : '' ?>>Mới</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect3">Trạng thái</label>
						<select name="status" class="form-control form-control-sm" id="exampleFormControlSelect4">
							<?php echo yes_no($info->status); ?>
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
							<img src="<?= $info->image; ?>" id="imgreview" style="width: 100%; padding-top: 10px">
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</form>