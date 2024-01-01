<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<div class="col-lg-9">
  <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
    <a href="" class="text-decoration-none d-block d-lg-none">
      <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
      <div class="navbar-nav py-0">
      <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME'])  ?>" class="nav-link">Home</a>
      <a href="<?= base_url() ?>v1/map" class="nav-link">Map</a>
        <a href="<?= base_url() ?>v1/gallery" class="nav-link">Gallery</a>
        
      </div>
      <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="<?= base_url() ?>v1/about">About Us</a>
    </div>
  </nav>
</div>
</div>

<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper">


  <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->