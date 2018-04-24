<?php
include 'connection.php';

if (isset($_POST['change_pass'])) {
  $email = $_POST['email'];
  $pass = sha1($_POST['pass']);
  mysqli_query($conn, "update users set password='".$pass."' where email='".$email."'");
  if (mysqli_affected_rows($conn) == 1) {
    echo 'SUCCESS';
  } else {
    echo mysqli_error($conn);
  }
}