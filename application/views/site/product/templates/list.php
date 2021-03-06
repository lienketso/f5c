<div class="breadcrum-f">
    <div class="container">
        <ul class="list-bread">
            <li><a href="<?= base_url() ?>">Trang chủ <span>›</span></a></li>
            <?php 
      $catcha = $this->category_model->get_info($category->parent_id);
      if(!empty($catcha)):
       ?>
            <li><a href="<?= category_url($catcha->friendly_url) ?>"><?= $catcha->name; ?> <span>›</span></a></li>
            <?php endif; ?>

            <li><span> <?= $category->name; ?></span></li>
        </ul>
    </div>
</div>

<section class="list-parent">
    <div class="container">
        <div class="row">
            <?php 
      $input['where']= ['parent_id'=>$category->id];
      $input['order'] = ['sort_order','asc'];
      $listChild = $this->category_model->get_list($input);
      ?>
            <?php if(!empty($listChild)): ?>
            <?php foreach($listChild as $c): ?>
            <div class="col-lg-2 col-xs-4">
                <div class="item-parent">
                    <a href="<?= category_url($c->friendly_url) ?>">
                        <img src="<?= ($c->image_name!=NULL || !empty($c->image_name)) ? url_tam($c->image_name) : public_url('site/images/no_image.png')  ?>"" alt="<?= $c->name; ?>">
                        <h3><?= $c->name; ?></h3>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if(!empty($listChild) && count($listChild>0)): ?>
<?php foreach($listChild as $c): ?>
<?php 
    $cba['where'] = ['parent_id'=>$c->id];
    $cba['order'] = ['sort_order','asc'];
    $cba['limit'] = [5,0];
    $listCapba = $this->category_model->get_list($cba);
    $conId = [];
    ?>
<section class="cat-page-list">
    <div class="container">
        <div class="pls-menu">
            <p class="pls-menu-head">
                <a href="<?= category_url($c->friendly_url) ?>" title="<?= $c->name ?>"><?= $c->name ?></a>
            </p>
            <?php if(!empty($listCapba)): ?>
            <ul class="lon">
                <?php foreach($listCapba as $cc): ?>
                <?php
                array_push($conId,$cc->id);
                ?>
                <li><a href="<?= category_url($cc->friendly_url) ?>"><?= $cc->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

        </div>

        <div class="list-product-page">
            <div class="rowss">
                <?php 

            if(!empty($conId)){
              $pr['where'] = ['hide'=>'0'];
              $pr['where_in'] = ['cat_id',$conId];
            }else{
              $pr['where'] = ['hide'=>'0','cat_id'=>$c->id];
            }

            $pr['limit'] = [8,0];
            $productP = $this->product_model->get_list($pr);
            ?>
                <?php foreach($productP as $k=>$p): ?>
                <div class="col-lg-3 col-xs-6 borderlr_<?= $k ?>">
                    <div class="item-sp-cat">
                        <a class="img-sp-cat" href="<?= product_url(slug($p->name),$p->id) ?>"><img
                                src="<?= url_tam($p->image_name); ?>" alt="<?= $p->name ?>"></a>
                        <h4><a href="<?= product_url(slug($p->name),$p->id) ?>"><?= catchuoi($p->name,75); ?></a></h4>
                        <p><span><?= ($p->price==0) ? 'Liên hệ' : number_format($p->price). '₫'; ?> </span></p>

                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
</section>
<?php endforeach; ?>

<?php else: ?>

