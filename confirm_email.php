<?php

include '_includes/connection.php';

$confirmed = FALSE;

if (isset($_GET['email']) && isset($_GET['key'])) {
  $email = $_GET['email'];
  $hashcode = strtoupper(substr(md5(md5($email)),11,10));
  $key = $_GET['key'];
  if ($hashcode == $key) {
    mysqli_query($conn, "update profiles set status='CONFIRMED' where email='".$email."'");
    if (mysqli_affected_rows($conn) == 1) {
      $confirmed = TRUE;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Event Organization Hub by T-Reb Photography</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="admin/plugins/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="admin/css/font-awesome.css" rel="stylesheet">
    <link href="css/alertify.css" rel="stylesheet">
    <link href="admin/css/style_v1.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
        <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
    <style>
      #reg-link:hover {
        color: #fff;
      }
      .box {
        z-index: 0;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div id="page-login" class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
          <div class="box">
            <div class="box-content">
              <div class="text-center">
                <h1><?= $confirmed ? 'Email Confirmed' : 'Confirmation failed' ?></h1>
                <br>
                <a class="btn btn-primary" href="/">Go to home page</a>
                <a class="btn btn-primary" href="login.php">Go to login page</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="js/jquery-3.3.1.js"></script>
    <script src="admin/plugins/bootstrap/bootstrap.js"></script>
    <script src="js/alertify.js"></script>
    <script>
      $('#form_register').on('click',function(e){
        
      })
    </script>
  </body>
</html>
