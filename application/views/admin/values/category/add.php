<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home panel</a>
			<i class="icon-angle-right"></i> 
		</li>
		<li>
			<i class="icon-edit"></i>
			<a href="#">Thêm nhóm thuộc tính</a>
		</li>
	</ul>

	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Thông tin nhóm</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="">Danh mục </label>
							<div class="controls">
								<select name="category_id" class="span6">
									<option value="">---Chọn danh mục---</option>
								<?php foreach($category as $row): ?>
									<option value="<?= $row->id; ?>"><?= $row->name; ?></option>
								<?php endforeach; ?>
								</select>
								<div class="help-block"><?php echo form_error('category_id'); ?></div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Tên nhóm thuộc tính </label>
							<div class="controls">
								<input type="text" class="span6 typeahead" name="name" id="" value="<?php echo set_value('name'); ?>" >
								<div class="help-block"><?php echo form_error('name'); ?></div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Thứ tự</label>
							<div class="controls">
								<input type="text" class="span6 typeahead" name="is_order" value="<?php echo set_value('is_order'); ?>" >
							</div>
						</div>  

						<div class="control-group">
							<label class="control-label" for="typeahead">Trạng thái</label>
							<div class="controls">
								<select name="status">
									<option value="active" <?= (set_value('status') == 'active' ? 'selected' : '' ); ?> >Hiển thị</option>
									<option value="disable" <?= (set_value('status') == 'disable' ? 'selected' : '' ); ?> >Tạm khóa</option>
								</select>
							</div>
						</div>   

						<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="Lưu thông tin">
							<button type="reset" class="btn">Bỏ qua</button>
						</div>
					</fieldset>
				</form>   
			</div>
		</div><!--/span-->
	</div><!--/row-->
</div>