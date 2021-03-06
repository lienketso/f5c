<section class="breadcrum-f5">
    <div class="container">
        <div class="w-path">
            <div class="w-path-l">
                <ul class="l">
                    <li><a href="<?= base_url() ?>" rel="nofollow">Trang chủ</a></li>
                    <li><i>&gt;</i></li>
                    <li><a href="<?= category_url($categoryName->friendly_url) ?>"
                            title="<?= $categoryName->name; ?>"><?= $categoryName->name; ?></a></li>
                    <li><i>&gt;</i></li>
                    <li><a href="#" title="<?= $info->name; ?>"><?= $info->name; ?></a></li>
                </ul>
            </div>

        </div>
    </div>
</section>

<section class="content-product-f5">
    <div class="container">
        <h1 class="title-detail-p"><?= $info->name ?></h1>
        <div class="row">
            <div class="info-pro">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slide-product">
                                <!-- Place somewhere in the <body> of your page -->
                                <div id="slider" class="flexslider">
                                    <ul class="slides image no-mobile">
                                        <li class="ex1">
                                            <img id="img_01" src="<?= url_tam($info->image_name); ?>"
                                                data-zoom-image="<?= url_tam($info->image_name); ?>"
                                                alt="<?= $info->name; ?>" />
                                        </li>
                                        <?php if(!empty($listAttach)): ?>
                                        <?php foreach($listAttach as $a): ?>

                                        <li class="ex1">
                                            <img id="img_<?=$a->id?>" src="<?= url_tam($a->file_name); ?>"
                                                alt="<?= $info->name; ?>"
                                                data-zoom-image="<?= url_tam($a->file_name); ?>"
                                                alt="<?= $info->name; ?>" />
                                        </li>
                                        <?php endforeach; ?>
                                        <?php endif; ?>

                                        <!-- items mirrored twice, total of 12 -->
                                    </ul>
                                    <ul class="slides image no-desktop">
                                        <li class="ex1">
                                            <img id="img_01" src="<?= url_tam($info->image_name); ?>"                                                
                                                alt="<?= $info->name; ?>" />
                                        </li>
                                        <?php if(!empty($listAttach)): ?>
                                        <?php foreach($listAttach as $a): ?>

                                        <li class="ex1">
                                            <img id="img_<?=$a->id?>" src="<?= url_tam($a->file_name); ?>"
                                                alt="<?= $info->name; ?>" />
                                        </li>
                                        <?php endforeach; ?>
                                        <?php endif; ?>

                                        <!-- items mirrored twice, total of 12 -->
                                    </ul>
                                </div>
                                <div id="carouselh" class="flexslider noborder">
                                    <ul class="slides sl-thumb">
                                        <li>
                                            <img src="<?= url_tam($info->image_name); ?>"
                                                alt="thumbnail <?= $info->name; ?>" />
                                        </li>

                                        <?php if(!empty($listAttach)): ?>
                                        <?php foreach($listAttach as $a): ?>
                                        <li>
                                            <img src="<?= url_tam($a->file_name); ?>" alt="<?= $info->name; ?>" />
                                        </li>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <!-- items mirrored twice, total of 12 -->
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="desc-product-f5">
                                <p>Giá bán:
                                    <span><?= ($info->price==0) ? 'Liên hệ' : number_format($info->price).' đ' ?>
                                    </span>
                                </p>
                                <?php if(!empty($info->options)): ?>
                                <div class="thongtin-them">
                                    <?php 
                    $them = unserialize($info->options);
                    ?>
                                    <ul>
                                        <?php foreach($them as $k=>$v): ?>
                                        <li><?=$k ?> : <span><?= $v ?></span></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>

                                <ul>
                                    <?php if($info->manufac_id!=0): ?>
                                    <li>Hãng sản xuất :
                                        <span><?= $this->manufac_model->getManufacName($info->manufac_id) ?></span>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($info->model!=''): ?>
                                    <li>Xuất xứ : <span><?= $info->model; ?></span></li>
                                    <?php endif; ?>
                                    <?php if($info->warranty!='' || $info->warranty!=0): ?>
                                    <li>Bảo hành : <span><?= $info->warranty; ?> tháng</span></li>
                                    <?php endif; ?>
                                    <li>Trạng thái : <span><?php if($info->status==1): ?> Còn hàng <?php endif ?><?php if($info->status==2): ?> Sản phẩm chưa có sẵn, liên hệ đặt hàng <?php endif ?> <?php if($info->status==0): ?> Hết hàng <?php endif ?></span></li>
                                    <?php if($info->show_vat==1): ?>
                                    <li>VAT :
                                        <span><?= ($info->vat==0) ? 'Đã bao gồm 10% VAT' : 'Chưa bao gồm VAT' ?></span>
                                    </li>
                                    <?php endif; ?>

                                </ul>
                            </div>

                            <div class="buynow-area">
                                <a href="<?= base_url('cart/add/'.$info->id) ?>" class="buy_now">Mua ngay <span
                                        class="buy_now_subtext">Giao tận nơi</span></a>
                            </div>

                            <?php if($info->sale!=''): ?>
                            <div class="info_more">
                                <span><img src="<?= public_url('site/img/gift.png') ?>"> Quà tặng</span>
                                <?= $info->sale; ?>
                            </div>
                            <?php endif; ?>

                            <div class="address_all">
                                <?= $this->site_model->getSettingMeta('site_book_button'); ?>
                            </div>

                            <style type="text/css">
                                .address_all{
                                    padding: 15px 10px;
                                    border: 1px solid #ccc;
                                    margin-top: 20px;
                                }
                                .info_more{
                                    margin-top: 25px;
                                    border: 1px solid #ccc;
                                    padding: 15px 10px;
                                    border-radius: 5px;
                                    position: relative;
                                }
                                .info_more span{
                                    position: absolute;
                                    top: -10px;
                                    background: #fff;
                                    padding: 0 10px;
                                    text-transform: uppercase;
                                    font-weight: bold;
                                    color: red;
                                }
                                .info_more span img{
                                    width:17px;
                                    position: relative;
                                    top: -3px;
                                }
                                .info_more p{
                                    margin-bottom: 0;
                                    line-height: 22px;
                                }
                            </style>
                        </div>

                        <div class="col-lg-12">
                            <?php if(!empty($listSosanh)): ?>
                            <div class="row">
                                <div class="col-lg-12" style="padding-bottom: 20px;clear:both">
                                    <div id="showthem" class="box_sosanh">
                                        <h4 class="title_sosanh">So sánh với các sản phẩm tương tự <span id="showss">Xem thêm</span></h4>
                                        <div class="row-ss">
                                            <?php foreach($listSosanh as $index => $row): ?>
                                            <!-- <?= ($index+1)%4==0 ? 'border_left':'' ?> -->
                                            <div class="col-lg-3 col-xs-6 border_ok ">
                                                <div class="list_sp_tuong_tu">
                                                    <div class="img_tuong_tu">
                                                        <a href="<?= product_url(slug($row->name),$row->id) ?>"
                                                            target="_blank"><img
                                                                src="<?= url_tam($row->image_name); ?>"></a>
                                                    </div>

                                                    <div class="info_tuong_tu">
                                                        <!-- <div class="tooltiptext">
                        <?= $row->options_cat; ?>
                        </div> -->
                                                        <h3><a href="<?= product_url(slug($row->name),$row->id) ?>"
                                                                target="_blank"><?= catchuoi($row->name,43); ?></a></h3>
                                                       <!--  <ul class="list_option">
                                                            <li>Hãng sản xuất :
                                                                <span><?= $this->manufac_model->getManufacName($row->manufac_id) ?></span>
                                                            </li>
                                                            <li>Xuất xứ : <span><?= $row->model; ?></span></li>

                                                            <li>Bảo hành : <span><?= $row->warranty ?> tháng</span></li>
                                                        </ul> -->
                                                        <p class="price_tuong_tu">
                                                            <?= ($row->price==0) ? 'Liên hệ' : number_format($row->price).' đ' ?>
                                                        </p>
                                                        <div class="nut_ss"><a class="sosanh_home"
                                                                href="<?= base_url('compare/index?product='.$info->id.','.$row->id) ?>">So
                                                                sánh</a></div>
                                                    </div>

                                                </div>

                                            </div>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                        </div>

                        <div class="col-lg-12 margin-mb">
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin sản
                                            phẩm</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Thông số kỹ
                                            thuật</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#phukien" aria-controls="phukien" role="tab" data-toggle="tab">Kết hợp tốt nhất</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="thong-tin-sp">
                                            <?= str_replace('{base_url}','https://f5c.vn/',html_entity_decode ($info->content)); ?>

                                            <div class="video_hd" style="text-align: center;">
                                                 <?php if($info->video_url!=''): ?>
                 <iframe style="width:100%;min-height:200px" class="yt-iframe lazy-iframe" width="730" height="410"                 
                     src="https://www.youtube.com/embed/<?= youtube_id($info->video_url) ?>" allow="autoplay; encrypted-media" frameborder="0"
                     allowfullscreen=""></iframe>
                     <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab">
                                        <div class="thong-tin-sp">
                                            <?= $info->options_cat; ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="phukien">
                                        <div class="thong-tin-sp">

                                            <?php if(!empty($info->products)): ?>
                                            <?php 
                              $phukien = unserialize($info->products);
                            ?>
                                            <div class="phukien_dikem">
                                                <div class="col-lg-12">
                                                    <div class="alert_add">Đã thêm phụ kiện vào giỏ hàng !</div>
                                                </div>
                                                <?php foreach($phukien as $val): ?>
                                                <?php 
                              $prophukien = $this->product_model->get_info($val);
                            ?>
                                                <div class="col-lg-3">
                                                    <div class="list_dikem">
                                                        <div class="img_dikem">
                                                            <a
                                                                href="<?= product_url(slug($prophukien->name),$prophukien->id) ?>"><img
                                                                    src="<?= url_tam($prophukien->image_name) ?>"
                                                                    alt="<?= $prophukien->name; ?>"></a>
                                                        </div>
                                                        <div class="intro_dikem">
                                                            <h4><a
                                                                    href="<?= product_url(slug($prophukien->name),$prophukien->id) ?>"><?= $prophukien->name; ?></a>
                                                            </h4>
                                                            <button type="button" data-id="<?= $prophukien->id ?>"
                                                                data-url="<?= base_url('cart/addpk') ?>"
                                                                class="addpk">Thêm phụ kiện</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>

                                            </div>
                                            <?php else: ?>
                                            <p>Chưa có phụ kiện...</p>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3>Bình luận</h3>
                            <p id="comment-noti" class="bg-success"> Cảm ơn bạn đã gửi đánh giá. Chúng tôi sẽ liên lạc
                                với bạn sớm nhất có thể</p>
                            <div id="panel-new-cmt" class="panel panel-primary">
                                <div class="panel-body">

                                    <textarea id="comment" class="form-control"
                                        placeholder="Nhập câu hỏi/bình luận/ nhận xét ..." rows="5"></textarea>
                                    <input type="hidden" id="domain" value="<?=base_url()?>">
                                    <input type="hidden" id="productId" value="<?=$info->id?>">
                                    <input type="hidden" value="<?= !empty($userLogin) ?$userLogin->id:'' ?>"
                                        id="userId">
                                    <input type="hidden" value="<?=!empty($userLogin) ?$userLogin->name :''?>"
                                        id="userName">
                                    <input type="hidden" value="<?=!empty($userLogin) ?$userLogin->email :''?>"
                                        id="userEmail">
                                </div>
                                <div class="panel-footer clearfix">
                                    <div class="col-lg-5">
                                        <label for="inputEmail">Email của bạn</label>
                                        <input type="text" class="form-control" placeholder="Email của bạn"
                                            id="inputEmail" name="inputEmail">
                                    </div>
                                    <div class="col-lg-5">
                                        <label for="inputName">Tên của bạn</label>
                                        <input type="text" class="form-control" placeholder="Tên của bạn" id="inputName"
                                            name="inputName">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="inputEmail">&nbsp;</label>
                                        <input class="btn btn-primary form-control" type="button" value="Gửi đánh giá"
                                            onclick="addComment()">
                                    </div>

                                </div>
                            </div>
                            <ul class="list-group" id="lst-content">
                                <?php foreach($lstComment as $item): ?>
                                <li class="list-group-item" id="<?= $item->id?>">
                                    <h4><b><?=$item->user_name?></b></h4>

                                    <p><?=$item->content?></p>
                                    <p>
                                        <?php if(!empty($userLogin)): ?>
                                        <a class="" data-id="<?=$item->id?>"
                                            onclick="openPopupAnswer(<?= $item->id?>)">Trả lời</a>
                                        &nbsp; &nbsp; &nbsp;
                                        <?php endif; ?>
                                        <i class="fa fa-thumbs-o-up"></i>
                                        <a class="vote-comment" data-id="<?=$item->id?>">Thích</a>
                                        &nbsp; &nbsp; &nbsp;
                                        <span class="text-muted"><?=date("d-m-Y", $item->created)?></span>
                                    </p>
                                    <div class="panel panel-success" style="display:none" id="panel_<?=$item->id?>">
                                        <div class="panel-body">
                                            <textarea class="form-control"
                                                placeholder="Nhập câu hỏi/bình luận/ nhận xét ..." rows="3"
                                                id="contentId_<?= $item->id?>"></textarea>
                                        </div>
                                        <div class="panel-footer clearfix">
                                            <div class="col-lg-8">

                                            </div>
                                            <div class="col-lg-4 text-right">

                                                <input type="hidden" value="<?=$item->id?>"
                                                    id="commentId_<?=$item->id?>">

                                                <a class="btn btn-primary" onclick="addAnswer(<?=$item->id?>)">Gửi đánh
                                                    giá</a>
                                                <a class="btn btn-danger "
                                                    onclick="closePopupAnswer(<?= $item->id?>)">Đóng</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $lstSubContent = $this->comment_model->getSubComment($item->id)?>
                                    <dl class="sub-content" id="<?= $item->id?>">
                                        <?php if(!empty($lstSubContent)):?>
                                        <?php foreach($lstSubContent as $sub): ?>
                                        <dt><?=$sub->user_name?></dt>
                                        <dd><?=$sub->content?></dd>
                                        <?php endforeach; ?>
                                        <?php endif;?>
                                    </dl>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php if(count($lstComment)>0):?>
                            <div class="col-lg-12 text-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <a class="" data-page="2" onclick="loadMoreComment()" id="load-more-comment">Hiển thị
                                    thêm</a>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>


                </div>

                <div class="col-lg-3">
                    <style type="text/css">
                        .support-list ul li{
                            position: relative;
                        }
                        .chat_support {
                            position: absolute;
                            right: 0;
                            top: -10px;
                            }
                    </style>
                    <div class="support-page">
                        <h3>Hỗ trợ mua hàng</h3>
                        <?php foreach($GroupSupport as $key=>$row): ?>
                        <?php 
                $ls['where'] = ['group_id'=>$row->id];
                $ls['order'] = ['sort_order','asc'];
                $ls['limit'] = [1,0];
                $listSP = $this->support_model->get_list($ls);
                ?>
                        <div class="support-list">
                            <h4><?= $row->name; ?></h4>
                            <ul>
                                <?php foreach($listSP as $item): ?>
                                <li><a href="tel:<?= $item->phone; ?>">
                                        <img src="<?= public_url('site/img/phone.png') ?>">
                                        <span><?= $item->phone; ?></span></a> <a style="font-size: 11px;"
                                        href="mailto:<?= $item->gmail; ?>"><?= $item->gmail; ?></a>
                                    <?php if($key!=3): ?>
                                    <div class="chat_support">
                                        <a target="_blank" href="https://zalo.me/<?= trim($item->yahoo) ?>"
                                            title="Click để chat với zalo"><img
                                                src="<?= public_url('site/img/logo-zalo.jpg') ?>"></a>
                                        <a href="http://m.me/<?= $item->skype; ?>" target="_blank"
                                            title="Click để chat với messenger"><img
                                                src="<?= public_url('site/img/fbicon.png') ?>"></a>
                                    </div>
                                    <?php endif; ?>

                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="sidebar-pro">
                        <div class="widget-cunghang">
                            <h4>Sản phẩm cùng hãng</h4>
                            <?php foreach($listCH as $row): ?>
                            <div class="list-cunghang">
                                <div class="img-cunghang">
                                    <a href="<?= product_url(slug($row->name),$row->id) ?>"><img
                                            src="<?= url_tam($row->image_name); ?>" align="<?= $row->name; ?>"></a>
                                </div>
                                <div class="info-cunghang">
                                    <p class="title-cunghang"><a
                                            href="<?= product_url(slug($row->name),$row->id) ?>"><?= $row->name; ?></a>
                                    </p>
                                    <p class="price-cunghang">
                                        <?= ($row->price==0) ? 'Liên hệ' : number_format($row->price).' đ' ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>


                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js">
