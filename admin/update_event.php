<?php

include '../_includes/connection.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = mysqli_query($conn, 'select status from events where id='.$id);
  while ($row = mysqli_fetch_array($result)) {
    if ($row['status'] == 'PENDING') {
      mysqli_query($conn, 'update events set status="APPROVED" where id='.$id);
    } else {
      mysqli_query($conn, 'update events set status="PENDING" where id='.$id);
    }
    if (mysqli_affected_rows($conn) == 1) {
      echo 'SUCCESS';
    } else {
      echo mysqli_error($conn);
    }
  }
}
