<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<div class="row">
<div class="col-lg-12 grid-margin d-flex flex-column">
<div class="row">
<div class="col-md-3 grid-margin stretch-card">
<div class="card">
<div class="card-body text-center">
<div class="text-primary mb-4">
<i class="ti-pie-chart mdi-36px"></i>
<p class="font-weight-medium mt-2">Doanh thu</p>
</div>
<h1 class="font-weight-light"><?= number_format($totalAmount) ?></h1>
<p class="text-muted mb-0">Doanh thu online đã bán</p>
</div>
</div>
</div>
<div class="col-md-3 grid-margin stretch-card">
<div class="card">
<div class="card-body text-center">
<div class="text-danger mb-4">
<i class="mdi mdi-chart-pie mdi-36px"></i>
<p class="font-weight-medium mt-2">Hôm nay</p>
</div>
<h1 class="font-weight-light"><?= today(); ?></h1>
<p class="text-muted mb-0">Truy cập hôm nay</p>
</div>
</div>
</div>
<div class="col-md-3 grid-margin stretch-card">
<div class="card">
<div class="card-body text-center">
<div class="text-info mb-4">
<i class="mdi mdi-car mdi-36px"></i>
<p class="font-weight-medium mt-2">Hôm qua</p>
</div>
<h1 class="font-weight-light"><?= yesterday() ?></h1>
<p class="text-muted mb-0">Truy cập hôm qua</p>
</div>
</div>
</div>
<div class="col-md-3 grid-margin stretch-card">
<div class="card">
<div class="card-body text-center">
<div class="text-success mb-4">
<i class="mdi mdi-verified mdi-36px"></i>
<p class="font-weight-medium mt-2">Tổng</p>
</div>
<h1 class="font-weight-light"><?= totalview() ?></h1>
<p class="text-muted mb-0">Tổng truy cập</p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Sản phẩm xem nhiều nhất</h4>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Tiêu đề</th>
<th>Lượt xem</th>
<th>Link</th>
<th>Ngày post</th>
</tr>
</thead>
<tbody>
<?php foreach($productViewmore as $l): ?>
<tr>
<td><?= $l->name; ?></td>
<td><?= $l->count_view; ?></td>
<td><a href="" target="_blank">Xem</a></td>
<td>chuwa</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="col-lg-6 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Bài viết xem nhiều</h4>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Tiêu đề</th>
<th>Lượt xem</th>
<th>Xem bài viết</th>
</tr>
</thead>
<tbody>
<?php foreach($listView as $l): ?>
<tr>
<td><?= $l->title; ?></td>
<td><?= $l->count_view; ?></td>
<td><a target="_blank" class="btn btn-primary btn-sm" href="">Xem</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>