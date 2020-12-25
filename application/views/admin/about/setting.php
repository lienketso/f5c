<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item active" aria-current="page">Cấu hình chung </li>
	</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin cấu hình</h4>
					<div class="form-group" style="text-align: right;">

						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>

					<div class="form-group">
						<label for="">Tiêu đề trang </label>
						<input type="text" name="about_title_<?= $lang ?>" value="<?= $arrSetting['about_title_'.$lang] ?>" class="form-control" placeholder="Nhập tiêu đề">
						<span id="" class="error mt-2 text-danger" for=""></span>
					</div>

					<div class="form-group">
						<label>Upload tài liệu</label>
						<div class="input-group col-xs-12">
							<input type="text" value="<?= $arrSetting['about_file_'.$lang] ?>" name="about_file_<?= $lang ?>" id="aboutFile" class="form-control file-upload-info" placeholder="Upload Image">
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('aboutFile')" type="button">Chọn ảnh</button>
							</span>
						</div>

					</div>
					
					<div class="form-group">
						<label for="">Nội dung</label>	
						<div id="">
							<textarea name="about_content_<?= $lang ?>" class="makeMeRichTextarea" id="edtone"><?= $arrSetting['about_content_'.$lang] ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="">Iframe video</label>	
						<div id="">
							<textarea name="about_iframe_<?= $lang ?>" class="form-control" rows="4" id=""><?= $arrSetting['about_iframe_'.$lang] ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="">Tiêu đề 2 </label>
						<input type="text" name="about_title_2_<?= $lang ?>" value="<?= $arrSetting['about_title_2_'.$lang] ?>" class="form-control" placeholder="Mục tiêu tổng quát của hiệp hội thanh hóa">
						<span id="" class="error mt-2 text-danger" for=""></span>
					</div>

					<div class="form-group">
						<label>Ảnh nền 2</label>
						<div class="input-group col-xs-12">
							<input type="text" value="<?= $arrSetting['bg_about_2_'.$lang] ?>" name="bg_about_2_<?= $lang ?>" id="bgNenHai" class="form-control file-upload-info" placeholder="Upload Image">
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('bgNenHai')" type="button">Chọn ảnh</button>
							</span>
						</div>

					</div>

					<div class="form-group">
						<label for="">Tiêu đề 3 </label>
						<input type="text" name="about_title_3_<?= $lang ?>" value="<?= $arrSetting['about_title_3_'.$lang] ?>" class="form-control" placeholder="Lĩnh vực hoạt động">
						<span id="" class="error mt-2 text-danger" for=""></span>
					</div>

					<div class="form-group">
						<label>Ảnh nền 3</label>
						<div class="input-group col-xs-12">
							<input type="text" value="<?= $arrSetting['bg_about_3_'.$lang] ?>" name="bg_about_3_<?= $lang ?>" id="bgNenBa" class="form-control file-upload-info" placeholder="Upload Image">
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('bgNenBa')" type="button">Chọn ảnh</button>
							</span>
						</div>
					</div>

					<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
				</div>
			</div>
		</div>

	</div>
</form>

