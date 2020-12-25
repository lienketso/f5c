  <section id="demo-1" class="main-slider">
    <div class="main-slider-caption">
      <div id="carousel-id" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php foreach($bannerTop as $key=>$val): ?>
          <li data-target="#carousel-id" data-slide-to="<?= $key ?>" class="<?= ($key==0) ? 'active' : ''; ?>"></li>
          <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
          <?php foreach($bannerTop as $key=>$val): ?>
          <div class="item <?= ($key==0) ? 'active' : ''; ?>">
            <img class="fullwidth" src="<?= $val->image; ?>" alt="<?= $val->name; ?>">
          </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>