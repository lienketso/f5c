<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Đăng ký thành viên</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đăng ký thành viên</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_rg">
                            <h3>Đăng ký tài khoản</h3>
                            <p>Mua hàng thuận tiện, nhanh chóng và nhiều ưu đãi hơn khi đăng ký thành viên tại hệ thống Plusmart</p>
                        </div>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" required="" value="<?= set_value('name') ?>" class="form-control" name="name" placeholder="Họ và tên *">
                                <div class="alert-err"><?= form_error('name'); ?></div>
                            </div>
                            <div class="form-group">
                                <input type="text"  class="form-control" value="<?= set_value('ngaysinh') ?>" name="ngaysinh" placeholder="Ngày sinh">
                            </div>
                            <div class="form-group">
                                <input type="text"  class="form-control" value="<?= set_value('address') ?>" name="address" placeholder="Địa chỉ">
                            </div>
                            <div class="form-group">
                                <input type="text" required="" value="<?= set_value('phone') ?>" class="form-control" name="phone" placeholder="Số điện thoại *">
                                <div class="alert-err"><?= form_error('phone'); ?></div>
                            </div>
                            <div class="form-group">
                                <input type="text" required="" value="<?= set_value('email') ?>" class="form-control" name="email" placeholder="Email *">
                                <div class="alert-err"><?= form_error('email'); ?></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="password" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Tạo tài khoản</button>
                            </div>
                        </form>
                     
                        <div class="form-note text-center">Đã có tài khoản <a href="<?= base_url('login') ?>">Đăng nhập ngay</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

<?php $this->load->view('site/blocks/block_right'); ?>

</div>
<!-- END MAIN CONTENT -->