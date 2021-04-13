<!DOCTYPE html>

<html lang="en">



<head>

<?php $this->load->view('admin/head') ?>

</head>

<body class="sidebar-icon-only">

<div class="container-scroller">

<!-- partial:partials/_navbar.html -->

<?php $this->load->view('admin/header'); ?>

<!-- partial -->

<div class="container-fluid page-body-wrapper">



<!-- partial -->

<!-- partial:partials/_sidebar.html -->

<?php $this->load->view('admin/left'); ?>

<!-- partial -->

<div class="main-panel">

<div class="content-wrapper">

<?php $this->load->view($temp, $this->data); ?>

</div>

<!-- content-wrapper ends -->

<!-- partial:partials/_footer.html -->

<?php $this->load->view('admin/footer') ?>



