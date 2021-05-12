<div class="breadcrum-f">
    <div class="container">
        <ul class="list-bread">
            <li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
            <li><span> So sánh sản phẩm</span></li>
        </ul>
    </div>
</div>
<style type="text/css">
    .ts_kythuat table{
        width: 100% !important;
    }
</style>
<section class="current-cat-pro">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="CompareID">
                <?php foreach($arrProduct as $k=>$p): ?>
                <div class="col-lg-4 col-xs-6 bao_border" id="com<?= $p->id; ?>">
                    <div class="item-sp-com">
                        <a class="img-sp-cat" href="<?= product_url(slug($p->name),$p->id) ?>"><img
                                src="<?= url_tam($p->image_name); ?>" alt="<?= $p->name; ?>"></a>
                        <?php if($k!=0): ?>
                        <span class="remove_com" data-id="<?= $p->id; ?>"
                            data-url="<?=current_url().'?'.$_SERVER['QUERY_STRING']?>"><img title="Xóa sản phẩm"
                                src="<?= public_url('site/img/remove_btn.png') ?>"></span>
                        <?php endif; ?>
                        <h4><a href="<?= product_url(slug($p->name),$p->id) ?>"><?= $p->name; ?></a></h4>
                        <p><span class="price_com"><?= ($p->price==0) ? 'Liên hệ' : number_format($p->price). '₫'; ?>
                            </span></p>
                        <!-- <div class="ts_kythuat">
                            <?php 
                    $input['where'] = ['product_id'=>$p->id];
                    $input['order'] = ['option_id','asc'];
                    $spkethop = $this->product_model->getSerialProcduct($p->products);
                    $listOps = $this->product_option_model->get_list($input);
                  
                   ?>
                            <ul class="list_ss" id="<?= $p->id; ?>">
                                <li data-option-id="1"><span>Bảo hành :</span> <?= $p->warranty ?> tháng</li>
                                <?php foreach($arrOptionTitle as $row): ?>
                                <li data-option-id="<?= $row->option_id ?>">
                                    <span><?= $row->name ?> :</span>
                                    <?php if ($listOps) :?>
                                    <?php foreach($listOps as $i=>$v):?>
                                    <?php if($v->option_id == $row->option_id):?>
                                    <span class="option-value"> <?= $v->value ==''?'N/A':$v->value; ?> </span>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <span class="option-value">N/A</span>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div> -->
                        <div class="ts_kythuat">
                            <?= $p->options_cat; ?>
                        </div>
                        <div class="btn_comp"><a class="compare_cart" id="<?= $p->id; ?>" data-id="<?= $p->id; ?>"
                                data-href="<?= base_url('cart/addmulti/'); ?>">Mua sản phẩm</a>
                            <?php if ($spkethop) :?>
                            <h5 id="title-spkh">Sản phẩm kết hợp</h5>
                            <ul class="ul-spkh">
                                <?php foreach($spkethop as $sp): ?>
                                <li>
                                    <div>
                                        <div class="content-left">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" style="margin-top:20px" id="<?= $sp->id; ?>"
                                                        value="<?= $sp->id; ?>" class="spkh" data-p-id="<?= $p->id; ?>">
                                                    <img src="<?= url_tam($p->image_name); ?>" alt="<?= $p->name; ?>"
                                                        data-holder-rendered="true"
                                                        style="width: 64px; height: 64px;display:inline">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="content-right">
                                            <div><?=$sp->name?></div>
                                            <p><?= ($sp->price==0) ? 'Liên hệ' : number_format($sp->price). '₫'; ?></p>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- <?php if(count($arrProduct)<3): ?> -->
                <div class="col-lg-4 col-xs-6" id="themCom">
                    <div class="bao_ajax">
                        <a data-toggle="modal" href="#modal-id"><img src="<?= public_url('site/img/plus.png') ?>"></a>
                        <h4>Thêm sản phẩm để so sánh</h4>
                    </div>
                </div>
                <!-- <?php endif; ?> -->
            </div>

        </div>
    </div>
