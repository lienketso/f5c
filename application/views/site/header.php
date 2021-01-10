    <div class="header-top">
        <div class="container">
            <div class="mobile-fisrt-link">

                <span class="mobile-cart" style="margin-right:20px">
                    <a class="" href="https://f5c.vn/gio-hang.html">
                        <span><img src="https://f5c.vn/public/site_mobile/img/icon/cart.png"> </span>
                    </a>
                </span>
                <span class="mobile-login">
                    <a class="" href="https://f5c.vn/user/login.html">
                        <img src="https://f5c.vn/public/site_mobile/img/icon/user.png" />
                        Đăng nhập</a>
                </span>
            </div>
     
        <div class="pull-right ">
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
                    <div class="col-md-3 col-sm-3 no-padding-right ">
                        <a href="<?= base_url() ?>" class="logo" rel="nofollow">
                            <img src="https://f5c.vn/upload/public/bf9cec94a52f7beb1d5a66d07d416da4.png" style="  ">
                        </a>
                    </div>
                    <div class="col-md-9 col-sm-9 no-padding">
                        <p class="hotline-header-fix">
                            Hà Nội: 024.35640558 - 0932168866 | TPHCM: 028.38132181 - 0975236688 | Đà Nẵng: 0236.3889982
                            - 0935666443</p>

                        <style>
                        .box-goi-y-search a.selected {
                            background-color: #ccc;
                        }

                        b.key_active {
                            color: #f8941d
                        }
                        </style>

                        <div class="box_search" style="position:relative">
                            <form action="https://f5c.vn/search.html" method='get' id="box_search">
                                <div class="mobile-open-search" onclick="openNav()">&#9776;</div>

                                <div class="input-group form-search search-fix-mobile">
                                    <div class="input-group-btn">
                                        <select name="cat" class="form-control"
                                            style="padding-left:17px;background:url('https://f5c.vn/<?= public_url('site/lib') ?>/layout/img/icon/1.png') no-repeat 130px center">
                                            <option class="selected">Tất cả sản phẩm</option>
                                            <option value="49">Máy - Thiết bị công nghiệp</option>
                                            <option value="10">Máy vệ sinh công nghiệp</option>
                                            <option value="51">Thiết bị siêu thị - cửa hàng</option>
                                            <option value="3">Thiết bị văn phòng</option>
                                            <option value="9">Thiết bị bếp công nghiệp</option>
                                            <option value="7">Điện máy - Gia dụng</option>
                                            <option value="1">Tin học, viễn thông</option>
                                            <option value="510">Máy nông nghiệp</option>
                                            <option value="2">Thiết bị số</option>
                                            <option value="64">Thiết bị an ninh</option>
                                            <option value="450">Thiết bị y tế</option>
                                            <option value="688">Hàng thanh lý - Giảm giá</option>
                                            <option value="732">Thiết bị Nhà hàng - Khách sạn</option>
                                        </select>

                                    </div>
                                    <input type="text" placeholder="Tìm kiếm sản phẩm..." value='' autocomplete="off"
                                        name="text-search" id="text-search" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-search" type="submit"><i class="fa fa-search"></i> Tìm
                                            Kiếm</button>
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
        <div class="mobile-logo">
            <a href="<?= base_url() ?>" class="" rel="nofollow">
                <img src="https://f5c.vn/upload/public/bf9cec94a52f7beb1d5a66d07d416da4.png">
            </a>
        </div>
    </div>

    <style>
@media only screen and (max-width: 480px) {
    .mobile-open-search {
        font-size: 30px;
        cursor: pointer;
        float: left;
        display: inline-block;
        font-size: 20px;
        border: 1px solid #F58634;
        padding: 4px 8px;
        color: #F58634;
    }

    .search-fix-mobile {
        width: calc(100% - 45px);
        float: right;
    }

    .hotline-header-fix {
        display: none;
    }

    .logo {
        display: none;
    }

    .header-top {
        padding-top: 0 !important;
        padding-bottom:10px;
    }

    .header-top ul.list-inline {
        display: none;
    }

    .mobile-logo {
        text-align: center;
        width: 100%;
    }

    .mobile-fisrt-link {
        float: right;
        margin-top: 10px;
    }
}

@media only screen and (min-width:481px) {
    .mobile-open-search {
        display: none;
    }
    .mobile-logo{
      display: none;
    }
    .mobile-fisrt-link{
      display: none;
    }

}
    </style>