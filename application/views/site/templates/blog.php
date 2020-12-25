<section class="page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url() ?>"><?= ($lang=='vn') ? 'Trang chủ' : 'Home' ?></a></li>
                    <li><?= $category->name; ?></li>
                </ul>
                <h1><?= $category->name; ?></h1>  
            </div>
        </div>
    </div>
</section>

<section class="blog-list">
        <div class="blog-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php foreach($list as $row): ?>
                        <div class="blog-item">
                            <div class="img-wrap"><a href="<?= news_url('',$row->slug,$row->id); ?>"><img class="fullwidth" src="<?= $row->image ?>" alt="<?= $row->title; ?>"></a></div>
                            <div class="info">
                                <a href="<?= news_url('',$row->slug,$row->id); ?>" class="name"><h4><?= $row->title; ?></h4></a>
                                <p class="text"><?=$row->description; ?>.</p>
                            </div>
         
                        </div>
                    <?php endforeach; ?>

                
                        <div class="paging-navigation">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <?php $this->load->view('site/blocks/block_right'); ?>
                    </div>

            </div>
        </div>
    </section>


  <?php $this->load->view('site/blocks/block_contact') ?>