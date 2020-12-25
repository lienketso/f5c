<div id="content" class="span10" style="min-height: 348px;">
			
						
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Thông tin cá nhân</a></li>
			</ul>

			<div class="row-fluid">
				
				<div class="span7">
					<h1>Thông tin giao dịch</h1>
					
					<ul class="messagesList">

						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span> Dennis Ji</span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						
					</ul>
						
				</div>
				<div class="span5 noMarginLeft">
					
					<div class="message dark">
						
						<div class="header">
							<h1>Thông tin khách hàng</h1>
							<div class="from"><i class="halflings-icon user"></i> <b><?php echo $info->user_name; ?></b> / <?php echo $info->user_email; ?></div>
						
							
						</div>
						<div class="attachments">
							<ul>
								<li>
									 Địa chỉ : <?php echo $info->address; ?>
								</li>
								<li>
									Điện thoại : <?php echo $info->user_phone; ?>
								</li>
								<li>
									Email : <?php echo $info->user_email; ?>
								</li>
							</ul>		
						</div>
						
						<div class="content">
						
							<blockquote>
								<?php echo $info->message; ?>
							</blockquote>
							
						</div>
						
						
						
						<form class="replyForm" method="post" action="">

							<fieldset>
								<textarea tabindex="3" class="input-xlarge span12" id="message" name="body" rows="12" placeholder="Click here to reply"></textarea>

								<div class="actions">
									
									<button tabindex="3" type="submit" class="btn btn-success">Send message</button>
									
								</div>

							</fieldset>

						</form>	
						
					</div>	
					
				</div>
						
			</div>
			
       

	</div>