 <div class="on-top-fixed"></div>
 <div id="myNav" class="overlay">
     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
     <div class="overlay-content">
         <ul class="navbar-nav">
             <?php if($allCategory && !empty($allCategory)): ?>
             <?php foreach($allCategory as $row): ?>
             <li class="nav-item">
                 <a href="<?= $row['link'] ?>" style="margin-left:2px;background-color:#F8941D">
                     <i class="fa <?= $row['class_icon'] ?>"></i> <?= $row['name']; ?></a>
                 <?php if(!empty($row['subcat'])): ?>
                  <?php foreach($row['subcat'] as $sub):  ?>
                 <ul>
                     <li><a href="<?= $sub['link'] ?>"><?= $sub['name']; ?></a></li>                    
                 </ul>
                 <?php endforeach; ?>
                 <?php endif; ?>
             </li>
             <?php endforeach; ?>
             <?php endif; ?>
         </ul>
     </div>
 </div>
 <section class="cdmmm">
     <section class="container">
         <div class="row">
             <div class="col-lg-9">
                 <div class="row">
                     <!-- danh muc san pham -->
                     <div class="col-md-3 col-sm-12 no-padding-right danh-muc">
                         <ul class="list-group">
                             <li class="menu-lv1 list-group-item title">DANH SÁCH SẢN PHẨM </li>
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
                                             <a href="<?= $sub['link'] ?>"><?= $sub['name']; ?></a>
                                             <?php if(!empty($sub['subcat'])): ?>
                                             <ul class="list-sup-lv3 list-inline">
                                                 <?php foreach($sub['subcat'] as $sub_s): ?>
                                                 <li class="menu-lv3 ">
                                                     <a href="<?= $sub_s['link'] ?>"><?= $sub_s['name']; ?></a>
                                                 </li>
                                                 <?php endforeach; ?>
                                                 <li class="menu-lv3"><a class="xem-all" href="javascript:void(0)">Xem
                                                         tất cả</a></li>
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
                                     <img alt="<?= $row->name; ?>" src="<?= url_tam($row->image_name); ?>">
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


                             <style>
                             #modal-login .upload_single_image img.img_border {
                                 width: 100px;
                                 height: 80px;
                                 float: left;
                             }

                             #modal-login .upload_single_image {
                                 position: relative;
                             }

                             #modal-login .upload_single_image .upload_action {
                                 position: absolute;
                                 left: 110px;
                                 top: 30px;
                             }

                             #modal-login .error p {
                                 margin-bottom: 0px;
                             }
                             </style>

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
         </div>
     </section>
 </section>
 <!-- Message -->

 <section class="product-nb">
     <div class="container">
         <div class="bao-noibat">
             <h3 class="title-nb">Sản phẩm nổi bật</h3>
             <div class="list-sp-hot">
                 <div class="container">
                     <div class="row">
                         <?php if(!empty($listXemnhieu)): ?>
                         <?php foreach($listXemnhieu as $row): ?>
                         <div class="col-lg-3">
                             <div class="item-sp-hot">
                                 <a class="img-sp-hot" href="<?= product_url(slug($row->name),$row->id) ?>"><img
                                         src="<?= url_tam($row->image_name); ?>"></a>
                                 <div class="prdLblCampaign">
                                     <div class="prdLblCampaignThumb prdLblCampaignNew"><span
                                             style="background:linear-gradient(90deg,#FFC300 4.5%,#DD220D 90.3%)"> <img
                                                 src="<?= public_url('site') ?>/img/icon5-50x50.png"> <small>ĐƯỢC QUAN
                                                 QUÂM NHẤT</small> </span></div>
                                 </div>
                                 <h4><a href="<?= product_url(slug($row->name),$row->id) ?>"><?= $row->name; ?></a></h4>
                                 <p><span><?= ($row->price==0) ? 'Liên hệ' : number_format($row->price). '₫' ?> </span>
                                 </p>
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
     <div class="container">
         <div class="home-menu">
             <div class="home-menu-head">
                 <a href="<?= category_url($row->friendly_url) ?>" title="<?= $row->name ?>"><i
                         class="fa <?= $row->class_icon ?>"></i> <?= $row->name; ?></a>
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
                 <li><a href="<?= manufac_url(slug($mInfo->name),$m,$row->id) ?>" title="<?= $mInfo->name; ?>">
                         <?php if($mInfo->image_name!=''): ?>
                         <img src="<?= url_tam($mInfo->image_name); ?>" alt="<?= $mInfo->name; ?>">
                         <?php else: ?>
                         <span><?= $mInfo->name; ?></span>
                         <?php endif; ?>
                     </a>
                 </li>
                 <?php endforeach; ?>
                 <?php endif; ?>
             </ul>
         </div>

         <div class="nhom-sp-product">
             <div class="rowss">

                 <?php if(!empty($itemProduct)): ?>
                 <?php foreach($itemProduct as $k=>$pro): ?>
                 <div class="col-lg-3 borderlr_<?= $k ?>">
                     <div class="item-sp-cat">
                         <a class="img-sp-cat" href="<?= product_url(slug($pro->name),$pro->id) ?>"><img
                                 src="<?= url_tam($pro->image_name) ?>" alt="<?= $pro->name; ?>"></a>
                         <h4><a href="<?= product_url(slug($pro->name),$pro->id) ?>"><?= $pro->name; ?></a></h4>
                         <p><span><?= ($pro->price==0) ? 'Liên hệ' : number_format($pro->price). '₫'; ?> </span></p>
                     </div>
                 </div>
                 <?php endforeach; ?>
                 <?php endif; ?>
             </div>
         </div>
     </div>
 </section>
 <?php endforeach; ?>

 <section class="row-cdm">
     <div class="container">
         <div class="row">
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
                                             <img class="media-object" src="<?= url_tam($row->image_name) ?>"
                                                 alt="<?= $row->title; ?>">
                                         </a>
                                         <div class="media-body">
                                             <a class="media-heading"
                                                 href="<?= news_url(slug($row->title),$row->id); ?>"><?= $row->title; ?></a>
                                             <p class="media-content"><?= catchuoi($row->intro,200) ?></p>
                                             <a class="xem-tiep" href="<?= news_url(slug($row->title),$row->id); ?>">Xem
                                                 tiếp</a>
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
                                 <a style="color:#fff" href="#">Tin Mới</a>
                             </div>
                             <ul class="list-group">
                                 <?php if(!empty($listTinmoi)): ?>
                                 <?php foreach($listTinmoi as $row): ?>
                                 <li class="list-group-item">
                                     <div class="media">
                                         <a class="pull-left" href="<?= news_url(slug($row->title),$row->id) ?>">
                                             <img class="media-object" src="<?= url_tam($row->image_name) ?>"
                                                 alt="<?= $row->title; ?>">
                                         </a>
                                         <div class="media-body">
                                             <a class="media-heading"
                                                 href="<?= news_url(slug($row->title),$row->id) ?>"><?= $row->title; ?></a>
                                             <p class="media-content"><?= catchuoi($row->intro,100) ?></p>
                                             <a class="xem-tiep" href="<?= news_url(slug($row->title),$row->id) ?>">Xem
                                                 tiếp</a>
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
         </div>
     </div>
 </section>
 <style>
