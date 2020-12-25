<div id="content" class="span10">
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home Panel</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Xác nhận xóa thành viên</a></li>
			</ul>
	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Bạn có chắc chắn muốn xóa thông tin này ?</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>

					</div>
					<div class="box-content">
						<form method="POST" action="" name="formdel" id="formdel">
						<input type="hidden" name="btnDel" id="btnDel">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Tên người dùng</th>
								  <th>Tên tài khoản</th>
								  <th>Địa chỉ</th>
								  <th>Tình trạng</th>
								  <th>Cấu hình</th>
							  </tr>
						  </thead>   
						  <tbody>
					
							<tr>
								<td><?php echo $info->name; ?></td>
								<td class="center"><?php echo $info->username; ?></td>
								<td class="center"><?php echo $info->address; ?></td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
					<i class="halflings-icon white trash"></i>  
					<input type="submit" class="btn btn-small btn-danger" value="Xác nhận xóa">
								</td>
							</tr>
				
						  </tbody>
					  </table>     
					  </form>       
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

</div>