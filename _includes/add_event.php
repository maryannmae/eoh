<?php
include 'connection.php';

$user_email = $_SESSION['user_email'];
$category = $_POST['event_category'] == 'Other Occasions' ? $_POST['other'] == '' ? $_POST['event_category'] : $_POST['other'] : $_POST['event_category'];
$pkg = isset($_POST['pkg']) ? $_POST['pkg'] : NULL;
$add_item = isset($_POST['add_item']) ? $_POST['add_item'] : NULL;
$datetime_from_nup = $_POST['date_from_nup'] != '' ? date("Y-m-d H:i:s", strtotime($_POST['date_from_nup'])) : NULL;
$datetime_to_nup = $_POST['date_end_nup'] != '' ? date("Y-m-d H:i:s", strtotime($_POST['date_end_nup'])) : NULL;
$datetime_from = date("Y-m-d H:i:s", strtotime(ord($_POST['date_from_wed']) == 0 ? $_POST['date_from'] : $_POST['date_from_wed']));
$datetime_to = date("Y-m-d H:i:s", strtotime(ord($_POST['date_end_wed']) == 0 ? $_POST['date_end'] : $_POST['date_end_wed']));
$description = $_POST['desc'];
$bday_album = $_POST['bday_album'] == 'Design 5' ? isset($_POST['bday_album5']) ? $_POST['bday_album5'] : NULL : $_POST['bday_album'];
$wed_album = $_POST['wed_album'] == 'Design 5' ? isset($_POST['wed_album5']) ? $_POST['wed_album5'] : NULL : $_POST['wed_album'];
$link_c_items = $_POST['link_c_items'] == 'Other' ? isset($_POST['other_c']) ? $_POST['other_c'] : NULL : $_POST['link_c_items'];
$link_f_items = $_POST['link_f_items'] == 'Other' ? isset($_POST['other_f']) ? $_POST['other_f'] : NULL : $_POST['link_f_items'];
$link_m_items = $_POST['link_m_items'] == 'Other' ? isset($_POST['other_m']) ? $_POST['other_m'] : NULL : $_POST['link_m_items'];
$link_s_items = $_POST['link_s_items'] == 'Other' ? isset($_POST['other_s']) ? $_POST['other_s'] : NULL : $_POST['link_s_items'];
$result;

if ($datetime_from_nup != NULL) {
  $result = mysqli_query($conn, "select * from events where datetime_from <= '{$datetime_to}' and datetime_to >= '{$datetime_from}'".
                                " or datetime_from_nup <= '{$datetime_to_nup}' and datetime_to_nup >= '{$datetime_from_nup}'".
                                " or datetime_from_nup <= '{$datetime_to}' and datetime_to_nup >= '{$datetime_from}'".
                                " or datetime_from <= '{$datetime_to_nup}' and datetime_to >= '{$datetime_from_nup}'");
} else {
  $result = mysqli_query($conn, "select * from events where datetime_from <= '{$datetime_to}' and datetime_to >= '{$datetime_from}'".
                                " or datetime_from_nup <= '{$datetime_to}' and datetime_to_nup >= '{$datetime_from}'");
}

$occupied = FALSE;
while ($row = mysqli_fetch_array($result)) {
  $occupied = TRUE;
}

if ($occupied) {
  echo "OCCUPIED";
} elseif ($occupied == FALSE) {
  if ($category == "Weddings") {
    mysqli_query($conn, "insert into events (user_email,category,package,add_item,bday_album,wed_album,link_m_items,link_c_items,link_s_items,link_f_items,datetime_from_nup,datetime_to_nup,datetime_from,datetime_to,description) values ('".
            $user_email."','".
            $category."','".
            $pkg."','".
            $add_item."','".
            $bday_album."','".
            $wed_album."','".
            $link_m_items."','".
            $link_c_items."','".
            $link_s_items."','".
            $link_f_items."','".
            $datetime_from_nup."','".
            $datetime_to_nup."','".
            $datetime_from."','".
            $datetime_to."','".
            $description."')"
            );
  } else {
    mysqli_query($conn, "insert into events (user_email,category,package,add_item,bday_album,wed_album,link_m_items,link_c_items,link_s_items,link_f_items,datetime_from,datetime_to,description) values ('".
            $user_email."','".
            $category."','".
            $pkg."','".
            $add_item."','".
            $bday_album."','".
            $wed_album."','".
            $link_m_items."','".
            $link_c_items."','".
            $link_s_items."','".
            $link_f_items."','".
            $datetime_from."','".
            $datetime_to."','".
            $description."')"
            );
  }
  if (mysqli_affected_rows($conn) == 1) {
    echo 'SUCCESS';
  } else {
    echo mysqli_error($conn);
  }
} else {
  echo mysqli_error($conn);
}
