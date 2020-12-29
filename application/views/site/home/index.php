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

<section class=" tab-sp" id="cat_49" role="tabpanel">
  <a href="https://f5c.vn/may-thiet-bi-cong-nghiep">
    <div class="title-section">
      <span>1.Máy - Thiết bị công nghiệp</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-49">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="49">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="49">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="49">Xem nhiều</a></li> 
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="49">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/may-thiet-bi-cong-nghiep">
          <img src="https://f5c.vn/upload/public/3aea5f80268f863083f044eb4384e2fe.png" alt="Máy - Thiết bị công nghiệp" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/quat-cong-nghiep" title="Quạt công nghiệp">Quạt công nghiệp</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-bom" title="Máy bơm">Máy bơm</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-nen-khi" title="Máy nén khí">Máy nén khí</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-cam-tay" title="Máy cầm tay">Máy cầm tay</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/may-thiet-bi-cong-nghiep" title="Máy - Thiết bị công nghiệp">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_49">
        </div>
        <div id="product_cats_49_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/pentax-m169-49.html" title="Pentax">
      <img src="https://f5c.vn/upload/public/0ca0091648a7138b6b567eeaff639c6c.png" alt="Pentax" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/nakami-m154-49.html" title="Nakami">
      <img src="https://f5c.vn/upload/public/d5a8d1349f1af989eb305292d66c0988.png" alt="Nakami" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/kocu-m239-49.html" title="Kocu">
      <img src="https://f5c.vn/upload/public/4cae2b35faded2725f14486fed535942.png" alt="Kocu" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/honda-m121-49.html" title="Honda">
      <img src="https://f5c.vn/upload/public/78038083192f0bb898cdea754c32d144.png" alt="Honda" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/husqvarna-m123-49.html" title="Husqvarna">
      <img src="https://f5c.vn/upload/public/8700a248cdd48b98d294745d279d353f.png" alt="Husqvarna" style="width:95%;height:50px">
    </a>
  </div>
</section>
<!-- banner quang cao -->
<section class="banner-qc">
  <a href="https://f5c.vn/may-thiet-bi-cong-nghiep" target="_blank">
    <img src="https://f5c.vn/upload/public/56162fecbf9f445b4c68127d37c1a477.png" class="img-responsive" alt="Máy - Thiết bị công nghiệp">
  </a>
</section>
<section class=" tab-sp" id="cat_10" role="tabpanel">
  <a href="https://f5c.vn/may-ve-sinh-cong-nghiep">
    <div class="title-section">
      <span>2.Máy vệ sinh công nghiệp</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-10">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="10">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="10">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="10">Xem nhiều</a></li> 
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="10">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/may-ve-sinh-cong-nghiep">
          <img src="https://f5c.vn/upload/public/16b874f82d5570729a76fd334e5642b9.jpg" alt="Máy vệ sinh công nghiệp" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/may-giat-la-cong-nghiep" title="Máy giặt - Là công nghiệp">Máy giặt - Là công nghiệp</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-hut-bui-cong-nghiep" title="Máy hút bụi công nghiệp">Máy hút bụi công nghiệp</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-phun-rua-ap-luc-cao" title="Máy phun rửa áp lực cao">Máy phun rửa áp lực cao</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-cha-san" title="Máy chà sàn">Máy chà sàn</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/may-ve-sinh-cong-nghiep" title="Máy vệ sinh công nghiệp">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_10">
        </div>
        <div id="product_cats_10_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/electrolux-m106-10.html" title="Electrolux">
      <img src="https://f5c.vn/upload/public/0d957904db2a0ed0c61abaf6dc42cee4.png" alt="Electrolux" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/hiclean-m133-10.html" title="Hiclean">
      <img src="https://f5c.vn/upload/public/7e49ef0fed90286c5e89464010fe2a58.png" alt="Hiclean" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/karcher-m134-10.html" title="Karcher">
      <img src="https://f5c.vn/upload/public/225047de6d82ded36c046ba2a795e6e5.jpg" alt="Karcher" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/primus-m136-10.html" title="Primus">
      <img src="https://f5c.vn/upload/public/f873b33c6aaaa5de604680951d3ce835.png" alt="Primus" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/numatic-m164-10.html" title="Numatic">
      <img src="https://f5c.vn/upload/public/0627db90c58986b175a04b4000fd43b7.png" alt="Numatic" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/image-m165-10.html" title="Image">
      <img src="https://f5c.vn/upload/public/f6f1964098ca55b5d8a2e20bfe4992b7.png" alt="Image" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/maxi-m166-10.html" title="Maxi">
      <img src="https://f5c.vn/upload/public/201be49083f32e3350fceffa971233cb.png" alt="Maxi" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/clean-tech-m261-10.html" title="Clean Tech">
      <img src="https://f5c.vn/upload/public/98a22aff92b8c963b2153aadfed69f2c.jpg" alt="Clean Tech" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/fagor-m361-10.html" title="Fagor">
      <img src="https://f5c.vn/upload/public/ceeba5c8ffdbe7b039483bf23a44d69a.jpg" alt="Fagor" style="width:95%;height:50px">
    </a>
  </div>
