
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
  <div class="container"><!-- STRART CONTAINER -->
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="page-title">
          <h1>Đơn hàng</h1>
        </div>
      </div>
      <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Trang chủ</a></li>
          <li class="breadcrumb-item active">Đơn hàng</li>
        </ol>
      </div>
    </div>
  </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">

  <!-- START SECTION SHOP -->
  <div class="section">
    <div class="container">
      <?php if(isset($message)) : ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $message ?>
      </div>
      <?php endif; ?>

      <div class="row">
        <div class="col-12">
          <?php if(!empty($carts)): ?>
            <div class="table-responsive shop_cart_table">
              <form method="post" action="<?php echo base_url('cart/updatecart'); ?>">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="product-thumbnail">&nbsp;</th>
                      <th class="product-name">Sản phẩm</th>
                      <th class="product-price">Giá</th>
                      <th class="product-quantity">Số lượng</th>
                      <th class="product-subtotal">Thành tiền</th>
                      <th class="product-remove">Xóa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; $total_amount = 0; ?>
                    <?php foreach($carts as $row): ?>
                      <?php $product = $this->product_model->get_info($row['id']); ?>
                      <?php $total_amount = $total_amount + $row['subtotal']; ?>
                      <tr>
                        <td class="product-thumbnail">
                          <a href="<?= product_url($product->slug) ?>">
                          <img src="<?= $product->image; ?>" alt="<?= $product->name; ?>">
                        </a>
                      </td>
                        <td class="product-name" data-title="<?= $product->name; ?>">
                          <a href="<?= product_url($product->slug) ?>"><?= $product->name; ?></a>
                        </td>
                        <td class="product-price" data-title="Price"><?= number_format($row['price']); ?></td>
                        <td class="product-quantity" data-title="Quantity"><div class="quantity">
                          <input type="button" value="-" class="minus">
                          <input type="text" name="qty_<?= $row['id']; ?>" value="<?= $row['qty']; ?>" title="Qty" class="qty" size="4">
                          <input type="button" value="+" class="plus">
                        </div></td>
                        <td class="product-subtotal" data-title="Total"><?php echo number_format(nhan($row['qty'],$row['price'])); ?></td>
                        <td class="product-remove" data-title="Remove"><a href="<?php echo base_url('cart/del/'.$row['id']) ?>"><i class="ti-close"></i></a></td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6" class="px-0">
                          <div class="row no-gutters align-items-center">

                            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                              <div class="coupon field_form input-group">
                                <!-- <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code.."> -->
                                <div class="input-group-append">
                                  <a href="<?= base_url() ?>" class="btn btn-fill-out btn-sm" >Tiếp tục mua hàng</a>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-8 col-md-6 text-left text-md-right">
                              <button class="btn btn-line-fill btn-sm" type="submit">Cập nhật số lượng</button>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </form>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="medium_divider"></div>
            <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
            <div class="medium_divider"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="heading_s1 mb-3">
              <h6>Thông tin nhận hàng</h6>
              <p class="btn-dd"><a href="<?= base_url('login') ?>">Đăng nhập</a> hoặc <a href="<?= base_url('register') ?>">Đăng ký</a> để lưu thông tin nhận hàng</p>
            </div>
            <div class="alert-content"></div>

            <form class="field_form shipping_calculator">
              <input type="hidden" name="userid" value="<?= (isset($userLog) && !empty($userLog)) ? $userLog->id : '';  ?>">
              <div class="form-row">
                <div class="form-group col-lg-12">
                   <input required="required" placeholder="Họ và tên *" class="form-control" name="name" type="text" value="<?= (isset($userLog) && !empty($userLog)) ? $userLog->name : '';  ?>">
                   <div class="alert-err"><?= form_error('name'); ?></div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-12">
                   <input required="required" placeholder="Điện thoại *" class="form-control" name="phone" type="text" value="<?= (isset($userLog) && !empty($userLog)) ? $userLog->phone : '';  ?>">
                  <div class="alert-err"><?= form_error('phone'); ?></div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-12">
                   <input required="required" placeholder="Email" class="form-control" name="email" type="text" value="<?= (isset($userLog) && !empty($userLog)) ? $userLog->email : '';  ?>">
                  <div class="alert-err"><?= form_error('email'); ?></div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-12">
                   <input required="required" placeholder="Địa chỉ nhận hàng *" class="form-control" name="address" type="text" value="<?= (isset($userLog) && !empty($userLog)) ? $userLog->address : '';  ?>">
                   <div class="alert-err"><?= form_error('address'); ?></div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-12">
                   <textarea class="form-control" rows="4" name="content" placeholder="Yêu cầu khác"></textarea>
                </div>
              </div>

            <div id="successID" class="successid">Đặt hàng thành công, chúng tôi sẽ liên hệ sớm nhất ! <a href="<?= base_url() ?>">Quay lại trang chủ</a></div>
              
              <div class="form-row">
                <div class="form-group col-lg-12">
                  <button class="btn btn-dathang" id="createCart" data-url="<?= base_url('cart/ajaxCheckout') ?>" type="button">Xác nhận đặt hàng</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="border p-3 p-md-4">
              <div class="heading_s1 mb-3">
                <h6>Đơn hàng của bạn</h6>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <?php foreach($carts as $row): ?>
                      <?php $product = $this->product_model->get_info($row['id']); ?>
                    <tr>
                      <td class="cart_total_label"><?= $product->name; ?></td>
                      <td class="cart_total_amount"><?= $row['qty'] ?> x <?= number_format($row['price']) ?>đ</td>
                      <td><?= number_format(nhan($row['qty'],$row['price'])) ?> đ</td>
                    </tr>
                  <?php endforeach; ?>
                    <tr>
                      <td class="cart_total_label">Tổng tiền</td>
                      <td></td>
                      <td class="cart_total_amount"><strong><?= number_format($this->cart->total()) ?> đ</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END SECTION SHOP -->



  </div>
<!-- END MAIN CONTENT -->