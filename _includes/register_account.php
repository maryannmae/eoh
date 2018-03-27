<?php
include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['register'])) {
  $hostname = $_POST['hostname'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $hashcode = strtoupper(substr(md5(md5($email)),11,10));
  $address = $_POST['address'];
  $cellnum = $_POST['cellnum'];
  $pass = sha1($_POST['pass']);
  $link = 'http://'.$hostname.'/confirm_email.php?email='.$email.'&key='.$hashcode;

  mysqli_query($conn, 'insert into profiles (full_name,address,cellnum,email) values ("'.
                $full_name.'", "'.
                $address.'", "'.
                $cellnum.'", "'.
                $email.'")'
                );
  if (mysqli_affected_rows($conn) == 1) {
    mysqli_query($conn, 'insert into users (email,password) values ("'.
                  $email.'", "'.
                  $pass.'")'
                  );
    if (mysqli_affected_rows($conn) == 1) {
      require '../vendor/autoload.php';
      $mail = new PHPMailer(true);
      try {
          // $mail->SMTPDebug = 3;
          $mail->isSMTP();
          $mail->Host = 'eoh.test';
          $mail->SMTPAuth = true;
          $mail->Username = 'admin@eoh.test';
          $mail->Password = 'admin';
          $mail->SMTPSecure = 'STARTTLS';
          $mail->Port = 587;

          $mail->setFrom('admin@eoh.test', 'EOH');
          $mail->addAddress($email);

          $mail->isHTML(true);
          $mail->Subject = 'Email Confirmation';
          $mail->Body    = '<ul><li>Click <a href="'.$link.'">THIS</a> link or the link below to confirm your email address.</li><li><a href="'.$link.'">'.$link.'</a></li></ul>';

          $mail->send();
          echo 'SUCCESS';
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
    } else {
      echo mysqli_error($conn);
    }
  } else {
    echo mysqli_error($conn);
  }
}