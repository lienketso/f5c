<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Section 1</h2>
					</div>
					<div class="box-content">
					
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tiêu đề lớn</label>
							  <div class="controls">
						<input type="text" class="span6 typeahead" 
						name="home_title_1" 
						value="<?= $this->site_model->getSettingMeta('home_title_1'); ?>" 
						>
								<div class="help-block"><?php echo form_error('home_title_1'); ?></div>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="">Mô tả ngắn </label>
							  <div class="controls">
			<textarea class="span6" name="home_desc_1" style="height: 100px;"><?= $this->site_model->getSettingMeta('home_desc_1'); ?></textarea>
								<div class="help-block"><?php echo form_error('home_desc_1'); ?></div>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="">Link </label>
							  <div class="controls">
								<input type="text" class="span6" name="home_link_1" value="<?= $this->site_model->getSettingMeta('home_link_1'); ?>" >
								<div class="help-block"><?php echo form_error('home_link_1'); ?></div>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="">Ảnh nền</label>
							  <div class="controls">
						<input class="" id="image" type="file" name="home_bg_1" value="<?= $this->site_model->getSettingMeta('home_bg_1'); ?>">

						<img src="<?= base_url('uploads/setting/') ?><?= $this->site_model->getSettingMeta('home_bg_1'); ?>" width="100">

							  </div>
							</div>
							
							<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Lưu thông tin">
							  <button type="reset" class="btn">Bỏ qua</button>
							</div>
						  </fieldset>
						
					</div>
				</div><!--/span-->
			</div><!--/row-->