   <section class="subscribe">
      <div class="container ">
        <div class="row">
          <div class="col-md-12">
            <div class="inner">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="top-title"><?= ($lang=='vn') ? 'Bạn đang cần chúng tôi hỗ trợ ?' : 'Want to know about new types of coffee ?'; ?></div>
                  <div class="bottom-title"><?= ($lang=='vn') ? 'Hãy để lại số điện thoại' : 'Input your phone number'; ?></div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <form class="subs-form">
                    <input type="text" name="txt_phone" placeholder="<?= ($lang=='vn') ? 'Nhập số điện thoại' : 'Input your phone'; ?>">
                    <input id="btnGetphone" data-url="<?= base_url('home/booking') ?>" data-title="Để lại số điện thoại trên website" type="submit" value="<?= ($lang=='vn') ? 'Gửi ngay' : 'Submit now'; ?>">
                  </form>
                  <div class="alert-content"></div>
                  <div id="successID"></div>
                </div>  
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>