<section class="current-cat-pro">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="result clearfix">
                    <div class="orderby pull-right">
                        Xếp theo
                        <form method="get" id="frmSort">
                            <select class="orderby fillter_checkbox sort_order" name="sort_order">
                                <option value="">Mặc định</option>
                                <option value="asc" <?= ($sort_order=='asc') ? 'selected' : '' ?>> Giá từ thấp tới cao
                                </option>
                                <option value="desc" <?= ($sort_order=='desc') ? 'selected' : '' ?>> Giá từ cao tới thấp
                                </option>
                            </select>
                        </form>
                    </div>

                </div>
                <div class="row">
                    <?php foreach($list as $k=>$p): ?>
                    <div class="col-lg-3 col-xs-6">
                        <div class="item-sp-cao page-cat">
                            <div class="img_list_page">
                                <a class="img-sp-cat-page" href="<?= product_url(slug($p->name),$p->id) ?>"><img
                                        src="<?= url_tam($p->image_name); ?>" alt="<?= $p->name; ?>"></a>
                            </div>
                            <h4><a href="<?= product_url(slug($p->name),$p->id) ?>"><?= catchuoi($p->name,50); ?></a>
                            </h4>
                            <p><span><?= ($p->price==0) ? 'Liên hệ' : number_format($p->price). '₫'; ?> </span> </p>
                            <div class="nut_ss"><a class="sosanh_page" data-id="<?= $p->id; ?>"
                                    data-url="<?= base_url('compare/addcompare') ?>">So sánh</a></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="pagination-bx clearfix col-md-12 text-center">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="filter-right">
                <?php if(count($listHang)>0): ?>
                    <div class="panel panel-manu">
                        <div class="panel-heading">
                            Hãng sản xuất
                        </div>
                        <div class="panel-body">
                          
                            <ul class="list-unstyled">
                                <?php foreach($listHang as $hang): ?>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="checkmedi" id="<?=$hang->id.'manu'?>"
                                            data-uri="<?= gen_url($friendly_url,'manu='.$hang->id, $_SERVER['QUERY_STRING'])?>"
                                            data-rollback="<?= rollback_url($friendly_url,'manu', $_SERVER['QUERY_STRING'])?>"
                                                <?= $manu==$hang->id?"checked":""?>>
                                                <label class="form-check-label" for="<?=$hang->id.'manu'?>">
                                                <?= $hang->name; ?>
                                                <!-- (<?= $hang->count?>) -->
                                                </label>
                                        </label>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                          
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="box-sidebar">
                <?php if(count($location_manu)>0): ?>
                    <div class="panel panel-manu">
                        <div class="panel-heading">
                            Nơi sản xuất
                        </div>
                        <div class="panel-body">                         
                            <ul class="list-unstyled" id="location_manu" data-total="<?=count($location_manu)?>">
                                <?php foreach($location_manu as $key=> $loc): ?>
                                <li <?=$key>=6?'class="deactive"':''?>>
                                    <div class="checkbox">
                                        <label>
                                            <input class="checkmedi" type="checkbox" id="<?=$key.'loc'?>"
                                            data-uri="<?= gen_url($friendly_url,'loc='.$loc->model, $_SERVER['QUERY_STRING'])  ?>"
                                            data-rollback="<?= rollback_url($friendly_url,'loc', $_SERVER['QUERY_STRING'])?>"
                                                <?= $current_loc==$loc->model?"checked":""?>>
                                                <label class="form-check-label" for="<?=$key.'loc'?>"> 
                                                <?= $loc->model; ?>
                                                <!-- (<?= $loc->count?>) -->
                                                </label>
                                          
                                        </label>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <?php if(count($location_manu)>6): ?>
                                <li class="show_more_loc" data-attr="active"><a>Xem thêm</a> </li>
                                <?php endif; ?>
                            </ul>
                          
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="panel panel-manu">
                        <div class="panel-heading">
                            Khoảng giá (VND)
                        </div>
                        <div class="panel-body">
                            <?php if(!empty($range)): ?> 
                            <ul class="list-unstyled" id="price_range" data-total="<?=count($range)?>">
                                <?php foreach($range as $key=> $ra): ?>
                                <li >
                                    <div class="checkbox">
                                        <label>
                                            <input class="checkmedi" id="<?=$ra->id.'price'?>'"
                                            data-uri="<?= gen_url($friendly_url,'range_id='.$ra->id.'&minp='.$ra->minp .'&maxp='.$ra->maxp, $_SERVER['QUERY_STRING']) ?>"
                                            data-rollback="<?= rollback_url($friendly_url,'range_id,minp,maxp=', $_SERVER['QUERY_STRING'])?>"
                                             type="checkbox"  <?= $range_id==$ra->id?"checked":""?>>
                                             <label class="form-check-label" for="<?=$ra->id.'price'?>">
                                            <?= $ra->price_range; ?>
                                            <!-- (<?= $ra->num?>) -->
                                                </label>
                                        </label>
                                    </div>
                                </li>
                                <?php endforeach; ?>                             
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function() {
    $('.show_more_loc').click(function() {
        var attr = $('.show_more_loc').data('attr');
        if (attr == 'active') {
            $('#location_manu li.deactive').addClass('active');
            $('#location_manu li.deactive').removeClass('deactive');
            $('.show_more_loc').html('Thu gọn');
            $('.show_more_loc').data('attr', 'deactive');
        } else {
            $('#location_manu li.active').addClass('deactive');
            $('#location_manu li.active').removeClass('active');
            $('.show_more_loc').html('Xem thêm');
            $('.show_more_loc').data('attr', 'active');
        }
    })
});
</script>