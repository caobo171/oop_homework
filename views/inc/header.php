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
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Household App</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>
<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo URLROOT;?>/home">
                <i class="fa fa-home mr-2" aria-hidden="true" ></i>
                  Hộ dân <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT;?>/people">
                <i class="fa fa-users mr-2" aria-hidden="true"></i>
                  Dân cư
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT;?>/receipt">
                <i class="fa fa-money mr-2" aria-hidden="true"></i>
                  Phí thu
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT;?>/receipttype">
                <i class="fa fa-money mr-2" aria-hidden="true"></i>
                  Loại phí
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    