</section>
<!-- banner quang cao -->
<section class="banner-qc">
  <a href="https://f5c.vn/karcher-m134-10.html" target="_blank">
    <img src="https://f5c.vn/upload/public/71ee12adad0a4ee9fdf3acd54ee2277f.png" class="img-responsive" alt="Máy vệ sinh công nghiệp">
  </a>
</section>
<section class=" tab-sp" id="cat_51" role="tabpanel">
  <a href="https://f5c.vn/thiet-bi-sieu-thi-cua-hang">
    <div class="title-section">
      <span>3.Thiết bị siêu thị - cửa hàng</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-51">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="51">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="51">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="51">Xem nhiều</a></li> 
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="51">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/thiet-bi-sieu-thi-cua-hang">
          <img src="https://f5c.vn/upload/public/58d3fbbcc8c7e8d9888586a008d69835.png" alt="Thiết bị siêu thị - cửa hàng" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/may-in-nhan" title="Máy in nhãn">Máy in nhãn</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-tinh-tien" title="Máy tính tiền">Máy tính tiền</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-ban-hang-pos" title="Máy bán hàng POS">Máy bán hàng POS</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/can-tinh-tien-dien-tu" title="Cân tính tiền điện tử">Cân tính tiền điện tử</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-sieu-thi-cua-hang" title="Thiết bị siêu thị - cửa hàng">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_51">
        </div>
        <div id="product_cats_51_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/epson-m52-51.html" title="Epson">
      <img src="https://f5c.vn/upload/public/11abac745c22153b020b42a7c8766b52.png" alt="Epson" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/oudis-m60-51.html" title="Oudis">
      <img src="https://f5c.vn/upload/public/10ddf5fddcc2a74a60e6d91aa03d8c5f.png" alt="Oudis" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/silicon-m63-51.html" title="Silicon">
      <img src="https://f5c.vn/upload/public/39a4b2fdec6906bb68455f3213913c58.png" alt="Silicon" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/xinda-m75-51.html" title="Xinda">
      <img src="https://f5c.vn/upload/public/d5e902e7e735cc63a9272341cdb7ce0e.png" alt="Xinda" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/topcash-m128-51.html" title="Topcash">
      <img src="https://f5c.vn/upload/public/bfa6f28fecf09740b946bf3db197d779.png" alt="Topcash" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/procash-m131-51.html" title="Procash">
      <img src="https://f5c.vn/upload/public/cc0c58f368b7e321e0ee34949ee45392.png" alt="Procash" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/casio-m140-51.html" title="Casio">
      <img src="https://f5c.vn/upload/public/50597122c6cdbea64d04c3533491a3dc.png" alt="Casio" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/pos-m217-51.html" title="POS">
      <img src="https://f5c.vn/upload/public/47ddfee86b89916a31d150d82ae8a3e7.png" alt="POS" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/antech-m240-51.html" title="Antech">
      <img src="https://f5c.vn/upload/public/59256af319b001c0d3729c80530ada76.png" alt="Antech" style="width:95%;height:50px">
    </a>
  </div>
