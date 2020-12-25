

<div id="content" class="span10">

<nav aria-label="breadcrumb">

<ol class="breadcrumb">

<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>

<li class="breadcrumb-item active" aria-current="page">Quản lý liên hệ</li>

</ol>

</nav>



<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>

<div id="content" class="card">

<div class="card-body">

<div class="thanhtimkiem">

<form method="GET" action="<?php echo admin_url('contact'); ?>">

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

<a href="<?= admin_url('contact'); ?>" class="btn btn-secondary">Làm lại</a>

</div>

</div>

</form>

</div>

<div class="row-fluid sortable">		

<div class="box span12">



<form name="theForm" id="theForm" action="<?= admin_url('contact/delete_all') ?>" method="post">

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

<th>Ngày gửi</th>

<th>Họ tên</th>

<th>Tiêu đề</th>

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

<td><?= showdate_vn($row->created_at); ?></td>

<td class="center">

<?= $row->user_name; ?>

</td>	

<td><?= $row->title; ?></td>

<td><?= $row->user_phone; ?></td>

<td class="center">

<?php if($row->status==1): ?>

<span class="badge badge-success">Đã xem</span>

<?php endif; ?>

<?php if($row->status==0): ?>

<span class="badge badge-warning">Chưa xem</span>

<?php endif; ?>

</td>



<td class="center">

<a class="btn btn-sm btn-info" href="<?php echo admin_url('contact/view/'.$row->id); ?>">

<i class="ti-pencil-alt"></i>  

</a>

<a class="btn btn-sm btn-danger" href="<?php echo admin_url('contact/del/'.$row->id); ?>" onclick="return check_del();">

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