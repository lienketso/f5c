<?php $this->load->view('site/blocks/block_menu') ?>
<div class="breadcrum-f">
	<div class="container">
		<ul class="list-bread">
			<li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
			<li><span> Thông báo đặt hàng</span></li>
		</ul>
	</div>
</div>

<section class="sidebar-news">
	<div class="container">
		<div class="content-success">
			<p>Đặt hàng thành công !</p>
			<div class="info-dathang">
				<h2 class="title_order">Đơn hàng của bạn đã hoàn tất</h2>
				<div class="list_donhang">
					<table class="list_order">
						<tr>
							<td>TT</td>
							<td>Tên sản phẩm</td>
							<td>Số lượng</td>
							<td>Giá ( đ )</td>
							<td>Thành tiền</td>
						</tr>
						<?php $i = 1; ?>
						<?php foreach($order as $row): ?>
							<?php 
								$product = $this->product_model->get_info($row->product_id);
							 ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><?= $product->name; ?></td>
							<td><?= $row->quantity; ?></td>
							<td><?= number_format($row->price); ?></td>
							<td><?= number_format($row->amount); ?></td>
						</tr>
					<?php endforeach; ?>

						<tr>
							<td colspan="4"><strong>Tổng tiền</strong></td>
							<td><strong><?= number_format($transaction->amount); ?> đ</strong></td>
						</tr>
					</table>
				</div>

				<div class="thongtin_succes">
					<div class="tt_user">
						<ul class="inf_user_order">
							<?php 
								$info_user = unserialize($transaction->contact);
							?>
							<li>Tên người nhận : <strong><?= $info_user['name'] ?></strong></li>
							<li>Điện thoại liên hệ : <strong><?= $info_user['phone'] ?></strong></li>
							<li>Địa chỉ nhận hàng : <strong><?= $this->city_model->getCity($info_user['city']) ?>, <?= $this->district_model->getDistrict($info_user['district']) ?> ,<?= $info_user['address'] ?></strong></li>

							<li>Phương thức thanh toán : <strong><?= ($transaction->payment=='home') ? 'Thu tiền tại nhà' : 'Chuyển khoản'; ?></strong></li>

						</ul>
					</div>
					<div class="tt_them">
					<?= $arrSetting['site_order_success']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>