</section>
<section class=" tab-sp" id="cat_3" role="tabpanel">
  <a href="https://f5c.vn/thiet-bi-van-phong">
    <div class="title-section">
      <span>4.Thiết bị văn phòng</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-3">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="3">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="3">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="3">Xem nhiều</a></li>  
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="3">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/thiet-bi-van-phong">
          <img src="https://f5c.vn/upload/public/c068985d12a048bd36ca51f7d167fe87.jpg" alt="Thiết bị văn phòng" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/may-chieu" title="Máy chiếu">Máy chiếu</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-in" title="Máy in">Máy in</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-photocopy" title="Máy photocopy">Máy photocopy</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-scan-may-quet" title="Máy scan - Máy quét">Máy scan - Máy quét</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-van-phong" title="Thiết bị văn phòng">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_3">
        </div>
        <div id="product_cats_3_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/benq-m53-3.html" title="BenQ">
      <img src="https://f5c.vn/upload/public/81f66c1caa561a8340f31a13964284e9.png" alt="BenQ" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/epson-m52-3.html" title="Epson">
      <img src="https://f5c.vn/upload/public/11abac745c22153b020b42a7c8766b52.png" alt="Epson" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/viewsonic-m51-3.html" title="Viewsonic">
      <img src="https://f5c.vn/upload/public/d06d0d87872b4f673e93bbb0372fa368.png" alt="Viewsonic" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/panasonic-m50-3.html" title="Panasonic">
      <img src="https://f5c.vn/upload/public/a325edbc5e3a4437029e5f5ed3c24c0f.png" alt="Panasonic" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/sony-m48-3.html" title="Sony">
      <img src="https://f5c.vn/upload/public/cb391f2df1daac36843a54edaf0a9b32.png" alt="Sony" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/hp-m49-3.html" title="HP">
      <img src="https://f5c.vn/upload/public/0f0ec60538cf67fb7489b7ef6ad0af91.png" alt="HP" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/avison-m77-3.html" title="Avison">
      <img src="https://f5c.vn/upload/public/da97e9fe89bf5298b2cf8d155d6b464c.png" alt="Avison" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/canon-m78-3.html" title="Canon">
      <img src="https://f5c.vn/upload/public/2c9601225c71030ab411811310ea5386.png" alt="Canon" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/fujitsu-m79-3.html" title="Fujitsu">
      <img src="https://f5c.vn/upload/public/0b88379355f65e974fde861067d24a8f.png" alt="Fujitsu" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/sharp-m103-3.html" title="Sharp">
      <img src="https://f5c.vn/upload/public/fc4f805920ffbf3ca96f193eedd46948.png" alt="Sharp" style="width:95%;height:50px">
    </a>
  </div>
</section>
<!-- banner quang cao -->
<section class="banner-qc">
  <a href="https://f5c.vn/thiet-bi-van-phong" target="_blank">
    <img src="https://f5c.vn/upload/public/6410bba0b2c3e58cbef6a50a07262d37.png" class="img-responsive" alt="Thiết bị văn phòng">
  </a>
