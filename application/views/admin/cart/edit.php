<div id="content" class="span10" style="min-height: 417px;">
			
						
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo admin_url('home'); ?>">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Chi tiết đơn hàng</a></li>
			</ul>

			<div class="row-fluid">
				
				<div class="span7">
					<h2>Thông tin đơn hàng</h2>
					<p><i class="icon-time"></i> Đặt lúc : <b><?php echo int_to_date_full($company->created); ?></b></p>
					<p><i class="icon-qrcode"></i> Gói dịch vụ : <b><?php echo $product->name; ?></b></p>
					<p><i class="icon-tags"></i> Giá dịch vụ : <b><?php echo number_format($product->price); ?> vnđ</b></p>
					<p><i class="icon-plus"></i> Điểm cộng : <b><?php echo $product->scores; ?> điểm</b></p>
					<p><i class="icon-envelope"></i> Tin nhắn: <b><i><?php echo $company->message; ?></i> </b></p>
				</div>
				<div class="span5 noMarginLeft">
					
					<div class="message dark">
						
						<div class="header">
							<h1><?php echo $company->company_name; ?></h1>
						<div class="from"><i class="halflings-icon user"></i> 
						<?php if($company->company_id==0): ?><span class="label label-important">Khách đăng ký chưa có tài khoản tại website</span> 
						<?php else: ?> <span class="label label-success">Đang là thành viên website</span> 
						<?php endif; ?>
						</div>							
							<div class="menu"></div>
						</div>
						
						<div class="content">
							<p>Địa chỉ : <?php echo $company->company_address; ?></p>
							<p>Người liên hệ : <?php echo $company->company_contact; ?></p>
							<p>Điện thoại : <?php echo $company->contact_phone; ?></p>
							<p>Email : <?php echo $company->contact_email; ?></p>
						</div>
						
						<div class="attachments">
							<ul>
								<li>
									<b>Số tiền nạp </b> <span class="label label-important"><?php echo number_format($info->amount); ?> đ</span> 
								</li>
								<li>
									<b>Số điểm cộng </b><span class="label label-info">+ <?php echo $product->scores; ?> </span>
								</li>
								<li>
									<b>Tình trạng</b> 
									<?php if($info->status==0): ?>
									<span class="label label-important">Chưa thanh toán</span> 
								<?php else: ?>
									<span class="label label-success">Đã thanh toán</span> 
								<?php endif; ?>
								</li>
								<li>
									<b>Hình thức thanh toán </b> : <?php echo $company->payment; ?>
								</li>
							</ul>		
						</div>
						
						<form class="replyForm" method="post" action="#">
						<input type="hidden" name="scores" value="<?php echo $info->scores; ?>">
							<fieldset>
								<div class="actions">
							<?php if($company->company_id!=0): ?>	
							<?php if($info->status==0): ?>
						<input type="submit" class="btn btn-success" value="Xác nhận thanh toán + điểm">
						<?php else: ?>
							<button tabindex="3" type="button" class="btn">Đã thanh toán và + điểm</button>
						<?php endif; ?>
							<button tabindex="3" type="button" class="btn btn-primary" onclick="return goBack();">Quay lại</button>
						<?php else: ?>
							<button tabindex="3" type="button" class="btn btn-primary" onclick="return goBack();">Chưa có tài khoản để cộng điểm</button>
						<?php endif; ?>
								</div>

							</fieldset>

						</form>	
						
					</div>	
					
				</div>
						
			</div>
			
       

	</div>