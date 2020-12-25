<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Đăng ký tài khoản</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đăng ký tài khoản</li>
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
     <?php if(isset($message)) : ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $message ?>
      </div>
      <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_rg">
                            <h3>Đăng nhập</h3>
                        </div>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email của bạn" value="<?= set_value('email'); ?>">
                                <div class="alert-err"><?= form_error('email'); ?></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                                <div class="alert-err"><?= form_error('password'); ?></div>
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"><span>Nhớ tài khoản</span></label>
                                    </div>
                                </div>
                                <a href="mailto:thanhan1507@gmail.com">Quên mật khẩu ?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Đăng nhập ngay</button>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> Hoặc </span>
                        </div>
                       
                        <div class="form-note text-center">Chưa có tài khoản ? <a href="<?= base_url('register') ?>">Đăng ký ngay</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

<?= $this->load->view('site/blocks/block_right'); ?>

</div>
<!-- END MAIN CONTENT -->