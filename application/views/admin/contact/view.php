<div class="email-wrapper wrapper">

            <div class="row align-items-stretch">

              

              

              <div class="mail-view d-none d-md-block col-md-12 col-lg-12 bg-white">

                <div class="row">

                  <div class="col-md-12 mb-4 mt-4">

                    <div class="btn-toolbar">

                      <div class="btn-group">

                        <a href="<?= admin_url('contact'); ?>" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-reply text-primary"></i> Quay lại</a>

                      </div>

                    

                    </div>

                  </div>

                </div>

                <div class="message-body">

                  <div class="sender-details">

                

                    <div class="details">

                      <p class="msg-subject">

                        Gửi lúc - <?= showdate_vn($contact->created_at); ?>

                      </p>

                      <p class="sender-email">

                        <?= $contact->user_name; ?>

                        <a href="mailto:<?= $contact->user_email; ?>"><?= $contact->user_email; ?></a>

                        &nbsp;<i class="mdi mdi-account-multiple-plus"></i> <?= $contact->user_phone; ?>

                      </p>

                    </div>

                  </div>

                  <div class="message-content">

                    <?= $contact->content; ?>

                  </div>

                  <div class="attachments-sections">

                    

                    

                  </div>

                </div>

              </div>

            </div>

          </div>