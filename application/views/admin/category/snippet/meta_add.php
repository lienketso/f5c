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
				<input type="text" name="site_title" value="<?= set_value('site_title'); ?>" class="form-control title-change" id=""  placeholder="Thẻ tiêu đề website">
			</div>
			<div class="form-group">
				<label for="">Thẻ meta keyword</label>
				<input type="text" name="meta_key" value="<?= set_value('meta_key'); ?>" class="form-control" id=""  placeholder="Thẻ từ khóa cách nhau bởi dấu ,">
			</div>
			<div class="form-group">
				<label for="">Thẻ meta description</label>
				<textarea name="meta_desc" placeholder="Thẻ mô tả danh mục" class="form-control meta-desc" id="" rows="4"><?= set_value('meta_desc'); ?></textarea>
			</div>
		</div>
		<div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
			<div class="form-group">
				<label for="exampleInputUsername1">Facebook title (og:title)</label>
				<input type="text" name="og_title" value="<?= set_value('og_title'); ?>" class="form-control title-change" id=""  placeholder="Thẻ tiêu đề Facebook">
			</div>
			<div class="form-group">
				<label>Facebook image (og:image)</label>
				<div class="input-group col-xs-12">
					<input type="text" name="og_image" id="xFilePathFb" class="form-control file-upload-info" placeholder="Upload Image">
					<span class="input-group-append">
						<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('xFilePathFb')" type="button">Chọn ảnh</button>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputUsername1">Facebook description (og:description)</label>
				<textarea name="og_description" class="form-control meta-desc" id="" placeholder="Thẻ mô tả danh mục trên facebook" rows="4"><?= set_value('og_description'); ?></textarea>
			</div>
		</div>
		<div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Google index Link</label>
				<div class="col-sm-4">
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="index_link" id="" value="index" checked>
							Cho phép index
						</label>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="index_link" id="" value="noindex">
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
							<input type="radio" class="form-check-input" name="follow_link" id="" value="dofollow" checked>
							Link dofollow
						</label>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="follow_link" id="" value="nofollow">
							Link nofollow
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputUsername1">Tiêu đề breadcrumb</label>
				<input type="text" name="breadcrumb" value="<?= set_value('breadcrumb'); ?>" class="form-control title-change" id=""  placeholder="Hiển thị tên trong breadcrumb">
			</div>
			<div class="form-group">
				<label for="exampleInputUsername1">Canonical Url</label>
				<input type="text" name="canonical" value="<?= set_value('canonical'); ?>" class="form-control" id=""  placeholder="">
			</div>
		</div>
	</div>
</div>