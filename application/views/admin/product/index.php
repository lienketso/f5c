<style type="text/css">
.thanhtimkiem{
padding: 20px;
}
</style>
<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= admin_url('home') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div id="content" class="card">
<div class="thanhtimkiem">
<form method="GET" action="<?php echo admin_url('product'); ?>">
<div class="span12">
<div style="float: left; padding-right: 15px;">
<div class="control-group">
	<div class="controls">
		<input class="form-control" id="" type="text" name="name" value="<?= $name ?>" placeholder="Lọc theo tiêu đề...">
	</div>
</div>
</div>
<div style="float: left; padding-right: 15px;">
<div class="control-group">
	<div class="controls">
		<select data-placeholder="Loại nhà đất" name="category_id" id="" class="form-control" data-rel="chosen">
			<option value="0">--Danh mục--</option>
			<?php foreach($listCategory as $row): ?>
				<option value="<?= $row->id; ?>" <?= ($category_id==$row->id) ? 'selected' : '' ?> ><?= $row->name ?></option>
			<?php endforeach; ?>
		</select>
	</div>
</div>
</div> 

<div style="float: left; padding-top: 10px">
<button type="submit" class="btn btn-info" >Tìm</button>
<a href="<?= admin_url('product'); ?>" class="btn btn-secondary">Làm lại</a>
</div>
</div>
</form>
</div>
<div class="card-body">

<div class="row-fluid sortable">		
<div class="box span12">
<form name="theForm" id="theForm" action="<?= admin_url('product') ?>" method="post">
<input type="hidden" name="btnOnclick" value="">
<div class="" style="text-align: right;padding-bottom: 10px">
	<a href="<?php echo admin_url('product/add'); ?>" class="btn btn-small btn-success"><i class="ti-write"></i> Thêm mới</a>
	<button class="btn btn-small btn-danger" onclick="return xacnhanDelete();"><i class="ti-trash"></i> Xóa tùy chọn</button>
</div>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead class="filter">
			<tr>
				<th>
					<input type="checkbox" name="allbox" id="allbox" onclick="return check_all();" ></th>
					<th>Tiêu đề</th>
					<th>Hình ảnh</th>
					<th>Danh mục</th>
					<th>Cấu hình</th>
				</tr>
			</thead>   
			<tbody class="list_item">
				<?php foreach($list as $row) : ?>
					<tr class="row_<?php echo $row->id; ?>">
						<td>
							<input type="checkbox" id="" name="id[]" value="<?php echo $row->id ?>"></td>
							<td><?php echo $row->name; ?></td>
							<td class="center"><img src="<?= product_link($row->image_name) ?>" width="70"></td>	
							<td><?= $this->product_model->getCategory($row->cat_id) ?></td>
							<td class="center">
								<a class="btn btn-sm btn-info" href="<?php echo admin_url('product/edit/'.$row->id); ?>">
									<i class="ti-pencil-alt"></i>  
								</a>
								<a class="btn btn-sm btn-danger" href="<?php echo admin_url('product/del/'.$row->id); ?>" onclick="return check_del();">
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
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>         
</div>
</div><!--/span-->
</div>
</div><!--/row-->
</div>