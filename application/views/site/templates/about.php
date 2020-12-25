<section class="page-head">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li><a href="<?= base_url() ?>"><?= ($lang=='vn') ? 'Trang chủ' : 'Home' ?></a></li>
            <li><?= $info->title; ?></li>
          </ul>
          <h1><?= ($lang=='vn') ? 'Trang tin' : 'Page'; ?></h1>  
        </div>
      </div>
    </div>
  </section>

  <section class="blog-list">
    <div class="blog-content">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="blog-post text-page">
              <h1><?= $info->title ?></h1>
              <?= $info->content ?>
              <div class="social-small">
                <strong>Share:</strong>
                <a href="https://twitter.com/intent/tweet?text=<?= $info->title ?>+?= news_url('',$info->slug,$info->id); ?>" class="fa fa-twitter"></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= news_url('',$info->slug,$info->id); ?>" class="fa fa-facebook"></a>
                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= news_url('',$info->slug,$info->id); ?>" class="fa fa-instagram"></a>
<!--                 <a href="#" class="fa fa-google-plus"></a>
                <a href="#" class="fa fa-pinterest"></a> -->
              </div>
          
            </div>
          </div>
          <div class="col-md-4">
            <?php $this->load->view('site/blocks/block_right'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php $this->load->view('site/blocks/block_contact'); ?>