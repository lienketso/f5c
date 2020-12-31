  <style>
    .footer-center {font-size:13px;}
  </style>
  <div id="footer">
    <div class="footer-top">
      <div class="container">
        <ul class="list-inline text-right">
          <li>
            <a href="http://f5c.vn/bai-viet-huong-dan-mua-hang/cn4.html" title="Hướng dẫn mua hàng">
            Hướng dẫn mua hàng  </a>
          </li>
          <li>
            <a href="http://f5c.vn/bai-viet-gioi-thieu-ve-f5cvn/cn6.html" title="Giới thiệu F5 Corp">
            Giới thiệu F5 Corp  </a>
          </li>
          <li>
            <a href="http://f5c.vn/bai-viet-cam-ket/cn1.html" title="Cam Kết">
            Cam Kết </a>
          </li>
          <li>
            <a href="http://f5c.vn/bai-viet-phuong-thuc-thanh-toan/cn3.html" title="Phương thức thanh toán">
            Phương thức thanh toán  </a>
          </li>
          <li>
            <a href="http://f5c.vn/bai-viet-chinh-sach-chung/cn7.html" title="Chính sách chung">
            Chính sách chung  </a>
          </li>
        </ul>
      </div>
    </div>
    
    <div class="footer-center">
      <div class="container">
        <table style="width:100%">
          <tbody>
            <tr>
              <td>
              Miền Bắc</td>
              <td>
              560 Trường Chinh, Đống Đa, Hà Nội</td>
              <td>
              Hotline: 0932168866 | Email: info@f5pro.vn</td>
              <td>
              Tel: +84-24-35640558 | Fax : +84-24-35640730</td>
            </tr>
            <tr>
              <td>
              Miền Nam</td>
              <td>
              248 Hoàng Hoa Thám, P.12, Q.Tân Bình, TP.HCM</td>
              <td>
              Hotline: 0975236688 | Email: sale@f5pro.vn</td>
              <td>
               </td>
            </tr>
            <tr>
              <td>
              Miền Trung</td>
              <td>
              12 Nguyễn Hữu Thọ, Q.Hải Châu, Đà Nẵng</td>
              <td>
              Hotline: 0935666443 | Email: saledn@f5pro.vn</td>
              <td>
              Tel: +84-236-3889982 | Fax : +84-236-3889983</td>
            </tr>
          </tbody>
        </table>
        <p>
         </p>   </div>
      </div>

      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <p>
              ©2006 F5 Corp Bản quyền webiste này thuộc về Công ty CP Công nghệ F5.</p>
              <p>
              Ghi rõ nguồn www.f5c.vn khi bạn muốn phát hành tại công ty từ website này.</p>
              <p>
              ĐKKD số 0102028438 do sở kế hoạch đầu tư TP Hà Nội cấp ngày 06/09/2006.</p>       </div>
              <div class="col-md-6 col-sm-6 text-center">
                <a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=19139" class="ads_item banner" rel="nofollow" target="_blank">
                  <img src="https://f5c.vn/upload/public/c61310eda88304da8ec27d15210b8e91.png" style="  ">
                  
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
<!-- 
<div id="phan-hoi-nhanh"></div>
-->

<style>
  .modal-body p.title{
    color: #f8941d;
    font-size: 22px;
    text-transform: uppercase;
  }
  .footer-center .title-foot{
    cursor:pointer;
  }
  #myBac .modal-dialog, #myNam .modal-dialog, #myTrung .modal-dialog{
    margin-top:50px !important;
  }
</style>

<script type="text/javascript" src="<?= public_url('site/lib') ?>/layout/js/bootstrap.js"></script>
<script type="text/javascript" src="<?= public_url('site/lib') ?>/layout/js/main.js"></script>

<!-- end layout -->
<script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?= public_url('site') ?>/js/jquery/colorbox/colorbox.css" media="screen" />
<script type="text/javascript">
  $(function() {
    $(".slide_show").colorbox({rel:'slide_show', slideshow:true});
         // go top
         $('body').append('<div id="back_to_top">Back to Top</div>');
         $(window).scroll(function() {
          if($(window).scrollTop() != 0) {
            $('#back_to_top').fadeIn();
          } else {
            $('#back_to_top').fadeOut();
          }
         });
         $('#back_to_top').click(function() {
          $('html, body').animate({scrollTop:0},500);
         });
     });
  
 </script>
 
 <script src="<?= public_url('site/lib') ?>/kkcountdown/kkcountdown.js" type="text/javascript"></script>
 <script type="text/javascript">
  jQuery(document).ready(function($){
    $(".auction").kkcountdown({
      daysText  : 'ngày : ',
      hoursText : 'h : ',
      minutesText : "' :",
      secondsText : 's',
      displayZeroDays : false,
      rusNumbers  :   false
    });   
    function auction_update_amount(t) {
      var time_info = t.data('data');
      setInterval(function(){ 
        var price_current = t.find(".price_current").text();
        price_current = parseInt(price_current);
        price_current = price_current - time_info.amount_change;
        price_current = parseInt(price_current);
        price_current = (price_current < 0) ? 0 : price_current;
        t.find(".price_current").text(price_current);
        price_current_val = number_format(price_current)+' đ';
        t.find(".price_current_val").text(price_current_val);
      }, (time_info.time_change*1000));
    } 
    jQuery.each( $(".auction_info"), function( i, val ) {
      auction_update_amount($(this));
    }); 
  });  
 </script>
 
 <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/scrollTo/jquery.scrollTo.js"></script>
 <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/number/jquery.number.min.js"></script>
 <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
 <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/form/jquery.form.js"></script>
 <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/jquery.nst.ui.js" type="text/javascript"></script>
 
 <script type="text/javascript" src="<?= public_url('site') ?>/js/custom.js" type="text/javascript"></script>

 <link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/datetime/jquery.datetimepicker.css"/>
 <script type="text/javascript" src="<?= public_url('site/lib') ?>/datetime/jquery.datetimepicker.js"></script>

 <script type="text/javascript">
  $(document).ready(function () { 
    $(".datepicker" ).datetimepicker({format: 'd-m-Y',timepicker:false,changeYear:true, changeMonth:true, yearStart:'2020',yearEnd:'2021' });
    $(".datepicker2" ).datetimepicker({format: 'd-m-Y',timepicker:false, yearStart:'1930',yearEnd:'2010' ,maxDate: new Date()});
    $(".datepicker3" ).datetimepicker({format: 'd-m-Y',timepicker:false, yearStart:'1930',yearEnd:'2020' ,maxDate: new Date()});
    
  }); 
 </script>  
 
 <script type="text/javascript" src="<?= public_url('site/lib') ?>/layout/js/owl.carousel.js"></script>
 <script type="text/javascript" src="<?= public_url('site/lib') ?>/layout/js/main-bottom.js"></script>