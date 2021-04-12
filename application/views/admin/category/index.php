<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Danh mục sản phẩm</li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div id="content" class="card">
<div class="card-body">
<div class="thanhtimkiem">
<form method="GET" action="<?php echo admin_url('category'); ?>">
	<input type="hidden" name="type" value="<?= $type; ?>">
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
<a class="btn btn-secondary" onclick="<?= admin_url( 'category') ?>">Làm lại</a>
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
<a href="<?php echo admin_url('category/add'); ?>" class="btn btn-small btn-success"><i class="ti-write"></i> Thêm mới</a>
<button type="button" onclick="return saveIndex();" class="btn btn-primary"><i class="ti-save"></i> Lưu lại</button>
</div>
<div class="table-responsive">
<table class="table table-bordered">
<thead class="filter">
<tr>

<th>Tên danh mục</th>
<th style="width: 12%">Thứ tự</th>
<th style="width: 15%">Cấu hình</th>
</tr>
</thead>   
<tbody class="list_item">
<?php foreach($list as $row) : ?>
	<?php
	$c['where'] = ['parent_id'=>$row->id];
	$c['order'] = ['sort_order','asc']; 
	$totalCon = $this->category_model->get_total($c);  
	$listCon = $this->category_model->get_list($c);
	?>
<tr class="row_<?php echo $row->id; ?>">
<td><?php echo $row->name ?> 
<a class="viewcat" data-toggle="collapse" href="#collapse-<?= $row->id ?>" role="button" aria-expanded="false" aria-controls="collapse-<?= $row->id ?>"> Xem nhóm con ( <?= $totalCon ?> )</a>
<div class="collapse" id="collapse-<?= $row->id ?>">
  <div class="body-cat">
   	<ul class="cat-con">
   		<?php foreach($listCon as $con): ?>
   			<?php 
   				$cc['where'] = ['parent_id'=>$con->id];
   				$cc['order'] = ['sort_order','asc']; 
   				$totalConCon = $this->category_model->get_total($cc);  
   				$listCC = $this->category_model->get_list($cc);
   			?>
   		<li>
   			<div class="cat-child"><a class="" data-toggle="collapse" href="#collapse-<?= $con->id ?>" role="button" aria-expanded="false" aria-controls="collapse-<?= $con->id ?>"><?= $con->name; ?> <b style="color:#4d13d1;font-size: 12px">--Xem nhóm con (<?= $totalConCon; ?>)</b> </a></div> 
   			<span class="st-con">
   			<a style="background: cyan;" href="<?= admin_url('category/add/'.$con->id); ?>">Thêm con</a>
   			<a style="background: antiquewhite;" href="<?= admin_url('category/edit/'.$con->id); ?>">Sửa</a>
        <a style="background: #c00; color: #fff" href="<?= admin_url('category/del/'.$con->id); ?>">Xóa</a>
   			</span>
   			<div class="collapse" id="collapse-<?= $con->id ?>">
  			<div class="body-cat">
  				<ul class="cat-con-con">
  					<?php foreach($listCC as $concon): ?>
  					<li>
  						<div class="cat-child"><a style="color: #666">--- <?= $concon->name; ?></a></div>
  						<span class="st-con">
              <a style="background: antiquewhite;" href="<?= admin_url('category/edit/'.$concon->id); ?>">Sửa</a>
  						<a style="background: #c00; color: #fff" href="<?= admin_url('category/del/'.$concon->id); ?>">Xóa</a>
  						</span>
  					</li>
  				<?php endforeach; ?>
  				</ul>
  			</div>
  			</div>
   		</li>
   	<?php endforeach; ?>
   	</ul>
  </div>
</div>
</td>
<td><input type="number" class="form-control" name="is_order_<?= $row->id; ?>" value="<?= $row->sort_order ?>"></td>

<td class="center">
<a title="Thêm danh mục con" class="btn btn-sm btn-danger" href="<?php echo admin_url('category/add/'.$row->id); ?>" >
<i class="ti-write"></i>  
</a>
<a class="btn btn-sm btn-info" href="<?php echo admin_url('category/edit/'.$row->id); ?>">
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