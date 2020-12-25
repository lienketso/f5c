 <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ </a></li>
                    <li class="active">Đăng nhập</li>
                </ol>
            </div> <!-- breadcrumb -->
 <div class="container">
             
                <div class="row">
                    <div class="col-md-12">

                        <!-- block  contact-->
                        <div class="block-contact-us">
                            <div class="block-title">
                                Đăng nhập hệ thống
                            </div>
                            <form method="post" action="<?php echo base_url('user/login'); ?>">
                            <div class="block-content row">
                                <div class="col-sm-6">
                                    <h4><?php echo form_error('login'); ?></h4>
                                    <div class="form-group">
                                        <input type="text" placeholder="Email *" name="email" class="form-control" id="email" value="<?php echo set_value('email'); ?>">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Mật khẩu" name=password id="pass" class="form-control">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-inline" type="submit">Đăng nhập</button>
                                    </div>
                                  
                                </div>
                               
                            </div><!-- block  contact-->
                            </form>
                        </div>
                    </div>

                </div>

            </div>