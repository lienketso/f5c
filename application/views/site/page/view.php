<section class="header-blog" style="background-image: url(<?= $arrSetting['banner_page'] ?>)">
    <div class="container">
        <h1 class="title-category"></h1>
    </div>
</section>
<section class="category-home pd50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="single-sibar">
                    <h3><?= $arrSetting['key_website_'.$lang] ?></h3>
                    <ul class="list-single">
                        <?php foreach($listpage as $row): ?>
                        <li><a href="<?= base_url('trang-tin/'.$row->slug); ?>"><?= $row->title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <img src="<?= public_url('site/lib/') ?>images/img-gioi-thieu.jpg" class="img-full" alt="Cây tre việt nam">
                <div class="detail-single">
                    <h1 class="single-title"><?= $info->title; ?></h1>
                    <div class="content-single">
                       <?= $info->content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>