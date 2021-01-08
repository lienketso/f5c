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

    
    <section class="thong-tin">
  <div class="container">
    <div class="row">
  <?php foreach($listDanhmuctin as $row): ?>
    <?php 
      $s['where'] = ['cat_id'=>$row->id];
      $s['limit'] = [5,0];
      $itemNews = $this->news_model->get_list($s);
    ?>
  <div class="col-lg-3 col-sm-4" style="width:20%">
    <div class="panel">
      <div class="panel-heading">
        <a style="color:#fff" href="<?= catnews_url($row->friendly_url,$row->id) ?>" title='<?= $row->name; ?>'>
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
</div>
</div>
</section>   
    
  </div>

  <div id="footer">
    <?php $this->load->view('site/footer'); ?>
  </div>


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

    //ajax lấy quận huyện
    $('#changeCity').on('change',function(e){
     e.preventDefault();
     let _this = $(e.currentTarget);
     let link = _this.attr('data-link');
     let cityid = _this.val();
     $.ajax({
      type: 'POST',
      url: link,
      data: {cityid},
    })
     .done(function(resp){
      $('#quanhuyen').html(resp);
    });             
   });

    //dành cho sort
    $('.sort_order').on('change', function(e){
      $('#frmSort').submit();
    })

  });
</script>

<script type="text/javascript">
  $( document ).ready(function() {    
    $('.btn-number').click(function(e){        
      e.preventDefault();                
      var fieldName = $(this).attr('data-field');        
      var type      = $(this).attr('data-type');        
      var input = $("input[name='"+fieldName+"']");        
      var currentVal = parseInt(input.val());        

      var link = $(this).attr('data-link');
      var rowid = $(this).attr('data-rowid');

      if (!isNaN(currentVal)) {            
        if(type == 'minus') {                
          var minValue = parseInt(input.attr('min'));                 
          if(!minValue) minValue = 1;                
          if(currentVal > minValue) {                    
            input.val(currentVal - 1).change();    
            var qty = input.val();
            $.ajax({
              type: 'POST',
              url: link,
              data: {rowid,qty},
            })
            .done(function(resp){
              $('#total_cart').html(resp);
              $('#tong_tien').html(resp);
              $('#tong_tiencuoi').html(resp);
            });         
          }                 
          if(parseInt(input.val()) == minValue) {                    
            //$(this).attr('disabled', true);                
          }                
        } 
        else if(type == 'plus') {                
          var maxValue = parseInt(input.attr('max'));                
          if(!maxValue) maxValue = 9999999999999;                
          if(currentVal < maxValue) {    

            input.val(currentVal + 1).change();   
            var qty = input.val();
            $.ajax({
              type: 'POST',
              url: link,
              data: {rowid,qty},
            })
            .done(function(resp){
              $('#total_cart').html(resp);
              $('#tong_tien').html(resp);
              $('#tong_tiencuoi').html(resp);
            });             
          }                
          if(parseInt(input.val()) == maxValue) {                    
            $(this).attr('disabled', true);                
          }                
        }        
      } 
      else {            
        input.val(0);        
      }    
    });    
  });
</script>

<script type="text/javascript">
$(function() {
    //search
    var main = $('#box_search');
    main.find('#text-search').keyup(function(event){
       // alert(event.which);
     if(event.which == 16 || event.which == 37 || event.which == 38 || event.which == 39 || event.which == 40 || event.which == 32)
     {
         return false;
     }
       search_auto();
    });
    main.find('[name="cat"]').change(function(){
      search_auto();
    });
    function search_auto()
    {
    var key = main.find('#text-search').val();
    var cat = main.find('[name="cat"]').val();
    if(key != '')
    {
      $(this).nstUI(
        $.ajax({
    type: "GET",
    url: '<?= base_url('home/search_ajax') ?>',
    data:'term='+key+'&cat='+cat,
    beforeSend: function(){
      
    },
    success: function(data){
       $("#content_search").html(data);  
       $("#divSuggestion").css({'display':'block'});
    }
    })     
    )}
    else
    {
      $("#content_search").html('<center><strong>Bạn cần nhập từ khóa tìm kiềm...</strong></center>');
    }
    }
    /*
    $( ".form-search" ).mouseleave(function() {
      $("#divSuggestion").css({'display':'none'});
    });
    */
  
  $(".box_search").mouseleave(function(e){
    $("#divSuggestion").css({'display':'none'});
  });
  
    
    $('form#box_search').submit(function(){
       var $selected = $('.sp-goi-y').find('a.item-sp-search.selected');
       $href = jQuery.trim($selected.attr('href'));
     if($href)
     {
       window.location = $href;
       return false;
     }
    });

    //raty
  jQuery(document.body).on('click', '.top_search',function()
    {
    var key = $(this).text();
    key = jQuery.trim(key);
    if(key != '')
    {
      $('#text-search').val(key);
      $('form#box_search').submit();
    } 
    });
  
    $(document).on('keydown', 'body' ,function(event){
      if(event.which == 40)
     {
        var $selected = $('.sp-goi-y').find('a.item-sp-search.selected');
        $text = jQuery.trim($selected.find('.name-sp-search').text());
        if(!$text)
        {
        $selected = $('.sp-goi-y a.item-sp-search:first');
        }else{
        $selected.removeClass('selected');
        $selected = $selected.next('a.item-sp-search');
        }
        
      $selected.addClass('selected');
      $text = jQuery.trim($selected.find('.name-sp-search').text());
      if(!$text)
        {
        $selected = $('.sp-goi-y a.item-sp-search:first');
          $selected.addClass('selected');
        }
          $text = jQuery.trim($selected.find('.name-sp-search').text());
        
        if($text)
        {
         //$('#text-search').val($text);
        }
        return false;
        
     }else if(event.which == 38)
     {
        var $selected = $('.sp-goi-y').find('a.item-sp-search.selected');
        $text = jQuery.trim($selected.find('.name-sp-search').text());
        if(!$text)
        {
        $selected = $('.sp-goi-y').find('a.item-sp-search:last-child');
        }else{
        $selected.removeClass('selected');
        $selected = $selected.prev('a.item-sp-search');
        }
        
      $selected.addClass('selected');
      $text = jQuery.trim($selected.find('.name-sp-search').text());
        if(!$text)
        {
          $selected = $('.sp-goi-y').find('a.item-sp-search:last-child');
            $selected.addClass('selected');
        }
          $text = jQuery.trim($selected.find('.name-sp-search').text());
          
        if($text)
        {
         //$('#text-search').val($text);
        }
        return false;
     }
    });
});
</script>

</body>

</html>