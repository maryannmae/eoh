<?php 

include '_includes/connection.php';

//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Event Organizaton Hub by T-Reb Photography</title>

    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="admin/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="admin/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="css/alertify.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->    

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
  </head><!--/head-->



  <body class="homepage">

    <header id="header">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-xs-4">
              <div class="top-number"><p><i class="fa fa-phone-square"></i>  +639187232094</p></div>
            </div>
            <div class="col-sm-6 col-xs-8">
              <div class="social">
                <div class="search">
                  <form role="form">
                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                    <i class="fa fa-search"></i>
                  </form>
                </div>
                <?php if (isset($_SESSION['user_email'])) { ?>
                <a href="logout.php" class="btn btn-default btn-sm" style="margin-left: 10px" title="LOGOUT"><i class="fa fa-sign-out"></i> <?= $_SESSION['full_name'] ?></a>
                <?php } else { ?>
                <a href="login.php" class="btn btn-default btn-sm" style="margin-left: 10px">login</a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div><!--/.container-->
      </div><!--/.top-bar-->

      <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="images/ico/TREB1.png" alt="logo"></a>
          </div>

          <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
              <?php if ($_SERVER['PHP_SELF'] == "/index.php") { ?>
              <li class="active"><a href="/"><em class="fa fa-home">&nbsp;</em> Home</a></li>
              <?php } else { ?>
              <li><a href="/"><em class="fa fa-home">&nbsp;</em> Home</a></li>
              <?php } ?>
              <?php if ($_SERVER['PHP_SELF'] == "/abouts.php") { ?>
              <li class="active"><a href="abouts.php"><em class="fa fa-book">&nbsp;</em> About Us</a></li>
              <?php } else { ?>
              <li><a href="abouts.php"><em class="fa fa-book">&nbsp;</em> About Us</a></li>
              <?php } ?>
              <?php if ($_SERVER['PHP_SELF'] == "/services.php") { ?>
              <li class="active"><a href="services.php"><em class="fa fa-file">&nbsp;</em> Products and Services</a></li>
               <?php } else { ?>
              <li><a href="services.php"><em class="fa fa-file">&nbsp;</em> Products and Services</a></li>
               <?php } ?>
               <?php if ($_SERVER['PHP_SELF'] == "/gallery.php") { ?>
              <li class="active"><a href="gallery.php"><em class="fa fa-dashboard">&nbsp;</em> Gallery</a></li>
               <?php } else { ?>
              <li><a href="gallery.php"><em class="fa fa-dashboard">&nbsp;</em> Gallery</a></li>
               <?php } ?>
              <?php if ($_SERVER['PHP_SELF'] == "/booking.php") { ?>
              <li class="active"><a href="booking.php"><em class="fa fa-calendar">&nbsp;</em> Booking</a></li>
               <?php } else { ?>
              <li><a href="booking.php"><em class="fa fa-calendar">&nbsp;</em> Booking</a></li>
               <?php } ?>
               <?php if ($_SERVER['PHP_SELF'] == "/forum.php") { ?>
              <li class="active"><a href="forum.php"><em class="fa fa-comment">&nbsp;</em> Forum</a></li>
               <?php } else { ?>
              <li><a href="forum.php"><em class="fa fa-comment">&nbsp;</em> Forum</a></li>
               <?php } ?>
               <?php if ($_SERVER['PHP_SELF'] == "/contact.php") { ?>
              <li class="active"><a href="contact.php"><em class="fa fa-phone">&nbsp;</em> Contact Us</a></li>
               <?php } else { ?>
              <li><a href="contact.php"><em class="fa fa-phone">&nbsp;</em> Contact Us</a></li>
               <?php } ?>
                                    
            </ul>
          </div>
        </div><!--/.container-->
      </nav><!--/nav-->
      <div class="down-line"><font color= 2c3e50></font>
      </div>
    </header><!--/header-->