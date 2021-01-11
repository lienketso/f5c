<div id="content" class="span10">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
			<li class="breadcrumb-item active" aria-current="page">Quản lý vị trí quảng cáo</li>
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
											<th>Tên vị trí</th>
											<th>Mã vị trí</th>
											<th>Kích thước</th>
											<th>Số lượng banner</th>
											<th style="width: 15%">Xem danh sách</th>
										</tr>
									</thead>   
									<tbody class="list_item">
										<?php foreach($list as $row) : ?>
											<tr class="row_<?php echo $row->id; ?>">
												<td><?php echo $row->name ?></td>
												<td class="center">
													<?= $row->code; ?>
												</td>
												<td><?= $row->banner_width ?> x <?= $row->banner_height ?> </td>
												<td><?= $row->banner_quantity; ?></td>
												<td class="center">
													<a class="btn btn-sm btn-info" href="<?php echo admin_url('ads_banner?location='.$row->id); ?>">
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