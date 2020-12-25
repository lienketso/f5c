<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item"><a href="<?= admin_url('menu'); ?>">Menu</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sửa menu</li>
	</ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin để sửa menu</h4>
					<div class="form-group" style="text-align: right;">
						<a href="<?= admin_url('menu') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Loại menu</label>
						<select name="menu_type" class="form-control">
							<option value="">--Chọn loại--</option>
							<option value="category" <?= ($menu->menu_type=='category') ? 'selected' : ''; ?> >Danh mục bài viết</option>
							<option value="product" <?= ($menu->menu_type=='product') ? 'selected' : ''; ?> >Danh mục sản phẩm</option>
							<option value="page" <?= ($menu->menu_type=='page') ? 'selected' : ''; ?> >Trang tĩnh</option>
							<option value="link" <?= ($menu->menu_type=='link') ? 'selected' : ''; ?> >Liên kết khác</option>
						</select>
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('menu_type'); ?></span>
					</div>	
					<div class="node-news">
						<div class="form-group">
							<label for="exampleInputUsername1">Danh mục bài viết</label>
							<select name="catid" id="catid" class="form-control">
								<option value="">--Chọn danh mục--</option>
								<?php if(!empty($listCatnews)): ?>
									<?php foreach($listCatnews as $row): ?>
								<option value="<?= $row->cat_name; ?>" <?= ($row->cat_name==$menu->slug) ? 'selected' : ''; ?> ><?= $row->name; ?></option>
									<?php endforeach; ?>
									<?php endif; ?>
							</select>
							<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('catid'); ?></span>
						</div>	
					</div>

					<div class="node-product">
						<div class="form-group">
							<label for="">Danh mục sản phẩm</label>
							<select name="categoryid" id="categoryid" class="form-control">
								<option value="">--Chọn danh mục--</option>
								<?php $this->category_model->optionMenuCategory(0,1,4,$menu->slug,0); ?>
							</select>
						</div>	
					</div>

					<div class="node-page">
						<div class="form-group">
							<label for="">Trang tĩnh</label>
							<select name="pageid" id="pageid" class="form-control">
								<option value="">--Chọn trang tĩnh--</option>
								<?php if(!empty($listPage)): ?>
									<?php foreach($listPage as $page): ?>
								<option value="<?= $page->slug.'-'.$page->id.'.html'; ?>" <?= ($page->slug==$menu->slug) ? 'selected' : ''; ?> ><?= $page->title; ?></option>
							<?php endforeach; ?>
						<?php endif; ?>
							</select>
							<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('pageid'); ?></span>
						</div>	
					</div>
					<div class="form-group">
						<label for="">Tiêu đề menu</label>
						<input type="text" name="name" value="<?= $menu->name; ?>" class="form-control" id="" placeholder="Nhập tiêu đề">
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
					</div>
					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" name="slug" value="<?= $menu->slug; ?>" class="form-control" id="slug" placeholder="Đường dẫn tĩnh" >
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('slug'); ?></span>
					</div>
					<div class="node-link">
					<div class="form-group ">
						<label for="">Liên Kết</label>
						<input type="text" name="link" value="<?= $menu->link; ?>" class="form-control" id="link" placeholder="Nhập link liên kết">
					</div>
					</div>
					<div class="form-group">
						<label for="">Danh mục cha</label>
						<select name="parent" class="form-control">
							<option value="0">--Là danh mục cha--</option>
							<?php $this->menu_model->optionMenu(0,1,4,$menu->parent,$menu->id); ?>
						</select>
						<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
					</div>	
					<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					<a href="<?= admin_url('menu') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại danh sách</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tùy chọn khác</h4>
					<div class="form-group">
						<label for="exampleInputEmail1">Thứ tự</label>
						<input type="number" name="is_order" min="1" value="<?= $menu->is_order; ?>" class="form-control" id="" placeholder="Thứ tự hiển thị">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect3">Trạng thái</label>
						<select name="is_online" class="form-control form-control-sm" id="exampleFormControlSelect4">
							<?php echo yes_no($menu->is_online); ?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>