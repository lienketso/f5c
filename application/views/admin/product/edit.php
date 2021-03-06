<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
        <li class="breadcrumb-item"><a href="<?= admin_url('product'); ?>">Sản phẩm </a></li>
        <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
    </ol>
</nav>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <?php if(!empty($this->session->flashdata('exist'))):?>
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('exist');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <?php endif;?>
		
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nhập thông tin để sửa sản phẩm</h4>
                    <div class="form-group" style="text-align: right;">
                        <a href="<?= admin_url('product') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay
                            lại danh sách</a>
                        <button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
                    </div>
                    <div class="form-group">
                        <label for="">Tên sản phẩm (*)</label>
                        <input type="text" name="name" value="<?= $info->name; ?>" class="form-control" id="input_name"
                            onkeyup="return ChangeToSlug();" placeholder="Nhập tiêu đề">
                        <span id="" class="error mt-2 text-danger" for=""><?php echo form_error('name'); ?></span>
                    </div>
                    

                    <div class="form-group">
                        <label for="">Giá bán (đ)</label>
                        <input type="text" name="price" value="<?= number_format($info->price); ?>"
                            onkeyup="this.value=FormatNumber(this.value);" class="form-control" id=""
                            placeholder="Giá sử dụng để giao dịch">
                        <span id="" class="error mt-2 text-danger" for=""><?php echo form_error('price'); ?></span>
                    </div>

                    

                    <div class="form-group">
                        <label for="">VAT ( Thuế giá trị gia tăng )</label>
                        <input type="number" min="0" max="30" name="vat" value="<?= $info->vat; ?>" class="form-control"
                            placeholder="Không điền nếu đã bao gồm VAT">
                        <span id="" class="error mt-2 text-danger" for=""><?php echo form_error('vat'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Hiện VAT</label>
                        <select name="show_vat" class="form-control ">
                            <option value="1" <?= ($info->show_vat==1) ? 'selected' : ''; ?>>--Có--</option>
                            <option value="0" <?= ($info->show_vat==0) ? 'selected' : ''; ?>>--Không--</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tags</label>
                        <input type="text" name="tags" value="<?= set_value('tags'); ?>" class="form-control"
                            placeholder="Nhập từ khóa cách nhau bởi dấu ,">
                        <span id="" class="error mt-2 text-danger" for=""><?php echo form_error('tags'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Video URL</label>
                        <input type="text" name="video_url" value="<?= $info->video_url; ?>" class="form-control" placeholder="Link youtube">                   
                    </div>
                    <div class="form-group">
                        <label for="">Thông số</label>
                        <textarea name="options_cat" class="makeMeRichTextarea" id="metadesc" placeholder="Thông số"
                            onkeyup="keyupMeta()" rows="4"><?= $info->options_cat; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Nội dung sản phẩm</label>
                        <div id="">
                            <textarea name="content" class="makeMeRichTextarea"
                                id="edtone"><?= str_replace('{base_url}','https://f5c.vn/',html_entity_decode ($info->content)); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php  
                                if(!empty($info->options)){
                                    $them = unserialize($info->options);
                                }else{
                                    $them = [];
                                }
                                $i = 1;
                         ?>
                        <label for="">Thuộc tính riêng ( hiển thị phần mô tả sản phẩm trong trang chi tiết )</label>
                        <div id="danhsach_tt">
                        <?php foreach($them as $key=>$val): ?>
                            <?php $i++; ?>
                        <div class="list_thuoctinh" id="thuoctinh_e<?= $i; ?>">
                        <div class="row">
                        <div class="col-lg-5"><input type="text" class="form-control" name="option_name[]" value="<?= $key ?>" placeholder="Tên thuộc tính"></div>
                        <div class="col-lg-5"><input type="text" class="form-control" name="option_value[]" value="<?= $val ?>" placeholder="Giá trị"></div>
                        <div class="col-lg-2"><div class="xoa_tt"><a class="del_thuoc_tinh" id="e<?= $i; ?>" href="javascript:void">Xóa</a></div></div>
                        </div>
                        </div>
                        <?php endforeach; ?>
                        </div>
                        

                        <div class="button_them_tt">
                            <button type="button" class="add_thuoctinh" id="add_thuoctinh">+ Thêm thuộc tính riêng</button>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label for="">Phụ kiện kèm theo</label>
                        <select id="slectPK" data-url="<?= admin_url('product/selectpk') ?>"
                            class="js-example-basic-multiple form-control" name="products[]" multiple="multiple">
                            <?php foreach($list_kemtheo as $row): ?>
                            <option value="<?= $row->id ?>" selected><?= $row->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span id="" class="error mt-2 text-danger" for=""><?php echo form_error('products'); ?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="friendly_url" value="<?= $info->friendly_url; ?>" class="form-control"
                            id="input_slug" placeholder="Đường dẫn tĩnh">
                        <span id="" class="error mt-2 text-danger"
                            for=""><?php echo form_error('friendly_url'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Giá thị trường (đ)</label>
                        <input type="text" name="price_other" value="<?= number_format($info->price_other); ?>"
                            onkeyup="this.value=FormatNumber(this.value);" class="form-control" id=""
                            placeholder="Giá thị trường để so sánh">
                        <span id="" class="error mt-2 text-danger"
                            for=""><?php echo form_error('price_other'); ?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Thứ tự</label>
                        <input type="number" name="sort_order" value="<?= $info->sort_order; ?>" class="form-control"
                            min="0" max="99999" placeholder="Thứ tự ưu tiên">
                    </div>
                    <p class="card-description">
                        <code><i class="ti-settings"></i> Cấu hình Seo (Rich Snippet)</code>
                        <button type="button" id="onset" class="btn btn-primary btn-sm"><i class="ti-eye"></i> Hiện cấu
                            hình</button>
                        <button type="button" id="offset" class="btn btn-dark btn-sm"><i class="ti-import"></i>
                            Ẩn</button>
                    </p>
                    <!-- Rich snippet -->
                    <div class="form-group opensetting">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab"
                                    aria-controls="home-1" aria-selected="true">Rich Snippet</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home-1" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="form-group">
                                    <label for="">Thẻ meta title</label>
                                    <input type="text" name="site_title" value="<?= $info->site_title; ?>"
                                        class="form-control title-change" id="" placeholder="Thẻ tiêu đề website">
                                </div>
                                <div class="form-group">
                                    <label for="">Thẻ meta keyword</label>
                                    <input type="text" name="meta_key" value="<?= $info->meta_key; ?>"
                                        class="form-control" id="" placeholder="Thẻ từ khóa cách nhau bởi dấu ,">
                                </div>
                                <div class="form-group">
                                    <label for="">Thẻ meta description</label>
                                    <textarea name="meta_desc" placeholder="Thẻ mô tả danh mục"
                                        class="form-control meta-desc" id=""
                                        rows="4"><?= $info->meta_desc; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Rich snippet -->
                    <button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
                    <a href="<?= admin_url('product') ?>" class="btn btn-light"><i class="ti-arrow-left"></i> Quay lại
                        danh sách</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tùy chọn khác</h4>
                    <div class="form-group">
                        <label for="">Bảo hành ( Tháng )</label>
                        <input type="number" min="1" max="84" name="warranty" value="<?= $info->warranty; ?>"
                            class="form-control" min="0" max="5" placeholder="Nhập số tháng bảo hành">
                    </div>
                    

                    <div class="form-group">
                        <label for="">Thuộc danh mục</label>
                        <select name="cat_id" class="form-control js-example-basic-single">
                            <option value="">--Chọn danh mục--</option>
                            <?php $this->category_model->optionCategory(0,1,4,$info->cat_id,0); ?>
                        </select>
                        <span id="" class="error mt-2 text-danger"
                            for=""><?php echo form_error('cat_id'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Hãng sản xuất</label>
                        <select name="manufac_id" class="form-control">
                            <option value="0">--Chọn hãng--</option>
                            <?php $this->manufac_model->optionManufac($info->manufac_id); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Xuất xứ</label>
                        <select name="model" class="form-control">
                            <option value="">--Chọn xuất xứ--</option>
                            <?php foreach($listCountries as $row): ?>
                            <option value="<?= $row->name; ?>" <?= ($row->name==$info->model) ? 'selected' : '' ?>>
                                <?= $row->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tình trạng</label>
                        <select name="status" class="form-control">
                            <option value="1" <?= ($info->status==1) ? 'selected' : '' ?>>Còn hàng</option>
                            <option value="2" <?= ($info->status==2) ? 'selected' : '' ?>>Sản phẩm chưa có sẵn</option>
                            <option value="0" <?= ($info->status==0) ? 'selected' : '' ?>>Hết hàng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div class="btn_multi_upload">
                            <input type="file" name="image_name">
                        </div>
                        <!-- <div class="input-group col-xs-12">
                            <input type="text" name="image_name" value="<?= $info->image_name; ?>" id="xFilePath"
                                class="form-control file-upload-info" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" id="" onclick="browseServer()"
                                    type="button">Chọn ảnh</button>
                            </span>
                        </div>
                        <div class="col-xs-12">
                            <img src="<?= product_link($info->image_name); ?>" id="imgreview" style="width: 30%; padding-top: 10px">
                        </div> -->
                         <div class="col-xs-12">
                            <img src="<?= product_link($info->image_name); ?>" id="imgreview" style="width: 30%; padding-top: 10px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Danh sách ảnh đính kèm (Tên ảnh không chứa khoảng cách, chữ cái tiếng việt, các ký tự đặc biệt '/.{}[]\%#$!*^')</label>
                        <input type="hidden" name="productid" id="productid" value="<?= $info->id; ?>">
                        <div class="list_dinh_kem" id="previewIMG">
                            <?php if(!empty($imgAttach )): ?>
                        <?php foreach($imgAttach as $key=>$val): ?>
                            <div class="img_att_list" id="del<?= $val->id; ?>">
                                <span class="del_image" data-id="<?= $val->id ?>" data-link="upload/public/<?= $val->file_name; ?>" data-url="<?= admin_url('product/deleteFile') ?>"><img  src="<?= public_url('admin/images/delete.png') ?>"></span>
                                <img class="img_at" src="<?= product_link($val->file_name) ?>">
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </div>

                        <div class="btn_multi_upload">
                            <input id="files" data-url="<?= admin_url('product/upload_multi') ?>" type="file" multiple="" name="files[]">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề thẻ Alt</label>
                        <input type="text" name="alt_image" value="<?= $info->alt_image; ?>" class="form-control"
                            placeholder="Thẻ alt cho ảnh đại diện">
                    </div>

                    <div class="form-group">
                        <label for="">Ẩn / Hiện sản phẩm</label>
                        <select name="hide" class="form-control">
                            <option value="0" <?= ($info->hide==0) ? 'selected' : '' ?>>Hiện</option>
                            <option value="1" <?= ($info->hide==1) ? 'selected' : '' ?>>Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nổi bật ( Hiện trên trang chủ)</label>
                        <select name="feature" class="form-control">
                            <option value="0" <?= ($info->feature==0) ? 'selected' : '' ?>>Không</option>
                            <option value="1" <?= ($info->feature==1) ? 'selected' : '' ?>>Có</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu biểu (hiện trong danh mục)</label>
                        <select name="tieubieu" class="form-control">
                            <option value="0" <?= ($info->tieubieu==0) ? 'selected' : '' ?>>Không</option>
                            <option value="1" <?= ($info->tieubieu==1) ? 'selected' : '' ?>>Có</option>
                        </select>
                    </div>
                    <div class="form-group">
                     <label for="">Quà tặng</label>
                      <textarea name="sale" placeholder="Note các quà tặng" class="form-control" id="" rows="8"><?= $info->sale; ?></textarea>
                     </div>


                </div>
            </div>
        </div>
    </div>
</form>