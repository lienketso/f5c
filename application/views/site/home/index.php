 <div class="on-top-fixed"></div>

 <div class="container">
  <section class="row">
    <section class="row">
      <div class="col-lg-9">
        <div class="row">
          <!-- danh muc san pham -->
          <div class="col-md-3 col-sm-12 no-padding-right danh-muc">
            <ul class="list-group">
              <li class="menu-lv1 list-group-item title">DANH SÁCH SẢN PHẨM</li>
              <?php if($allCategory && !empty($allCategory)): ?>
                <?php foreach($allCategory as $row): ?>
                  <li class="menu-lv1 list-group-item ">
                    <a href="<?= $row['link'] ?>" style="margin-left:2px"> 
                      <i class="fa <?= $row['class_icon'] ?>"></i> <?= $row['name']; ?></a>
                      <?php if(!empty($row['subcat'])): ?>
                        <div class="mega-menu">
                          <div class="img-mega">
                          </div>
                          <ul class="list-unstyled list-sup-lv2">
                            <?php foreach($row['subcat'] as $sub):  ?>
                              <li class="menu-lv2">
                                <a href="<?= $sub['link'] ?>" ><?= $sub['name']; ?></a>
                                <?php if(!empty($sub['subcat'])): ?>
                                  <ul class="list-sup-lv3 list-inline">
                                    <?php foreach($sub['subcat'] as $sub_s): ?>
                                      <li class="menu-lv3 " >
                                        <a href="<?= $sub_s['link'] ?>" ><?= $sub_s['name']; ?></a>
                                      </li>
                                    <?php endforeach; ?>
                                    <li class="menu-lv3"><a class="xem-all" href="javascript:void(0)">Xem tất cả</a></li>
                                  </ul>
                                <?php endif; ?>

                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                <?php endif; ?>

              </ul>
            </div>

            <div class="col-md-9 col-sm-12 no-padding">
              <div class="head-owl-banner clearfix">
                <a href="#" class="b-link gt-dn">Giới thiệu doanh nghiệp</a>
                <a href="#">Hướng dẫn mua hàng </a>
                <a href="#" class="b-link km">Khuyến mại</a>
              </div>
              
              <!-- slide top -->
              <div class="owl-banner">
                <?php foreach($slideTop as $row): ?>
                  <div class="item">
                    <a href="<?= $row->link; ?>" title="<?= $row->name; ?>">
                      <img alt="<?= $row->name; ?>" src="<?= product_link($row->image_name); ?>">
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
              

            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="clearfix">
            <div class="dropdown login">
              <div id='account_panel'>
                <!-- Thanh vien chua dang nhap -->
                <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#modal-login">
                  <span>Đăng nhập </span> <br>Tài khoản &amp; Đơn hàng
                  <span class="caret"></span>
                </a>

                <!-- end login--->
                <script type="text/javascript">
                  (function($)
                  {
                    $(document).ready(function()
                    {
                      var main = $('#account_panel');

// Hien thi form login cho account
$('.act_account_login').click(function()
{
  $.colorbox({inline:true, href:'#account_login', opacity:0.75});
  return false;
});

    // Form login action
    var login = $('#account_login form');
    login.nstUI(
    {
      method: 'formAction',
      formAction:
      {
        field_load: login.attr('_field_load'),
        event_complete: function()
        {
          window.location.reload();
        },
        event_error_: function()
        {
          //window.parent.location = login.attr('_redirect');
        }
      }
    });
    
  });
                  })(jQuery);

/**
 * Thay doi captcha
 */
 function change_captcha(field)
 {
  var t = jQuery('#'+field);
  var url = t.attr('_captcha')+'?id='+Math.random();
  t.attr('src', url);
  
  return false;
}

</script>


<style>
  #modal-login .upload_single_image img.img_border{
    width:100px;height:80px;
    float:left;
  }
  #modal-login .upload_single_image {
    position:relative;
  }
  #modal-login .upload_single_image .upload_action{
    position:absolute;
    left:110px;top:30px;
  }
  #modal-login .error p{
    margin-bottom:0px;
  }
