<?php
include_once ('../config.php');  
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $result = $mysqli->query("SELECT * from managerfiles where id=$id");
    $row = $result->fetch_assoc();

    $file = '../manager/uploads/'.$row['file_name'];
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }

}

?>