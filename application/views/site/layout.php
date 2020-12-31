<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 7 ]><html class="ie ie6" dir="ltr" lang="en-US" ><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" dir="ltr" lang="en-US" ><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" dir="ltr" lang="en-US" ><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->
<head>
    <?php $this->load->view('site/head'); ?>
</head>
<body>
  <div id="header">
  <?php $this->load->view('site/header'); ?>
  </div>

<div id="main">
<?php $this->load->view($temp,$this->data); ?>
</div>

<div id="footer">
<?php $this->load->view('site/footer'); ?>

</div>
 
 <script type="text/javascript">

  $(window).on('scroll', function(){
    var secondaryNav = $('.tab-sp'),
    secondaryNavTopPosition = secondaryNav.offset().top;
    if($(window).scrollTop() > secondaryNavTopPosition ) {
      secondaryNav.addClass('fixed');  
      setTimeout(function() {
        secondaryNav.addClass('animate-children');
        $('#icon-categori').addClass('fixed');
      }, 50);
    } else {
      secondaryNav.removeClass('fixed');
      setTimeout(function() {
        secondaryNav.removeClass('animate-children');
        $('#icon-categori').removeClass('fixed');
      }, 50);
    }
  });
 </script>
 <!-- ===icon categori di chuyá»ƒn theo cĂ¡c táº§ng bĂªn trĂ¡i-->
 <div id="icon-categori" style="">
  <ul>
    <li class="icon-categori icon-categori-"><a href="#cat_49" title="Máy - Thiết bị công nghiệp"><i class="fa fa-cogs"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_10" title="Máy vệ sinh công nghiệp"><i class="fa fa-industry"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_51" title="Thiết bị siêu thị - cửa hàng"><i class="fa fa-barcode"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_3" title="Thiết bị văn phòng"><i class="fa  fa-print"></i></a></li>
    <li class="icon-categori icon-categori-tang6"><a href="#cat_9" title="Thiết bị bếp công nghiệp"><i class="fa fa-fire"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_7" title="Điện máy - Gia dụng"><i class="fa fa-television"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_1" title="Tin học, viễn thông"><i class="fa fa-desktop"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_510" title="Máy nông nghiệp"><i class="fa fa-gavel"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_2" title="Thiết bị số"><i class="fa fa-camera"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_64" title="Thiết bị an ninh"><i class="fa fa-shield"></i></a></li>
    <li class="icon-categori icon-categori-fa-heartbeat"><a href="#cat_450" title="Thiết bị y tế"><i class="fa fa-heartbeat"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_688" title="Hàng thanh lý - Giảm giá"><i class="fa fa-opencart"></i></a></li>
    <li class="icon-categori icon-categori-"><a href="#cat_732" title="Thiết bị Nhà hàng - Khách sạn"><i class="fa "></i></a></li>
  </ul>
 </div>
 
 <!-- ===facebook, google + fixed bĂªn pháº£i -->
 <div id="share-fix">
  <div class="share-icon share-google"><a target="_blank" href="https://plus.google.com/u/1/+F5CORP/posts">&nbsp;</a></div>
  <div class="share-icon share-sky"><a  href="skype:f5pro">&nbsp;</a></div>
  <div class="share-icon share-twi"><a  target="_blank"href="https://twitter.com/F5Corp">&nbsp;</a></div>
 </div>

 
 <style>
  /*style chi cho trang home*/
  @media(max-width: 480px){
    .dropdown.login{
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      padding: 5px;
      margin: 0;
      z-index: 999;
      background-color: #F58634;
      color: #fff;
      background-position: left 5px center;
    }
    .dropdown.login a.dropdown-toggle{
      color: #fff;
      margin-left: 37px;
      display: inline-block;
    }
    .dropdown.login .caret{
      display: none;
    }
    .mini-cart{
      position: fixed;
      top: 0;
      right: 10px;
      z-index: 9999;
      color: #fff;
      padding: 5px;
      margin: 0;
      border-right: none;
    }
    .dang-ky{
      display: none;
    }
    .header-top{
      padding-top: 50px;
    }
  }
 </style>  

<script type="text/javascript">
  $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );

    //------------
    $('.xemthem').on('click',function(e){
        e.preventDefault();
        let _this = $(e.currentTarget);
        let uid = _this.attr('data-uid');
        $('#'+uid).addClass('boauto');
    });

});
</script>

</body>

</html>