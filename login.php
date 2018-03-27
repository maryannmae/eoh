<?php
include './_includes/connection.php';


if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $result = mysqli_query($conn, "select * from users where email='".$email."' and password='".sha1($password)."' and status='CONFIRMED'");
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['logged_in'] = TRUE;
    $_SESSION['user_email'] = $row['email'];
    $result_profile = mysqli_query($conn, "select full_name from profiles where email='".$email."'");
    while ($row_profile = mysqli_fetch_array($result_profile)) {
      $_SESSION['full_name'] = $row_profile['full_name'];
    }
    $_SESSION['auth'] = $row['auth'];
    
    if ($row['auth'] == "0") {
      header("Location: admin/");
      exit();
    } else {
      header("Location: /");
      exit();
    }
    
  } else {
    echo '<script>alert("No user with that email or password is incorrect.")</script>';
  }

}

if (isset($_GET['unauthorized'])) {
  echo '<script>alert("You are not authorized!")</script>';
}

if (isset($_GET['logged_out'])) {
  echo '<script>alert("You are now logged out.")</script>';
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
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div id="page-login" class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
          <div class="text-right">
            <a id="reg-link" href="register.php" class="txt-default">Need an account?</a>
          </div>
          <div class="box">
            <div class="box-content">
              <form method="post">
                <div class="text-center">
                  <h3 class="page-header">Event Organization Hub by T-Reb Photography Login Page</h3>
                </div>
                <div class="form-group">
                  <label class="control-label">E-mail</label>
                  <input type="text" class="form-control" name="email" />
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input type="password" class="form-control" name="password" />
                </div>
                <div class="text-center">
                  <a class="btn btn-primary" href="/">Back to home page</a>
                  <button type="submit" name="login" class="btn btn-primary">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