</style>

<!-- =========form dang ky/ dang nhap=========== -->

<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="account_login">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/close.png"></span></button>
        <div class="row">
          <div class="col-md-7 col-sm-7">
            <div class="heading">
              <p class="title">Đăng ký tài khoản dành cho khách hàng mới</p>
              <p>Đăng ký trực tiếp từ F5 để nhận 20 điểm  thưởng</p>
            </div>
            
            <form class="form-horizontal" action="https://f5c.vn/register.html" method="post">
              <div class="form-group">
                <label class="col-lg-4 col-md-4 control-label" for="inputEmail">Email <span>(*)</span></label>
                <div class="col-lg-8 col-md-8">
                  <input type="text" placeholder="" name="email" id="inputEmail" class="form-control">
                  <div class="clear"></div>
                  <div name="email_error" class="error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4 control-label" for="inputPassword">Mật khẩu <span>(*)</span></label>
                <div class="col-lg-8 col-md-8">
                  <input type="password" placeholder="" id="inputPassword" name="password" class="form-control">
                  <div name="password_autocheck" class="autocheck"></div>
                  <div class="clear"></div>
                  <div name="password_error" class="error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4 control-label" for="inputPassword2">Nhập lại mật khẩu <span>(*)</span></label>
                <div class="col-lg-8 col-md-8">
                  <input type="password" placeholder="" id="inputPassword2" name="password_repeat" class="form-control">
                  <div name="password_repeat_autocheck" class="autocheck"></div>
                  <div class="clear"></div>
                  <div name="password_repeat_error" class="error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4 control-label" for="inputName">Họ và tên <span>(*)</span></label>
                <div class="col-lg-8 col-md-8">
                  <input type="text" placeholder="" name="name" id="inputName" class="form-control">
                  <div name="name_autocheck" class="autocheck"></div>
                  <div class="clear"></div>
                  <div name="name_error" class="error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4 control-label" for="inputDC">Địa chỉ <span>(*)</span></label>
                <div class="col-lg-8 col-md-8">
                  <input type="text" placeholder="" name="address" id="inputDC" class="form-control">
                  <span name="address_autocheck" class="autocheck"></span>
                  <div class="clear"></div>
                  <div name="address_error" class="error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4 control-label" for="inputDD">Di động <span>(*)</span></label>
                <div class="col-lg-8 col-md-8">
                  <input type="text" placeholder="" id="inputDD" name="phone" class="form-control">
                  <span name="phone_autocheck" class="autocheck"></span>
                  <div class="clear"></div>
                  <div name="phone_error" class="error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4 control-label" for="inputGT">Giới tính</label>
                <div class="col-lg-8 col-md-8">
                  <label>
                    <input type="radio" checked="" id="inputGT" name="sex" value="0" >Nam
                  </label>
                  <label>
                    <input type="radio"  id="inputGT2" name="sex" value="1">Nữ
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4 control-label" for="ngay-thang">Ngày tháng năm sinh <span>(*)</span></label>
                <div class="col-lg-8 col-md-8">

                  <input name="birthday" id="param_birthday"  value="1-1-1990" type="text" class="form-control datepicker2"/>
                  <span name="birthday_autocheck" class="autocheck"></span>
                  <div class="clear"></div>
                  <div name="birthday_error" class="error"></div>
                  
                </div>
              </div>
              
              <div class="form-group inputfile">
                <label class="col-lg-4 col-md-4 control-label" for="exampleInputFile">Chọn Avanta</label>
                <div class="col-lg-8 col-md-8">
                  <div><script type="text/javascript" src="https://f5c.vn/public/js/jquery/plupload/plupload.full.js"></script>
                    <script type="text/javascript" src="https://f5c.vn/public/js/jquery/plupload/script.js"></script>

                    <div class="upload_single_image textC">
                      <div class="upload_complete"></div>
                      <div class="clear"></div>
                      
                      <div class="upload_info link1" style="display:none;"></div>
                      <div class="clear"></div>
                      
                      <div class="upload_error" style="display:none;"></div>
                      <div class="clear"></div>
                      
                      <div class="upload_action link1" style="margin-top:2px;">
                        <a href="" id="action_upload">Chọn File</a> | 
                        <a href="" id="action_del">Xóa File</a>
                      </div>
                      <div class="clear"></div>
                      
                      
                      <!-- Temp html -->
                      
                      <div id="temp" style="display:none">
                        <div id="upload_complete">
                          <a href="{file_url}" onclick="lightbox(this); return false;">
                            <img width="150" class="img_border">
                          </a>
                        </div>
                        
                        <div id="upload_info">
                          <div class="contentProgress" style="width:150px; margin-top:3px;"><div class="progress barG" style="width:{file_progress}%;"></div></div>
                        </div>
                        
                        <div id="upload_error">
                          <div><b>{file_name}</b> ({file_size})</div>
                          <div class="error f12">Error: {file_error}</div>
                        </div>
                      </div>
                      
                    </div></div>
                    <div name="image_id_error" class="clear error"></div>
                  </div>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="send_email">Nhận tin và chương trình khuyến mại của F5C qua email.
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="rule">Tôi đã đọc và đồng ý với <a href="https://f5c.vn/thong-tin/dieu-khoan-su-dung/i25.html" target="_blank">điều khoản sử dụng</a>  của F5C
                  </label>
                  <span name="rule_autocheck" class="autocheck"></span>
                  <div class="clear"></div>
                  <div name="rule_error" class="error"></div>
                </div>
                
                <div class="form-group text">
                  <div class="img">
                    <img id="register_captcha" src="https://f5c.vn/captcha/four.html" _captcha="https://f5c.vn/captcha/four.html" class="dInline">
                    <a href="" onclick="change_captcha('register_captcha'); return false;" class="dInline">
                      <img src="https://f5c.vn/<?= public_url('site/lib') ?>/css/img/reset.png" class="dInline" style="margin:5px;">
                    </a>
                  </div>
                  
                  <input name="security_code" id="param_security_code"  style="width:90px;" class="form-control" type="text" />
                  <div name="security_code_autocheck" class="autocheck"></div>
                  <div class="clear"></div>
                  <div name="security_code_error" class="error"></div> 
                </div>
                <button class="btn btn-default btn-dk" type="submit">Đăng Ký</button>
              </form>
            </div>
            <div class="col-md-5 col-sm-5 col-right" style="margin-top:0px">
              <p class="title"><b> Hoặc Đăng ký Bằng</b></p>
              <a href="https://f5c.vn/oauth/facebook.html" class="register-face "><i class="fa fa-facebook"></i>Đăng Ký bằng Facebook</a>
              <a href="https://f5c.vn/oauth/google.html" class="register-mail "><i class="fa fa-google-plus"></i>Đăng Ký bằng Email google</a>
              <br>
              <p class="title"><b>Bạn đã có tài khoản</b></p>
              <form class="form-horizontal" action="https://f5c.vn/login.html" method="post">
                <div class="hideit red textC fontB" style="display:none" name="login_error"></div>
                <div class="clear"></div>
                
                <div class="form-group">
                  <label class="col-lg-4 col-md-4 control-label" for="inputEmail">Email <span>(*)</span></label>
                  <div class="col-lg-8 col-md-8">
                    <input type="text" placeholder="" name="email" id="inputEmail" class="form-control">
                    <div class="clear"></div>
                    <div name="email_error" class="error"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-4 col-md-4 control-label" for="inputPassword">Mật khẩu <span>(*)</span></label>
                  <div class="col-lg-8 col-md-8">
                    <input type="password" placeholder="" id="inputPassword" name="password" class="form-control">
                    <div name="password_autocheck" class="autocheck"></div>
                    <div class="clear"></div>
                    <div name="password_error" class="error"></div>
                  </div>
                </div>
                
                <div class="checkbox">
                  <label>
                    <input type="checkbox"  name="remember">
                    Ghi nhớ đăng nhập | <a href="https://f5c.vn/forgot.html">Quên mật khẩu ?</a>
                  </label>
                </div>
                
                <div class="clear" style="height:10px"></div>
                
                <button class="btn btn-default btn-login" type="submit">Đăng Nhập</button>
              </form>
              <br>
              
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Ms Hiền:  
                </span>
                
                
                <a class="pull-right">
                  0934586603 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Mr Vinh:  
                </span>
                
                
                <a class="pull-right">
                  0934586604 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Mr Thành:  
                </span>
                
                
                <a class="pull-right">
                  0934586603 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Mr Quân:  
                </span>
                
                
                <a href="skype:luca_toni_711" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0903219779 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Anh Đức:  
                </span>
                
                
                <a href="skype:luca_toni_711" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0934572682 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Mr Vinh:  
                </span>
                
                
                <a href="skype:kd_hn85" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0935666443 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Minh Hoàng:  
                </span>
                
                
                <a href="skype:f5_kd8sg" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0912636619 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Quang Trường:  
                </span>
                
                
                <a href="skype:f5_kd7sg" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0987230709 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Thúy Hằng:  
                </span>
                
                
                <a href="skype:f5_kd5sg" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0909746619 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Cao Hoàng:  
                </span>
                
                
                <a href="skype:dondoanh1979" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0933050179 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Quốc Duy:  
                </span>
                
                
                <a href="skype:f5_kd3sg" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0909320709 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Thiên Ấn:  
                </span>
                
                
                <a href="skype:doan.thienan" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0982510709 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Hoa Tuyết:  
                </span>
                
                
                <a href="skype:hoatuyet_f5pro" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0904527383 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> Mr Hoài:  
                </span>
                
                
                <a href="skype:Daniel Trinh" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0934586601 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              
              <p class="ho-tro clearfix">
                <span lass="pull-left"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/phone.png"> CSKH:  
                </span>
                
                
                <a href="skype:luca_toni_711" class="pull-right"><img src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/sky.png"></a>
                <a class="pull-right">
                  0934572682 <img width="20px" src="https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/zalo.png"> 
                </a>
                
              </p>
              
              
              
              
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <!-- =============end form dang ky/ dang nhap============ -->
  
  <!-- Thanh vien da dang nhap -->
