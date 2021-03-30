<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item"><a href="<?= admin_url('product'); ?>">Sản phẩm </a></li>
		<li class="breadcrumb-item active" aria-current="page">Thêm mới sản phẩm</li>
	</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
	<?php if(!empty($this->session->flashdata('exist'))):?>
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('exist');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <?php endif;?>
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin để thêm sản phẩm</h4>
					<div class="form-group" style="text-align: right;">
						<a href="<?= admin_url('product') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="form-group">
						<label for="">Tên sản phẩm (*)</label>
						<input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control" id="input_name" onkeyup="return ChangeToSlug();" placeholder="Nhập tiêu đề">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" name="friendly_url" value="<?= set_value('friendly_url'); ?>" class="form-control" id="input_slug" placeholder="Đường dẫn tĩnh">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('friendly_url'); ?></span>
					</div>

					<div class="form-group">
						<label for="">Giá bán (đ)</label>
						<input type="text" name="price" value="<?= set_value('price'); ?>" onkeyup="this.value=FormatNumber(this.value);" class="form-control" id=""  placeholder="Giá sử dụng để giao dịch">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('price'); ?></span>
					</div>

					<div class="form-group">
						<label for="">Giá thị trường (đ)</label>
						<input type="text" name="price_other" value="<?= set_value('price_other'); ?>" onkeyup="this.value=FormatNumber(this.value);" class="form-control" id=""  placeholder="Giá thị trường để so sánh">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('price_other'); ?></span>
					</div>

					<div class="form-group">
						<label for="">VAT ( Thuế giá trị gia tăng )</label>
						<input type="number" min="0" max="30" name="vat" value="<?= set_value('vat'); ?>" class="form-control" placeholder="Không điền nếu đã bao gồm VAT">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('vat'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Hiện VAT</label>
						<select name="show_vat" class="form-control ">
							<option value="1">--Có--</option>
							<option value="0">--Không--</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Thông số</label>
						<textarea name="options_cat" class="makeMeRichTextarea" id="metadesc" placeholder="Thông số" onkeyup="keyupMeta()" rows="4"><?= set_value('options_cat'); ?></textarea>
					</div>
					
					<div class="form-group">
						<label for="">Nội dung sản phẩm</label>	
						<div id="">
							<textarea name="content" class="makeMeRichTextarea" id="edtone"><?= set_value('content'); ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="">Tags</label>
						<input type="text" name="tags" value="<?= set_value('tags'); ?>" class="form-control" placeholder="Nhập từ khóa cách nhau bởi dấu ,">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('tags'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Phụ kiện kèm theo</label>
						<select id="slectPK" data-url="<?= admin_url('product/selectpk') ?>" class="form-control js-example-basic-multiple" name="products[]" multiple="multiple">

						</select>
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('products'); ?></span>
					</div>
					<p class="card-description">
						<code><i class="ti-settings"></i> Cấu hình Seo (Rich Snippet)</code> 
						<button type="button" id="onset" class="btn btn-primary btn-sm"><i class="ti-eye"></i> Hiện cấu hình</button>
						<button type="button" id="offset" class="btn btn-dark btn-sm"><i class="ti-import"></i> Ẩn</button>
					</p>
					<!-- Rich snippet -->
					<?php $this->load->view('admin/product/snippet/meta_add'); ?>
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
						<input type="number" min="1" max="84" name="warranty" value="<?= set_value('warranty'); ?>" class="form-control" min="0" max="5" placeholder="Nhập số tháng bảo hành">
					</div>
					<div class="form-group">
						<label for="">Thứ tự</label>
						<input type="number"  name="sort_order" value="<?= set_value('sort_order'); ?>" class="form-control" min="0" max="99"  placeholder="Thứ tự ưu tiên">
					</div>
					
					<div class="form-group">
						<label for="">Thuộc danh mục</label>
						<select name="cat_id" class="form-control js-example-basic-single">
							<option value="0">--Chọn danh mục--</option>
							<?php $this->category_model->optionCategory(0,1,4,0,0); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Hãng sản xuất</label>
						<select name="manufac_id" class="form-control">
							<option value="0">--Chọn hãng--</option>
							<?php $this->manufac_model->optionManufac(0); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Xuất xứ</label>
						<select name="model" class="form-control">
							<option value="0">--Chọn xuất xứ--</option>
							<?php $this->countries_model->optionCountries(0); ?>
						</select>
					</div>

					<div class="form-group">
						<label>Hình ảnh</label>
						<div class="input-group col-xs-12">
							<input type="text" name="image_name" value="<?= set_value('image_name'); ?>" id="xFilePath" class="form-control file-upload-info" placeholder="Upload Image">
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
						<input type="text" name="alt_image" value="<?= set_value('alt_image'); ?>" class="form-control"  placeholder="Thẻ alt cho ảnh đại diện">
					</div>

					<div class="form-group">
						<label>Ảnh đính kèm</label>
						<div class="input-group col-xs-12">
							<button type="button" class="form-control" id="addImgList">+ Thêm ảnh</button>
						</div>
					</div>

					<div class="listImage" id="listImage">

					</div>


				</div>
			</div>
		</div>
	</div>
</form>