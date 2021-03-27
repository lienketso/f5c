<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item"><a href="<?= admin_url('product'); ?>">Sản phẩm </a></li>
		<li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
	</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin để sửa sản phẩm</h4>
					<div class="form-group" style="text-align: right;">
						<a href="<?= admin_url('product') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="form-group">
						<label for="">Tên sản phẩm (*)</label>
						<input type="text" name="name" value="<?= $info->name; ?>" class="form-control" id="input_name" onkeyup="return ChangeToSlug();" placeholder="Nhập tiêu đề">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" name="friendly_url" value="<?= $info->friendly_url; ?>" class="form-control" id="input_slug" placeholder="Đường dẫn tĩnh">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('friendly_url'); ?></span>
					</div>

					<div class="form-group">
						<label for="">Giá bán (đ)</label>
						<input type="text" name="price" value="<?= number_format($info->price); ?>" onkeyup="this.value=FormatNumber(this.value);" class="form-control" id=""  placeholder="Giá sử dụng để giao dịch">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('price'); ?></span>
					</div>

					<div class="form-group">
						<label for="">Giá thị trường (đ)</label>
						<input type="text" name="price_other" value="<?= number_format($info->price_other); ?>" onkeyup="this.value=FormatNumber(this.value);" class="form-control" id=""  placeholder="Giá thị trường để so sánh">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('price_other'); ?></span>
					</div>

					<div class="form-group">
						<label for="">VAT ( Thuế giá trị gia tăng )</label>
						<input type="number" min="0" max="30" name="vat" value="<?= $info->vat; ?>" class="form-control" placeholder="Không điền nếu đã bao gồm VAT">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('vat'); ?></span>
					</div>

					<div class="form-group">
						<label for="">Thông số</label>
						<textarea name="options_cat" class="makeMeRichTextarea" id="metadesc" placeholder="Thông số" onkeyup="keyupMeta()" rows="4"><?= $info->options_cat; ?></textarea>
					</div>

					<div class="form-group">
						<label for="">Nội dung sản phẩm</label>	
						<div id="">
							<textarea name="content" class="makeMeRichTextarea" id="edtone"><?= str_replace('{base_url}','https://f5c.vn/',html_entity_decode ($info->content)); ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="">Tags</label>
						<input type="text" name="tags" value="<?= set_value('tags'); ?>" class="form-control" placeholder="Nhập từ khóa cách nhau bởi dấu ,">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('tags'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Phụ kiện kèm theo</label>
						<select id="slectPK" data-url="<?= admin_url('product/selectpk') ?>" class="js-example-basic-multiple form-control" name="products[]" multiple="multiple">
							<?php foreach($list_kemtheo as $row): ?>
							<option value="<?= $row->id ?>" selected><?= $row->name; ?></option>
							<?php endforeach; ?>
						</select>
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('products'); ?></span>
					</div>
					<p class="card-description">
						<code><i class="ti-settings"></i> Cấu hình Seo (Rich Snippet)</code> 
						<button type="button" id="onset" class="btn btn-primary btn-sm"><i class="ti-eye"></i> Hiện cấu hình</button>
						<button type="button" id="offset" class="btn btn-dark btn-sm"><i class="ti-import"></i> Ẩn</button>
					</p>
					<!-- Rich snippet -->
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
									<input type="text" name="site_title" value="<?= $info->site_title; ?>" class="form-control title-change" id=""  placeholder="Thẻ tiêu đề website">
								</div>
								<div class="form-group">
									<label for="">Thẻ meta keyword</label>
									<input type="text" name="meta_key" value="<?= $info->meta_key; ?>" class="form-control" id=""  placeholder="Thẻ từ khóa cách nhau bởi dấu ,">
								</div>
								<div class="form-group">
									<label for="">Thẻ meta description</label>
									<textarea name="meta_desc" placeholder="Thẻ mô tả danh mục" class="form-control meta-desc" id="" rows="4"><?= $info->meta_desc; ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<!-- End Rich snippet -->
					<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					<a href="<?= admin_url('product') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tùy chọn khác</h4>
					<div class="form-group">
						<label for="">Bảo hành ( Tháng )</label>
						<input type="number" min="1" max="84" name="warranty" value="<?= $info->warranty; ?>" class="form-control" min="0" max="5" placeholder="Nhập số tháng bảo hành">
					</div>
					<div class="form-group">
						<label for="">Thứ tự</label>
						<input type="number"  name="sort_order" value="<?= $info->sort_order; ?>" class="form-control" min="0" max="99"  placeholder="Thứ tự ưu tiên">
					</div>

					<div class="form-group">
						<label for="">Thuộc danh mục</label>
						<select name="cat_id" class="form-control js-example-basic-single">
							<option value="0">--Chọn danh mục--</option>
							<?php $this->category_model->optionCategory(0,1,4,$info->cat_id,0); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Hãng sản xuất</label>
						<select name="manufac_id" class="form-control">
							<option value="0">--Chọn hãng--</option>
							<?php $this->manufac_model->optionManufac($info->manufac_id); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Xuất xứ</label>
						<select name="model" class="form-control">
							<option value="0">--Chọn xuất xứ--</option>
							<?php foreach($listCountries as $row): ?>
								<option value="<?= $row->name; ?>" <?= ($row->name==$info->name) ? 'selected' : '' ?> ><?= $row->name; ?></option>
							<?php endforeach; ?>
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
					<div class="form-group">
						<label for="">Tiêu đề thẻ Alt</label>
						<input type="text" name="alt_image" value="<?= $info->alt_image; ?>" class="form-control"  placeholder="Thẻ alt cho ảnh đại diện">
					</div>

					<div class="form-group">
						<label>Ảnh đính kèm</label>
						<div class="input-group col-xs-12">
							<button type="button" class="form-control" id="addImgList">+ Thêm ảnh</button>
						</div>
					</div>

					<div class="listImage" id="listImage">
						<?php if(!empty($imgAttach )): ?>
							<?php foreach($imgAttach as $key=>$val): ?>
						<div class="form-group" id="liste<?= $val->id; ?>">
							<label></label>
							<div class="input-group col-xs-12">
								<input type="text" value="<?= $val->file_name; ?>" name="image_list[]" id="e<?= $val->id ?>" class="form-control file-upload-info" placeholder="Upload Image">
								<span class="input-group-append">
									<button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('<?= 'e'.$val->id ?>')" type="button">Chọn</button>
								</span>
								<button type="button" class="btn-del btn_remove_e" id="<?= $val->id; ?>">X</button>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>

					</div>


				</div>
			</div>
		</div>
	</div>
</form>