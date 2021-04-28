<!-- Basic Page Needs
  ================================================== -->
  <title><?= (isset($og_title)) ? $og_title : $this->site_model->getSettingMeta('site_title'); ?></title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="title" content="<?= (isset($og_title)) ? $og_title : $this->site_model->getSettingMeta('site_title'); ?>" />
  <meta name="description" content="<?= (isset($meta_desc)) ? $meta_desc : $this->site_model->getSettingMeta('meta_desc'); ?>" />
  <meta name="keywords" content="<?= (isset($meta_keyword)) ? $meta_keyword : $this->site_model->getSettingMeta('meta_keyword'); ?>" />
  <meta name="robots" content="index, follow" />
  
  <link hreflang="vi-vn" href="#" rel="alternate">

  <meta property="og:title" content="<?= (isset($og_title)) ? $og_title : $this->site_model->getSettingMeta('site_title'); ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="<?= (isset($og_image)) ? $og_image : $this->site_model->getSettingMeta('og_image'); ?>" />
  <meta property="og:description" content="<?= (isset($meta_desc)) ? $meta_desc : $this->site_model->getSettingMeta('meta_desc'); ?>" />
  <meta property="og:url" itemprop="url" content="<?= (isset($urlhttp)) ? $urlhttp : base_url(); ?>" />
  <!-- Mobile Specific ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- CSS - ICO ================================================== -->
  <link rel="shortcut icon" href="<?= base_url() ?>favicon.png" type="image/x-icon"/>

<link rel="stylesheet" href="<?= public_url('site/lib') ?>/css/css.css" type="text/css" />
<link rel="stylesheet" href="<?= public_url('site') ?>/css/fix.css" type="text/css" />
<link rel="stylesheet" href="<?= public_url('site') ?>/css/slide-nav.css" type="text/css" />

<script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/jquery11.2/jquery.min.js"></script>
<script type="text/javascript" src="<?= public_url('site') ?>/js/jquery/jquery11.2/jquery-ui.min.js"></script>

<!-- layout -->
<link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/layout/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/layout/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/layout/css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/layout/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/layout/css/style.css">
<link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/layout/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/layout/css/css.css">
<link rel="stylesheet" type="text/css" href="<?= public_url('site/lib') ?>/layout/css/f5pro.css">
<link rel="stylesheet" type="text/css" href="<?= public_url('site/css') ?>/flexslider.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- raty -->
<script type="text/javascript" src="<?= public_url('site/lib') ?>/layout/raty/jquery.raty.min.js">
</script>

<script type="text/javascript">
  var base_url = 'https://f5c.vn/';
</script>
<!--End raty -->
<!-- Java Script ================================================== -->

<!-- mã google analytic -->
<?= $this->site_model->getSettingMeta('site_analytic'); ?>
<!-- mã google facebook pixel -->
<?= $this->site_model->getSettingMeta('site_pixel'); ?>