<?php

include '../_includes/connection.php';

$data = array();
$i = 0;
$result = mysqli_query($conn, "select * from events");
while ($row = mysqli_fetch_array($result)) {
  $data[$i]['id'] = $row['id'];
  $data[$i]['for'] = $row['datetime_from_nup'] != '' ? $row['datetime_from_nup'] : '';
  $data[$i]['title'] = $row['category'];
  $data[$i]['description'] = $row['description'];
  $data[$i]['add_item'] = $row['add_item'];
  $data[$i]['start'] = $row['datetime_from'];
  $data[$i]['end'] = $row['datetime_to'];
  if ($row['status'] == 'PENDING') {
    $data[$i]['backgroundColor'] = '#e74c3c';
  }
  $i++;
}
$result_nup = mysqli_query($conn, "select * from events where datetime_from_nup != ''");
while ($row = mysqli_fetch_array($result_nup)) {
  $data[$i]['id'] = $row['id'];
  $data[$i]['for'] = $row['datetime_from'] != '' ? $row['datetime_from'] : '';
  $data[$i]['title'] = "Nuptial";
  $data[$i]['description'] = $row['description'];
  $data[$i]['add_item'] = $row['add_item'];
  $data[$i]['start'] = $row['datetime_from_nup'];
  $data[$i]['end'] = $row['datetime_to_nup'];
  if ($row['status'] == 'PENDING') {
    $data[$i]['backgroundColor'] = '#e74c3c';
  }
  $i++;
}

echo json_encode($data);