</section>
<section class="tang6 tab-sp" id="cat_9" role="tabpanel">
  <a href="https://f5c.vn/thiet-bi-bep-cong-nghiep">
    <div class="title-section">
      <span>5.Thiết bị bếp công nghiệp</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-9">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="9">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="9">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="9">Xem nhiều</a></li>  
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="9">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/thiet-bi-bep-cong-nghiep">
          <img src="https://f5c.vn/upload/public/fec3451642ab108290222887183ae3e7.jpg" alt="Thiết bị bếp công nghiệp" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-bep" title="Thiết bị bếp">Thiết bị bếp</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-bao-quan" title="Thiết bị bảo quản">Thiết bị bảo quản</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-bep-inox" title="Thiết bị bếp Inox">Thiết bị bếp Inox</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-che-bien-thuc-pham" title="Máy chế biến thực phẩm">Máy chế biến thực phẩm</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-bep-cong-nghiep" title="Thiết bị bếp công nghiệp">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_9">
        </div>
        <div id="product_cats_9_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/electrolux-m106-9.html" title="Electrolux">
      <img src="https://f5c.vn/upload/public/0d957904db2a0ed0c61abaf6dc42cee4.png" alt="Electrolux" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/berjaya-m291-9.html" title="Berjaya">
      <img src="https://f5c.vn/upload/public/1e79bc2ffd21d95c5a514d686a612842.png" alt="Berjaya" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/bosch-m365-9.html" title="Bosch">
      <img src="https://f5c.vn/upload/public/1ed3cd85e0b2b2c10d39d6fa93319509.png" alt="Bosch" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/scotsman-m496-9.html" title="Scotsman">
      <img src="https://f5c.vn/upload/public/44301fecd39f26ebf9b90ab81299635a.png" alt="Scotsman" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/sanaky-m516-9.html" title="Sanaky">
      <img src="https://f5c.vn/upload/public/052ae22c2e5838110d2c88efd5ccf754.png" alt="Sanaky" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/higold-m595-9.html" title="HIGOLD">
      <img src="https://f5c.vn/upload/public/d70882aa1c7f7a76b485cd2f8686c064.png" alt="HIGOLD" style="width:95%;height:50px">
    </a>
  </div>
</section>
<section class=" tab-sp" id="cat_7" role="tabpanel">
  <a href="https://f5c.vn/dien-may-gia-dung">
    <div class="title-section">
      <span>6.Điện máy - Gia dụng</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-7">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="7">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="7">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="7">Xem nhiều</a></li>  
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="7">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/dien-may-gia-dung">
          <img src="https://f5c.vn/upload/public/a5046668d38082c110af77d2d8927039.png" alt="Điện máy - Gia dụng" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/xu-ly-am" title="Xử lý ẩm">Xử lý ẩm</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-nghe-nhin" title="Thiết bị nghe nhìn">Thiết bị nghe nhìn</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/dien-lanh" title="Điện lạnh">Điện lạnh</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-giat-gia-dung" title="Máy giặt gia dụng">Máy giặt gia dụng</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/dien-may-gia-dung" title="Điện máy - Gia dụng">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_7">
        </div>
        <div id="product_cats_7_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/panasonic-m50-7.html" title="Panasonic">
      <img src="https://f5c.vn/upload/public/a325edbc5e3a4437029e5f5ed3c24c0f.png" alt="Panasonic" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/sony-m48-7.html" title="Sony">
      <img src="https://f5c.vn/upload/public/cb391f2df1daac36843a54edaf0a9b32.png" alt="Sony" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/fujie-m80-7.html" title="Fujie">
      <img src="https://f5c.vn/upload/public/b4f7e0328edd5d4c87ad2bff7aa8e423.png" alt="Fujie" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/hyundai-m83-7.html" title="Hyundai">
      <img src="https://f5c.vn/upload/public/40404fb3627866be7153b438c5b72c76.png" alt="Hyundai" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/samsung-m102-7.html" title="Samsung">
      <img src="https://f5c.vn/upload/public/3c714323b2fc2fbc742a2be6793c3c71.png" alt="Samsung" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/sharp-m103-7.html" title="Sharp">
      <img src="https://f5c.vn/upload/public/fc4f805920ffbf3ca96f193eedd46948.png" alt="Sharp" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/lg-m104-7.html" title="LG">
      <img src="https://f5c.vn/upload/public/6e88c86d40b70f8579b1f0249bbe9476.png" alt="LG" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/electrolux-m106-7.html" title="Electrolux">
      <img src="https://f5c.vn/upload/public/0d957904db2a0ed0c61abaf6dc42cee4.png" alt="Electrolux" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/honda-m121-7.html" title="Honda">
      <img src="https://f5c.vn/upload/public/78038083192f0bb898cdea754c32d144.png" alt="Honda" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/coway-m307-7.html" title="Coway">
      <img src="https://f5c.vn/upload/public/7ce9eb3f9ea06581a6951eb60066844d.jpg" alt="Coway" style="width:95%;height:50px">
    </a>
  </div>
