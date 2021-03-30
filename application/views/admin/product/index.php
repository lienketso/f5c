<style type="text/css">
.thanhtimkiem {
    padding: 20px;
}
</style>
<div id="content" class="span10">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= admin_url('home') ?>">Trang chính</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
        </ol>
    </nav>
    <?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
    <div id="content" class="card">
        <div class="thanhtimkiem">
            <form method="GET" action="<?php echo admin_url('product'); ?>">
                <div class="span12">
                    <div style="float: left; padding-right: 15px;">
                        <div class="control-group">
                            <div class="controls">
                                <input class="form-control" id="" type="text" name="name" value="<?= $name ?>"
                                    placeholder="Lọc theo tiêu đề...">
                            </div>
                        </div>
                    </div>
                    <div style="float: left; padding-right: 15px;">
                        <div class="control-group">
                            <div class="controls">
                                <select data-placeholder="Loại nhà đất" name="category_id" id="" class="form-control"
                                    data-rel="chosen">
                                    <option value="0">--Danh mục--</option>
                                    <?php foreach($listCategory as $row): ?>
                                    <option value="<?= $row->id; ?>" <?= ($category_id==$row->id) ? 'selected' : '' ?>>
                                        <?= $row->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div style="float: left; padding-top: 10px">
                        <button type="submit" class="btn btn-info">Tìm</button>
                        <a href="<?= admin_url('product'); ?>" class="btn btn-secondary">Làm lại</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">

            <div class="row-fluid sortable">
                <div class="box span12">
                    <form name="theForm" id="theForm" action="<?= admin_url('product') ?>" method="post">
                        <input type="hidden" name="btnOnclick" value="">
                        <div class="" style="text-align: right;padding-bottom: 10px">
                            <a href="<?php echo admin_url('product/add'); ?>" class="btn btn-small btn-success"><i
                                    class="ti-write"></i> Thêm mới</a>
                            <button class="btn btn-small btn-danger" onclick="return xacnhanDelete();"><i
                                    class="ti-trash"></i> Xóa tùy chọn</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width: 1528px;">
                                <thead class="filter">
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="allbox" id="allbox"
                                                onclick="return check_all();">
                                        </th>
                                        <th>Tiêu đề</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá tiền</th>
                                        <th>VAT</th>
                                        <th>Ngày sửa</th>
                                        <th>Nổi bật</th>
                                        <th>Ẩn / Hiện</th>
                                        <th>Cấu hình</th>
                                    </tr>
                                </thead>
                                <tbody class="list_item">
                                    <?php foreach($list as $row) : ?>
                                    <tr class="row_<?php echo $row->id; ?>">
                                        <td>
                                            <input type="checkbox" id="" name="id[]" value="<?php echo $row->id ?>">
                                        </td>
                                        <td><?php echo $row->name; ?><br/><strong style="color: #666">Danh mục : <?= $this->product_model->getCategory($row->cat_id) ?></strong></td>
                                        <td class="center"><img src="<?= product_link($row->image_name) ?>" width="70">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control text-right number"
                                                id="<?= $row->id ?>" value="<?= $row->price ?>"
                                                data-old-number="<?= intval($row->price) ?>"
                                                data-url="<?= admin_url('product/update_price') ?>" />
                                        </td>
                                        <td>
                                            <input id="vat_<?= $row->id ?>" data-vat-old="<?= $row->vat ?>" data-id="<?= $row->id ?>" type="number"
                                                min="0" max="100" placeholder="VAT" value="<?= $row->vat ?>"
                                                data-url="<?= admin_url('product/update_vat') ?>"
                                                 class="form-control vat" />
                                        </td>
                                        <td>

                                            <b><?= $row->admin_update?></b><br />
                                            <span
                                                style="color: #08c;font-size: 12px;padding-right:20px"><?=date("d-m-Y H:i",$row->last_update)  ?></span>


                                        </td>
                                        <td width="120">
                                            <a id="feature_<?=$row->id?>" data-id="<?=$row->id?>"
                                                class="<?= $row->feature==1?'an_sp':'hien_sp'?> show_hot"
                                                title="<?= $row->feature==1?'Click để ẩn nổi bật':'Click để hiện nổi bật'?>"
                                                data-url="<?= admin_url('product/feature') ?>"
                                                data-show="<?= $row->feature ?>" href='javascript:void(0)'
                                                >
                                                <?= $row->feature==1?'Nổi bật':'Không'?></a>

                                        </td>
                                        
                                        
                                        <td>
                                            <?php if($row->hide==0): ?>
                                            <a id="status_<?=$row->id?>" data-id="<?=$row->id?>"
                                                class="an_sp product_status" title="Click để ẩn sản phẩm"
                                                data-show="<?=$row->hide?>" href='javascript:void(0)'
                                                data-url="<?= admin_url('product/status') ?>"
                                                >Ẩn</a>
                                            <?php endif; ?>
                                            <?php if($row->hide==1): ?>
                                            <a id="status_<?=$row->id?>" data-id="<?=$row->id?>"
                                                class="hien_sp product_status" title="Click để hiện sản phẩm"
                                                href='javascript:void(0)'
                                                data-url="<?= admin_url('product/status') ?>">Hiện</a>
                                            <?php endif; ?>
                                        </td>

                                        <td class="center" width="150">
                                            <div style="width:150px;">
                                                <a class="btn btn-sm btn-info"
                                                    href="<?php echo admin_url('product/edit/'.$row->id); ?>">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a class="btn btn-sm btn-danger"
                                                    href="<?php echo admin_url('product/del/'.$row->id); ?>"
                                                    onclick="return check_del();">
                                                    <i class="ti-trash"></i>
                                                </a>

                                                <a class="btn btn-sm btn-success" target='_blank'
                                                    href="<?php echo base_url('/view-p'.$row->id.'.html'); ?>">
                                                    <i class="ti-eye"></i>
                                                </a>

                                            </div>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-body">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--/span-->
        </div>
    </div>
    <!--/row-->
</div>
