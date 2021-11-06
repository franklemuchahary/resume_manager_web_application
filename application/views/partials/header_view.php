<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Resume Manager | T&P DTU</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons --
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/skin-blue.css">

    <link rel="stylesheet" href="<?php echo base_url('css/magnific/magnific-popup.css');?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      
      <body class="hold-transition skin-blue sidebar-mini fixed">
        <div class="wrapper">

          <!-- Main Header -->
          <header class="main-header">

        <!-- Logo --
        <a class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels --
          <span class="logo-mini"><b>RM</b></span>
          <!-- logo for regular state and mobile devices --
          <span class="logo-lg"><b>RESUME MANAGER</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" >
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo base_url();?>img/dtulogo.png" class="user-image" alt="DTU">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">RESUME MANAGER</span>
                </a>
              </li>

              <!-- Signout -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="<?php echo base_url();?>logout" title="Signout">
                  <i class="fa fa-power-off"></i>                 
                </a>                
              </li>

              
            </ul>
          </div>
        </nav>
      </header>