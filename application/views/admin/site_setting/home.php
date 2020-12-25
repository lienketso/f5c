<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cấu hình giới thiệu </li>
  </ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Nhập thông tin cấu hình giới thiệu</h4>
          <div class="form-group" style="text-align: right;">
            <button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
          </div>
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#home-2" role="tab" aria-controls="home-2" aria-selected="true">Thông tin giới thiệu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#home-3" role="tab" aria-controls="home-3" aria-selected="true">Tầm nhìn - Sứ mệnh</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#home-4" role="tab" aria-controls="home-4" aria-selected="true">Tại sao lựa chọn</a>
                </li>
              </ul>
              <div class="tab-content">
                <!-- section 2 -->
                <div class="tab-pane fade show active" id="home-2" role="tabpanel" aria-labelledby="home-tab">
                   <div class="form-group">
                    <label for="">Tiêu đề </label>
                    <input type="text" name="gioithieu_title_1_<?= $lang ?>" value="<?= $arrSetting['gioithieu_title_1_'.$lang] ?>" class="form-control" placeholder="Dịch vụ">
                  </div> 
                  <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea name="about_file_<?= $lang ?>" class="form-control" rows="4" id=""><?= $arrSetting['about_file_'.$lang] ?></textarea>
                  </div>
                 <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea name="hotro_content_product_<?= $lang ?>" class="makeMeRichTextarea" id="edtproduct"><?= $arrSetting['hotro_content_product_'.$lang] ?></textarea>
                  </div>
                  <div class="form-group">
                  <label>Ảnh đại diện</label>
                  <div class="input-group col-xs-12">
                    <input type="text" value="<?= $arrSetting['banner_bg_'.$lang]; ?>" name="banner_bg_<?= $lang ?>" id="bnProduct" class="form-control file-upload-info" placeholder="Upload Image">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('bnProduct')" type="button">Chọn ảnh</button>
                    </span>
                  </div>
                </div>
                </div>

                  <div class="tab-pane fade" id="home-3" role="tabpanel" aria-labelledby="home-tab">
                   <div class="form-group">
                    <label for="">Tiêu đề </label>
                    <input type="text" name="gioithieu_bg_2_<?= $lang ?>" value="<?= $arrSetting['gioithieu_bg_2_'.$lang] ?>" class="form-control" placeholder="Dịch vụ">
                  </div> 
                  <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea name="gioithieu_content_<?= $lang ?>" class="form-control" rows="4" id=""><?= $arrSetting['gioithieu_content_'.$lang] ?></textarea>
                  </div>
    
      
                </div>

                <div class="tab-pane fade" id="home-4" role="tabpanel" aria-labelledby="home-tab">
                   <div class="form-group">
                    <label for="">Tiêu đề </label>
                    <input type="text" name="hoivien_title_<?= $lang ?>" value="<?= $arrSetting['hoivien_title_'.$lang] ?>" class="form-control" placeholder="Dịch vụ">
                    </div> 

                    <div class="form-group">
                    <label for="">Box 1 </label>
                    <div class="row">
                      <div class="col-lg-6">
                    <input type="text" name="box_1_num" value="<?= $arrSetting['box_1_num'] ?>" class="form-control" placeholder="Số">
                    </div>
                    <div class="col-lg-6">
                    <input type="text" name="box_1_title_<?= $lang ?>" value="<?= $arrSetting['box_1_title_'.$lang] ?>" class="form-control" placeholder="Tiêu đề">
                    </div>
                    <div class="col-lg-12">
                    <textarea style="margin-top: 10px" class="form-control" rows="3" name="box_1_intro_<?= $lang ?>" placeholder="Mô tả"><?= $arrSetting['box_1_intro_'.$lang] ?></textarea>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="">Box 2 </label>
                    <div class="row">
                      <div class="col-lg-6">
                    <input type="text" name="box_2_num" value="<?= $arrSetting['box_2_num'] ?>" class="form-control" placeholder="Số">
                    </div>
                    <div class="col-lg-6">
                    <input type="text" name="box_2_title_<?= $lang ?>" value="<?= $arrSetting['box_2_title_'.$lang] ?>" class="form-control" placeholder="Tiêu đề">
                    </div>
                    <div class="col-lg-12">
                    <textarea style="margin-top: 10px" class="form-control" rows="3" name="box_2_intro_<?= $lang ?>" placeholder="Mô tả"><?= $arrSetting['box_2_intro_'.$lang] ?></textarea>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="">Box 3 </label>
                    <div class="row">
                      <div class="col-lg-6">
                    <input type="text" name="box_3_num" value="<?= $arrSetting['box_3_num'] ?>" class="form-control" placeholder="Số">
                    </div>
                    <div class="col-lg-6">
                    <input type="text" name="box_3_title_<?= $lang ?>" value="<?= $arrSetting['box_3_title_'.$lang] ?>" class="form-control" placeholder="Tiêu đề">
                    </div>
                    <div class="col-lg-12">
                    <textarea style="margin-top: 10px" class="form-control" rows="3" name="box_3_intro_<?= $lang ?>" placeholder="Mô tả"><?= $arrSetting['box_3_intro_'.$lang] ?></textarea>
                    </div>
                    </div>
                    </div>

                </div>


              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
        </div>
      </div>
    </div>
  </div>
</form>