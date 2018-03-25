<?php

include '../_includes/connection.php';

if (isset($_POST['date_from']) && isset($_POST['date_to'])) {
  $query;
  if ($_POST['event_name'] == 'Nuptial') {
    $query = "select * from events where datetime_from_nup = '".date("Y-m-d H:i:s", strtotime($_POST['date_from']))."' and datetime_to_nup = '".date("Y-m-d H:i:s", strtotime($_POST['date_to']))."' and description='".$_POST['desc']."' and id=".$_POST['id'];
  } else {
    $query = "select * from events where datetime_from = '".date("Y-m-d H:i:s", strtotime($_POST['date_from']))."' and datetime_to = '".date("Y-m-d H:i:s", strtotime($_POST['date_to']))."' and description='".$_POST['desc']."' and id=".$_POST['id'];
  }
  $result = mysqli_query($conn, $query);
  $changed = TRUE;
  while ($row = mysqli_fetch_array($result)) {
    $changed = FALSE;
  }
  if ($changed) {
    echo 'CHANGED';
  } elseif ($changed == FALSE) {
    echo 'NOT CHANGED';
  } else {
    echo mysqli_error($conn);
  }
}
  