<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Trang thông tin</li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div id="content" class="card">
<div class="card-body">
<div class="thanhtimkiem">
<form method="GET" action="<?php echo admin_url('page'); ?>">
<div class="span12">
<div style="float: left; padding-right: 15px;">
<div class="control-group">
<div class="controls">
<input class="form-control" id="" type="text" name="title" value="" placeholder="Lọc theo tiêu đề...">
</div>
</div>
</div>

<div style="float: left;">
<button type="submit" class="btn btn-info" >Tìm</button>
<a href="<?= admin_url('page'); ?>" class="btn btn-secondary">Làm lại</a>
</div>
</div>
</form>
</div>
<div class="row-fluid sortable">		
<div class="box span12">
<form name="theForm" id="theForm" action="" method="post">
<div class="" style="text-align: right;padding-bottom: 10px">
<a href="<?php echo admin_url('page/add'); ?>" class="btn btn-small btn-success"><i class="ti-write"></i> Thêm mới</a>
</div>
<div class="table-responsive">
<table class="table table-bordered">
<thead class="filter">
<tr>
<th>Tiêu đề</th>
<th>Ngày tạo</th>
<th>Cấu hình</th>
</tr>
</thead>   
<tbody class="list_item">
<?php foreach($list as $row) : ?>
<tr class="row_<?php echo $row->id; ?>">
<td><?php echo $row->title ?></td>	
<td class="center"><?php echo int_to_date($row->created); ?></td>
<td class="center">
<a class="btn btn-sm btn-info" href="<?php echo admin_url('page/edit/'.$row->id); ?>">
<i class="ti-pencil-alt"></i>  
</a>
<a class="btn btn-sm btn-danger" href="<?php echo admin_url('page/del/'.$row->id); ?>" onclick="return check_del();">
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