</section>
<!-- banner quang cao -->
<section class="banner-qc">
  <a href="https://f5c.vn/dien-may-gia-dung" target="_blank">
    <img src="https://f5c.vn/upload/public/fd570ddb4260a60a08c233526d1a1d61.png" class="img-responsive" alt="Điện máy - Gia dụng">
  </a>
</section>
<section class=" tab-sp" id="cat_1" role="tabpanel">
  <a href="https://f5c.vn/tin-hoc-vien-thong">
    <div class="title-section">
      <span>7.Tin học, viễn thông</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-1">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="1">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="1">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="1">Xem nhiều</a></li>  
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="1">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/tin-hoc-vien-thong">
          <img src="https://f5c.vn/upload/public/98e807f713a630b7e012f6f65e05cab4.png" alt="Tin học, viễn thông" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/may-tinh-xach-tay" title="Máy tính xách tay">Máy tính xách tay</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-tinh-bang-tablet" title="Máy tính bảng, Tablet">Máy tính bảng, Tablet</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-tinh-de-ban" title="Máy tính để bàn">Máy tính để bàn</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-chu-server" title="Máy chủ - Server">Máy chủ - Server</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/tin-hoc-vien-thong" title="Tin học, viễn thông">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_1">
        </div>
        <div id="product_cats_1_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/hp-m49-1.html" title="HP">
      <img src="https://f5c.vn/upload/public/0f0ec60538cf67fb7489b7ef6ad0af91.png" alt="HP" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/acer-m130-1.html" title="Acer">
      <img src="https://f5c.vn/upload/public/761495b6ffe013c77945e7a501940322.png" alt="Acer" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/dell-m108-1.html" title="Dell">
      <img src="https://f5c.vn/upload/public/0a11632778140ba1cd06e4deb1b391ba.png" alt="Dell" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/asus-m97-1.html" title="Asus">
      <img src="https://f5c.vn/upload/public/b58fbdacff087f05e597d12604755324.png" alt="Asus" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/lenovo-m98-1.html" title="Lenovo">
      <img src="https://f5c.vn/upload/public/b2811db6063ad18a9a5bffe2387dca86.png" alt="Lenovo" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/samsung-m102-1.html" title="Samsung">
      <img src="https://f5c.vn/upload/public/3c714323b2fc2fbc742a2be6793c3c71.png" alt="Samsung" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/logitech-m174-1.html" title="Logitech">
      <img src="https://f5c.vn/upload/public/c8da7f90fc1bd6aae1d2c696407e1eb9.png" alt="Logitech" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/tp-link-m263-1.html" title="TP-LINK">
      <img src="https://f5c.vn/upload/public/10828abfdd869d4928ba178f4f667d3b.png" alt="TP-LINK" style="width:95%;height:50px">
    </a>
  </div>
