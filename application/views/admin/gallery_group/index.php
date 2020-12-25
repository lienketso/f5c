
<div id="content" class="span10">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
			<li class="breadcrumb-item active" aria-current="page">Quản lý loại thư viện ảnh</li>
		</ol>
	</nav>
	<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
	<div id="content" class="card">
		<div class="card-body">

			<div class="row-fluid sortable">		
				<div class="box span12">

					<div class="box-content">

						<form name="theForm" id="theForm" action="" method="post">

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead class="filter">
										<tr>

											<th>Tên loại thư viện</th>
											<th>Trạng thái (Click để tùy chọn ẩn/hiện)</th>
											<th style="width: 15%">Xem danh sách</th>
										</tr>
									</thead>   
									<tbody class="list_item">
										<?php foreach($list as $row) : ?>
											<tr class="row_<?php echo $row->id; ?>">
												<td><?php echo $row->name ?></td>
												<td class="center">
													<?php if($row->status==1): ?>
														<a href="<?= admin_url('gallery_group/status/'.$row->id) ?>" title="click để ẩn module"><span class="badge badge-success">Hiển thị</span></a>
													<?php endif; ?>
													<?php if($row->status==0): ?>
														<a href="<?= admin_url('gallery_group/status/'.$row->id) ?>" title="click để hiện module"><span class="badge badge-warning">Tạm ẩn</span></a>
													<?php endif; ?>
												</td>
												<td class="center">
													<a class="btn btn-sm btn-info" href="<?php echo admin_url('gallery?group='.$row->id); ?>">
														<i class="ti-pencil-alt"></i>  
													</a>


												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>  
							</div>
						</form>
						<div class="span12 center">
							<div class="pagination">
								<?php echo $this->pagination->create_links(); ?>
							</div>
						</div>          
					</div>
				</div><!--/span-->
			</div>
		</div>
	</div><!--/row-->
</div>