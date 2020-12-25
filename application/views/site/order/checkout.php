    <section class="breadcrum" style="background-image: url(<?= $arrSetting['banner_product']; ?>);">
      <div class="head-breadcrumb">
        <h3 class="title-hidden"></h3>
      </div>
    </section>

        <section class="about-page pdt50">

            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-checkout">
                            <form class="frm-checkout" action="" method="POST" role="form">
                                <div class="row">
                                    <div class="col-lg-12"> 
                                        <h4 class="title-checkout"><?= $arrSetting['key_infonhanhang_'.$lang]; ?></h4>
                                    </div>
                                    <div class="col-lg-6">  
                                        <div class="form-group">
                                            <label for=""><?= $arrSetting['key_fullname_'.$lang]; ?> (<span>*</span>)</label>
                                            <input type="text" name="name" class="form-control" id="" placeholder="Nhập họ tên" value="<?= set_value('name') ?>" >
                                            <div class="alert-err"><?php echo form_error('name'); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">  
                                        <div class="form-group">
                                            <label for=""><?= $arrSetting['key_phone_'.$lang]; ?> (<span>*</span>)</label>
                                            <input type="text" name="phone" class="form-control" id="" placeholder="Nhập số điện thoại" value="<?= set_value('phone') ?>">
                                            <div class="alert-err"><?php echo form_error('phone'); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12"> 
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" id="" placeholder="Nhập email" value="<?= set_value('email') ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12"> 
                                        <div class="form-group">
                                            <label for=""><?= $arrSetting['key_orderaddress_'.$lang]; ?> (<span>*</span>)</label>
                                            <input type="text" name="address" class="form-control" id="" placeholder="Nhập địa chỉ" value="<?= set_value('address') ?>">
                                            <div class="alert-err"><?php echo form_error('address'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12"> 
                                        <div class="form-group">
                                            <label for=""><?= $arrSetting['key_payments_'.$lang]; ?></label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="payment" id="input" value="tructiep" checked="checked" onclick="hidepayment()">
                                                    <?= $arrSetting['key_paydelivery_'.$lang] ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="payment" id="input" value="chuyenkhoan" onclick="showpayment()">
                                                    <?= $arrSetting['key_transfer_'.$lang]; ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" id="chuyenkhoan">
                                        <div class="info-payment">
                                            <?= $arrSetting['banner_title_1_'.$lang]; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-12"> 
                                        <h4 class="title-checkout"><?= $arrSetting['key_hoiviendoitac_'.$lang]; ?></h4>
                                    </div>

                                    <div class="col-lg-12"> 
                                        <div class="form-group">
                                            <label for=""><?= $arrSetting['key_messenger_'.$lang]; ?></label>
                                            <textarea name="content" placeholder="Nhập nội dung" rows="4" class="form-control"><?= set_value('content'); ?></textarea>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn-checkout"><?= $arrSetting['key_ordernow_'.$lang]; ?></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="info-cart">
                            <h4 class="title-checkout"><?= $arrSetting['key_yourorder_'.$lang] ?></h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><?= $arrSetting['key_memberlk_'.$lang] ?></th>
                                            <th style="text-align: right;"><?= $arrSetting['key_intomoney_'.$lang] ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($carts as $row): ?>
                                            <?php $product = $this->product_model->get_info($row['id']); ?>
                                            <tr>
                                                <td><?= $product->name; ?> ( x <?= $row['qty']; ?> )</td>
                                                <td style="text-align: right;"><?php echo number_format(nhan($row['qty'],$row['price'])); ?> đ</td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr style="font-weight: bold;">
                                            <td><?= $arrSetting['key_totalamount_'.$lang] ?></td>
                                            <td style="text-align: right;"><?= number_format($total_amount); ?> đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="lienhe-cart">
                            <?= $arrSetting['site_footer_contact_'.$lang]; ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>