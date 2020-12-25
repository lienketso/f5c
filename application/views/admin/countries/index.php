<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Xuất xứ</li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div id="content" class="card">
<div class="card-body">
<div class="thanhtimkiem">
<form method="GET" action="<?php echo admin_url('countries'); ?>">
<div class="span12">
<div style="float: left; padding-right: 15px;">
<div class="control-group">
	<div class="controls">
		<input class="form-control" id="" type="text" name="name" placeholder="Lọc theo tên...">
	</div>
</div>
</div>
<div style="float: left;">
<button type="submit" class="btn btn-info">Tìm</button>
<a class="btn btn-secondary" onclick="<?= admin_url( 'countries' ) ?>">Làm lại</a>
</div>
</div>
</form>
</div>
<div class="row-fluid sortable">		
<div class="box span12">
<div class="box-content">
<form name="theForm" id="theForm" action="" method="post">
<input type="hidden" name="btnOnclick" value="">
<div class="" style="text-align: right;padding-bottom: 10px">
	<a href="<?php echo admin_url('countries/add'); ?>" class="btn btn-small btn-success"><i class="ti-write"></i> Thêm mới</a>
	<button type="button" onclick="return saveIndex();" class="btn btn-primary"><i class="ti-save"></i> Lưu lại</button>
</div>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead class="filter">
			<tr>
				<th>Tên xuất xứ</th>
				<th style="width: 15%">Cấu hình</th>
			</tr>
		</thead>   
		<tbody class="list_item">
			<?php foreach($list as $row) : ?>
					<td><?php echo $row->name ?></td>
					<td class="center">
						<a class="btn btn-sm btn-info" href="<?php echo admin_url('countries/edit/'.$row->id); ?>">
							<i class="ti-pencil-alt"></i>  
						</a>
						<a class="btn btn-sm btn-danger" href="<?php echo admin_url('countries/del/'.$row->id); ?>" onclick="return check_del();">
							<i class="ti-trash"></i>  
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>  
</div>
</form>
<div class="card">
<div class="card-body">
	<ul class="pagination pagination-flat pagination-success">
		<?php echo $this->pagination->create_links(); ?>
	</ul>
</div>          
</div>
</div>
</div><!--/span-->
</div>
</div>
</div><!--/row-->
</div>