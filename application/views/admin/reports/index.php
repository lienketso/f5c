
<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Người dùng</li>
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
<button class="btn btn-small btn-danger" onclick="return xacnhanDelete();"><i class="ti-trash"></i> Xóa tùy chọn</button>
</div>
<div class="table-responsive">
<table class="table table-bordered">
<thead class="filter">
<tr>
<th>
<input type="checkbox" name="allbox" id="allbox" onclick="return check_all();" >
</th>
<th>Địa chỉ IP</th>
<th>Thành phố</th>
<th>Địa điểm</th>
<th>Thiết bị</th>
<th>Flag</th>
<th>Thời gian</th>
<th>Tùy chọn</th>
</tr>
</thead>   
<tbody class="list_item">
<?php foreach($list as $row) : ?>
<tr class="row_<?php echo $row->id; ?>">
<td><input type="checkbox" id="filter_id" name="id[]" value="<?php echo $row->id ?>"></td>
<td><?php echo $row->ip_address; ?></td>
<td><?= $row->city; ?></td>
<td><?= $row->location; ?></td>
<td><?= $row->agent_name; ?></td>
<td><img src="<?= $row->flag_icon; ?>" style="width: 36px"></td>
<td><?= showdatefull($row->created_at); ?></td>
<td class="center">
<a class="btn btn-sm btn-danger" href="<?php echo admin_url('report/del/'.$row->id); ?>" onclick="return check_del();">
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