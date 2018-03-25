<?php

include '../_includes/connection.php';

if (isset($_GET['cat']) && $_GET['cat'] == "all") {
  
  $result = mysqli_query($conn, "select * from gallery");
  while ($row = mysqli_fetch_array($result)) {
    
?>

<tr>
  <td><img src="../<?= $row['image'] ?>" width="150"></td>
  <td><?= $row['category'] ?></td>
  <td>
    <button class="btn btn-sm" data-img-id="<?= $row['id'] ?>" data-action="update"><i class="fa fa-pencil"></i></button>
    <button class="btn btn-sm" data-img-id="<?= $row['id'] ?>" data-action="delete"><i class="fa fa-trash-o"></i></button>
  </td>
</tr>

<?php
    
  }
  
}
?>
