<style type="">
#p-cart{
padding-top: 10px;  
}
.main_content{
background-color:#f1f1f1;
}
.buymore{
float: left;
overflow: hidden;
font-size: 14px;
color: #288ad6;
line-height: 16px;
padding: 10px;   
}
.y-cart{
float: right;
padding: 10px;  
line-height: 16px;
}
form.form-cart  .list-cart .media .media-body {
display: table-cell;
vertical-align: top;
width: 85%; 
}
form.form-cart{
padding: 30px 20px;
background-color: #ffffff;
margin-bottom:30px;
}
form.form-cart  li.media{
border-bottom: 1px solid #f1f1f1;
padding-bottom:10px;
}
form.form-cart .alert{
padding: 7px;
}
form.form-cart .total-price strong:nth-child(2) {
float: right;
color: #f30c28;
}
form .remove-product{
padding:5px 10px;
text-align:center;

}
form  .remove-product >a {
color:#6c6d6d;
}
form .remove-product >a:hover {
color:#f8941d;
}
form .input-group{
float:right;
}
form .product-name h4{
width:70%;
float:left;
}
form .product-name span{
display:block;
margin-top: 10px;    
text-align:right;   
color: #f30c28;
}
form .product-name strike{
text-align:right;
display: block;
margin-bottom: 10px;
}
form .input-number{
width:49px;
height:34PX;
float:left;
border-top-color: #f8941d;
border-bottom-color: #f8941d;
background-color: transparent;
border-width:1px;
padding-left:5px;
text-align:center;
}
form .input-number:focus{
border-color:#f8941d;
}
form .product-content label {        
color: #288ad6;  
}

form .product-content label:hover{
cursor:pointer;
}
form .product-content a{
color: #288ad6;
}
form .product-content label i{
margin-left: 4px;
font-size: 15px;
vertical-align: middle;
}
form .product-content aside{
display: none;
}

form .product-content small {
display: block;
overflow: hidden;
font-size: 12px;
color: #666;
padding: 6px 0 0 10px;
}
form .product-content small:before {
content: "\2022";
color: #d8d8d8;
display: inline-block;
vertical-align: middle;
margin: 0 3px 0 -7px;
}

form .product-content label.first{
display:block;
}
form .product-content label.second{
padding-top:10px;
display:none;
}
section.total-bill{
padding-top:10px;
border-bottom:1px solid #f1f1f1;
}
section.total-bill .total-provisional,
section.total-bill .promotion{
display: block;
overflow: hidden;
padding-bottom: 10px;
}
section.total-bill .total-provisional span:nth-child(2),
section.total-bill .promotion span:nth-child(2){
float: right;
}

section.info-customer .col-left{
float:left;
max-width:50%;
}
section.info-customer .col-right{
float:left;
max-width:50%;
}
section.info-order .tab-content{
margin-bottom:20px;
}
section.info-order .well{
padding:10px;
display:none;
}
section.info-order .well input{
margin-bottom:10px;
}
section.info-payment .panel{
display:none;
}
</style>
<?php $this->load->view('site/blocks/block_menu') ?>
<div class="main_content">
<div id="p-cart" class="section">
<div class="container">
<div class="row justify-content-md-center">
<div class="col-md-6 col-md-offset-3">
<span> <a href="<?= base_url() ?>" class="buymore">
<i class="fa fa-angle-left" aria-hidden="true"></i>
Mua thêm sản phẩm khác</a>
</span>
<span class="y-cart">Giỏ hàng của bạn</span>
</div>
</div>
<div class="row">
<div class="col-md-6 col-md-offset-3">
<form class="form-cart" method="post" action="">
<section class="list-cart">
<ul class="list-unstyled">
  <?php $total_amount = 0; ?>
  <?php foreach($carts as $row): ?>
    <?php $total_amount = $total_amount + $row['subtotal']; ?>
  <?php $product = $this->product_model->get_info($row['id']); ?>
