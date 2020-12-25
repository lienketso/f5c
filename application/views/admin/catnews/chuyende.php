<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Quản lý chuyên đề diễn đàn "<span style="color: red"><?= $infoForum->name; ?></span>"</li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div id="content" class="card">
<div class="card-body">
<div class="thanhtimkiem">
<form method="GET" action="<?php echo admin_url('catnews'); ?>">
<div class="span12">
<div style="float: left; padding-right: 15px;">
<div class="control-group">
<div class="controls">
<input class="form-control" id="" type="text" name="name" placeholder="Lọc theo tiêu đề...">
</div>
</div>
</div>
<div style="float: left;">
<button type="submit" class="btn btn-info">Tìm</button>
<a class="btn btn-secondary" onclick="return location.reload();">Làm lại</a>
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
<a href="<?php echo admin_url('catnews/add?cat_type='.$type.'&parent='.$parent); ?>" class="btn btn-small btn-success"><i class="ti-write"></i> Thêm mới</a>
<button class="btn btn-small btn-danger" onclick="return xacnhanDelete();"><i class="ti-trash"></i> Xóa tùy chọn</button>
<button type="button" onclick="return saveIndex();" class="btn btn-primary"><i class="ti-save"></i> Lưu lại</button>
</div>
<div class="table-responsive">
<table class="table table-bordered">
<thead class="filter">
<tr>
<th>
<input type="checkbox" name="allbox" id="allbox" onclick="return check_all();" >
</th>
<th>Tên chuyên đề</th>
<th style="width: 12%">Thứ tự</th>
<th style="width: 10%">Trạng thái</th>
<th style="width: 15%">Cấu hình</th>
</tr>
</thead>   
<tbody class="list_item">
<?php foreach($list as $row) : ?>
<tr class="row_<?php echo $row->id; ?>">
<td><input type="checkbox" id="filter_id" name="id[]" value="<?php echo $row->id ?>"></td>
<td><?php echo $row->name ?></td>
<td><input type="number" class="form-control" name="is_order_<?= $row->id; ?>" value="<?= $row->is_order ?>"></td>
<td class="center">
<?php if($row->status==1): ?>
<span class="badge badge-success">Hiển thị</span>
<?php endif; ?>
<?php if($row->status==0): ?>
<span class="badge badge-warning">Tạm ẩn</span>
<?php endif; ?>
</td>
<td class="center">
<a class="btn btn-sm btn-info" href="<?php echo admin_url('catnews/edit/'.$row->id.'?cat_type='.$type.'&parent='.$parent); ?>">
<i class="ti-pencil-alt"></i>  
</a>
<a class="btn btn-sm btn-danger" href="<?php echo admin_url('catnews/del/'.$row->id.'?cat_type='.$type); ?>" onclick="return check_del();">
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