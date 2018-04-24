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
              <form id="form_register" method="post">
                <div class="text-center">
                  <h3 class="page-header">Event Organization Hub by T-Reb Photography Registration Page</h3>
                </div>
                <div class="form-group">
                  <label class="control-label">Full name</label>
                  <input type="text" class="form-control" name="full_name">
                </div>
                <div class="form-group">
                  <label class="control-label">E-mail</label>
                  <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" name="address"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Contact Number</label>
                  <input type="text" class="form-control" name="cellnum">
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
                  <a class="btn btn-primary" href="/">Back to home page</a>
                  <a class="btn btn-primary" href="login.php">Back to login page</a>
                  <button type="submit" name="register" class="btn btn-primary">Register</button>
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
      $('#form_register').on('submit',function(e){
        let form_obj = $(this).serializeArray()
        let msg = ''
        if (form_obj[0].value == '') {
          msg += 'Please fill-in your name<br>'
        }
        if (form_obj[1].value == '') {
          msg += 'Please fill-in your email<br>'
        }
        if (form_obj[2].value == '') {
          msg += 'Please fill-in your address<br>'
        }
        if (form_obj[3].value == '') {
          msg += 'Please fill-in your contact number<br>'
        }
        if (form_obj[4].value == '') {
          msg += 'Please fill-in your password<br>'
        }
        if (form_obj[5].value == '') {
          msg += 'Please confirm your password<br>'
        }
        if (form_obj[4].value != form_obj[5].value) {
          msg += 'Passwords do not match<br>'
        }
        if (msg == '') {
          let data = {
            register: '',
            hostname: '<?= $_SERVER['SERVER_NAME'] ?>',
            full_name: form_obj[0].value,
            email: form_obj[1].value,
            address: form_obj[2].value,
            cellnum: form_obj[3].value,
            pass: form_obj[4].value
          }
          $.post('_includes/register_account.php',data,function(data){
            if (data == 'SUCCESS') {
              alert('Successfully registered. Please confirm your email address to login')
              window.location = 'register.php'
            } else if (data == 'DUPLICATE') {
              alertify.alert('Registration error. Email already registered')
            }
          })
        } else {
          alertify.error(msg)
        }
        e.preventDefault()
      })

      $(document).ready(function(){
        $('input[name="cellnum"]').mask('00000000000')
      })
    </script>
  </body>
</html>

