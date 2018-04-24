<?php
include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['recover'])) {
  $hostname = $_POST['hostname'];
  $email = $_POST['email'];
  $hashcode = strtoupper(substr(md5(md5($email)),11,10));
  $link = 'http://'.$hostname.'/password_change.php?email='.$email.'&key='.$hashcode;
  $user_found = FALSE;

  $result = mysqli_query($conn, "select email from profiles where email='".$email."'");
  while ($row = mysqli_fetch_array($result)) {
    $user_found = TRUE;
  }

  if ($user_found == TRUE) {
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
      $mail->Subject = 'Password Change Confirmation';
      $mail->Body    = '<ul><li>Click <a href="'.$link.'">THIS</a> link or the link below to confirm your email address before proceeding to the next step.</li><li><a href="'.$link.'">'.$link.'</a></li></ul>';

      $mail->send();
      echo 'SUCCESS';
    } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
  } else {
    echo 'USER_NOT_FOUND';
  }

}