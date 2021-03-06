<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div id="content" class="card">
<div class="card-body">
<div class="thanhtimkiem">
<form method="GET" action="<?php echo admin_url('product_order'); ?>">
<div class="span12">
<div style="float: left; padding-right: 15px;">
<div class="control-group">
<div class="controls">
<input class="form-control" id="" type="text" name="name" value="<?= $name; ?>" placeholder="Lọc theo tên...">
</div>
</div>
<div class="input-group input-daterange d-flex align-items-center" style="padding: 10px 0">
<input type="text" name="start" class="form-control" value="<?= showdate($startdate); ?>" placeholder="Từ ngày" autocomplete="off">
<div class="input-group-addon mx-4">đến</div>
<input type="text" name="end" class="form-control" value="<?= showdate($enddate); ?>" placeholder="Đến ngày" autocomplete="off">
</div>
</div>
<div style="float: left;">
<button type="submit" class="btn btn-info" >Tìm</button>
<a href="<?= admin_url('product_order'); ?>" class="btn btn-secondary">Làm lại</a>
</div>
</div>
</form>
</div>
<div class="row-fluid sortable">		
<div class="box span12">
<form name="theForm" id="theForm" action="<?= admin_url('product_order/delete_all') ?>" method="post">
<input type="hidden" name="btnOnclick" value="">
<div class="" style="text-align: right;padding-bottom: 10px">
<button class="btn btn-small btn-danger" onclick="return xacnhanDelete();"><i class="ti-trash"></i> Xóa tùy chọn</button>
</div>
<div class="table-responsive">
<table class="table table-bordered">
<thead class="filter">
<tr>
<th>
<input type="checkbox" name="allbox" id="allbox" onclick="return check_all();" ></th>
<th>Ngày giao dịch</th>
<th>Tên khách hàng</th>
<th>Điện thoại</th>
<th>Tổng tiền hàng</th>
<th>Cổng thanh toán</th>
<th>Tình trạng</th>
<th>Tùy chọn</th>
</tr>
</thead>   
<tbody class="list_item">
<?php foreach($list as $row) : ?>
<tr class="row_<?php echo $row->id; ?>">
<td>
<input type="checkbox" id="" name="id[]" value="<?php echo $row->id ?>"></td>
<td><?= int_to_date($row->created); ?></td>
<td><?= $row->name; ?></td>
<td><?php echo $row->phone; ?></td>
<td style="color: #c00;"><?= number_format($row->amount); ?> đ</td>
<td><?= $row->payment; ?></td>
<td class="center">
<?php if($row->status==1): ?>
<span class="badge badge-success">Đã giao hàng</span>
<?php endif; ?>
<?php if($row->status==0): ?>
<span class="badge badge-warning">Chưa giao hàng</span>
<?php endif; ?>
</td>
<td class="center">
<a class="btn btn-sm btn-info" href="<?php echo admin_url('product_order/view/'.$row->id); ?>">
<i class="ti-pencil-alt"></i>  
</a>
<a class="btn btn-sm btn-danger" href="<?php echo admin_url('product_order/del/'.$row->id); ?>" onclick="return check_del();">
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