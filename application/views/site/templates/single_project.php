<div class="content">
    <div class="info_in">
        <div class="maxwidth">
            <div class="wr_detail">
                <h3 class="name_detail"><?= $info->title; ?></h3>
                <p><?= $info->description; ?></p>
            </div>

            <div class="wr_detail">
                <?php $info->content; ?>
            </div>
            <?php 
            $metaContent = $this->postmeta_model->getSeometa('meta_box_content',$info->id); 
            ?>

            <?php if(!empty($metaContent)): ?>
                <?php $metaContent = json_decode($metaContent); ?>
                <?php foreach($metaContent as $con): ?>
                    <div class="wr_detail">
                        <?= $con; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>


            <div class="wr_detail">
                <div class="row_10">
                    <div class="da_form">

                        <div class="form_lh">
                            <form method="post" name="frm" action="" enctype="multipart/form-data">

                                <p><input name="name" type="text" class="tflienhe" id="tname" placeholder="Họ tên"></p>
                                <p><input name="phone" type="text" class="tflienhe" id="tphone" placeholder="Điện Thoại "></p>
                                <p><input name="email" type="text" class="tflienhe" id="email" placeholder="Email"></p>
                                <p><input name="address" type="text" class="tflienhe" id="address" placeholder="Chủ đề"></p>

                                <p> <textarea name="noidung" cols="50" rows="5" class="ta_noidung" id="noidung" placeholder="Nội dung"></textarea>
                                </p>
                                <p>
                                    <button type="button" class="button-contact" id="btnSend" data-url="<?= base_url('home/contacthome') ?>" >Gửi</button>
                                </p> 

                            </form>
                            <p id="alert" class="thongbao">Gửi thông tin thành công, chúng tôi sẽ liên hệ sớm nhất</p>
                        </div>              
                    </div>
                        <div class="da_form">
                          <?= $arrSetting['site_footer_contact_'.$lang]; ?>
                      </div>
                      <div class="clear"></div>
                  </div>
              </div>


          </div>
      </div>


       <div class="info">
        <div class="maxwidth">
          <div class="title_dt"><h4>Dự án khác</h4></div> 
          
          <?php if(!empty($relatenews)): ?>
          <div class="row_15 slick_duan">
            <?php foreach($relatenews as $d): ?>
            <div class="box_duan">
              <div class="duan_in">
                <div class="img_duan img_hidden">
                  <a href="<?= news_url($d->slug,$d->id); ?>">
                    <img class="" src="<?= ($d->image!='') ? $d->image : public_url('site/lib/images/no-image.jpg'); ?>" alt="<?= $d->title; ?>"> 
                  </a>
                </div>
                <div class="ds_duan">
                  <a href="<?= news_url($d->slug,$d->id); ?>"><h3><?= $d->title; ?></h3></a>
                  <p><?= sub($d->description,100); ?></p>
                  <p class="ad_da"><?php echo $this->postmeta_model->getSeometa('meta_address',$d->id); ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>


          </div>
        <?php endif; ?>

        </div>
      </div>


  </div>