.sp-da-xem .product-img,
#detai-so-sanh .product-img {
    height: 120px;
    line-height: 120px;
    text-align: center;

}

.sp-da-xem .product-img img,
#detai-so-sanh .product-img img {
    border: none;
    vertical-align: middle;
    width: auto !important;
    max-height: 110px;
    margin-bottom: 5px
}

.overlay {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    background-color: rgb(243, 243, 244);
    /* background-color: rgba(243, 243, 244, 0.9); */
    overflow-x: hidden;
    transition: 0.5s;
    padding: 20px;
    display:none;
}

.overlay-content {
    position: relative;
    top: 0;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    transition: 0.3s;
    text-align: left;
}

.overlay a:hover,
.overlay a:focus {
    color: #f1f1f1;
}

.overlay .closebtn {
    position: absolute;
    top: -24px;
    right: 0;
    font-size: 60px;
}

@media screen and (max-height: 450px) {
    .overlay a {
        font-size: 20px
    }

    .overlay .closebtn {
        font-size: 40px;
        top: 15px;
        right: 35px;
    }
}
@media only screen and (max-width: 480px)  { 
  .cdmmm {
    display:none;
  }
 }
 @media only screen and (min-width:481px){
  .cdmmm {
    display:block;
  }
 }
 </style>


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
         </div>
     </div>
 </section>
 <script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
    $("#myNav").show("slow");
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    $("#myNav").hide();
}
 </script>