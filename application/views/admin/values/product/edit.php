<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home panel</a>
			<i class="icon-angle-right"></i> 
		</li>
		<li>
			<i class="icon-edit"></i>
			<a href="#">Sửa thuộc tính</a>
		</li>
	</ul>

	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Thông tin thuộc tính</h2>
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
							<label class="control-label" for="">Nhóm thuộc tính </label>
							<div class="controls">
								<select name="cvalue_id" class="span6">
									<option value="">---Chọn nhóm---</option>
								<?php foreach($cvalues as $row): ?>
									<option value="<?= $row->id; ?>" <?= ($info->cvalue_id == $row->id ? "selected" : "") ?> ><?= $row->name; ?></option>
								<?php endforeach; ?>
								</select>
								<div class="help-block"><?php echo form_error('cvalue_id'); ?></div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Tên thuộc tính </label>
							<div class="controls">
								<input type="text" class="span6 typeahead" name="name" id="" value="<?php echo $info->name; ?>" >
								<div class="help-block"><?php echo form_error('name'); ?></div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Loại </label>
							<div class="controls">
								<select name="type">
									<option value="">--Chọn loại--</option>
									<option value="radio" <?= ($info->type == 'radio' ? "selected" : "") ?> >Radio</option>
									<option value="checkbox" <?= ($info->type== 'checkbox' ? "selected" : "") ?> >Checkbox</option>
								</select>
								<div class="help-block"><?php echo form_error('type'); ?></div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="typeahead">Thứ tự</label>
							<div class="controls">
								<input type="text" class="span6 typeahead" name="is_order" value="<?php echo $info->is_order; ?>" >
							</div>
						</div>  

						<div class="control-group">
							<label class="control-label" for="typeahead">Trạng thái</label>
							<div class="controls">
								<select name="status">
									<option value="active" <?= ($info->status == 'active' ? 'selected' : '' ); ?> >Hiển thị</option>
									<option value="disable" <?= ($info->status == 'disable' ? 'selected' : '' ); ?> >Tạm khóa</option>
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