<li class="media">
<div class="media-left">
<a href="<?= product_url(slug($product->name),$product->id) ?>" target="_blank">
<img data-src="<?= url_tam($product->image_name) ?>"
src="<?= url_tam($product->image_name) ?>"
alt="<?= $product->name; ?>" loading="lazy"
class=" ls-is-cached lazyloaded"></a>
<div class="remove-product">
<a href="<?php echo base_url('cart/del/'.$row['id']) ?>">
<i class="fa fa-trash" aria-hidden="true"></i>
Xóa</a>
</div>
</div>
<div class="media-body">
<div class="product-name">
<h4><a href="<?= product_url(slug($product->name),$product->id) ?>" class="product-name"><?= $product->name; ?></a></h4>
<div> <span>
    <?= number_format($product->price); ?> ₫
</span>

</div>

</div>

<div>
<div class="clearfix"></div>
</div>

<div class="input-group ">
<div class="btn-group" role="group" aria-label="...">
<button type="button" data-type="minus" data-field="qty_<?= $row['id']; ?>" data-rowid="<?= $row['rowid'] ?>" data-link="<?= base_url('cart/updateOnecart') ?>" class="btn btn-default btn-number" ><i class="fa fa-minus"
        aria-hidden="true"></i></button>
<input type="text" class="input-number" name="qty_<?= $row['id']; ?>" value="<?= $row['qty']; ?>" />
<button type="button" id="tanglen" data-type="plus" data-field="qty_<?= $row['id']; ?>" data-rowid="<?= $row['rowid'] ?>" data-link="<?= base_url('cart/updateOnecart') ?>" class="btn btn-default btn-number"><i class="fa fa-plus"
        aria-hidden="true"></i></button>
</div>
</div>
</li>
<?php endforeach; ?>

</ul>
</section>
<section class='total-bill'>            
<div class="form-group">
    <div class="total-provisional"><span class="total-product-quantity">Tạm tính (<?= $total_items ?> sản
            phẩm):</span>
            <span id="total_cart"><?= number_format($total_amount); ?> ₫</span>
          </div>
    <div class="promotion"><span>Phí vận chuyển :</span><span> 0 ₫</span></div>
    <div class="total-price"><strong>Tổng tiền:</strong>
      <strong id="tong_tien"><?= number_format($total_amount); ?> ₫</strong>
    </div>
</div>           
</section>
<section class="info-customer">
<h5>THÔNG TIN KHÁCH HÀNG</h5>
<div class="row">
    <div class="col-md-12 ">
        <div class="form-group">
            <label class="radio-inline"><input type="radio" name="optradio"
                    checked>Anh</label>
            <label class="radio-inline"><input type="radio" name="optradio">Chị</label>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="form-group">
            <input type="text" name="fullname" value="<?= set_value('fullname') ?>" class="form-control" placeholder="Họ và tên *">
            <div class="alert-err"><?= form_error('fullname') ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="phone" value="<?= set_value('phone') ?>" class="form-control" placeholder="Số điện thoại *">
             <div class="alert-err"><?= form_error('phone') ?></div>
        </div>
    </div>
    <div class="col-md-12">
            <div class="form-group">
                <input type="text" name="slEmail" value="<?= set_value('slEmail') ?>" class="form-control" placeholder="Email">
                <div class="alert-err"><?= form_error('slEmail') ?></div>
            </div>
        </div>
</div>
</section>
<section class="info-order">
<h5>CHỌN CÁCH THỨC NHẬN HÀNG</h5>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" onclick="checkOpt('1')">
            <input type="radio" name="optorder" value="Giao tận nơi"> &nbsp;Giao tận nơi</a></li>
    <li><a data-toggle="tab" href="#shop" onclick="checkOpt('2')"> <input type="radio"
                name="optorder" value="Nhận tại công ty"> &nbsp; Nhận tại công ty</a></li>
