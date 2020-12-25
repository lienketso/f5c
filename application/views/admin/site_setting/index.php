<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item active" aria-current="page">Cấu hình chung </li>
	</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin cấu hình</h4>
					<div class="form-group" style="text-align: right;">
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="form-group">
						<label for="">Tiêu đề website</label>
						<input type="text" name="site_title_<?= $lang ?>" value="<?= $arrSetting['site_title_'.$lang]; ?>" class="form-control" placeholder="Nhập tiêu đề">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('site_title_'.$lang); ?></span>
					</div>
					<!-- <div class="form-group">
						<label for="">Điện thoại liên hệ</label>
						<input type="text" name="site_phone_<?= $lang ?>" value="<?= $arrSetting['site_phone_'.$lang]; ?>" class="form-control" placeholder="Số điện thoại liên hệ">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('site_phone_'.$lang); ?></span>
					</div> -->
					<div class="form-group">
						<label for="">Hotline</label>
						<input type="text" name="site_hotline_<?= $lang ?>" value="<?= $arrSetting['site_hotline_'.$lang]; ?>" class="form-control" id="" placeholder="Số hotline">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('site_hotline_'.$lang); ?></span>
					</div>
				
				
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="site_email_<?= $lang ?>" value="<?= $arrSetting['site_email_'.$lang]; ?>" class="form-control" id="" placeholder="Địa chỉ email">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('site_email_'.$lang); ?></span>
					</div>
					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input type="text" name="site_address_<?= $lang ?>" value="<?= $arrSetting['site_address_'.$lang]; ?>" class="form-control" id="" placeholder="Địa chỉ, trụ sở...">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('site_address_'.$lang); ?></span>
					</div>
					<div class="form-group">
						<label for="">Fanpage facebook</label>
						<input type="text" name="site_fanpage" value="<?= $arrSetting['site_fanpage']; ?>" class="form-control" id="" placeholder="Link fanpage facebook">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('site_fanpage'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Link G+</label>
						<input type="text" name="site_insta" value="<?= $arrSetting['site_insta']; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Link twitter</label>
						<input type="text" name="site_twitter" value="<?= $arrSetting['site_twitter']; ?>" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="">Thông tin chân trang</label>	
						<div id="">
							<textarea name="site_footer_<?= $lang ?>" class="makeMeRichTextarea" id="edtone"><?= $arrSetting['site_footer_'.$lang]; ?></textarea>
						</div>
					</div>
		<!-- 			<div class="form-group">
						<label for="">Địa chỉ chân trang</label>	
						<div id="">
							<textarea name="banner_title_1_<?= $lang ?>" class="makeMeRichTextarea" id="edthee"><?= $arrSetting['banner_title_1_'.$lang]; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="">Thông tin form liên hệ</label>	
						<div id="">
							<textarea name="site_footer_contact_<?= $lang ?>" class="makeMeRichTextarea" id="edtwo"><?= $arrSetting['site_footer_contact_'.$lang]; ?></textarea>
						</div>
					</div> -->
					<div class="form-group">
						<label for="">Copyright</label>
						<input type="text" name="copyright_<?= $lang ?>" value="<?= $arrSetting['copyright_'.$lang]; ?>" class="form-control" id="">
					</div>
					<div class="form-group">
						<label for="">Iframe map</label>	
						<div id="">
							<textarea rows="4" name="site_gogle_map" class="form-control" id=""><?= $arrSetting['site_gogle_map']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="">Mã Google Analytic</label>	
						<div id="">
							<textarea rows="4" name="site_analytic" class="form-control" id=""><?= $arrSetting['site_analytic']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="">Mã Pixel</label>	
						<div id="">
							<textarea rows="4" name="site_pixel" class="form-control" id=""><?= $arrSetting['site_pixel']; ?></textarea>
						</div>
					</div>
					<p class="card-description">
						<code><i class="ti-settings"></i> Cấu hình Seo (Rich Snippet)</code> 
						<button type="button" id="onset" class="btn btn-primary btn-sm"><i class="ti-eye"></i> Hiện cấu hình</button>
						<button type="button" id="offset" class="btn btn-dark btn-sm"><i class="ti-import"></i> Ẩn</button>
					</p>
					<div class="form-group opensetting">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Rich Snippet</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" aria-selected="false">Mạng xã hội</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact-1" aria-selected="false">Nâng cao</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
								<div class="form-group">
									<label for="">Thẻ meta title</label>
									<input type="text" name="meta_title_<?= $lang ?>" value="<?= $arrSetting['meta_title_'.$lang]; ?>" class="form-control title-change" id=""  placeholder="Thẻ tiêu đề website">
								</div>
								<div class="form-group">
									<label for="">Thẻ meta keyword</label>
									<input type="text" name="meta_keyword_<?= $lang ?>" value="<?= $arrSetting['meta_keyword_'.$lang]; ?>" class="form-control" id=""  placeholder="Thẻ từ khóa cách nhau bởi dấu ,">
								</div>
								<div class="form-group">
									<label for="">Thẻ meta description</label>
									<textarea name="meta_description_<?= $lang ?>" placeholder="Thẻ mô tả danh mục" class="form-control meta-desc" id="" rows="4"><?= $arrSetting['meta_description_'.$lang]; ?></textarea>
								</div>
							</div>
							<div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="form-group">
									<label for="">Facebook title (og:title)</label>
									<input type="text" name="og_title_<?= $lang ?>" value="<?= $arrSetting['og_title_'.$lang]; ?>" class="form-control title-change" id=""  placeholder="Thẻ tiêu đề Facebook">
								</div>
								<div class="form-group">
									<label for="exampleInputUsername1">Facebook description (og:description)</label>
									<textarea name="og_description_<?= $lang ?>" class="form-control meta-desc" id="" placeholder="Thẻ mô tả website trên facebook" rows="4"><?= $arrSetting['og_description_'.$lang]; ?></textarea>
								</div>
								<div class="form-group">
									<label>Facebook image (og:image)</label>
									<div class="input-group col-xs-12">
										<input type="text" value="<?= $arrSetting['og_image']; ?>" name="og_image" id="ogImage" class="form-control file-upload-info" placeholder="Upload Image">
										<span class="input-group-append">
											<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('ogImage')" type="button">Chọn ảnh</button>
										</span>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Google index Link</label>
									<div class="col-sm-4">
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="index_link" id="" value="index" <?= ($arrSetting['index_link'] == 'index')  ? 'checked' : '' ; ?> >
												Cho phép index
											</label>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="index_link" id="" value="noindex" <?= ($arrSetting['index_link'] == 'noindex')  ? 'checked' : '' ; ?> >
												Không index
											</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Google (Follow)</label>
									<div class="col-sm-4">
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="follow_link" id="" value="dofollow" <?= ($arrSetting['follow_link'] == 'dofollow')  ? 'checked' : '' ; ?> >
												Link dofollow
											</label>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="follow_link" id="" value="nofollow" <?= ($arrSetting['follow_link'] == 'nofollow')  ? 'checked' : '' ; ?> >
												Link nofollow
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="">Tiêu đề breadcrumb</label>
									<input type="text" name="breadcrumb" value="<?= $arrSetting['breadcrumb']; ?>" class="form-control title-change" id=""  placeholder="Hiển thị tên trong breadcrumb">
								</div>
								<div class="form-group">
									<label for="">Canonical Url</label>
									<input type="text" name="canonical" value="<?= $arrSetting['canonical']; ?>" class="form-control" id=""  placeholder="">
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
				</div>
			</div>
		</div>
		<div class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tùy chọn khác</h4>
					<div class="form-group">
						<label>Logo Header</label>
						<div class="input-group col-xs-12">
							<input type="text" value="<?= $arrSetting['logo_header']; ?>" name="logo_header" id="xFilePath" class="form-control file-upload-info" placeholder="Upload Image">
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('xFilePath')" type="button">Chọn ảnh</button>
							</span>
						</div>
						<div class="col-xs-12">
							<img src="<?= $arrSetting['logo_header']; ?>" id="imgreview1" style="width: 100%; padding-top: 10px">
						</div>
					</div>
					<div class="form-group">
						<label>Logo chân trang</label>
						<div class="input-group col-xs-12">
							<input type="text" name="logo_footer" value="<?= $arrSetting['logo_footer']; ?>" id="xFilePath2" class="form-control file-upload-info" placeholder="Upload Image">
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('xFilePath2')" type="button">Chọn ảnh</button>
							</span>
						</div>
						<div class="col-xs-12">
							<img src="<?= $arrSetting['logo_footer']; ?>" id="imgreview2" style="width: 100%; padding-top: 10px">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>