</div>      
</div>
<a class="mini-cart" href="https://f5c.vn/gio-hang.html"><span class="img-cart"></span>
  (<b class='session_red load_cart' _url='https://f5c.vn/cart/load_cart.html'></b>)
  <br>Giỏ hàng</a>
</div>
<!-- dau gia -->
<div class="dau-gia" style="max-width:265px">

  <div class="title">
    <a href="https://f5c.vn/dau-gia.html" style="color:#fff">
      Đấu giá ngược
    </a>
  </div>
  <div class="owl-dau-gia">

  </div>
</div>
</div>
</section>

</section>
<!-- Message -->

<section class="product-nb">
  <div class="container-ol">
    <div class="bao-noibat">
      <h3 class="title-nb">Sản phẩm nổi bật</h3>
      <div class="list-sp-hot">
        <div class="container">
          <div class="row">
            <?php if(!empty($listXemnhieu)): ?>
              <?php foreach($listXemnhieu as $row): ?>
                <div class="col-lg-3">
                  <div class="item-sp-hot">
                    <a class="img-sp-hot" href="<?= product_url(slug($row->name),$row->id) ?>"><img src="<?= product_link($row->image_name); ?>"></a>
                    <div class="prdLblCampaign">
                      <div class="prdLblCampaignThumb prdLblCampaignNew"><span style="background:linear-gradient(90deg,#FFC300 4.5%,#DD220D 90.3%)"> <img src="<?= public_url('site') ?>/img/icon5-50x50.png"> <small>ĐƯỢC QUAN QUÂM NHẤT</small> </span></div>
                    </div>
                    <h4><a href="<?= product_url(slug($row->name),$row->id) ?>"><?= $row->name; ?></a></h4>
                    <p><span><?= number_format($row->price) ?> ₫</span></p>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php foreach($listCatHome as $row): ?>
  <?php 
      $con['where'] = ['parent_id'=>$row->id,'show_home'=>'1'];
      $con['limit'] = [5,0];
      $uid = [$row->id];

      $listCon = $this->category_model->get_list($con);
      foreach($listCon as $cc){
        $uid[] += $cc->id;
      }
     
  ?>
  <?php 
        $p['where_in'] = ['cat_id',$uid];
        $p['order'] = ['id','desc'];
        $p['limit'] = [8,0];
        $itemProduct = $this->product_model->get_list($p);
      ?>