</script>
<script type="text/javascript">
$(window).resize(function() {
    $('.ex1.flex-active-slide').height($('.flex-active-slide').width());
});
$(window).ready(function() {
    $('.ex1.flex-active-slide').height($('.flex-active-slide').width());

    $('.slides.image li img').each(function(el, val) {
        let id = $(val).attr('id');
        $('#' + id).ezPlus({
            borderColour: '#ccc'
        });
    })
});

function openPopupAnswer(id) {
    $('#panel_' + id).show();
}

function closePopupAnswer(id) {
    $('#panel_' + id).hide();
}

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}

function addComment() {
    let productId = $('#productId').val();
    let comment = $('#comment').val().trim();
    let name = $('#inputName').val().trim();
    let email = $('#inputEmail').val().trim();
    if (comment.length == 0) {
        alert('Bạn chưa nhập bình luận');
        return;
    }
    if (email.length == 0) {
        alert('Bạn chưa email');
        return;
    }
    if (!validateEmail(email)) {
        alert('Email không hợp lệ');
        return;
    }
    if (name.length == 0) {
        alert('Bạn chưa tên');
        return;
    }
    let url = $('#domain').val();
    $.ajax({
        method: "POST",
        url: url + "product/addComment",
        data: {
            productId: productId,
            comment: comment,
            userName: name,
            userEmail: email

        }
    }).done(function(res) {
        $('#comment').val('');
        $('#inputName').val('');
        $('#inputEmail').val('');
        $('#panel-new-cmt').hide('slow');
        $('#comment-noti').show('slow');
    });
}

