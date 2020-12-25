<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Danh sách hãng sản xuất</li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div id="content" class="card">
<div class="card-body">
<div class="row-fluid sortable">		
<div class="box span12">
<div class="box-content">
<form name="theForm" id="theForm" action="" method="post">
<input type="hidden" name="btnOnclick" value="">
<div class="" style="text-align: right;padding-bottom: 10px">
<a href="<?php echo admin_url('manufac/add'); ?>" class="btn btn-small btn-success"><i class="ti-write"></i> Thêm mới</a>
</div>
<div class="table-responsive">
<table class="table table-bordered">
<thead class="filter">
	<tr>
		<th>Tên hãng</th>
		<th>Hình ảnh</th>
		<th>thứ tự</th>
		<th>Cấu hình</th>
	</tr>
</thead>   
<tbody class="list_item">
	<?php foreach($list as $row) : ?>
		<tr class="row_<?php echo $row->id; ?>">
			<td><?php echo $row->name ?></td>
			<td><img src="<?= $row->image_name; ?>" style="width: 50px"></td>
			<td><?= $row->sort_order; ?></td>
			<td class="center">
				<a class="btn btn-sm btn-info" href="<?php echo admin_url('manufac/edit/'.$row->id); ?>">
					<i class="ti-pencil-alt"></i>  
				</a>
				<a class="btn btn-sm btn-danger" href="<?php echo admin_url('manufac/del/'.$row->id); ?>" onclick="return check_del();">
					<i class="ti-trash"></i>  
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