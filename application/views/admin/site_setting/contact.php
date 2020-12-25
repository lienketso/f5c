<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Cấu hình trang liên hệ </li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
<div class="col-md-8 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Nhập thông tin cấu hình trang liên hệ</h4>
<div class="form-group" style="text-align: right;">

<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
</div>

<div class="form-group">
<label for="exampleInputUsername1">Tiêu đề </label>
<input type="text" name="contact_title" value="<?= $arrSetting['contact_title']; ?>" class="form-control" placeholder="Nhập tiêu đề">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('contact_title'); ?></span>
</div>
<div class="form-group">
<label for="exampleInputUsername1">Điện thoại liên hệ</label>
<input type="text" name="contact_phone" value="<?= $arrSetting['contact_phone']; ?>" class="form-control" placeholder="Số điện thoại liên hệ">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('contact_phone'); ?></span>
</div>
<div class="form-group">
<label for="exampleInputUsername1">Hotline</label>
<input type="text" name="contact_hotline" value="<?= $arrSetting['contact_hotline']; ?>" class="form-control" id="input_slug" placeholder="Số hotline">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('contact_hotline'); ?></span>
</div>
<div class="form-group">
<label for="exampleInputUsername1">Email</label>
<input type="text" name="contact_email" value="<?= $arrSetting['contact_email']; ?>" class="form-control" id="input_slug" placeholder="Địa chỉ email">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('contact_email'); ?></span>
</div>
<div class="form-group">
<label for="exampleInputUsername1">Địa chỉ</label>
<input type="text" name="contact_address" value="<?= $arrSetting['contact_address']; ?>" class="form-control" placeholder="Địa chỉ, trụ sở...">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('contact_address'); ?></span>
</div>

<div class="form-group">
<label for="exampleInputUsername1">Nội dung </label>	
<div id="">
<textarea name="contact_content" class="editor1" id="editor1"><?= $arrSetting['contact_content']; ?></textarea>
 </div>
</div>

<div class="form-group">
<label for="exampleInputUsername1">Google map frame </label>	
<div id="">
<textarea name="contact_map" class="form-control" rows="4" ><?= $arrSetting['contact_map']; ?></textarea>
 </div>
</div>

<div class="form-group">
<label for="">Them xem nao</label>
<input type="text" name="contact_item_one" value="<?= $arrSetting['contact_item_one']; ?>" class="form-control" placeholder="">
<span id="" class="error mt-2 text-danger" for=""><?php echo form_error('contact_item_one'); ?></span>
</div>

<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
</div>
</div>
</div>

</div>
</form>

