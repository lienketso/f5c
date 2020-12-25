<section class="page-head">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?= base_url() ?>"><?= ($lang=='vn') ? 'Trang chủ' : "Home" ?></a></li>
              <li><?= ($lang=='vn') ? 'Liên hệ' : "Contact" ?></li>
            </ul>
            <h1><?= ($lang=='vn') ? 'Liên hệ' : "Contact" ?></h1>  
          </div>
        </div>
      </div>
    </section>
<section class="contact-us bg-gray">
            <div class="container">
                <div class="property-location mb-5">
                    <h3><?= ($lang=='vn') ? 'Văn phòng giao dịch' : 'Office'; ?></h3>
                    <div class="divider-fade"></div>
                    <div class="iframe_map">
                        <?= $arrSetting['site_gogle_map']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <h3 class="mb-4 title-bds-lq"><?= ($lang=='vn') ? 'Liên hệ với chúng tôi' : 'Contact us'; ?></h3>
                        <form id="contactformD" class="contact-form-f" name="contactform" method="post" novalidate="novalidate">
                            <div id="" class="successformS">
                                <?php if(isset($message)) { $this->load->view('site/message', $this->data); } ?>
                            </div>
   
                            <div class="form-group">
                                <label><?= ($lang=='vn') ? 'Họ và tên' : 'Full Name'; ?></label>
                                <input type="text" required="" class="form-control input-custom input-full" name="name" placeholder="" aria-required="true">
                                <div class="alert-err"><?= form_error('name') ?></div>
                            </div>
                            <div class="form-group">
                                <label><?= ($lang=='vn') ? 'Số điện thoại' : 'Phone number'; ?></label>
                                <input type="text" required="" class="form-control input-custom input-full" name="phone" placeholder="" aria-required="true">
                                 <div class="alert-err"><?= form_error('phone') ?></div>
                            </div>
                 
                            <div class="form-group">
                                <label><?= ($lang=='vn') ? 'Lời nhắn' : 'Messenger'; ?></label>
                                <textarea class="form-control textarea-custom input-full" id="" name="content"rows="4" placeholder="" ></textarea>
                            </div>
                            <div class="button-css" style="text-align: right; padding-top: 10px;">
                            <button type="submit" id="" class="btn-contact"><?= ($lang=='vn') ? 'Gửi yêu cầu' : 'Send request'; ?></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 col-md-12 bgcd">
                        <div class="call-info">
                            <h3><?= ($lang=='vn') ? 'Chi tiết liên hệ' : 'Contact detail'; ?></h3>
                            <p class="" style="padding-top: 20px;"><?= ($lang=='vn') ? 'Để chúng tôi có thể hỗ trợ quý khách một cách nhanh chóng nhất, vui lòng liên hệ với chúng tôi theo thông tin ngay dưới đây' : '
For us to assist you as quickly as possible, please contact us at the information below.'; ?></p>
                            <ul>
                                <li>
                                    <div class="info">
                                        
                                        <p class="in-p"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $arrSetting['site_address_'.$lang] ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <p class="in-p"><i class="fa fa-phone" aria-hidden="true"></i> <?= $arrSetting['site_hotline_vn'] ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <p class="in-p ti"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?= $arrSetting['site_email_vn'] ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info cll">
                                        <p class="in-p ti"><i class="fa fa-clock-o" aria-hidden="true"></i> 8:00 - 17:00 </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>