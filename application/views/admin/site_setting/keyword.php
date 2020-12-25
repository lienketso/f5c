<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
		<li class="breadcrumb-item active" aria-current="page">Cấu hình trang liên hệ </li>
	</ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập thông tin sửa từ khóa</h4>
					<div class="form-group" style="text-align: right;">
						<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
					</div>
					<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_search_<?= $lang ?>" value="<?= $arrSetting['key_search_'.$lang] ?>" class="form-control" placeholder="Tiêu đề top">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_seemore_<?= $lang ?>" value="<?= $arrSetting['key_seemore_'.$lang] ?>" class="form-control" placeholder="Tất cả">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_memberchinh_<?= $lang ?>" value="<?= $arrSetting['key_memberchinh_'.$lang] ?>" class="form-control" placeholder="Nhập tên sản phẩm">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_memberlk_<?= $lang ?>" value="<?= $arrSetting['key_memberlk_'.$lang] ?>" class="form-control" placeholder="Danh mục sản phẩm">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_regishv_<?= $lang ?>" value="<?= $arrSetting['key_regishv_'.$lang] ?>" class="form-control" placeholder="Sản phẩm nổi bật">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_gallery_<?= $lang ?>" value="<?= $arrSetting['key_gallery_'.$lang] ?>" class="form-control" placeholder="Tất cả sản phẩm">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_news_<?= $lang ?>" value="<?= $arrSetting['key_news_'.$lang] ?>" class="form-control" placeholder="Thêm vào giỏ">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_send_<?= $lang ?>" value="<?= $arrSetting['key_send_'.$lang] ?>" class="form-control" placeholder="Deal hot trong ngày">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_sendhh_<?= $lang ?>" value="<?= $arrSetting['key_sendhh_'.$lang] ?>" class="form-control" placeholder="đ">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_fullname_<?= $lang ?>" value="<?= $arrSetting['key_fullname_'.$lang] ?>" class="form-control" placeholder="Xem tất cả">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_email_<?= $lang ?>" value="<?= $arrSetting['key_email_'.$lang] ?>" class="form-control" placeholder="Góc Chia Sẻ Món Ăn">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_phone_<?= $lang ?>" value="<?= $arrSetting['key_phone_'.$lang] ?>" class="form-control" placeholder="Xem thêm">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_website_<?= $lang ?>" value="<?= $arrSetting['key_website_'.$lang] ?>" class="form-control" placeholder="Nhận ngay vouce 500.000 VND">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_messenger_<?= $lang ?>" value="<?= $arrSetting['key_messenger_'.$lang] ?>" class="form-control" placeholder="Chỉ cần đăng ký là thành viên để nhận ngay Voucher 50.000đ cho lần mua hàng đầu tiên">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_follow_<?= $lang ?>" value="<?= $arrSetting['key_follow_'.$lang] ?>" class="form-control" placeholder="Nhập số điện thoại">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_home_<?= $lang ?>" value="<?= $arrSetting['key_home_'.$lang] ?>" class="form-control" placeholder="Gửi ngay">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_bandieuhang_<?= $lang ?>" value="<?= $arrSetting['key_bandieuhang_'.$lang] ?>" class="form-control" placeholder="Miễn phí vận chuyển">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_hoiviendoitac_<?= $lang ?>" value="<?= $arrSetting['key_hoiviendoitac_'.$lang] ?>" class="form-control" placeholder="Với đơn hàng từ 300k, bán kính nhỏ hơn 5km">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_lienquan_<?= $lang ?>" value="<?= $arrSetting['key_lienquan_'.$lang] ?>" class="form-control" placeholder="Đổi trả hàng trong 2 ngày">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_truso_<?= $lang ?>" value="<?= $arrSetting['key_truso_'.$lang] ?>" class="form-control" placeholder="Nội dung đổi trả hàng">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_vanphong_<?= $lang ?>" value="<?= $arrSetting['key_vanphong_'.$lang] ?>" class="form-control" placeholder="Hỗ trợ từ 8h đến 22h">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_price_<?= $lang ?>" value="<?= $arrSetting['key_price_'.$lang] ?>" class="form-control" placeholder="Nội dung hỗ trợ">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_addcart_<?= $lang ?>" value="<?= $arrSetting['key_addcart_'.$lang] ?>" class="form-control" placeholder="Thêm vào giỏ hàng">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_infomation_<?= $lang ?>" value="<?= $arrSetting['key_infomation_'.$lang] ?>" class="form-control" placeholder="Thông tin">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_support_<?= $lang ?>" value="<?= $arrSetting['key_support_'.$lang] ?>" class="form-control" placeholder="Hỗ trợ khách hàng">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_splienquan_<?= $lang ?>" value="<?= $arrSetting['key_splienquan_'.$lang] ?>" class="form-control" placeholder="Sản phẩm liên quan">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_headtitle_<?= $lang ?>" value="<?= $arrSetting['key_headtitle_'.$lang] ?>" class="form-control" placeholder="Tiêu đề công ty">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_orderlist_<?= $lang ?>" value="<?= $arrSetting['key_orderlist_'.$lang] ?>" class="form-control" placeholder="Đơn đặt hàng">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_delete_<?= $lang ?>" value="<?= $arrSetting['key_delete_'.$lang] ?>" class="form-control" placeholder="Xóa">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_donvitinh_<?= $lang ?>" value="<?= $arrSetting['key_donvitinh_'.$lang] ?>" class="form-control" placeholder="Đơn vị tính">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_quantity_<?= $lang ?>" value="<?= $arrSetting['key_quantity_'.$lang] ?>" class="form-control" placeholder="Số lượng">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_intomoney_<?= $lang ?>" value="<?= $arrSetting['key_intomoney_'.$lang] ?>" class="form-control" placeholder="Thành tiền">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_chiec_<?= $lang ?>" value="<?= $arrSetting['key_chiec_'.$lang] ?>" class="form-control" placeholder="Chiếc">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_totalamount_<?= $lang ?>" value="<?= $arrSetting['key_totalamount_'.$lang] ?>" class="form-control" placeholder="Tổng tiền">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_updatecart_<?= $lang ?>" value="<?= $arrSetting['key_updatecart_'.$lang] ?>" class="form-control" placeholder="Cập nhật số lượng">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_orderconfirm_<?= $lang ?>" value="<?= $arrSetting['key_orderconfirm_'.$lang] ?>" class="form-control" placeholder="Xác nhận đặt hàng">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_infonhanhang_<?= $lang ?>" value="<?= $arrSetting['key_infonhanhang_'.$lang] ?>" class="form-control" placeholder="Thông tin người nhận">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_orderaddress_<?= $lang ?>" value="<?= $arrSetting['key_orderaddress_'.$lang] ?>" class="form-control" placeholder="Địa chỉ">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_payments_<?= $lang ?>" value="<?= $arrSetting['key_payments_'.$lang] ?>" class="form-control" placeholder="Hình thức thanh toán">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_paydelivery_<?= $lang ?>" value="<?= $arrSetting['key_paydelivery_'.$lang] ?>" class="form-control" placeholder="Thanh toán khi nhận hàng">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_transfer_<?= $lang ?>" value="<?= $arrSetting['key_transfer_'.$lang] ?>" class="form-control" placeholder="Chuyển khoản">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_ordernow_<?= $lang ?>" value="<?= $arrSetting['key_ordernow_'.$lang] ?>" class="form-control" placeholder="Đặt hàng">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" name="key_yourorder_<?= $lang ?>" value="<?= $arrSetting['key_yourorder_'.$lang] ?>" class="form-control" placeholder="Đơn hàng của bạn">
						</div>
					</div>
				</div>
					<button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
				</div>
			</div>
		</div>
	</div>
</form>