<section class="nhom-sp-home">
  <div class="home-menu">
    <div class="home-menu-head">
      <a href="<?= category_url($row->friendly_url) ?>" title="Các Tủ lạnh nổi bật"><?= $row->name; ?></a>
    </div>
    <ul class="l home-menu-item">
      <?php if($listCon): ?>
      <?php foreach($listCon as $c): ?>
      <li><a href="<?= category_url($c->friendly_url) ?>" title="<?= $c->name; ?>"><?= $c->name; ?></a>
      </li>
    <?php endforeach; ?>
  <?php endif; ?>
    </ul>
  </div>

  <div class="nhom-sp-product">
    <div class="row-cc">
      
      <?php if(!empty($itemProduct)): ?>
        <?php foreach($itemProduct as $k=>$pro): ?>
     <div class="col-lg-3 borderlr_<?= $k ?>"  >
      <div class="item-sp-cat">
        <a class="img-sp-cat" href="#"><img src="https://f5c.vn/upload/public/6112478aa70a4a8830d5180c15e55592_thumb.png"></a>
        <h4><a href="#"><?= $pro->name; ?></a></h4>
        <p><span><?= number_format($pro->price); ?> ₫</span></p>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

  </div>
</div>

</section>
<?php endforeach; ?>



<section class="row">
  <div class="col-md-9 col-sm-9">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="panel tin-hot">
          <div class="panel-heading">
            <a style="color:#fff" href="https://f5c.vn/tin-hot.html">Tin Hot </a>
          </div>
          <ul class="list-group">

            <li class="list-group-item">
              <div class="media">
                <a class="pull-left" href="http://f5c.vn/tin-tuc/quat-lam-mat-fred-giai-phap-lam-mat-cho-nha-hang-quan-an/i74.html">
                  <img class="media-object" src="http://f5c.vn/upload/public/81e639e4644d16bd61a53e5573ea659e_thumb.jpg">  
                </a>
                <div class="media-body">
                  <a class="media-heading" href="http://f5c.vn/tin-tuc/quat-lam-mat-fred-giai-phap-lam-mat-cho-nha-hang-quan-an/i74.html">Quạt làm mát Fred - Giải pháp làm mát cho nhà hàng, quán ăn</a>
                  <p class="media-content">Nhà hàng, quán ăn tại các thành phố thường là nơi tụ tập đông người vào những giờ cao điểm. Vì thế không gian nhà hàng, quán ăn cần cung cấp một hàm lượng oxy lớn và đảm bảo độ thông thoáng của không khí để mang lại sự dễ chịu cho khách hàng. Hơn nữa, một không gian thoáng đãng giúp cho mùi của đồ ăn thức uống bay hơi nhanh hơn và không gây ra sự khó chịu cho khách hàng.</p>
                  <a class="xem-tiep" href="http://f5c.vn/tin-tuc/quat-lam-mat-fred-giai-phap-lam-mat-cho-nha-hang-quan-an/i74.html">Xem tiếp</a>
                </div>
              </div>
            </li>
            
            <li class="list-group-item">
              <div class="media">
                <a class="pull-left" href="http://f5c.vn/tin-tuc/quat-lam-mat-fred-giai-phap-lam-mat-cho-sanh-cho/i75.html">
                  <img class="media-object" src="http://f5c.vn/upload/public/7a5788fc0488f286553c35635cf65b87_thumb.jpg">  
                </a>
                <div class="media-body">
                  <a class="media-heading" href="http://f5c.vn/tin-tuc/quat-lam-mat-fred-giai-phap-lam-mat-cho-sanh-cho/i75.html">QUẠT LÀM MÁT FRED- GIẢI PHÁP LÀM MÁT CHO SẢNH CHỜ</a>
                  <p class="media-content">Sảnh chờ là nơi có lượng khách ra vào thường xuyên chính vì vậy những nơi này cần có sự quan tâm đặc biệt từ chủ đầu tư. Việc thiết kế thế nào, trang trí ra sao, hay thái độ của nhân viên…đều là bộ mặt của sảnh chờ đối với khách hàng tới đây.</p>
                  <a class="xem-tiep" href="http://f5c.vn/tin-tuc/quat-lam-mat-fred-giai-phap-lam-mat-cho-sanh-cho/i75.html">Xem tiếp</a>
                </div>
              </div>
            </li>
            
            <li class="list-group-item">
              <div class="media">
                <a class="pull-left" href="http://f5c.vn/tin-tuc/may-giat-may-say-cong-nghiep-orient/i78.html">
                  <img class="media-object" src="http://f5c.vn/upload/public/14116e28bfcd0967c0047374b74f079e_thumb.jpg">  
                </a>
                <div class="media-body">
                  <a class="media-heading" href="http://f5c.vn/tin-tuc/may-giat-may-say-cong-nghiep-orient/i78.html">Máy Giặt- Máy Sấy Công Nghiệp Orient</a>
                  <p class="media-content">Chúng tôi Công ty Cổ Phần Đầu Tư Kim Quy trực thuộc tổng Công Ty Cổ phần Công Nghệ F5 chuyển cung cấp các loại máy giặt công nghiệp, máy sấy công nghiệp, máy là..vv phục vụ nhu cầu giặt là cho Khách sạn, bệnh viện, xưởng giặt là, tiệm giặt là..vv
                  Hotline: 0934586601</p>
                  <a class="xem-tiep" href="http://f5c.vn/tin-tuc/may-giat-may-say-cong-nghiep-orient/i78.html">Xem tiếp</a>
                </div>
              </div>
            </li>
            
            
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="panel tin-moi">
          <div class="panel-heading">
            <a  style="color:#fff" href="https://f5c.vn/tin-tuc.html">Tin Mới</a>
          </div>
          <ul class="list-group">

            <li class="list-group-item">
              <div class="media">
                <a class="pull-left" href="https://f5c.vn/tin-tuc/thong-bao-lich-nghi-le-quoc-khanh-292020/i108.html">
                  <img class="media-object" src="https://f5c.vn/upload/public/4b90a5dbaa9aa268c496d22f855dda57_thumb.jpg">  
                </a>
                <div class="media-body">
                  <a class="media-heading" href="https://f5c.vn/tin-tuc/thong-bao-lich-nghi-le-quoc-khanh-292020/i108.html">Thông báo lịch Nghỉ Lễ Quốc Khánh 2/9/2020</a>
                  <p class="media-content">Công ty Cổ phần công nghệ F5 xin trân trọng thông báo tới Quý khách hàng, Quý đối tác và toàn thể nhân viên công ty F5 lịch nghỉ lễ Quốc khánh 2/9 như sau:</p>
                  <a class="xem-tiep" href="https://f5c.vn/tin-tuc/thong-bao-lich-nghi-le-quoc-khanh-292020/i108.html">Xem tiếp</a>
                </div>
              </div>
            </li>
            
            <li class="list-group-item">
              <div class="media">
                <a class="pull-left" href="https://f5c.vn/tin-tuc/khuyen-mai-nhan-ngay-cua-me-105/i107.html">
                  <img class="media-object" src="https://f5c.vn/upload/public/88bba786ef7e40db8cf7244b1077b1a4_thumb.jpg">  
                </a>
                <div class="media-body">
                  <a class="media-heading" href="https://f5c.vn/tin-tuc/khuyen-mai-nhan-ngay-cua-me-105/i107.html">Khuyến mãi nhân ngày của mẹ 10/5</a>
                  <p class="media-content">F5c khuyến mãi đặc biệt tri ân &quot;Ngày của mẹ&quot; năm 2020, giảm giá lên đến 20% cho các sản phẩm karcher dưới đây. Thời gian áp dụng từ ngày 8/5/2020 đến ngày 17/05/2020.</p>
                  <a class="xem-tiep" href="https://f5c.vn/tin-tuc/khuyen-mai-nhan-ngay-cua-me-105/i107.html">Xem tiếp</a>
                </div>
              </div>
            </li>
            
            <li class="list-group-item">
              <div class="media">
                <a class="pull-left" href="https://f5c.vn/tin-tuc/thong-bao-lich-nghi-le-304-va-15/i106.html">
                  <img class="media-object" src="https://f5c.vn/upload/public/a4c635a51cda88402296bbbb12e91a9a_thumb.jpg">  
                </a>
                <div class="media-body">
                  <a class="media-heading" href="https://f5c.vn/tin-tuc/thong-bao-lich-nghi-le-304-va-15/i106.html">Thông báo lịch nghỉ lễ 30/4 và 1/5</a>
                  <p class="media-content">Kính gửi: Quý khách hàng, Quý đối tác!</p>
                  <a class="xem-tiep" href="https://f5c.vn/tin-tuc/thong-bao-lich-nghi-le-304-va-15/i106.html">Xem tiếp</a>
                </div>
              </div>
            </li>
            
            
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-3">
    <div class="panel mang-xh">
      <div class="panel-heading">
        Mạng xã hội 
      </div>
      <div class="panel-body" style="height:250px;overflow: hidden">


      </div>
    </div>
    <div class="panel dang-ky-tin" style="margin-top:-8px">
      <div class="panel-heading">
        <a href="https://f5c.vn/send_email.html" class="lightbox">Đăng ký Nhận tin khuyến mãi </a>
      </div>
    </div>
  </div>
