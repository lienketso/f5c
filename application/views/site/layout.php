<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('site/head'); ?>

<?= $arrSetting['site_pixel']; ?>
</head>
<body>
  <?= $arrSetting['site_analytic']; ?>
  <!-- HEADER -->
  <?php if($Ishome && $Ishome=='home'): ?>
  <header class="top-nav" data-spy="affix" data-offset-top="34">
    <?php $this->load->view('site/header'); ?>
  </header>
  <?php else: ?>
    <?php $this->load->view('site/blocks/block_menu'); ?>
  <?php endif; ?>
  <!-- HEADER END -->

  <?php $this->load->view($temp,$this->data); ?>

  <!-- FOOTER -->
  <footer class="footer">
    <?php $this->load->view('site/footer'); ?>
  </footer>
  <!-- FOOTER END -->

  <!-- JAVASCRIPT FILES -->
  <script type="text/javascript" src="<?= public_url('site/') ?>js/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTRSHf8sjMCfK9PHPJxjJkwrCIo5asIzE"></script> 
  <script type="text/javascript" src="<?= public_url('site/') ?>js/map-style.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/modernizr-2.6.2.min.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/jquery.zoomslider.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/jquery.parallax-1.1.3.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/waypoint.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/jquery.counterup.min.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/custom-number.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/jquery.select2.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/jquery.swipebox.min.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/main.js"></script>
  <script type="text/javascript" src="<?= public_url('site/') ?>js/ajax.js"></script>

</body>

</html>