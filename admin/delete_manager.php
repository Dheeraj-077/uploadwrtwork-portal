<?php
include_once ('../config.php');
$id = $_GET['id'];
$sql1 = "DELETE FROM tblusers WHERE id = $id";
if (mysqli_query($mysqli, $sql1)) {
    echo "Record updated successfully";
    header('location:./view_manager.php');

  } else {
    echo "Error deleting record: " . mysqli_error($mysqli);
  }

?>                                     
