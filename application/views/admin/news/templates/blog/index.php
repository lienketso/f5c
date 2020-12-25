<div id="content" class="span10">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Trang chính</a></li>
<li class="breadcrumb-item active" aria-current="page">Danh sách bài viết</li>
</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div id="content" class="card">
<div class="card-body">
<div class="thanhtimkiem">
<form method="GET" action="<?php echo admin_url('news'); ?>">
<div class="span12">
<div style="float: left; padding-right: 15px;">
<div class="control-group">
<div class="controls">
<input class="form-control" id="" type="text" name="title" value="<?= $title ?>" placeholder="Lọc theo tiêu đề...">
</div>
</div>
</div>
<div style="float: left; padding-right: 15px;">
<div class="control-group">
<div class="controls">
<select data-placeholder="Lọc theo danh mục" name="cat_id" id="" class="form-control" data-rel="chosen">
<option value="">--Lọc theo danh mục--</option>

</select>
</div>
</div>
</div>
<div style="float: left;">
<button type="submit" class="btn btn-info" >Tìm</button>
<a href="<?= admin_url('news?type=news'); ?>" class="btn btn-secondary">Làm lại</a>
</div>
</div>
</form>
</div>
<div class="row-fluid sortable">		
<div class="box span12">
<form name="theForm" id="theForm" action="<?= admin_url('news/delete_all?type='.$type) ?>" method="post">
<input type="hidden" name="btnOnclick" value="">
<div class="" style="text-align: right;padding-bottom: 10px">
<a href="<?php echo admin_url('news/add?type='.$type); ?>" class="btn btn-small btn-success"><i class="ti-write"></i> Thêm mới</a>
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
<th>Trạng thái</th>
<th>Lượt xem</th>
<th>Ngày tạo</th>
<th>Cấu hình</th>
</tr>
</thead>   
<tbody class="list_item">
<?php foreach($list as $row) : ?>
<tr class="row_<?php echo $row->id; ?>">
<td>
<input type="checkbox" id="" name="id[]" value="<?php echo $row->id ?>"></td>
<td><?php echo $row->title ?></td>
<td class="center">
<?php if($row->image_name!=''): ?>
<img src="<?= $row->image_name; ?>" width="70">
<?php else: ?>
<img src="<?= public_url('site/img/noimage.png'); ?>" width="70">
<?php endif; ?>
</td>	
<td class="center">
<?php if($row->status==1): ?>
<span class="badge badge-success">Hiển thị</span>
<?php endif; ?>
<?php if($row->status==0): ?>
<span class="badge badge-warning">Tạm ẩn</span>
<?php endif; ?>
</td>
<td><span style="font-weight: bold;"><?= $row->count_view; ?></span></td>
<td class="center"><?php echo int_to_date($row->created); ?></td>
<td class="center">
<a class="btn btn-sm btn-info" href="<?php echo admin_url('news/edit/'.$row->id.'?type='.$type); ?>">
<i class="ti-pencil-alt"></i>  
</a>
<a class="btn btn-sm btn-danger" href="<?php echo admin_url('news/del/'.$row->id.'?type='.$type); ?>" onclick="return check_del();">
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