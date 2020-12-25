<div class="breadcurb-area">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="home"><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                    <li>Kết quả tìm kiếm</li>
                </ul>
            </div>
        </div>
                <!-- Shop Product Area -->
        <div class="shop-product-area">
            <div class="container">
                <div class="row">
                  <?php $this->load->view('site/blocks/block_left'); ?>
                    <div class="col-md-9 col-sm-12">
                        <!-- Shop Product View -->
                        <div class="shop-product-view">

                            <!-- Shop Product Tab Area -->
                            <div class="product-tab-area">
                          <div class="tab-bar">
                                    <div class="tab-bar-inner">
                                       <p>Kết quả tìm kiếm với từ khóa : '<b><?php echo $key; ?></b>' </p>
                                    </div>
                                 
                                </div>
                            
                                <!-- Tab Content -->
                                <div class="tab-content">
                                    <!-- Shop Product-->
                                    <div class="tab-pane active" id="shop-product">
                                        <!-- Tab Single Product-->
                                        <div class="tab-single-product">
                                            <!-- Single Product -->
                                            <?php foreach($list as $row): ?>
                                            <div class="singel-product single-product-col">
                                                <!-- Single Product Image -->
                                                <div class="single-product-img">
                                                    <a href="<?php echo base_url('chi-tiet/'.$row->cat_name.'-'.$row->id.'.html'); ?>"><img src="<?php echo base_url('uploads/product/'.$row->image); ?>" alt="<?php echo $row->name; ?>"></a>
                                                </div>
                                                <!-- Single Product Content -->
                                                <div class="single-product-content">
                                                    <h2 class="product-name"><a title="Proin lectus ipsum" href="<?php echo base_url('chi-tiet/'.$row->cat_name.'-'.$row->id.'.html'); ?>"><?php echo $row->name; ?></a></h2>
                                                    <div class="product-price">
                                                        <p><?php echo number_format($row->price); ?></p>
                                                    </div>
                                                    <!-- Single Product Actions -->
                                                    <div class="product-actions">
                                                        <button class="button btn-cart" title="Mua hàng" type="button"><i class="fa fa-shopping-cart">&nbsp;</i><span>Mua hàng</span></button>
                                                        <div class="add-to-link">
                                                            <ul class="">
                                                                <li class="quic-view"><a href="<?php echo base_url('chi-tiet/'.$row->cat_name.'-'.$row->id.'.html'); ?>"><i class="fa fa-search"></i>Xem chi tiết</a></li>
                                                         
                                                            </ul>
                                                        </div>
                                                    </div><!-- End Single Product Actions -->
                                                </div><!-- End Single Product Content -->
                                            </div><!-- End Single Product -->
                                        <?php endforeach; ?>

                                
                                        </div><!-- End Tab Single Product-->
                                        
                                       
                                    </div><!-- End Shop Product-->
                                   
                                </div><!-- End Tab Content -->
                                <!-- Tab Bar -->
                                <div class="tab-bar tab-bar-bottom">
                                    <div class="toolbar">
                                   
                                        <div class="pages">
                                            <strong>Trang :</strong>
                                            <?php echo $this->pagination->create_links(); ?>
                                        </div>
                                    </div>
                                </div><!-- End Tab Bar -->
                            </div><!-- End Shop Product Tab Area -->
                        </div><!-- End Shop Product View -->
                    </div>
                </div>
            </div>
        </div><!-- End Shop Product Area -->