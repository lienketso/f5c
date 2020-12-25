		<!-- My Account Area -->
		<div class="my-account-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="page-title">
							<h2>Đăng ký thành viên</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="new-customers customer">
							<div class="customer-inner">
								<div class="user-title">
									<h2><i class="fa fa-file"></i>Tạo tài khoản mới</h2>
								</div>
								<div class="user-content">
									<p>Cảm ơn bạn đã quan tâm đến sản phẩm của chúng tôi, vui lòng nhập các thông tin vào form bên cạnh để tiến hành tạo và sử dụng tài khoản tại website.<br>
									Mọi thông tin cần trợ giúp khách hàng vui lòng liên hệ : <?php echo $setting->phone; ?> hoặc email : <?php echo $setting->email; ?> <br>
									Địa chỉ : <?php $setting->address; ?>
									</p>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="resestered-customers customer">
							<form class="form-horizontal product-form" action="#" method="post">
							<div class="customer-inner">
								<div class="user-title">
									<h2><i class="fa fa-file-text"></i>Form thông tin</h2>
								</div>
								<div class="user-content">
									<p>Vui lòng nhập đầy đủ thông tin dưới đây để tạo tài khoản</p>
								</div>
								<div class="account-form">
									
										<div class="form-goroup">
											<label>Họ và tên <sup>*</sup></label>
										<input type="text" name="name" required="required" value="<?php echo set_value('name'); ?>" class="form-control">
									<span style="color: #c00; font-size: 11px"><?php echo form_error('name'); ?></span>
										</div>
										<div class="form-goroup">
											<label>Địa chỉ email <sup>*</sup></label>
											<input type="text" name="email" value="<?php echo set_value('email'); ?>" required="required" class="form-control">
									<span style="color: #c00; font-size: 11px"><?php echo form_error('email'); ?></span>
										</div>
										<div class="form-goroup">
											<label>Mật khẩu <sup>*</sup></label>
										<input type="password" name="password" required="required" class="form-control">
								<span style="color: #c00; font-size: 11px"><?php echo form_error('password'); ?></span>
										</div>
										<div class="form-goroup">
											<label>Số điện thoại <sup>*</sup></label>
										<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" required="required" class="form-control">
									<span style="color: #c00; font-size: 11px"><?php echo form_error('phone'); ?></span>
										</div>
										<div class="form-goroup">
											<label>Địa chỉ<sup>*</sup></label>
										<input type="text" name="address" value="<?php echo set_value('address'); ?>" class="form-control">
									<span style="color: #c00; font-size: 11px"><?php echo form_error('address'); ?></span>
										</div>
									
								</div>
								<p class="reauired-fields floatright"><sup>*</sup> Bắt buộc nhập</p>
							</div>
							<div class="user-bottom fix">
								<div class="user-bottom-inner">
									<input class="btn custom-button" value="Đăng ký tài khoản" type="submit">
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!-- End My Account Area -->