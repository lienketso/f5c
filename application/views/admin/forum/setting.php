<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= admin_url('home'); ?>">Trang chính</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cấu hình trang vận tải</li>
  </ol>
</nav>
<?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Nhập thông tin cấu hình trang vận tải</h4>
          <div class="form-group" style="text-align: right;">
            <button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Lưu lại</button>
          </div>
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#home-2" role="tab" aria-controls="home-2" aria-selected="true">Thông tin trang chủ</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#home-3" role="tab" aria-controls="home-3" aria-selected="false">Trang sản xuất</a>
                </li> -->
              </ul>
              <div class="tab-content">
                <!-- section 2 -->
                <div class="tab-pane fade show active" id="home-2" role="tabpanel" aria-labelledby="home-tab">

                  <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <div class="input-group col-xs-12">
                      <input type="text" value="<?= $arrSetting['car_home_image']; ?>" name="car_home_image" id="bnProduct" class="form-control file-upload-info" placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" id="" onclick="browseServerSetting('bnProduct')" type="button">Chọn ảnh</button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group" id="">
                    <label for="">Tiêu đề </label>
                    <input type="text" name="car_home_title_<?= $lang ?>" value="<?= $arrSetting['car_home_title_'.$lang] ?>" class="form-control" placeholder="Du lịch">
                  </div>
                  <div class="form-group">
                    <label for="">Mô tả</label>  
                    <div id="">
                      <textarea name="car_home_desc_<?= $lang ?>" class="makeMeRichTextarea" id="edtone"><?= $arrSetting['car_home_desc_'.$lang]; ?></textarea>
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