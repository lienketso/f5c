<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Cấu hình email  </li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Nhập thông tin cấu hình Email hệ thống</h4>
<div class="form-group" style="text-align: right;">
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
</div>
<div class="form-group">
<label for="">Email nhận tin nhắn</label>
<input type="text" name="email_nhantin" value="<?= $this->site_model->getSettingMeta('email_nhantin'); ?>" class="form-control" placeholder="Email nhận các tin nhắn từ hệ thống">
</div>
<div class="form-group">
<label for="">Protocol</label>
<input type="text" name="smtp_protocol" value="<?= $this->site_model->getSettingMeta('smtp_protocol'); ?>" class="form-control" placeholder="smtp, pop3...">
</div>
<div class="form-group">
<label for="">SMTP Host</label>
<input type="text" name="smtp_host" value="<?= $this->site_model->getSettingMeta('smtp_host'); ?>" class="form-control" placeholder="ex : ssl://smtp.googlemail.com">
</div>
<div class="form-group">
<label for="">SMTP Port</label>
<input type="text" name="smtp_port" value="<?= $this->site_model->getSettingMeta('smtp_port'); ?>" class="form-control" id="" placeholder="465,587...">
</div>
<div class="form-group">
<label for="">SMTP User</label>
<input type="text" name="smtp_user" value="<?= $this->site_model->getSettingMeta('smtp_user'); ?>" class="form-control" placeholder="Tài khoản email">
<span id="" class="error mt-2 text-danger" for=""></span>
</div>
<div class="form-group">
<label for="">SMTP Pass</label>
<input type="text" name="smtp_pass" value="<?= $this->site_model->getSettingMeta('smtp_pass'); ?>" class="form-control" placeholder="Mật khẩu ứng dụng">
<span id="" class="error mt-2 text-danger" for=""></span>
</div>
<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
</div>
</div>
</div>
</div>
</form>