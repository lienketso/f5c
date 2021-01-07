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
                              <?php $customer = unserialize($info->contact);  ?>
                              <p>Tên khách hàng : <?= $customer['name'] ?></p>
                              <p>Điện thoại : <?= $customer['phone'] ?></p>
                              <p>Email : <?= $customer['email'] ?></p>
                            </div>
                            <div class="col-lg-4 pr-0">
                              <p class="mt-5 mb-2 text-right"><b>Địa chỉ nhận hàng</b></p>
                              <p class="text-right"><?= (isset($customer['address'])) ? $customer['address'] : ''; ?>, <?= (isset($customer['district'])) ? $this->district_model->getDistrict($customer['district']) : ''; ?>, <?= (isset($customer['city'])) ? $this->city_model->getCity($customer['city']) : ''; ?></p>
                            </div>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                              <p class="mb-0 mt-5">Đặt hàng lúc : <?= int_to_date($info->created); ?></p>
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
                                      <td><?php echo $row->quantity; ?></td>
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

                      </div>
                  </div>
              </div>
          </div>
        </div>