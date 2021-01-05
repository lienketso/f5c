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
              <a href="<?= base_url() ?>" class="logo" rel="nofollow">
                <img src="https://f5c.vn/upload/public/bf9cec94a52f7beb1d5a66d07d416da4.png" style="  ">
              </a>
            </div>
            <div class="col-md-9 col-sm-9 no-padding">
              <p class="hotline-header-fix">
              Hà Nội: 024.35640558 - 0932168866 | TPHCM: 028.38132181  - 0975236688 | Đà Nẵng: 0236.3889982 - 0935666443</p>

<style>
  .box-goi-y-search a.selected{background-color:#ccc;}
  b.key_active{color:#f8941d}
</style>

<div class="box_search" style="position:relative"> 
  <form action="https://f5c.vn/search.html" method='get' id="box_search">
    <div class="input-group form-search">
      <div class="input-group-btn" style="position:relative">
        <select name="cat" class="form-control" style="padding-left:17px;background:url('<?= public_url('site/lib') ?>/layout/img/icon/1.png') no-repeat 130px center">
          <option class="selected">Tất cả sản phẩm</option>
          <?php foreach($categoryParent as $row): ?>
          <option value="<?= $row->id ?>" ><?= $row->name; ?></option>
          <?php endforeach; ?>
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