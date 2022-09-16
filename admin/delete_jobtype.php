<?php
include_once ('../config.php');
$id = $_GET['id'];
$sql1 = "DELETE FROM addjobtype  WHERE id = $id";
if (mysqli_query($mysqli, $sql1)) {
    echo "Record updated successfully";
    header('location:./view_jobtype.php');

  } else {
    echo "Error deleting record: " . mysqli_error($mysqli);
  }

?>                                     
