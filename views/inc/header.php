<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/static/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/static/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <h3>Household App</h3>  
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link ml-2 <?php echo $_GET['url'] == 'household' || $_GET['url'] == 'home' ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/home">
                <i class="fa fa-home mr-2" aria-hidden="true" ></i>
                  Hộ dân
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ml-2 <?php echo $_GET['url'] == 'people' ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/people">
                <i class="fa fa-users mr-2" aria-hidden="true"></i>
                  Dân cư
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ml-2 <?php echo $_GET['url'] == 'receipt' ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/receipt">
                <i class="fa fa-money mr-2" aria-hidden="true"></i>
                  Phí thu
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ml-2 <?php echo $_GET['url'] == 'receipttype' ? 'active' : ''; ?>" href="<?php echo URLROOT;?>/receipttype">
                <i class="fa fa-money mr-2" aria-hidden="true"></i>
                  Loại phí
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    