</section>           
<style>
  .sp-da-xem .product-img, #detai-so-sanh .product-img{
    height:120px;
    line-height:120px;
    text-align:center;
    
  }
  .sp-da-xem .product-img img, #detai-so-sanh .product-img img{
    border:none;
    vertical-align: middle;
    width:auto !important;
    max-height:110px;
    margin-bottom:5px
  }
  
</style>  

<!-- san pham da xem -->
<section class="sp-da-xem">
  <div class="heading">
    <span>Sản phẩm bạn đã xem </span>
  </div>
  <div class="owl-sp-xem">

  </div>
</section>             <section class="thong-tin row">
  <div class="col-lg-3 col-sm-4" style="width:20%">
    <div class="panel">
      <div class="panel-heading">
        <a style="color:#fff" href="http://f5c.vn/bai-viet-huong-dan-mua-hang/cn4.html" title='Hướng dẫn mua hàng'>
        Hướng dẫn mua hàng                 </a>  
      </div>
      <ul class="list-group">
        <li><a href="http://f5c.vn/tin-tuc/huong-dan-tim-kiem-san-pham/i13.html">Tư vấn hoặc tìm kiếm sản phẩm</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/quy-trinh-dat-hang-online/i19.html">Quy trình đặt hàng</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/phuong-thuc-thanh-toan/i6.html">Phương thức thanh toán</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/chinh-sach-giao-va-nhan-hang/i16.html">Giao và nhận hàng</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/tai-sao-chon-mua-hang-online-tai-f5c/i12.html">Tại sao chọn mua hàng Online</a></li>      
        
      </ul>

    </div>
  </div>
  <div class="col-lg-3 col-sm-4" style="width:20%">
    <div class="panel">
      <div class="panel-heading">
        <a style="color:#fff" href="http://f5c.vn/bai-viet-gioi-thieu-ve-f5cvn/cn6.html" title='Giới thiệu F5 Corp'>
        Giới thiệu F5 Corp                 </a>  
      </div>
      <ul class="list-group">
        <li><a href="http://f5c.vn/tin-tuc/gioi-thieu-cong-ty-cp-cong-nghe-f5/i7.html">Giới thiệu chung</a></li>      
        <li><a href="#">Bán hàng cùng F5</a></li>      
        <li><a href="http://f5c.vn/bai-viet-tin-tuc-va-su-kien/cn5.html">Tin khuyến mại mới</a></li>      
        <li><a href="http://f5c.vn/bai-viet-tuyen-dung-f5-corp-2015/cn2.html">Tuyển dụng</a></li>      
        
      </ul>

    </div>
  </div>
  <div class="col-lg-3 col-sm-4" style="width:20%">
    <div class="panel">
      <div class="panel-heading">
        <a style="color:#fff" href="http://f5c.vn/bai-viet-cam-ket/cn1.html" title='Cam Kết'>
        Cam Kết                </a>  
      </div>
      <ul class="list-group">
        <li><a href="http://f5c.vn/tin-tuc/chinh-sach-bao-hanh-bao-tri-tai-f5c/i17.html">Bảo hành, bảo trì</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/chinh-sach-bao-mat-thong-tin-khach-hang/i18.html">Bảo mật thông tin</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/chinh-sach-doi-tra-hang-tai-f5c/i8.html">Đổi trả hàng</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/bo-phan-cham-soc-khach-hang-tai-f5c/i24.html">Chăm sóc khách hàng</a></li>      
        
      </ul>

    </div>
  </div>
  <div class="col-lg-3 col-sm-4" style="width:20%">
    <div class="panel">
      <div class="panel-heading">
        <a style="color:#fff" href="http://f5c.vn/bai-viet-phuong-thuc-thanh-toan/cn3.html" title='Phương thức thanh toán'>
        Phương thức thanh toán                 </a>  
      </div>
      <ul class="list-group">
        <li><a href="http://f5c.vn/tin-tuc/thanh-toan-tra-tien-sau-khi-nhan-hang/i20.html">Thanh toán khi nhận hàng (COD)</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/thanh-toan-dam-bao-qua-vietcombank-khi-mua-hang-tai-f5/i2.html">Chuyển khoản công ty</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/chuyen-tien-qua-the-atm-ca-nhan/i21.html">Qua thẻ ATM - Cá nhân</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/hinh-thuc-thanh-toan-tra-gop-bang-the-tin-dung-la-gi/i23.html">Qua thẻ tín dụng - Ghi nợ</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/chinh-sach-mua-hang-tra-gop-tai-f5c/i22.html">Mua trả góp</a></li>      
        
      </ul>

    </div>
  </div>
  <div class="col-lg-3 col-sm-4" style="width:20%">
    <div class="panel">
      <div class="panel-heading">
        <a style="color:#fff" href="http://f5c.vn/bai-viet-chinh-sach-chung/cn7.html" title='Chính sách chung'>
        Chính sách chung                 </a>  
      </div>
      <ul class="list-group">
        <li><a href="http://f5c.vn/tin-tuc/chinh-sach-doi-tra-hang-tai-f5c/i8.html">Chính sách đổi trả hàng</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/bao-mat-thong-tin-khach-hang/i11.html">Bảo mật thông tin</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/chinh-sach-van-chuyen/i9.html">Chính sách vận chuyển</a></li>      
        <li><a href="http://f5c.vn/tin-tuc/chinh-sach-bao-hanh-bao-tri-tai-f5c/i17.html">Chính sách bảo hành, bảo trì tại F5C</a></li>      
        
      </ul>

    </div>
  </div>
</section>         
</div>