<div class="content-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card px-2">
                      <div class="card-body">
                          <div class="container-fluid">
                            <h3 class="text-right my-5">Hóa đơn&nbsp;&nbsp;#INV-<?= $info->id; ?></h3>
                            <hr>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-4 pl-0">
                              <p class="mt-5 mb-2"><b>Thông tin khách hàng</b></p>
                              <p>Tên khách hàng :<?php echo $info->name; ?></p>
                              <p>Điện thoại : <?php echo $info->phone; ?></p>
                              <p>Email : <?php echo $info->email; ?></p>
                            </div>
                            <div class="col-lg-4 pr-0">
                              <p class="mt-5 mb-2 text-right"><b>Địa chỉ nhận hàng</b></p>
                              <p class="text-right"><?= $info->address; ?></p>
                            </div>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                              <p class="mb-0 mt-5">Đặt hàng lúc : <?= showdate($info->created_at); ?></p>
                              <p></p>
                            </div>
                          </div>
                          <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                  <thead>
                                    <tr class="bg-dark ">
                                        <th>#</th>
                                        <th>Sản phẩm</th>
                                        <th class="text-right">Số lượng</th>
                                        <th class="text-right">Đơn giá</th>
                                        <th class="text-right">Thành tiền</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  	<?php $i = 1; ?>
                                  <?php foreach($listorder as $row): ?>
                                  <?php $product = $this->product_model->get_info($row->product_id); ?>
                                    <tr class="text-right">
                                      <td class="text-left"><?= $i++; ?></td>
                                      <td class="text-left"><?= $product->name; ?></td>
                                      <td><?php echo $row->qty; ?></td>
                                      <td><?= number_format($product->price); ?> đ</td>
                                      <td><?= number_format($row->amount); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          <div class="container-fluid mt-5 w-100">
                    <h4 class="text-right mb-5">Tổng đơn hàng : <?=number_format($info->amount); ?> đ</h4>
                            <hr>
                          </div>
                          <div class="container-fluid w-100">
                            <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi mdi-printer mr-1"></i>In đơn hàng</a>
                            <a href="#" class="btn btn-success float-right mt-4"><i class="mdi mdi-telegram mr-1"></i>Send Invoice</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>