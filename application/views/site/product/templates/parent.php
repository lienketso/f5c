<div class="navboot">
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse js-navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <div class="line"><i></i><i></i><i></i></div>
               Danh mục <span class="caret"></span></a>        
            <ul class="dropdown-menu mega-dropdown-menu">
              <?php if($allCategory && !empty($allCategory)): ?>
                <?php foreach($allCategory as $k=>$row): ?>
              <li class="col-sm-3">
                <ul class="parem-ul" id="u<?= $row['id']; ?>">
                  <li class="dropdown-header"><a href="<?= $row['link'] ?>"><?= $row['name'] ?></a></li>
                  
                <a id="xemthem" class="xemthem" data-uid="u<?= $row['id'] ?>">Xem thêm</a>
                  

                  <?php if(!empty($row['subcat'])): ?>
                  <?php foreach($row['subcat'] as $sub):  ?>
                  <li><a href="<?= $sub['link'] ?>"><?= $sub['name']; ?></a></li>
                  <?php endforeach; ?>
                  <?php endif; ?>

                  <li class="divider"></li>

                </ul>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
          
            </ul>       
          </li>

          <li><a href="#">Store locator</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My account <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
          <li><a href="#">My cart (0) items</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </nav>
  </div>
</div>

<div class="breadcrum-f">
  <div class="container">
    <ul class="list-bread">
      <li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
      <li><span> <?= $category->name; ?></span></li>
    </ul>
  </div>
</div>

<section class="list-parent">
  <div class="container">
    <div class="row">

      <div class="col-lg-2 col-xs-3">
        <div class="item-parent">
          <a href="#">
            <img src="https://cdn.tgdd.vn/Category/5205/Binh,-ly-giu-nhiet-l-13-02-2020.png" alt="">
            <h3>Bình giữ nhiệt</h3>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-3">
        <div class="item-parent">
          <a href="#">
            <img src="https://cdn.tgdd.vn/Category/5205/Binh,-ly-giu-nhiet-l-13-02-2020.png" alt="">
            <h3>Bình giữ nhiệt</h3>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-3">
        <div class="item-parent">
          <a href="#">
            <img src="https://cdn.tgdd.vn/Category/5205/Binh,-ly-giu-nhiet-l-13-02-2020.png" alt="">
            <h3>Bình giữ nhiệt</h3>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-3">
        <div class="item-parent">
          <a href="#">
            <img src="https://cdn.tgdd.vn/Category/5205/Binh,-ly-giu-nhiet-l-13-02-2020.png" alt="">
            <h3>Bình giữ nhiệt</h3>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-3">
        <div class="item-parent">
          <a href="#">
            <img src="https://cdn.tgdd.vn/Category/5205/Binh,-ly-giu-nhiet-l-13-02-2020.png" alt="">
            <h3>Bình giữ nhiệt</h3>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-3">
        <div class="item-parent">
          <a href="#">
            <img src="https://cdn.tgdd.vn/Category/5205/Binh,-ly-giu-nhiet-l-13-02-2020.png" alt="">
            <h3>Bình giữ nhiệt</h3>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-3">
        <div class="item-parent">
          <a href="#">
            <img src="https://cdn.tgdd.vn/Category/5205/Binh,-ly-giu-nhiet-l-13-02-2020.png" alt="">
            <h3>Bình giữ nhiệt</h3>
          </a>
        </div>
      </div>


    </div>
  </div>
</section>