
<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home panel</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Sửa slide</a>
				</li>
			</ul>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Thông tin slide</h2>
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
							  <label class="control-label" for="typeahead">Tiêu đề </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="name" value="<?php echo $info->name; ?>" >
								<div class="help-block"><?php echo form_error('name'); ?></div>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="">Mô tả </label>
							  <div class="controls">
								<textarea class="span6" name="content" style="height: 100px;"><?php echo $info->content; ?></textarea>
								<div class="help-block"><?php echo form_error('content'); ?></div>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="">Ảnh slide</label>
							  <div class="controls">
						<input class="" id="image" type="file" name="image" value="<?php echo $info->image; ?>">
						<img src="<?php echo base_url('uploads/slide/'.$info->image); ?>" width="50" >
							  </div>
							</div>
						<div class="control-group">
							  <label class="control-label" for="typeahead">Link</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="link" value="<?php echo $info->link; ?>" >
								<div class="help-block"><?php echo form_error('link'); ?></div>
							  </div>
							</div>
						<div class="control-group">
							  <label class="control-label" for="typeahead">Thứ tự </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="is_order" value="<?php echo $info->is_order; ?>" >
								<div class="help-block"><?php echo form_error('is_order'); ?></div>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="">Trạng thái</label>
							  <div class="controls">
								<select name="status">
									<?php echo yes_no(1,$info->status); ?>
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