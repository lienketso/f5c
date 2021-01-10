  <style>
.footer-center {
    font-size: 13px;
}
  </style>
  <div id="footer" style="margin-top:0;padding-bottom:0">
      <div class="footer-top">
          <div class="container">
              <ul class="list-inline text-right">
                  <li>
                      <a href="http://f5c.vn/bai-viet-huong-dan-mua-hang/cn4.html" title="Hướng dẫn mua hàng">
                          Hướng dẫn mua hàng </a>
                  </li>
                  <li>
                      <a href="http://f5c.vn/bai-viet-gioi-thieu-ve-f5cvn/cn6.html" title="Giới thiệu F5 Corp">
                          Giới thiệu F5 Corp </a>
                  </li>
                  <li>
                      <a href="http://f5c.vn/bai-viet-cam-ket/cn1.html" title="Cam Kết">
                          Cam Kết </a>
                  </li>
                  <li>
                      <a href="http://f5c.vn/bai-viet-phuong-thuc-thanh-toan/cn3.html" title="Phương thức thanh toán">
                          Phương thức thanh toán </a>
                  </li>
                  <li>
                      <a href="http://f5c.vn/bai-viet-chinh-sach-chung/cn7.html" title="Chính sách chung">
                          Chính sách chung </a>
                  </li>
              </ul>
          </div>
      </div>

      <div class="footer-center">
          <div class="container">
              <div class="row">
                  <div class="col-md-4">
                     <h4>TRỤ SỞ HÀ NỘI</h4> 
                      <P >560 Trường Chinh, Đống Đa, Hà Nội</P> 
                      <P style="font-weight:500">Hotline: 0932168866 | Email: info@f5pro.vn</P>                 
                      <P style="font-weight:500"> Tel: +84-24-35640558 | Fax : +84-24-35640730</P>
                      <br>
                  </div>
                  <div class="col-md-4">
                     <h4>CHI NHÁNH HỒ CHÍ MINH</h4>                     
                      <P> 248 Hoàng Hoa Thám, P.12, Q.Tân Bình, TP.HCM</P>                
                      <P style="font-weight:500">  Hotline: 0975236688 | Email: sale@f5pro.vn</P>                 
                      <br>
                  </div>
                  <div class="col-md-4">
                    <h4> CHI NHÁNH ĐÀ NẴNG</h4>                       
                      <P> 12 Nguyễn Hữu Thọ, Q.Hải Châu, Đà Nẵng    </P>                 
                      <P style="font-weight:500"> Hotline: 0935666443 | Email: saledn@f5pro.vn    </P>                
                      <P style="font-weight:500">  Tel: +84-236-3889982 | Fax : +84-236-3889983</P>
                      <br>
                  </div>
              </div>
          </div>
      </div>

      <div class="footer-bottom">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <p>
                          ©2006 Công ty CP Công nghệ F5.</p>

                  </div>
              </div>
          </div>
      </div>

  </div>
  <!-- 
<div id="phan-hoi-nhanh"></div>
-->

  <style>
.modal-body p.title {
    color: #f8941d;
    font-size: 22px;
    text-transform: uppercase;
}

.footer-center .title-foot {
    cursor: pointer;
}

#myBac .modal-dialog,
#myNam .modal-dialog,
#myTrung .modal-dialog {
    margin-top: 50px !important;
}
  </style>

  <script type="text/javascript" src="<?= public_url('site/lib') ?>/layout/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?= public_url('site/lib') ?>/layout/js/main.js"></script>

  <!-- end layout -->
  <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/colorbox/jquery.colorbox.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= public_url('site') ?>/js/jquery/colorbox/colorbox.css"
      media="screen" />
  <script type="text/javascript">
$(function() {
    $(".slide_show").colorbox({
        rel: 'slide_show',
        slideshow: true
    });
    // go top
    $('body').append('<div id="back_to_top">Back to Top</div>');
    $(window).scroll(function() {
        if ($(window).scrollTop() != 0) {
            $('#back_to_top').fadeIn();
        } else {
            $('#back_to_top').fadeOut();
        }
    });
    $('#back_to_top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });
});
  </script>



  <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/scrollTo/jquery.scrollTo.js"></script>
  <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/number/jquery.number.min.js"></script>
  <script type="text/javascript"
      src="<?= public_url('site') ?>/js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
  <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/form/jquery.form.js"></script>
  <script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/jquery.nst.ui.js" type="text/javascript">
  </script>

  <script type="text/javascript" src="<?= public_url('site') ?>/js/custom.js" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/datetime/jquery.datetimepicker.css" />
  <script type="text/javascript" src="<?= public_url('site/lib') ?>/datetime/jquery.datetimepicker.js"></script>

  <script type="text/javascript">
$(document).ready(function() {
    $(".datepicker").datetimepicker({
        format: 'd-m-Y',
        timepicker: false,
        changeYear: true,
        changeMonth: true,
        yearStart: '2020',
        yearEnd: '2021'
    });
    $(".datepicker2").datetimepicker({
        format: 'd-m-Y',
        timepicker: false,
        yearStart: '1930',
        yearEnd: '2010',
        maxDate: new Date()
    });
    $(".datepicker3").datetimepicker({
        format: 'd-m-Y',
        timepicker: false,
        yearStart: '1930',
        yearEnd: '2020',
        maxDate: new Date()
    });

});
  </script>

  <script type="text/javascript" src="<?= public_url('site/lib') ?>/layout/js/owl.carousel.js"></script>
  <script type="text/javascript" src="<?= public_url('site/lib') ?>/layout/js/main-bottom.js"></script>

  <script type="text/javascript" src="<?= public_url('site/js') ?>/jquery.flexslider.js"></script>
  <script type="text/javascript">
$(window).load(function() {
    // The slider being synced must be initialized first
    $('#carouselh').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 100,
        itemMargin: 5,
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carouselh"
    });
});
  </script>