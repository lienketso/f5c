<nav aria-label="breadcrumb">

<ol class="breadcrumb">

<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>

<li class="breadcrumb-item active" aria-current="page">Quản lý menu</li>

</ol>

</nav>

<div id="content" class="card">

<div class="card-body">

<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>

<form name="theForm" id="theForm" action="" method="post">

	<input type="hidden" name="btnOnclick" value="">

<div class="" style="text-align: right;padding-bottom: 10px">

<a href="<?php echo admin_url('menu/add'); ?>" class="btn btn-small btn-success"><i class="ti-write"></i> Thêm mới</a>

<button type="button" onclick="return saveIndex();" class="btn btn-primary"><i class="ti-save"></i> Lưu lại</button>

</div>

<div class="table-responsive">

<table class="table table-bordered">

<thead>

<tr>

<th style="width: 5%;">

	<input type="checkbox" name="allbox" id="allbox" onclick="return check_all();" value="">

</th>

<th>

	Tiêu đề

</th>

<th>Nhóm cha</th>

<th style="width: 12%;">Thứ tự</th>

<th style="width: 10%;">trạng thái</th>

<th style="width: 15%;">Tùy chọn</th>

</tr>

</thead>   

<tbody>

<?php foreach($list as $row) : ?>

<tr>

<td><input type="checkbox" name="id[]" value="<?php echo $row->id; ?>"></td>

<td><?php echo $row->name; ?></td>

<td>

	<select name="parent_<?= $row->id ?>">

		<option value="0">Là danh mục cha</option>

		<?php $this->menu_model->optionMenu(0,1,4,$row->parent,$row->id); ?>

	</select>

</td>

<td class="center">

  <input type="number" name="is_order_<?= $row->id; ?>" value="<?= $row->is_order ?>" class="form-control" id="" >

</td>

<td class="center">

<?php if($row->is_online==1): ?>

<span class="badge badge-success">Hiển thị</span>

<?php else: ?>

<span class="badge badge-warning">Tạm ẩn</span>

<?php endif; ?>

</td>

<td class="center">

<a class="btn btn-sm btn-info" href="<?php echo admin_url('menu/edit/'.$row->id); ?>">

<i class="ti-pencil-alt"></i> 

</a>

<a class="btn btn-sm btn-danger" href="<?php echo admin_url('menu/del/'.$row->id); ?>" onclick="return check_del();">

<i class="ti-trash"></i>  

</a>

</td>

</tr>

<?php endforeach; ?>

<tr>

<td colspan="7">

<a href="#" onclick="return saveIndex();" class="btn btn-primary"><i class="ti-save"></i> Lưu lại</a>

</td>

</tr>

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

</div>