</section>
<section class=" tab-sp" id="cat_510" role="tabpanel">
  <a href="https://f5c.vn/may-nong-nghiep">
    <div class="title-section">
      <span>8.Máy nông nghiệp</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-510">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="510">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="510">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="510">Xem nhiều</a></li>  
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="510">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/may-nong-nghiep">
          <img src="https://f5c.vn/upload/public/69e00aa0dfddd9de9296aab268125dd8.png" alt="Máy nông nghiệp" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/may-cat-co" title="Máy cắt cỏ">Máy cắt cỏ</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-lam-dat" title="Máy làm đất">Máy làm đất</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-gieo-trong" title="Máy gieo trồng">Máy gieo trồng</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-diet-con-trung" title="Thiết bị diệt côn trùng">Thiết bị diệt côn trùng</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/may-nong-nghiep" title="Máy nông nghiệp">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_510">
        </div>
        <div id="product_cats_510_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/mitsubishi-m116-510.html" title="Mitsubishi">
      <img src="https://f5c.vn/upload/public/d7eb3c99290e3f9de68f19cd57e04ffd.png" alt="Mitsubishi" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/honda-m121-510.html" title="Honda">
      <img src="https://f5c.vn/upload/public/78038083192f0bb898cdea754c32d144.png" alt="Honda" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/husqvarna-m123-510.html" title="Husqvarna">
      <img src="https://f5c.vn/upload/public/8700a248cdd48b98d294745d279d353f.png" alt="Husqvarna" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/mimaki-m157-510.html" title="Mimaki">
      <img src="https://f5c.vn/upload/public/6df8ca741f0c1cb416fdb6de3fc6f49d.png" alt="Mimaki" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/oshima-m538-510.html" title="Oshima">
      <img src="https://f5c.vn/upload/public/26fcb93c7fc5c3ad0a1a5eabd9a3f983.png" alt="Oshima" style="width:95%;height:50px">
    </a>
  </div>
</section>
<!-- banner quang cao -->
<section class="banner-qc">
  <a href="http://maycatco.com" target="_blank">
    <img src="https://f5c.vn/upload/public/d054d11c0474785edfd637357ff93403.png" class="img-responsive" alt="Máy nông nghiệp">
  </a>
</section>
<section class=" tab-sp" id="cat_2" role="tabpanel">
  <a href="https://f5c.vn/thiet-bi-so">
    <div class="title-section">
      <span>9.Thiết bị số</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-2">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="2">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="2">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="2">Xem nhiều</a></li>  
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="2">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/thiet-bi-so">
          <img src="https://f5c.vn/upload/public/ae777a622a9ff57e0fe42a98b3eb333a.png" alt="Thiết bị số" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/may-anh-va-may-quay" title="Máy ảnh và Máy quay">Máy ảnh và Máy quay</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/bo-chuyen-doi" title="Bộ chuyển đổi">Bộ chuyển đổi</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-dinh-vi" title="Máy định vị">Máy định vị</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/giai-tri-so" title="Giải trí số">Giải trí số</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-so" title="Thiết bị số">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_2">
        </div>
        <div id="product_cats_2_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/apple-m96-2.html" title="Apple">
      <img src="https://f5c.vn/upload/public/8adf608912ecd2f63039c6a2baf58730.png" alt="Apple" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/panasonic-m50-2.html" title="Panasonic">
      <img src="https://f5c.vn/upload/public/a325edbc5e3a4437029e5f5ed3c24c0f.png" alt="Panasonic" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/microsoft-m127-2.html" title="Microsoft">
      <img src="https://f5c.vn/upload/public/b5e24313c5443a321a6ec96920fbc50e.png" alt="Microsoft" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/sony-m48-2.html" title="Sony">
      <img src="https://f5c.vn/upload/public/cb391f2df1daac36843a54edaf0a9b32.png" alt="Sony" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/canon-m78-2.html" title="Canon">
      <img src="https://f5c.vn/upload/public/2c9601225c71030ab411811310ea5386.png" alt="Canon" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/lenovo-m98-2.html" title="Lenovo">
      <img src="https://f5c.vn/upload/public/b2811db6063ad18a9a5bffe2387dca86.png" alt="Lenovo" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/oppo-m126-2.html" title="Oppo">
      <img src="https://f5c.vn/upload/public/74bd436fda9b6304bb85235f09b8faa0.png" alt="Oppo" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/fomei-m336-2.html" title="FOMEI">
      <img src="https://f5c.vn/upload/public/134de9be67ec2fbd0ae77a72daec69dc.png" alt="FOMEI" style="width:95%;height:50px">
    </a>
  </div>
