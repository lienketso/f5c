<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="<?= (isset($meta_description)) ? $meta_description : $arrSetting['meta_description_'.$lang]; ?>" name="description" />
<meta content="<?= (isset($index_link)) ? $index_link : $arrSetting['index_link']; ?>,<?= (isset($follow_link)) ? $follow_link : $arrSetting['follow_link']; ?>" name="robots" /> 
<meta name="twitter:card" content="summary">
<meta property="og:title" content="<?= (isset($og_title)) ? $og_title : $arrSetting['og_title_'.$lang]; ?>">

<meta property="og:title" content="<?= (isset($og_title)) ? $og_title : $arrSetting['og_title_'.$lang]; ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?= (isset($og_image)) ? $og_image : $arrSetting['og_image']; ?>" />
<meta property="og:url" content="<?= (isset($urlhttp)) ? $urlhttp : base_url(); ?>" />
<meta property="og:description" content="<?= (isset($og_description)) ? $og_description : $arrSetting['og_description_'.$lang]; ?>" />


<link rel="icon" type="image/ico" href="<?= public_url('site/images/logoicon.png') ?>"/>

<title><?= (isset($og_title)) ? $og_title : $arrSetting['og_title_'.$lang]; ?></title>
<!-- FONTS -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway:300,400,700,800" rel="stylesheet">

<!-- CSS FILES -->
<link href="<?= public_url('site') ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= public_url('site') ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?= public_url('site') ?>/css/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link href="<?= public_url('site') ?>/css/zoomslider.css" rel="stylesheet" type="text/css" />
<link href="<?= public_url('site') ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?= public_url('site') ?>/css/fix.css" rel="stylesheet" type="text/css" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">