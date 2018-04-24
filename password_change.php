<?php
include './_includes/connection.php';

$authorized = FALSE;

if (isset($_GET['email']) && isset($_GET['key'])) {
  $email = $_GET['email'];
  $hashcode = strtoupper(substr(md5(md5($email)),11,10));
  $key = $_GET['key'];
  if ($hashcode == $key) {
    $authorized = TRUE;
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

              <?php
                if ($authorized == TRUE) {
              ?>

              <form id="form_changepass" method="post">
                <div class="text-center">
                  <h3 class="page-header">Event Organization Hub by T-Reb Photography Password Change Page</h3>
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input type="password" class="form-control" name="pass1">
                </div>
                <div class="form-group">
                  <label class="control-label">Confirm Password</label>
                  <input type="password" class="form-control" name="pass2">
                </div>
                <div class="text-center">
                  <button type="submit" name="change_pass" class="btn btn-primary">Change Password</button>
                </div>
              </form>

              <?php
                } else {
              ?>

              <div class="text-center">
                <h2>You are not authorized to view this page</h2>
              </div>

              <?php
                }
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="js/jquery-3.3.1.js"></script>
    <script src="admin/plugins/bootstrap/bootstrap.js"></script>
    <script src="js/alertify.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script>
      $('#form_changepass').on('submit',function(e){
        let form_obj = $(this).serializeArray()
        let msg = ''
        if (form_obj[0].value == '') {
          msg += 'Please fill-in your new password<br>'
        }
        if (form_obj[1].value == '') {
          msg += 'Please retype your new password<br>'
        }
        if (form_obj[0].value != form_obj[1].value) {
          msg += 'New passwords do not match<br>'
        }
        if (msg == '') {
          let data = {
            change_pass: '',
            email: '<?= $email ?>',
            pass: form_obj[0].value
          }
          $.post('_includes/change_password.php',data,function(data){
            if (data == 'SUCCESS') {
              alert('Successfully changed your password. You may now log in with your new password.')
              window.location = 'login.php'
            } else {
              alertify.alert('Something went wrong. Please contact a local Dentist.')
            }
          })
        } else {
          alertify.error(msg)
        }
        e.preventDefault()
      })
    </script>
  </body>
</html>