</section>
<!-- banner quang cao -->
<section class="banner-qc">
  <a href="https://f5c.vn/thiet-bi-so" target="_blank">
    <img src="https://f5c.vn/upload/public/b916b98adcde82ad1a15f59a25109e19.png" class="img-responsive" alt="Thiết bị số">
  </a>
</section>
<section class=" tab-sp" id="cat_64" role="tabpanel">
  <a href="https://f5c.vn/thiet-bi-an-ninh">
    <div class="title-section">
      <span>10.Thiết bị an ninh</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-64">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="64">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="64">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="64">Xem nhiều</a></li> 
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="64">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/thiet-bi-an-ninh">
          <img src="https://f5c.vn/upload/public/4b0fc46388634a8620de6cce604bf433.jpg" alt="Thiết bị an ninh" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/the-cam-ung" title="Thẻ cảm ứng">Thẻ cảm ứng</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/camera-giam-sat" title="Camera giám sát">Camera giám sát</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/dau-ghi-hinh" title="Đầu ghi hình">Đầu ghi hình</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/bo-dam" title="Bộ đàm">Bộ đàm</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-an-ninh" title="Thiết bị an ninh">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_64">
        </div>
        <div id="product_cats_64_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/hyundai-m83-64.html" title="Hyundai">
      <img src="https://f5c.vn/upload/public/40404fb3627866be7153b438c5b72c76.png" alt="Hyundai" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/ronald-jack-m135-64.html" title="Ronald Jack">
      <img src="https://f5c.vn/upload/public/589eb191cdcd029922180bc1edd84049.png" alt="Ronald Jack" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/questek-m179-64.html" title="Questek">
      <img src="https://f5c.vn/upload/public/bc8d309604bd51ba1ea79c228f70850e.png" alt="Questek" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/d-link-m188-64.html" title="D-Link">
      <img src="https://f5c.vn/upload/public/8e4bffaa74fe1adc488d7dbffc92fd19.jpg" alt="D-Link" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/icam-m253-64.html" title="Icam">
      <img src="https://f5c.vn/upload/public/d2a6b5300d3cfb53db0ea4d00a6c9e88.png" alt="Icam" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/vivotek-m268-64.html" title="Vivotek">
      <img src="https://f5c.vn/upload/public/c4bfa9bd11e52bc8151f0b017918da79.png" alt="Vivotek" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/motorola-m279-64.html" title="Motorola">
      <img src="https://f5c.vn/upload/public/7d03f10d9550bdd42385e5b502a186db.png" alt="Motorola" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/digiever-m293-64.html" title="Digiever">
      <img src="https://f5c.vn/upload/public/ea8ce88ee0510227b12300c2c1aeac78.png" alt="Digiever" style="width:95%;height:50px">
    </a>
  </div>
</section>
<!-- banner quang cao -->
<section class="banner-qc">
  <a href="https://f5c.vn/camera-giam-sat" target="_blank">
    <img src="https://f5c.vn/upload/public/f595b88fae8e94cabc4d3903f0059293.png" class="img-responsive" alt="Thiết bị an ninh">
  </a>
