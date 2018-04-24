<?php
include './_includes/connection.php';

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
              <form id="form_recover" method="post">
                <div class="text-center">
                  <h3 class="page-header">Event Organization Hub by T-Reb Photography Account Recovery Page</h3>
                </div>
                <div class="form-group">
                  <label class="control-label">E-mail</label>
                  <input type="text" class="form-control" name="email" placeholder="Type the user email address here" required>
                </div>
                <div class="text-center">
                  <a class="btn btn-primary" href="/">Back to home page</a>
                  <a class="btn btn-primary" href="login.php">Back to login page</a>
                  <button type="submit" name="recover" class="btn btn-primary">Recover</button>
                </div>
              </form>
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
      $('#form_recover').on('submit',function(e){
        let email = $('input[name="email"]').val()
        let msg = ''
        if (email == '') {
          msg += 'Please fill-in user email<br>'
        }
        if (msg == '') {
          let data = {
            recover: '',
            hostname: '<?= $_SERVER['SERVER_NAME'] ?>',
            email: email
          }
          $.post('_includes/recover_account.php',data,function(data){
            if (data == 'SUCCESS') {
              alert('Email sent. Click the link in your email to proceed to the next step.')
              window.location = 'recover.php'
            } else if (data == 'DUPLICATE') {
              alertify.alert('Registration error. Email already registered')
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

