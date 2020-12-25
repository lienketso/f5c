 <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ </a></li>
                    <li class="active">Đăng ký thành viên</li>
                </ol>
            </div> <!-- breadcrumb -->
 <div class="container">
             
                <div class="row">
                    <div class="col-md-12">

                        <!-- block  contact-->
                        <div class="block-contact-us">
                            <div class="block-title">
                                Đăng ký thành viên
                            </div>
                            <form method="post" action="<?php echo base_url('user/register'); ?>">
                            <div class="block-content row">
                                <div class="col-sm-6">
                                    
                                    <div class="form-group">
                                        <input type="text" placeholder="Email *" name="email" class="form-control" id="email" value="<?php echo set_value('email'); ?>">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Mật khẩu" name=password id="pass" class="form-control">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Nhập lại mật khẩu" name=repassword id="repass" class="form-control">
                                        <?php echo form_error('repassword'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                     <input type="text" placeholder="Họ tên *" name="name" class="form-control" id="name" value="<?php echo set_value('name'); ?>">
                                     <?php echo form_error('name'); ?>
                                    </div>
                                 
                                    <div class="form-group">
                                        <input type="text" placeholder="Điện thoại" name="phone" id="phone" class="form-control" value="<?php echo set_value('phone'); ?>">
                                        <?php echo form_error('phone'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Địa chỉ" name="address" id="address" class="form-control" value="<?php echo set_value('address'); ?>">
                                        <?php echo form_error('address'); ?>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-inline" type="submit">Đăng ký</button>
                                    </div>
                                </div>
                            </div><!-- block  contact-->
                            </form>
                        </div>
                    </div>

                </div>

            </div>