</section>


<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Chọn sản phẩm để thêm vào so sánh</h4>
            </div>
            <div class="modal-body">
                <div class="list_more_com">
                    <?php foreach($productMore as $m): ?>
                    <div class="list_m">
                        <a href="javascript:void" class="addmorecom" data-id="<?= $m->id ?>"
                            data-href="<?= base_url('compare/addmore') ?>"><img
                                src="<?= url_tam($m->image_name) ?>"></a>
                        <p><?= $m->name; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-12">
                    <div class="autocomplete-group">
                        <input id="domain" type="hidden" value="<?= base_url() ?>">
                        <input type="hidden" id="catId" value="<?=$catId?>">
                        <input class="form-control" id="auto_input" type="text" placeholder="" autocomplete="off">
                        <ul id="auto_result" class="list-group list-group-flush"></ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="clear:both">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    if ($('.list_ss').length == 2) {
        var max = $('.list_ss')[0].children.length;
        for (var i = 0; i < max; i++) {
            var text1 = $('.list_ss')[0].children[i].innerText;
            var text2 = $('.list_ss')[1].children[i].innerText;
            if (text1 != text2) {
                $('.list_ss:eq(1) li:eq(' + i + ')').addClass('bg-warning');
            }
        }
    }
    if ($('.list_ss').length == 3) {
        var max = $('.list_ss')[0].children.length;
        for (var i = 0; i < max; i++) {
            var text1 = $('.list_ss')[0].children[i].innerText;
            var text2 = $('.list_ss')[1].children[i].innerText;
            var text3 = $('.list_ss')[2].children[i].innerText;
            if (text1 != text2 || text2 != text3) {
                $('.list_ss:eq(1) li:eq(' + i + ')').addClass('bg-warning');
            }
            if (text1 != text3 || text2 != text3) {
                $('.list_ss:eq(2) li:eq(' + i + ')').addClass('bg-warning');
            }
        }
    }

    var arrExclude = window.location.search;
    arrExclude = arrExclude.substring(arrExclude.indexOf('=') + 1);
    $('#auto_input').keyup(function() {
        let search = $('#auto_input').val().trim();
        let domain = $('#domain').val();
        let catId = $('#catId').val();
        //    console.log(search)
        if (search.length < 2) {
            return;
        }
        $.post(domain + "compare/loadAutocompleProduct", {
                catId: catId,
                search: search,
                arrExclude: arrExclude
            })
            .done(function(data) {
                $('#auto_result').html('');
                data.forEach(function(item) {
                    let html = '<li class="list-group-item">'
                    html += '<a class="addmorecom" data-id="' + item.id + '" data-href="' +
                        domain + 'compare/addmore">'
                    html += '<div class="product-name">' + item.name + '</div>'
                    html += '<span class="product-price">' + item.display_price + '</span>'
                    html += '</a>'
                    html += '</li>'

                    $('#auto_result').append(html);
                });

            })
    });

    $('.spkh').click(function() {
        let flag = $(this).is(':checked');
        let p = $(this).data('p-id');
        let arrId = $('#' + p + '.compare_cart').data('id');
        let id = $(this).attr('id');
        if (flag) {
            arrId = arrId + '_' + id
        } else {
            arrId = arrId.replace(id, '');
        }
        if (arrId.substring(arrId.length - 1) == '_') {
            arrId= arrId.substring(0, arrId.length - 1);
        }
        $('#' + p + '.compare_cart').data('id', arrId);
        console.log(arrId);
    });

    $('.compare_cart').click(function(){
        let arrId = $(this).data('id');
        let url =  $(this).data('href');
        $(".spkh").prop( "checked", false );
        $.post(url,{
            arrId:arrId
        }) .done(function(href) {
            window.location.href =href;
             });

    })
});
</script>