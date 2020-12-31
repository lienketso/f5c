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
  //sản phẩm
  $p['where_in'] = ['cat_id',$uid];
  $p['order'] = ['id','desc'];
  $p['limit'] = [8,0];
  $itemProduct = $this->product_model->get_list($p);
  
  //hãng sản xuất
  $manufac = unserialize($row->manufac_ids);
  
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

    <div class="list-manufac">
      <ul>
        <?php if(!empty($manufac)): ?>
          <?php foreach($manufac as $m): ?>
            <?php $mInfo = $this->manufac_model->get_info($m); ?>
        <li><a href="<?= manufac_url(slug($mInfo->name),$m,$row->id) ?>" title="<?= $mInfo->name; ?>"><img src="https://f5c.vn/upload/public/40404fb3627866be7153b438c5b72c76.png" alt="<?= $mInfo->name; ?>"></a></li>
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
              <h4><a href=""><?= $pro->name; ?></a></h4>
              <p><span><?= ($pro->price==0) ? 'Liên hệ' : number_format($pro->price). '₫'; ?> </span></p>
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
            <a style="color:#fff" href="#">Tin Hot </a>
          </div>
          <ul class="list-group">
            <?php if(!empty($listTinhot)): ?>
            <?php foreach($listTinhot as $row): ?>
            <li class="list-group-item">
              <div class="media">
                <a class="pull-left" href="<?= news_url(slug($row->title),$row->id); ?>">
                  <img class="media-object" src="<?= product_link($row->image_name) ?>" alt="<?= $row->title; ?>">  
                </a>
                <div class="media-body">
                  <a class="media-heading" href="<?= news_url(slug($row->title),$row->id); ?>"><?= $row->title; ?></a>
                  <p class="media-content"><?= catchuoi($row->intro,200) ?></p>
                  <a class="xem-tiep" href="<?= news_url(slug($row->title),$row->id); ?>">Xem tiếp</a>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="panel tin-moi">
          <div class="panel-heading">
            <a  style="color:#fff" href="#">Tin Mới</a>
          </div>
          <ul class="list-group">
            <?php if(!empty($listTinmoi)): ?>
              <?php foreach($listTinmoi as $row): ?>
            <li class="list-group-item">
              <div class="media">
                <a class="pull-left" href="<?= news_url(slug($row->title),$row->id) ?>">
                  <img class="media-object" src="<?= product_link($row->image_name) ?>" alt="<?= $row->title; ?>">  
                </a>
                <div class="media-body">
                  <a class="media-heading" href="<?= news_url(slug($row->title),$row->id) ?>"><?= $row->title; ?></a>
                  <p class="media-content"><?= catchuoi($row->intro,100) ?></p>
                  <a class="xem-tiep" href="<?= news_url(slug($row->title),$row->id) ?>">Xem tiếp</a>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>            
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
        <a href="https://facebook.com/f5c.vn" target="_blank">
          <img src="<?= public_url('site/img/facebook.png') ?>">
        </a>
      </div>
    </div>
    <div class="panel dang-ky-tin" style="margin-top:-8px">
      <div class="panel-heading">
        <a href="#" class="lightbox">Đăng ký Nhận tin khuyến mãi </a>
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
</section>             

<section class="thong-tin row">
  <?php foreach($listDanhmuctin as $row): ?>
    <?php 
      $s['where'] = ['cat_id'=>$row->id];
      $s['limit'] = [5,0];
      $itemNews = $this->news_model->get_list($s);
    ?>
  <div class="col-lg-3 col-sm-4" style="width:20%">
    <div class="panel">
      <div class="panel-heading">
        <a style="color:#fff" href="<?= catnews_url($row->friendly_url) ?>" title='<?= $row->name; ?>'>
        <?= $row->name; ?></a>  
      </div>
      <?php if(!empty($itemNews)): ?>
      <ul class="list-group">
        <?php foreach($itemNews as $n): ?>
        <li><a href="<?= news_url(slug($n->title),$n->id) ?>"><?= $n->title; ?></a></li>  
      <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    </div>
  </div>
<?php endforeach; ?>

</section>         
</div>