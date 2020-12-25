<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?= $arrSetting['banner_product'] ?>);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white"><?= $category_type ?></h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="<?= base_url() ?>">Trang chủ</a></li>
							<li><?= $category_type ?></li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
 </div>
<div class="content-block">
			<!-- Portfolio  -->
			<div class="section-full content-inner-2 portfolio text-uppercase bg-gray" id="portfolio">
				<div class="container">

					<div class="clearfix" id="lightgallery">
						<ul id="masonry" class="portfolio-ic dlab-gallery-listing gallery-grid-4 gallery row p-l0 sp10 lightgallery text-center">
							<?php foreach($listProduct as $row): ?>
							<li class="web design card-container col-lg-4 col-md-6 col-sm-6 p-a0">
								<div class="dlab-box dlab-gallery-box">
									<div class="dlab-media dlab-img-overlay1 dlab-img-effect">
										<a href="<?= news_url($row->slug,$row->id) ?>"> <img src="<?= $row->image; ?>" alt="<?= $row->title; ?>"> </a>
										<div class="overlay-bx">
											<div class="overlay-icon"> 
												<div class="text-white">
													<a href="<?= news_url($row->slug,$row->id) ?>"><i class="fa fa-link icon-bx-xs"></i></a> 
												</div>
											</div>
										</div>
									</div>
									<div class="dez-info p-a30 bg-white">
										<p class="dez-title m-t0"><a href="<?= news_url($row->slug,$row->id) ?>"><?= $row->title; ?></a></p>
										<p><small><?= $row->description ?></small></p>
									</div>
								</div>
							</li>
						<?php endforeach; ?>

						</ul>
					</div>

					<div class="pagination-bx clearfix col-md-12 text-center">
						 <?= $this->pagination->create_links(); ?>
					</div>

				</div>
			</div>
        </div>        