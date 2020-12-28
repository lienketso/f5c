    <div class="header-top">
      <div class="container">
        <div class="pull-right">
          <ul class="list-inline">
            <li class="dang-ky"><a href="#" class="lightbox">Đăng ký nhận tin khuyến mãi</a></li>
            <li class="dich-vu"><a href="#">Dịch vụ khách hàng</a></li>
            <li class="so-do"><a href="https://f5c.vn/sitemap.html">Sơ đồ trang web</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="header-bottom container">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-3 col-sm-3 no-padding-right">
              <a href="https://f5c.vn/" class="logo" rel="nofollow">
                <img src="https://f5c.vn/upload/public/bf9cec94a52f7beb1d5a66d07d416da4.png" style="  ">
              </a>
            </div>
            <div class="col-md-9 col-sm-9 no-padding">
              <p class="hotline-header">
              Hà Nội: 024.35640558 - 0932168866 | TPHCM: 028.38132181  - 0975236688 | Đà Nẵng: 0236.3889982 - 0935666443            </p>
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
        {
          method: "loadAjax",
          loadAjax:{
            url: 'https://f5c.vn/auto-search.html',
            data: 'term='+key+'&cat='+cat,
            field: {load: 'search_load', show: ''},
            event_complete: function(data)
            {
              $("#content_search").html(data);  
              $("#divSuggestion").css({'display':'block'});
            }
          },
        });
      }
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

<style>
  .box-goi-y-search a.selected{background-color:#ccc;}
  b.key_active{color:#f8941d}
</style>

<div class="box_search" style="position:relative"> 
  <form action="https://f5c.vn/search.html" method='get' id="box_search">
    <div class="input-group form-search">
      <div class="input-group-btn" style="position:relative">
        <select name="cat" class="form-control" style="padding-left:17px;background:url('https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/1.png') no-repeat 130px center">
          <option class="selected">Tất cả sản phẩm</option>
          <option value="49" >Máy - Thiết bị công nghiệp</option>
          <option value="10" >Máy vệ sinh công nghiệp</option>
          <option value="51" >Thiết bị siêu thị - cửa hàng</option>
          <option value="3" >Thiết bị văn phòng</option>
          <option value="9" >Thiết bị bếp công nghiệp</option>
          <option value="7" >Điện máy - Gia dụng</option>
          <option value="1" >Tin học, viễn thông</option>
          <option value="510" >Máy nông nghiệp</option>
          <option value="2" >Thiết bị số</option>
          <option value="64" >Thiết bị an ninh</option>
          <option value="450" >Thiết bị y tế</option>
          <option value="688" >Hàng thanh lý - Giảm giá</option>
          <option value="732" >Thiết bị Nhà hàng - Khách sạn</option>
        </select>
        
      </div>
      <input type="text" placeholder="Tìm kiếm sản phẩm..." value='' autocomplete="off" name="text-search" id="text-search" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-search" type="submit"><i class="fa fa-search"></i> Tìm Kiếm</button>
      </span>
      <div id="divSuggestion" class="suggestion" style='display:none;'>
        <div id="search_load" class="form_load"></div>  
        <div class="box-goi-y-search">
          <div id='content_search'></div>
        </div>
      </div>
    </div>
  </form>
</div>

</div>
</div>
</div>
<div class="col-md-3">
</div>
</div>
</div>