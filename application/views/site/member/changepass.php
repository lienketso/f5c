<section class="cat-forum pdt30">
	<div class="container">
     <div class="row pdb20">
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
            <div class="bread-forum">
               <a href="#">Nhập thông tin để đổi mật khẩu</a>
           </div>
       </div>
   </div>

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
              <li><a href="<?= base_url('member/profile'); ?>">Quay lại profile</a></li>
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
                        <input type="text" disabled="disabled" class="form-control" name="name" id="" placeholder="" value="<?= $userLog->name; ?>" required="">
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
                    <label>Mật khẩu mới</label>
                </div>
                <div class="col-lg-9">
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="" value="" >
                         <div class="form-err"><?= form_error('password') ?></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">  
                    <label>Nhập lại mật khẩu</label>
                </div>
                <div class="col-lg-9">
                    <div class="form-group">
                        <input type="password" class="form-control" name="repassword" id="" value="">
                         <div class="form-err"><?= form_error('repassword') ?></div>
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
                    <label></label>
                </div>
                <div class="col-lg-9">
                    <div class="form-group">
                        <div class="button-dangky">
                            <input class="dangky-now" type="submit" value="Đổi mật khẩu">
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