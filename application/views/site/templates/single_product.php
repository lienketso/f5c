<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?= $arrSetting['banner_product'] ?>);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Chi tiết <?= $category_type ?></h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="<?= base_url(); ?>">Trang chủ</a></li>
							<li><?= $category_type ?></li>
							<li><?= $info->title; ?></li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>

<div class="content-block">
			<!-- Portfolio Details -->
			<div class="section-full content-inner bg-white">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 m-b30">
							<h2 class="text-black font-weight-600 m-b15"><?= $info->title; ?></h2>
							
						<?= $info->content; ?>
							
						</div>
						
					</div>
				</div>
			</div>
			<!-- Portfolio Details End -->
        </div>        