function addAnswer(id) {
    let content = $('#contentId_' + id).val();
    let commentId = $('#commentId_' + id).val();
    let productId = $('#productId').val();
    let userName = $('#userName').val();
    let userEmail = $('#userEmail').val();
    let url = $('#domain').val();
    if (content.length == 0) {

        alert('Bạn chưa nhập bình luận');
        return;
    }
    $.ajax({
            method: "POST",
            url: url + "product/addAnswer",
            data: {
                comment: content,
                commentId: commentId,
                productId: productId,
                userName: userName,
                userEmail: userEmail

            }
        })
        .done(function(response) {
            if (response.length > 0) {
                var arr = JSON.parse(response);
                var cmt = arr[0];
                $('#' + cmt.parent_id + '.sub-content').prepend("<dt>" + cmt.user_name + "</dt><dd>" + cmt.content +
                    "</dd>")
            }
            closePopupAnswer(commentId);
        });
}

function loadMoreComment() {
    $('#load-more-comment').html('Loading ...')
    let page = $('#load-more-comment').data('page');
    let productId = $('#productId').val();
    let url = $('#domain').val();
    let userId = $('#userId').val();
    $.ajax({
            method: "POST",
            url: url + "product/loadMoreComment",
            data: {
                page: page,
                productId: productId
            }
        }).done(function(res) {
            $('#load-more-comment').html('Hiển thị thêm');
            $('#load-more-comment').data('page', page + 1);
            let data = JSON.parse(res);
            let arrCom = data.lstComment;
            let arrSub = data.lstSubComment;
            if (arrCom.length == 0) {
                $('#load-more-comment').hide();
            } else {
                arrCom.forEach(function(item) {
                    let li = '<li class="list-group-item" id="' + item.id + '">';
                    li += '<h4><b>' + item.user_name + '</b></h4>';
                    li += '<p>' + item.content + '</p>';
                    if (userId.length > 0) {
                        li += '<a class="" data-id="' + item.id + '" onclick="openPopupAnswer(' + item.id +
                            ')">Trả lời</a>&nbsp;&nbsp;&nbsp;';
                    }
                    li += ' <i class="fa fa-thumbs-o-up"></i><a class="vote-comment" data-id="' + item.id +
                        '">Thích</a> &nbsp; &nbsp; &nbsp;'
                    let displayDate = new Date(1615978619784).toLocaleString('vi-vn', {
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit'
                    }).replace(/(\d+)\/(\d+)\/(\d+)/, '$1-$2-$3');
                    li += '<span class="text-muted">' + displayDate + '</span>';
                    li += '</p>';
                    li += '<div class="panel panel-success" style="display:none" id="' + item.id + '">';
                    li += '<div class="panel-body">';
                    li +=
                        '<textarea class="form-control" placeholder="Nhập câu hỏi/bình luận/ nhận xét ..." rows="3" id="contentId_' +
                        item.id + '"></textarea>';
                    li += '</div>';
                    li += '<div class="panel-footer clearfix">';
                    li += '<div class="col-lg-8"></div>';
                    li += '<div class="col-lg-4 text-right">';
                    li += '<input type="hidden" value="' + item.id + '" id="commentId_' + item.id + '">';
                    li += '<a class="btn btn-primary" onclick="addAnswer(' + item.id +
                    ')">Gửi đánh giá</a>';
                    li += '<a class="btn btn-danger " onclick="closePopupAnswer(' + item.id + ')">Đóng</a>';
                    li += '</div>';
                    li += '</div>';
                    li += '</div>';
                    li += '<dl class="sub-content" id="' + item.id + '"></dl>';
                    li += '</li>';

                    $('ul#lst-content').append(li);
                });

                arrSub.forEach(function(sub) {
                    $('#' + sub.parent_id + '.sub-content').append("<dt>" + sub.user_name + "</dt><dd>" +
                        sub.content + "</dd>");
                });
            }

        })
        .fail(function(err) {
            console.log(err);
        });;
}

function voteComment(id) {}
$(document).on('click', '.vote-comment', function() {
    $(this).prev().addClass('active');
    let id = $(this).data('id');
    let url = $('#domain').val();
    $.ajax({
        method: "POST",
        url: url + "product/voteComment",
        data: {
            vote: id
        }
    })
});
</script>

<style type="text/css">
    #showss{
    font-size: 13px;
    color: #000;
    text-transform: none;
    padding-left: 20px;
    cursor: pointer;
    }
    @media(min-width: 768px){
        .box_sosanh{
            height: 394px;
            overflow: hidden;
        }
    }
    .show_more{
        height: auto !important;
        overflow: unset;
    }
    @media(max-width: 767px){
        #showss{
            display: none;
        }
    }
</style>