</section>
<section class="fa-heartbeat tab-sp" id="cat_450" role="tabpanel">
  <a href="https://f5c.vn/thiet-bi-y-te">
    <div class="title-section">
      <span>11.Thiết bị y tế</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-450">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="450">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="450">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="450">Xem nhiều</a></li>  
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="450">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/thiet-bi-y-te">
          <img src="https://f5c.vn/upload/public/a157ff63e7678fedad7393263d7bcaa5.jpg" alt="Thiết bị y tế" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            <tr>
              <td><a href="https://f5c.vn/may-do-than-nhiet" title="Máy đo thân nhiệt">Máy đo thân nhiệt</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-phong-thi-nghiem" title="Thiết bị phòng thí nghiệm">Thiết bị phòng thí nghiệm</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-y-te-khac" title="Thiết bị y tế khác">Thiết bị y tế khác</a> </td>
            </tr>
            <tr>
              <td><a href="https://f5c.vn/may-do-huyet-ap" title="Máy đo huyết áp">Máy đo huyết áp</a> </td>
            </tr>
            
            <tr>
              <td><a href="https://f5c.vn/thiet-bi-y-te" title="Thiết bị y tế">Xem thêm >></a></td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_450">
        </div>
        <div id="product_cats_450_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/laica-m430-450.html" title="Laica">
      <img src="https://f5c.vn/upload/public/8b564bf197d6cf8c63a79a9d2990156d.png" alt="Laica" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/boso-m432-450.html" title="BOSO">
      <img src="https://f5c.vn/upload/public/f13b4d1000b2f706d2d5092d5c7806ba.png" alt="BOSO" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/scala-m437-450.html" title="SCALA">
      <img src="https://f5c.vn/upload/public/8b9771c17c168849c82e877f5404aba4.png" alt="SCALA" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/dr-kare-m438-450.html" title="Dr Kare">
      <img src="https://f5c.vn/upload/public/2a65ae5effe01fc44a82b3faa48a3da5.png" alt="Dr Kare" style="width:95%;height:50px">
    </a>
  </div>
  <div class="item" style="text-align:center">
    <a href="https://f5c.vn/spirit-m446-450.html" title="Spirit">
      <img src="https://f5c.vn/upload/public/7e7cb5c4ea492e3af6d1e2e2cc503b0f.png" alt="Spirit" style="width:95%;height:50px">
    </a>
  </div>
</section>
<section class=" tab-sp" id="cat_688" role="tabpanel">
  <a href="https://f5c.vn/hang-thanh-ly-giam-gia">
    <div class="title-section">
      <span>12.Hàng thanh lý - Giảm giá</span>
    </div>
  </a>
  <!-- Nav tabs -->
  <ul role="tablist" class="nav nav-tabs" id="nav-tabs-688">
    <li role="presentation" class="comment_count"><a href="javascript:void(0)" class="product_cats" data-action="comment_count" data-id="688">Đánh giá nhiều</a></li>
    <li role="presentation" class="count_buy"><a  href="javascript:void(0)" class="product_cats" data-action="count_buy" data-id="688">Mua nhiều</a></li>
    <li role="presentation" class="count_view"><a href="javascript:void(0)" class="product_cats" data-action="count_view" data-id="688">Xem nhiều</a></li>  
    <li role="presentation" class="last_update active" ><a href="javascript:void(0)" class="product_cats" data-action="last_update" data-id="688">Sản phẩm mới</a></li> 
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div  class="tab-pane active" role="tabpanel">
      <div class="banner-tab-sp">
        <a href="https://f5c.vn/hang-thanh-ly-giam-gia">
          <img src="https://f5c.vn/upload/public/7e090dcf78af57eeaeabf15573a969ce.jpg" alt="Hàng thanh lý - Giảm giá" style="width:100%">
        </a>
        <table class="table  table-bordered table-condensed">
          <tbody>
            
            
            
          </tbody>
        </table>
      </div>
      <div class="list-tab-sp" style="position:relative; min-height:50px;">
        <div class="row" id="product_cats_688">
        </div>
        <div id="product_cats_688_load" class="form_load" style="display: none;"></div>
      </div>
      
    </div>  
  </div>
</section>

<!-- logo san pham -->
<section class="owl-logo-sp">
</section>



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