</ul>

<div class="tab-content">

    <div id="home" class="tab-pane fade in active">
        <div class="col-md-12">
            <div class="text-tb">Chọn địa chỉ để biết thời gian nhận hàng và phí vận chuyển (nếu có)</div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select id="changeCity" data-link="<?= base_url('cart/getDistrict') ?>" class="select2 form-control" name="slThanhPho">
                    <option class="active">Chọn Thành phố</option>
                    <?php foreach($listCity as $k=>$c): ?>
                    <option class="" value="<?= $c->id; ?>" >
                      <?= $c->name; ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select id="quanhuyen" class="select2 form-control" name="slQuan">
                    <option class="active">Chọn Quận / Huyện</option>
                    
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <input type="text" name="slAddress" value="<?= set_value('slAddress') ?>" class="form-control" placeholder="Địa chỉ chi tiết *">
                <div class="alert-err"><?= form_error('slAddress') ?></div>
            </div>
        </div>
    </div>
    <div id="shop" class="tab-pane fade">
        <div class="col-md-12">
          <div class="text-tb">  <?= $this->site_model->getSettingMeta('site_company'); ?></div>
        </div>

    </div>
</div>
<div class="form-group">
    <input type="text" name="yeucau" value="<?= set_value('yeucau') ?>" class="form-control" placeholder="Yêu cầu khác (không bắt buộc)">
</div>
<!-- <div class="form-group">
    <div class="checkbox">
        <label><input type="checkbox" value="1" id="ckHoaDon">Xuất hóa đơn công ty</label>
    </div>
</div>
<div class="form-group">
    <div class="well">
        <input type="text" name="company_name" class="form-control" placeholder="Tên công ty">
        <input type="text" name="company_address" class="form-control" placeholder="Địa chỉ công ty">
        <input type="text" name="masothue" class="form-control" placeholder="Mã số thuế">
    </div>
</div> -->
</section>
<section class="info-payment">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="radio-inline"><input type="radio" value="home" name="optPayment"
                    id="ckTrucTiep" checked="checked">Thanh toán
                khi nhận
                hàng</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="radio-inline"><input type="radio" value="bank_tranfer" name="optPayment"
                    id="ckChuyenKhoan">Chuyển
                khoản</label>

        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
            <?= $this->site_model->getSettingMeta('site_bank'); ?>
            </div>
        </div>
    </div>
</div>
</section>
<hr />
<div class="form-group">
<div class="total-price"><strong>Tổng tiền:</strong>
  <strong id="tong_tiencuoi"><?= number_format($total_amount); ?> ₫</strong>
</div>
</div>
<button type="submit" class="btn btn-primary form-control">Đặt hàng</button>
</form>

</div>
</div>
</div>
</div>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
function checkOpt(val) {
$('input[name ="optorder"]').prop("checked", false);
$('input[name ="optorder"][value="' + val + '"]').prop("checked", true);
}
$(document).ready(function() {
$('form .product-content label.first').click(function() {
$(this).parent().find('aside').show('slow');
$(this).parent().find('label').show('slow');;
$(this).hide();
});
$('form .product-content label.second').click(function() {
$(this).parent().find('aside').hide('slow');
$(this).parent().find('label').show('slow');;
$(this).hide();
});
$('#ckHoaDon').click(function() {
if ($('#ckHoaDon').is(":checked")) {
$('section.info-order .well').show();
} else {
$('section.info-order .well').hide();
}
});
$('#ckTrucTiep').click(function() {
$('#ckChuyenKhoan').attr('checked', false);
$('section.info-payment .panel').hide();
});
$('#ckChuyenKhoan').click(function() {
$('#ckTrucTiep').attr('checked', false);
$('section.info-payment .panel').show();
});
});
// $.fn.select2.defaults.set("theme", "classic");
$('.select2').select2({
placeholder: 'Select an option'
});
</script>