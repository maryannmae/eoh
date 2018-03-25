<?php
include '../_includes/connection.php';

if ($_SESSION['auth'] != "0") {
  header("Location: ../logout.php?unauthorized");
}


//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Event Organization Hub</title>
    <meta name="description" content="description">
    <meta name="author" content="DevOOPS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <!--<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>-->
    <link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
    <link href="plugins/select2/select2.css" rel="stylesheet">
    <link href="plugins/justified-gallery/justifiedGallery.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="css/style_v2.css" rel="stylesheet">
    <link href="plugins/chartist/chartist.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
        <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--Start Header-->
    <div id="screensaver">
      <canvas id="canvas"></canvas>
      <i class="fa fa-lock" id="screen_unlock"></i>
    </div>
    <div id="modalbox">
      <div class="devoops-modal">
        <div class="devoops-modal-header">
          <div class="modal-header-name">
            <span>Basic table</span>
          </div>
          <div class="box-icons">
            <a class="close-link">
              <i class="fa fa-times"></i>
            </a>
          </div>
        </div>
        <div class="devoops-modal-inner">
        </div>
        <div class="devoops-modal-bottom">
        </div>
      </div>
    </div>
    <header class="navbar">
      <div class="container-fluid expanded-panel">
        <div class="row">
          <div id="logo" class="col-xs-12 col-sm-2">
            <a href="index.html">T-Reb Photography</a>
          </div>
          <div id="top-panel" class="col-xs-12 col-sm-10">
            <div class="row">
              <div class="col-xs-8 col-sm-4">
                <div id="search">
                  <input type="text" placeholder="search"/>
                  <i class="fa fa-search"></i>
                </div>
              </div>
              <div class="col-xs-4 col-sm-8 top-panel-right">
                <a href="#" class="about">about</a>
                <a href="index_v1.html" class="style1"></a>
                <ul class="nav navbar-nav pull-right panel-menu">
                  <li class="hidden-xs">
                    <a href="index.html" class="modal-link">
                      <i class="fa fa-bell"></i>
                      <span class="badge">7</span>
                    </a>
                  </li>
                  <li class="hidden-xs">
                    <a class="ajax-link" href="ajax/calendar.html">
                      <i class="fa fa-calendar"></i>
                      <span class="badge">7</span>
                    </a>
                  </li>
                  <li class="hidden-xs">
                    <a href="ajax/page_messages.html" class="ajax-link">
                      <i class="fa fa-envelope"></i>
                      <span class="badge">7</span>
                    </a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                      <div class="avatar">
                        <img src="img/avatar.jpg" class="img-circle" alt="avatar" />
                      </div>
                      <i class="fa fa-angle-down pull-right"></i>
                      <div class="user-mini pull-right">
                        <span class="welcome">Welcome, <?php echo $_SESSION["user_email"]; ?></span>

                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-user"></i>
                          <span>Profile</span>
                        </a>
                      </li>
                      <li>
                        <a href="ajax/page_messages.html" class="ajax-link">
                          <i class="fa fa-envelope"></i>
                          <span>Messages</span>
                        </a>
                      </li>
                      <li>
                        <a href="ajax/gallery_simple.html" class="ajax-link">
                          <i class="fa fa-picture-o"></i>
                          <span>Albums</span>
                        </a>
                      </li>
                      <li>
                        <a href="ajax/calendar.html" class="ajax-link">
                          <i class="fa fa-tasks"></i>
                          <span>Tasks</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-cog"></i>
                          <span>Settings</span>
                        </a>
                      </li>
                      <li>
                        <a href="../logout.php">
                          <i class="fa fa-power-off"></i>
                          <span>Logout</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--End Header-->
    <!--Start Container-->
    <div id="main" class="container-fluid">
      <div class="row">
        <div id="sidebar-left" class="col-xs-2 col-sm-2">
          <ul class="nav main-menu">
            <li>
              <a href="ajax/dashboard.html" class="ajax-link">
                <i class="fa fa-dashboard"></i>
                <span class="hidden-xs">Home Page</span>
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-bar-chart-o"></i>
                <span class="hidden-xs">Products and Services </span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="ajax-link" href="ajax/charts_coindesk.html">All Works</a></li>
                <li><a class="ajax-link" href="ajax/charts_xcharts.html">Weddings</a></li>
                <li><a class="ajax-link" href="ajax/charts_flot.html">Birthdays</a></li>
                <li><a class="ajax-link" href="ajax/charts_google.html">Burials</a></li>
                <li><a class="ajax-link" href="ajax/charts_morris.html">Family Gatherings</a></li>
                <li><a class="ajax-link" href="ajax/charts_amcharts.html">School Activities</a></li>
                <li><a class="ajax-link" href="ajax/charts_chartist.html">Other Occasions</a></li>


              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-table"></i>
                <span class="hidden-xs">Events</span>
              </a>
              <ul class="dropdown-menu">

                <li><a class="ajax-link" href="ajax/tables_datatables.html">Data Tables</a></li>

              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-pencil-square-o"></i>
                <span class="hidden-xs">Forms</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="ajax-link" href="ajax/forms_elements.html">Elements</a></li>
                <li><a class="ajax-link" href="ajax/forms_layouts.html">Layouts</a></li>
                <li><a class="ajax-link" href="ajax/forms_file_uploader.html">File Uploader</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-desktop"></i>
                <span class="hidden-xs">UI Elements</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="ajax-link" href="ajax/ui_grid.html">Grid</a></li>
                <li><a class="ajax-link" href="ajax/ui_buttons.html">Buttons</a></li>
                <li><a class="ajax-link" href="ajax/ui_progressbars.html">Progress Bars</a></li>
                <li><a class="ajax-link" href="ajax/ui_jquery-ui.html">Jquery UI</a></li>
                <li><a class="ajax-link" href="ajax/ui_icons.html">Icons</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-list"></i>
                <span class="hidden-xs">Pages</span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="ajax/page_login.html">User Account</a></li>
                <li><a href="ajax/page_register.html">About Us</a></li>
                <li><a id="locked-screen" class="submenu" href="ajax/page_locked.html">Team Members</a></li>
                <li><a class="ajax-link" href="ajax/page_contacts.html">Suppliers</a></li>
                <li><a class="ajax-link" href="ajax/page_feed.html">Feed</a></li>
                <li><a class="ajax-link add-full" href="ajax/page_messages.html">Messages</a></li>
                <li><a class="ajax-link" href="ajax/page_pricing.html">Pricing</a></li>
                <li><a class="ajax-link" href="ajax/page_product.html">Product</a></li>

              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-map-marker"></i>
                <span class="hidden-xs">Maps</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="ajax-link" href="ajax/maps.html">OpenStreetMap</a></li>
                <li><a class="ajax-link" href="ajax/map_fullscreen.html">Fullscreen map</a></li>
                <li><a class="ajax-link" href="ajax/map_leaflet.html">Leaflet</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-picture-o"></i>
                <span class="hidden-xs">Gallery</span>
              </a>
              <ul class="dropdown-menu">


                <li><a class="ajax-link" href="ajax/gallery_flickr.html">All Works</a></li>
                <li><a class="ajax-link" href="ajax/gallery_flickr.php">Weddings</a></li>







                <li><a class="ajax-link" href="ajax/gallery_flickr.html">Birthdays</a></li>
                <li><a class="ajax-link" href="ajax/gallery_flickr.html">Burials</a></li>
                <li><a class="ajax-link" href="ajax/gallery_flickr.html">Family Gatherings</a></li>
                <li><a class="ajax-link" href="ajax/gallery_flickr.html">School Activities</a></li>
                <li><a class="ajax-link" href="ajax/gallery_flickr.html">Other Occasions</a></li>
              </ul>
            </li>

            <li>
              <a id="booking-page" class="ajax-link" href="ajax/calendar.html">
                <i class="fa fa-calendar"></i>
                <span class="hidden-xs">Booking</span>
              </a>
            </li>
            <li>
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-picture-o"></i>
                <span class="hidden-xs">Contact Us</span>
              </a>

          </ul>
        </div>