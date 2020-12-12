<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/static/css/style.css?<?=time()?>">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/static/css/dashboard.css?<?=time()?>">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/static/css/detail.css?<?=time()?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?<?=time()?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/static/js/bootstrap.min.js"></script>
<script src="<?php echo URLROOT; ?>/static/js/popper.js"></script>
<script src="<?php echo URLROOT; ?>/static/js/app.js"></script>
</head>
<body>

<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <h3>Household App</h3>  
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link ml-2 <?php echo strpos($_GET['url'], 'home') !== false || strpos($_GET['url'], 'household') !== false ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/home">
                <i class="fa fa-home mr-2" aria-hidden="true" ></i>
                  Hộ dân
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ml-2 <?php echo strpos($_GET['url'], 'people') !== false ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/people">
                <i class="fa fa-users mr-2" aria-hidden="true"></i>
                  Dân cư
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ml-2 <?php echo strpos($_GET['url'], 'unassign') !== false ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/unassign">
                <i class="fa fa-users mr-2" aria-hidden="true"></i>
                  Chưa có hộ
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ml-2 <?php echo strpos($_GET['url'], 'receipt') !== false && strpos($_GET['url'], 'receipttype') == false ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/receipt">
                <i class="fa fa-money mr-2" aria-hidden="true"></i>
                  Phí thu
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ml-2 <?php strpos($_GET['url'], 'receipttype') !== false ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/receipttype">
                <i class="fa fa-object-group mr-2" aria-hidden="true"></i>
                  Loại phí
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ml-2 <?php echo $_GET['url'] == 'settings' ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/settings">
                <i class="fa fa-cog mr-2" aria-hidden="true"></i>
                  Cài đặt
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    
