<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3 col-sm-3 no-padding-right">
                    <a href="<?= base_url() ?>" class="logo" rel="nofollow">
                        <!-- <img src="https://f5c.vn/upload/public/bf9cec94a52f7beb1d5a66d07d416da4.png" style="  "> -->
                        <img src="<?= public_url('site') ?>/img/logof5c.png" />
                    </a>
                </div>
                <div class="col-md-9 col-sm-9 no-padding">
                    <ul class="list-inline">
                        <li class="dang-ky"><a href="#" class="lightbox">Đăng ký nhận tin khuyến mãi</a></li>
                        <li class="dich-vu"><a href="<?= base_url('thong-tin/dich-vu-khach-hang/i24.html') ?>">
                                Dịch vụ khách hàng</a></li>
                        <li class="so-do"><a href="<?= base_url('sitemap.xml') ?>">Sơ đồ trang web</a></li>
                    </ul>

                    <div class="box_search" style="position:relative">
                        <ul class="nav navbar-nav nav-mega">
                            <li class="dropdown mega-dropdown">
                                <a href="#" class="dropdown-toggle cathead" data-toggle="dropdown">
                                    <span class="mega-line-1">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                        Danh mục
                                    </span>
                                    <!-- <span class="mega-line-2">
                                        <br />sản phẩm <span class="caret"></span>
                                    </span> -->
                                </a>
                                <ul class="dropdown-menu mega-dropdown-menu">
                                    <?php if($allCategory && !empty($allCategory)): ?>
                                    <?php foreach($allCategory as $k=>$row): ?>
                                    <li class="col-sm-3">
                                        <ul class="parem-ul" id="u<?= $row['id']; ?>">
                                            <li class="dropdown-header"><a
                                                    href="<?= $row['link'] ?>"><?= $row['name'] ?></a></li>

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


                        </ul>
                        <form action="<?= base_url('search.html') ?>" method='get' id="box_search">
                            <div class="input-group form-search">
                                <div class="input-group-btn" style="position:relative">
                                    <select name="cat" class="form-control sl-cat"
                                        style="padding-left:17px;background:url('<?= public_url('site/lib') ?>/layout/img/icon/1.png') no-repeat 72px center">
                                        <option class="selected" value="0">Tất cả</option>
                                        <?php foreach($categoryParent as $row): ?>
                                        <option value="<?= $row->id ?>"><?= $row->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <input type="text" placeholder="Tìm kiếm sản phẩm..." value='' autocomplete="off"
                                    name="text-search" id="text-search" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                                <div id="divSuggestion" class="suggestion" style="display: none">
                                    <div id="search_load" class="form_load"></div>
                                    <div class="box-goi-y-search">
                                        <div id='content_search'></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="hotline-header-fix">
                        <?= $this->site_model->getSettingMeta('site_hotline_top'); ?></p>

                    <style>
                    .box-goi-y-search a.selected {
                        background-color: #ccc;
                    }

                    b.key_active {
                        color: #f8941d
                    }
                    </style>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <ul class="nav navbar-nav nav-res">
                <?php if(empty($userLogin)): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img
                            src="<?= public_url('site/img/user.png') ?>"></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= base_url('user/register.html') ?>">Đăng ký</a></li>
                        <li><a href="<?= base_url('user/login.html') ?>">Đăng nhập</a></li>
                    </ul>
                </li>
                <?php else: ?>
                <li><a href="<?= base_url('user/index') ?>"><i class="fa fa-user"></i> <?= $userLogin->name; ?></a>
                </li>
                <?php endif; ?>

                <li><a href="<?= base_url('gio-hang.html') ?>"><img
                            src="<?= public_url('site/img/cart.png') ?>"> (<span
                            id="countCart"><?= $cart_items; ?></span>) </a></li>
            </ul>
        </div>
    </div>
</div>