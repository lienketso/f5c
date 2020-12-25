<script type="text/javascript">
	function check_del(){
		if (confirm("Bạn có thực sự muốn xóa [OK]:Yes [Cancel]:No?")) {
        return true;
    	}
    	else{ return false;}
	}

</script>

<div id="content" class="span10">
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo admin_url('home'); ?>">Home Panel</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Quản lý đơn đặt dịch vụ</a></li>
			</ul>

			<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>

	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Danh sách đơn</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>

					</div>
					<div class="box-content">
					<div class="thanh-xuly">
				<a href="<?php echo admin_url('cart/add'); ?>" class="btn btn-small btn-success"><i class="halflings-icon white plus"></i> Thêm mới</a>
				<a class="btn btn-small btn-danger" onclick="return xacnhanDelete();"><i class="halflings-icon white trash"></i> Xóa tùy chọn</a>
					</div>
				<form name="theForm" id="theForm" action="<?php echo admin_url('cart/delete_all')?>" method="post">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
					<th><input type="checkbox" name="allbox" id="allbox" onclick="return check_all();" value=""></th>
								  <th>Ngày đặt</th>
								  <th>Gói dịch vụ</th>
								  <th>Thông tin công ty</th>
								  <th>Thanh toán</th>
								  <th>Trạng thái</th>
								  <th>Tùy chọn</th>
							  </tr>
						  </thead>   
						  <tbody>
						 <?php foreach($list as $row) : ?>
						 <?php $transaction = $this->transaction_model->get_info($row->transaction_id); ?>
						 <?php $product = $this->product_model->get_info($row->product_id); ?>
							<tr>
								<td><input type="checkbox" name="id[]" value="<?php echo $row->id ?>"></td>
								<td><?php echo int_to_date_full($transaction->created); ?></td>
								<td class="center">
								<?php echo $product->name; ?> <br>
						<span style="color: #c00; font-size: 11px"><?php echo number_format($row->amount); ?></span> <br>
						<span style="color: #666; font-size: 11px">Điểm cộng : <?php echo $product->scores; ?></span>
								</td>
								<td class="center"><?php echo $transaction->company_name; ?> 
								<?php if($transaction->company_id==0): ?>
								<span class="label label-important"> Chưa có tài khoản </span>
							<?php else: ?>
								<span class="label label-success"> Thành viên </span>
							<?php endif; ?>
								<br>
						<span style="color: #666; font-size: 11px"><?php echo $transaction->company_address; ?></span><br>
							<span style="color: #666; font-size: 11px">Người liên hệ : <?php echo $transaction->company_contact; ?> - Điện thoại : <?php echo $transaction->contact_phone; ?></span>
								</td>
								<td><?php echo $transaction->payment; ?></td>
								<td class="center">
									<?php if($row->status==1): ?>
									<span class="label label-success">Đã thanh toán</span>
								<?php else: ?>
									<span class="label label-important">Chưa thanh toán</span>
								<?php endif; ?>
								</td>
								<td class="center">
					<a class="btn btn-small btn-info" href="<?php echo admin_url('cart/edit/'.$row->id); ?>">
					<i class="halflings-icon white edit"></i>  
					</a>
					<a class="btn btn-small btn-danger" href="<?php echo admin_url('cart/del/'.$row->id); ?>" onclick="return check_del();">
					<i class="halflings-icon white trash"></i>  
					</a>
									
					</td>
					</tr>
					<?php endforeach; ?>

						  </tbody>
					  </table>  
					  </form> 
					  <div class="span12 center">
					  <div class="pagination">
					  <?php echo $this->pagination->create_links(); ?>
					  </div>
					 </div>       
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

</div>