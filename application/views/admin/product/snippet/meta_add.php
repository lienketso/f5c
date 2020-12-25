<div class="form-group opensetting">
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Rich Snippet</a>
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

	
	</div>
</div>