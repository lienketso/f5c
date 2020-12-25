<div class="form-group opensetting">
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Rich Snippet</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
			<div class="form-group">
				<label for="exampleInputUsername1">Thẻ meta title</label>
				<input type="text" name="site_title" value="<?= $this->postmeta_model->getSeometa('meta_title',$info->id); ?>" class="form-control title-change" id=""  placeholder="Thẻ tiêu đề website">
			</div>
			<div class="form-group">
				<label for="exampleInputUsername1">Thẻ meta keyword</label>
				<input type="text" name="meta_keyword" value="<?= $this->postmeta_model->getSeometa('meta_keyword',$info->id); ?>" class="form-control" id=""  placeholder="Thẻ từ khóa cách nhau bởi dấu ,">
			</div>
			<div class="form-group">
				<label for="exampleInputUsername1">Thẻ meta description</label>
				<textarea name="meta_description" placeholder="Thẻ mô tả danh mục" class="form-control meta-desc" id="" rows="4"><?= $this->postmeta_model->getSeometa('meta_description',$info->id); ?></textarea>
			</div>
		</div>


	</div>
</div>