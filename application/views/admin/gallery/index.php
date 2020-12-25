<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Danh sách slide</li>
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
<a href="<?php echo admin_url('gallery/add?group='.$gid); ?>" class="btn btn-small btn-success"><i class="ti-write"></i> Thêm mới</a>
<button class="btn btn-small btn-danger" onclick="return xacnhanDelete();"><i class="ti-trash"></i> Xóa tùy chọn</button>
</div>
<div class="table-responsive">
<table class="table table-bordered">
<thead class="filter">
<tr>
<th>
<input type="checkbox" name="allbox" id="allbox" onclick="return check_all();" >
</th>
<th>Tiêu đề</th>
<th>Hình ảnh</th>
<th>Link</th>
<th>Trạng thái</th>
<th>Cấu hình</th>
</tr>
</thead>   
<tbody class="list_item">
<?php foreach($list as $row) : ?>
<tr class="row_<?php echo $row->id; ?>">
<td><input type="checkbox" id="filter_id" name="id[]" value="<?php echo $row->id ?>"></td>
<td><?php echo $row->name ?></td>
<td><img src="<?= $row->image; ?>" style="width: 50px"></td>
<td><?= $row->link; ?></td>
<td class="center">
<?php if($row->status==1): ?>
<span class="badge badge-success">Hiển thị</span>
<?php endif; ?>
<?php if($row->status==0): ?>
<span class="badge badge-warning">Tạm ẩn</span>
<?php endif; ?>
</td>
<td class="center">
<a class="btn btn-sm btn-info" href="<?php echo admin_url('gallery/edit/'.$row->id.'?group='.$gid); ?>">
<i class="ti-pencil-alt"></i>  
</a>
<a class="btn btn-sm btn-danger" href="<?php echo admin_url('gallery/del/'.$row->id.'?group='.$gid); ?>" onclick="return check_del();">
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