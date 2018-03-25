<?php

include './_includes/connection.php';

if (isset($_POST['date_from']) && isset($_POST['date_to'])) {
  $result = mysqli_query($conn, "select * from events where datetime_from <= '".date("Y-m-d H:i:s", strtotime($_POST['date_to']))."' and datetime_to >= '".date("Y-m-d H:i:s", strtotime($_POST['date_from']))."'");
  $occupied = FALSE;
  while ($row = mysqli_fetch_array($result)) {
    $occupied = TRUE;
  }
  if ($occupied) {
    echo 'OCCUPIED';
  } elseif ($occupied == FALSE) {
    echo 'NOT OCCUPIED';
  } else {
    echo mysqli_error($conn);
  }
}
  