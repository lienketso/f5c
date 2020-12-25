<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Thông tin thành viên</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thông tin tài khoản</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="main_content">
    <section class="cat-forum pdt30">
       <div class="container">
    
        <?php if(isset($message)) : ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $message ?>
      </div>
      <?php endif; ?>

          <div class="row">
             <div class="col-lg-3">
                <div class="sidebar-forum">
                   <h3>Thông tin profile</h3>
                   <div class="info-user">
                      <p>Họ tên : <?= $userLog->name; ?></p>
                      <p>Email : <?= $userLog->email; ?></p>
                      <p>Số điện thoại : <?= $userLog->phone; ?></p>
                      <div class="avatar-no">
                         <?php if($userLog->image==''): ?>
                            <img src="<?= public_url('site/assets/images/no-image.jpg'); ?>">
                             <?php else: ?>
                                 <img src="<?= base_url('uploads/plus/'.$userLog->image); ?>">	
                             <?php endif; ?>
                         </div>
                     </div>
                     <ul>
                        <li><a href="<?= base_url('member/mytopic') ?>">Danh sách đơn hàng</a></li>
                        <li><a href="<?= base_url('member/changepass') ?>">Đổi mật khẩu</a></li>
                        <li><a href="<?= base_url('member/logout') ?>">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
              <div class="form-contact">
                 <form action="" method="POST" class="frm-contact" role="form" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-lg-3">  
                            <label>Họ và tên</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="" placeholder="" value="<?= $userLog->name; ?>" required="">
                                <div class="form-err"><?= form_error('name') ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">  
                            <label>Email</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="text" disabled="disabled" class="form-control" name="email" value="<?= $userLog->email; ?>" id="" placeholder="" required="">
                                <div class="form-err"><?= form_error('email') ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="phancach"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">  
                            <label>Địa chỉ</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" id="" value="<?= $userLog->address ?>" placeholder="" >

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">  
                            <label>Số điện thoại</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" id="" value="<?= $userLog->phone ?>" placeholder="" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">  
                            <label>Ngày sinh</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="ngaysinh" id="" value="<?= $userLog->ngaysinh ?>" placeholder="ngày/tháng/năm" >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-3">  
                            <label>Avatar</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="file" name="image" value="">
                            </div>
                            <div class="form-group">
                                <div class="button-dangky">
                                    <input class="dangky-now" type="submit" name="" value="Cập nhật profile">
                                </div>
                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>

</div>
</section>
<?php $this->load->view('site/blocks/block_right'); ?>
</div>