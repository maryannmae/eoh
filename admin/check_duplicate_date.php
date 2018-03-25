<?php

include '../_includes/connection.php';

if (isset($_POST['date_from']) && isset($_POST['date_to'])) {
  $result = mysqli_query($conn, "select * from events where".
                                " datetime_from <= '".date("Y-m-d H:i:s", strtotime($_POST['date_to']))."' and".
                                " datetime_to >= '".date("Y-m-d H:i:s", strtotime($_POST['date_from']))."'".
                                " and id != ".$_POST['id']." or ".
                                " datetime_from_nup <= '".date("Y-m-d H:i:s", strtotime($_POST['date_to']))."' and".
                                " datetime_to_nup >= '".date("Y-m-d H:i:s", strtotime($_POST['date_from']))."'".
                                " and id != ".$_POST['id']);
  $duplicate = FALSE;
  while ($row = mysqli_fetch_array($result)) {
    $duplicate = TRUE;
  }
  if ($duplicate) {
    echo 'DUPLICATE';
  } elseif ($duplicate == FALSE) {
    echo 'NOT DUPLICATE';
  } else {
    echo mysqli_error($conn);
  }
}
  