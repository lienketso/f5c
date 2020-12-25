<section class="header-category" style="background-image: url(<?= $arrSetting['banner_product']; ?>);" >
  <div class="container">
    <h1 class="title-category"><?= $arrSetting['key_memberlk_'.$lang] ?></h1>
  </div>
</section>
<section class="category-home pd50">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="sidebar-cate">
          <h2><?= $arrSetting['key_memberlk_'.$lang] ?></h2>
          <ul class="list-unstyled pcate">
            <?php foreach($categoryAll as $key=>$row): ?>
            <?php if(!empty($row['subcat'])): ?>
            <li class="<?= ($key==0) ? 'active' : '' ?>">
              <a href="#homeSubmenu<?= $key ?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><?= $row['title'] ?> </a>
              <ul class="collapse list-unstyled subbam" id="homeSubmenu<?= $key ?>">
               <?php foreach($row['subcat'] as $sub): ?>
                <li>
                  <a href="<?= $sub['href']; ?>"><?= $sub['title']; ?> </a>
                </li>
              <?php endforeach; ?>
              </ul>
            </li>
            <?php else: ?>
            <li>
              <a href="<?= $row['href'] ?>"><?= $row['title'] ?></a>
            </li>
            <?php endif; ?>
          <?php endforeach; ?>

          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row">
          <div class="col-lg-12">
            <div class="search-cat">
              <h2><a href="<?= base_url(); ?>"><?= $arrSetting['key_home_'.$lang] ?></a> / <?= $arrSetting['key_memberlk_'.$lang] ?></h2>
              <select name="s" class="loc-cat">
                <option>Sản phẩm mới nhất</option>
                <option>Sắp xếp theo giá</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <?php if(!empty($list)): ?>
          <?php foreach($list as $row): ?>
          <div class="col-lg-4">
            <div class="list-product">
              <div class="img-product">
                <a href="<?= base_url('san-pham/'.$row->slug) ?>"><img src="<?= $row->image; ?>" alt="<?= $row->name; ?>" class="img-reponsive"></a>
              </div>
              <div class="desc-product">
                <h4><a href="<?= base_url('san-pham/'.$row->slug) ?>"><?= $row->name; ?></a></h4>
                <p><?= sub($row->description,100) ?> </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

          <div class="col-lg-12">
            <div class="paginate-bambo">
              <?= $this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>