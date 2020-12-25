<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Xuất file excel</li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div id="content" class="card">
<div class="card-body">
<div class="thanhtimkiem">
<form method="GET" action="<?php echo admin_url('member/export'); ?>">
<div class="span12">
<div style="float: left; padding-right: 15px;">
<div class="control-group">
<div class="controls">
<input class="form-control" id="" type="text" name="name" value="" placeholder="Lọc theo tên">
</div>
</div>

<div class="input-group input-daterange d-flex align-items-center" style="padding: 10px 0">
<input type="text" name="start" data-date-format="dd/mm/yyyy" class="form-control" value="" placeholder="Từ ngày" autocomplete="off">
<div class="input-group-addon mx-4">đến</div>
<input type="text" name="end" data-date-format="dd/mm/yyyy" class="form-control" value="" placeholder="Đến ngày" autocomplete="off">
</div>

</div>
<div style="float: left;">
<button type="submit" class="btn btn-info" >Lọc</button>
<a href="<?= admin_url('member/export'); ?>" class="btn btn-secondary">Làm lại</a>
</div>
</div>
</form>
</div>
<div class="row-fluid sortable">		
<div class="box span12">
<form name="theForm" id="theForm" method="post">
<input type="hidden" name="btnOnclick" value="">
<div class="" style="text-align: right;padding-bottom: 10px">
<button type="submit" class="btn btn-small btn-success"><i class="ti-write"></i> Export excel</button>
</div>
<div class="table-responsive">
<table class="table table-bordered">
<thead class="filter">
<tr>
<th>
<input type="checkbox" name="allbox" id="allbox" onclick="return check_all();" ></th>
<th>Tên người dùng</th>
<th>Email</th>
<th>Điện thoại</th>
<th>Tình trạng</th>
<th>Cấu hình</th>
</tr>
</thead>   
<tbody class="list_item">
<?php foreach($list as $row) : ?>
<tr class="row_<?php echo $row->id; ?>">
<td>
<input type="checkbox" id="" name="id[]" value="<?php echo $row->id ?>"></td>
<td><?= $row->name; ?></td>
<td><?= $row->email; ?></td>
<td><?= $row->phone; ?></td>
<td class="center">
<?php if($row->status==1): ?>
<span class="badge badge-success">Đang sử dụng</span>
<?php endif; ?>
<?php if($row->status==0): ?>
<span class="badge badge-warning">Chưa kích hoạt</span>
<?php endif; ?>
<?php if($row->status==2): ?>
<span class="badge badge-err">Tạm khóa</span>
<?php endif; ?>
</td>
<td class="center">
<a class="btn btn-sm btn-info" href="<?php echo admin_url('member/edit/'.$row->id); ?>">
<i class="ti-pencil-alt"></i>  
</a>
<a class="btn btn-sm btn-danger" href="<?php echo admin_url('member/del/'.$row->id); ?>" onclick="return check_del();">
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