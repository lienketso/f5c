<div class="container">
            
                <div class="row">
                 
                    <div class="col-md-12">
        <?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?>
                         <!-- block  contact-->
                        <div class="block-address">
                            <div class="block-title">
                                Thông tin thành viên
                            </div>
                            <div class="block-content ">
                                <p>
                                    <b class="title">Tên thành viên</b>
                                    <?php echo $user->name; ?>
                                </p>
                                <p>
                                    <b class="title">Số điện thoại</b>
                                    <?php echo $user->phone; ?>
                                </p>
                                <p>
                                    <b class="title">Địa chỉ</b>
                                    <?php echo $user->address; ?>
                                </p>
                                <p>
                                    <b class="title">Email</b>
                                    <?php echo $user->email; ?>
                                </p>
                            </div>
                            <div class="btn-sua">
                                <a href="<?php echo base_url('user/edit'); ?>" style="color:#c00;">Chỉnh sửa thông tin</a>
                            </div>
                        </div><!-- block  contact-->
                    </div>
                </div>

            </div>